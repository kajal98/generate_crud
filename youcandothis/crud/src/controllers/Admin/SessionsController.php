<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use Cookie;
use App\User;
use Validator;
use Hash;
use Former;
use Input;
use Session;
class SessionsController extends Controller
{
    public function getLogin()
    {
        if (!Auth::guest() )
        {
            return Redirect::route('dashboard')->with('info', 'You are already logged in.');
        }
        if (Cookie::get('auth_remember'))
        {
            $user_id = Crypter::decrypt(Cookie::get('auth_remember'));
            Auth::login($user_id);
            return Redirect::route('admin-dashboard')->with('success', 'You have logged in successfully.');
        }
        return view('admin.sessions.login');
    }
    public function postLogin(Request $request)
    {
        Hash::make($request->get('password'));
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
        $value=$request->get('login');
        $credentials = array($field=>$value, 'password' => $request->get('password'),'role'=>'admin');
        $credentials1 = array($field=>$value, 'password' => $request->get('password'),'role'=>'super admin');
        if (Auth::attempt($credentials) || Auth::attempt($credentials1))
        {
            return Redirect::route('admin-dashboard');
        }
        else
        {
            return Redirect::back()->with('error_msg',"Invalid email or password.")->withInput($request->except('password'));
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('admin/login');
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
        $user = User::find(Auth::user()->id);
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        if(!empty(Input::get('password')))
        {
            $user->password = Input::get('password');
        }
        $user->save();
        return redirect()->back()->with('success','Profile updated successfully');
    }
    public function getChangePassword()
    {
        return view('admin.sessions.change-password');
    }
    public function postChangePassword()
    {
        $current_password = Auth::user()->password;
        $rules = array(
            'old_password'  => array('required'),
            'password'  => array('required','min:6','max:20','confirmed','different:old_password'),
            'password_confirmation'=>array('required','alpha_num')
            );
        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails())
        {
            return Redirect::back()->withErrors($validation);
        }
        else
        {
            $old_password = Input::get('old_password');
            if(Hash::check($old_password,$current_password))
            {
                $new_pass = Hash::make(Input::get('password'));
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
