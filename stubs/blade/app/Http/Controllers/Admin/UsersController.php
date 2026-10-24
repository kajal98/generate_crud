<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Former\Facades\Former;
use App\Models\User;
use Carbon\Carbon;

class UsersController extends Controller
{
  public function index()
  {
    $users = User::where('role','!=','admin')->orderBy('name')->get();
    return view('admin.users.index',compact('users'));
  }
  public function create()
  {
    return view('admin.users.add');
  }
  public function store(Request $request)
  {
    $rules=[
    'name' => 'required|max:30',
    'email' => 'required|email|unique:users',
    'password' => 'required|confirmed',
    'password_confirmation' => 'required',
    'phone' => 'required|numeric',
    'mobile' => 'required|numeric',
    'address' => 'required',
    'city' => 'required',
    'state' => 'required',
    'country' => 'required',
    
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    
      $user=New User;
      $user->name=$request->get('name');
      $user->role= 'user';
      $user->email=$request->get('email');
      $user->password= Hash::make($request->get('password'));
      $user->active=$request->get('active', 0);      
      $user->address = $request->get('address');
      $user->city = $request->get('city');
      $user->state = $request->get('state');
      $user->country = $request->get('country');
      $user->phone = $request->get('phone');
      $user->mobile = $request->get('mobile');
      $user->save();
      return redirect()->route('users.index')->withSuccess("User created successfully.");
    
  }
  public function edit($id)
  { 
    $user = User::find($id);
    return view('admin.users.edit',compact('user'));
  }
  public function update(Request $request, $id)
  { 
    $rules=[
    'name' => 'required|max:30',
    'email' => 'required|email',
    'phone' => 'required',
    'mobile' => 'required',
    'address' => 'required',
    'city' => 'required',    
    'state' => 'required',
    'country' => 'required',
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try
    {
      $user=User::find($id);
      $user->forceFill($request->only(['name','email','phone','mobile','address','city','state','country','active']))->save();
      return redirect()->route('users.index')->withSuccess('User details updated successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
    }       
  }
  public function show(Request $request, $id)
  {
    $user = User::find($id);
    $from_where = $request->get('from_where');
    return view('admin.users.show',compact('user','from_where'));
  }
  public function destroy($id)
  {
    try
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->route('users.index')->withSuccess('User deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  public function SwitchStatus($id)
  {
    $user = User::find($id);
    $user->active = $user->active == "1" ? "0" : "1";
    $user->save();
    $status = $user->active ? 'approved' : 'deactivated';
    if (view()->exists('emails.switch_status'))
    {
      Mail::send('emails.switch_status', ['data' => $user, 'status' => $status], function($message) use($user, $status) {
        $message->to($user->email);
        $message->subject('Your account has been '.$status);
      });
    }
    if($status == 'approved')
    {
      send_message('Your account is active now. Welcome aboard!', $user->phone);
    }
    return redirect()->route('users.index')->withSuccess('Status updated successfully');   
  }
}
