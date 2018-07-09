<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Former\Facades\Former;
use App\User;
use App\Blog;
use App\SiteSetting;
use App\Feedback;
use App\Inquiry;
use Validator;

class DashboardController extends Controller
{

	public function index()
	{        
		$users = User::where("role","=","user")->where("active","=",1)->count();
		$blogs = Blog::all()->count();
		$inquiries = Inquiry::all()->count();
		$feedbacks = Feedback::all()->count();
		return view('admin.index',compact('users','blogs','inquiries','feedbacks'));        
	}

	public function payments()
	{
		$user_packages = UserPackage::where('package_id', '!=', 1)->orderBy('created_at','desc')->paginate(10);
		return view('admin.payment',compact('user_packages'));
	}

	public function site_settings()
	{
		$site_setting = SiteSetting::first();
		return view('admin.site_settings', compact('site_setting'));
	}

	public function post_site_settings(Request $request)
	{
		$rules=[
	    'title' => 'required',
	    'email' => 'required|email',
	    'phone_1' => 'required',
	    'phone_2' => 'required',
	    'copy_right' => 'required',
	    'site_visitors' => 'required',
	    ];
	    $validator = Validator::make($request->all(),$rules);
	    if ($validator->fails()) { 
	      Former::withErrors($validator);
	      return redirect()->back()->withErrors($validator)->withInput();
	    }
	    try
	    {
	      $site_setting = SiteSetting::first();
	      $site_setting->title=$request->get('title');
	      $site_setting->email=$request->get('email');
	      $site_setting->phone_1=$request->get('phone_1');
	      $site_setting->phone_2=$request->get('phone_2');
	      $site_setting->copy_right=$request->get('copy_right');
	      $site_setting->site_visitors=$request->get('site_visitors');
	      $site_setting->save();
	      //dd($site_setting);
	      return redirect()->route('site-settings-get')->with('success', "Settings saved successfully.");
	    }
	    catch(\Exception $e)
	    {
	      return redirect()->route('site-settings-get')->with('error', 'Something went wrong, Please try after sometime.');
	    }
	}

	public function SwitchStatus($id)
  {
    $feedback = Feedback::find($id);
    $feedback->status = $feedback->status == "1" ? "0" : "1";
    $feedback->save();
    return redirect()->route('feedback.index')->withSuccess('Status updated successfully');
   
  }

}
