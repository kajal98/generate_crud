<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Former\Facades\Former;
use App\Models\User;
class SessionsController extends Controller
{
    public function getLogin()
    {
        if (!Auth::guest() )
        {
            return Redirect::route('admin-dashboard')->with('info', 'You are already logged in.');
        }
        return view('admin.sessions.login');
    }
    public function postLogin(Request $request)
    {
        foreach (config('crud.admin_roles') as $role)
        {
            if (Auth::attempt(['email' => $request->input('login'), 'password' => $request->input('password'), 'role' => $role]))
            {
                $request->session()->regenerate();
                return Redirect::route('admin-dashboard');
            }
        }
        return Redirect::back()->with('error_msg',"Invalid email or password.")->withInput($request->except('password'));
    }
    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::route('admin.login');
    }
    public function getProfile()
    {
        $user = User::find(Auth::user()->id);
        Former::populate($user);

        return view('admin.sessions.change_profile',compact('user'));
    }
    public function postProfile(Request $request)
    {
        $rules=[
        'name' => 'required|max:30',
        'email' => 'required|email|max:255'
        ];
        $messages=[
        'name.required' => 'Please enter full name',
        'email.required' => 'Please enter email',
        'email.email' => 'Please enter valid email'
        ];
        $validator = Validator::make($request->all(),$rules ,$messages);
        if ($validator->fails()) {
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Please correct following errors');
        }
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        // if(!empty($request->get('password')))
        // {
        //     $user->password = $request->get('password');
        // }
        $user->save();
        return redirect()->back()->with('success','Profile updated successfully');
    }
    public function getChangePassword()
    {
        return view('admin.sessions.change_password');
    }
    public function postChangePassword(Request $request)
    {
        $current_password = Auth::user()->password;
        $rules = array(
            'old_password'  => array('required'),
            'password'  => array('required','min:6','max:20','confirmed','different:old_password'),
            'password_confirmation'=>array('required','alpha_num')
            );
        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails())
        {
            return Redirect::back()->withErrors($validation);
        }
        else
        {
            $old_password = $request->get('old_password');
            if(Hash::check($old_password,$current_password))
            {
                $new_pass = Hash::make($request->get('password'));
                $user = User::find(Auth::user()->id);
                $user->password = $new_pass;
                $user->save();
                return Redirect::back()->with('success','Your password successfully changed');
            }
            else
            {
                return Redirect::back()->with('error','Please enter correct old password');
            }
        }
    }
    
}
