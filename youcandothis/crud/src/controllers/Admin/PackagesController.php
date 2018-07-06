<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use App\UserPackage;
use Validator;
use Former;
use Mail;
use Carbon\Carbon;

class PackagesController extends Controller
{
  public function index()
  {
    $packages = Package::paginate(10);
    return view('admin.packages.index',compact('packages'));
  }

  public function create()
  {
    return view('admin.packages.add');
  }

  public function store(Request $request)
  {
    $rules=[
    'type' => 'required',
    'sub_type' => 'required',
    'no_of_question' => 'required',
    'days' => 'required',
    'price_in_india' => 'required',
    'price_out_india' => 'required',
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) { 
      // validation fail then redirect back
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    //if validation success then save data to the database using below code 
    try
    {
      // create  new package
      $package=New Package;
      $package->type=$request->get('type');
      $package->sub_type=$request->get('sub_type');
      $package->no_of_question=$request->get('no_of_question');
      $package->days=$request->get('days');
      $package->price_in_india=$request->get('price_in_india');
      $package->price_out_india=$request->get('price_out_india');
      $package->attachment=$request->get('attachment');
      $package->status=$request->get('status');
      $package->save();
      return redirect()->route('package.index')->withSuccess("Insert record successfully.");

    }
    catch(\Exception $e)
    {
      return redirect()->route('package.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function edit($id)
  { 
    $package = Package::find($id);
    //Former::populate($package);
    return view('admin.packages.edit',compact('package'));

  }

  public function update(Request $request, $id)
  { 

    $rules=[
      'type' => 'required',
      'sub_type' => 'required',
      'no_of_question' => 'required',
      'days' => 'required',
      'price_in_india' => 'required',
      'price_out_india' => 'required',
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try
    {
      /*if validation success then save data to the database using below code */
      /* create update package */
      $package=Package::find($id);
      $package->update($request->all());
      return redirect()->route('package.index')->withSuccess('Record updated successfully');
    }
    catch(\Exception $e)
    {
      //dd($e->message);
      return redirect()->route('package.index')->withError('Something went wrong, Please try after sometime.');
    }       
  }

  public function show($id)
  {
    $package = Package::find($id);
    return view('admin.packages.show',compact('package'));

  }

  public function destroy($id)
  {
    try
    {
      $package = Package::find($id);
      $package->delete();
      return redirect()->route('package.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('package.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function SwitchStatus($id)
  {
    try
    {
      $user_package = UserPackage::find($id);
      $user_package->is_paid = $user_package->is_paid == "1" ? "0" : "1";
      $user_package->created_at = Carbon::now();
      $user_package->end_date = date('Y-m-d h:i:s', time() + 86400 * $user_package->package->days);
      $user_package->save();
      $status = $user_package->is_paid ? 'accepted' : 'rejected';
      Mail::send('emails.switch_payment_status', ['data' => $user_package, 'name' => $user_package->user->name, 'status' => $status], function($message) use($user_package, $status) {
        $message->to($user_package->user->email);
        $message->subject('Your payment has been ' . $status . 'ed succesfully.');
      });
      send_message('Hello! Your payment is confirmed. You can now ask your medical query.', $user_package->user->phone);
      return redirect()->route('payments')->withSuccess('Status updated successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('payments')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function paymentDelete($id)
  {
    try
    {
      $user_package = UserPackage::find($id);
      $user_package->delete();
      return redirect()->back()->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->back()->withError('Something went wrong, Please try after sometime.');
    }
  }
  
}
