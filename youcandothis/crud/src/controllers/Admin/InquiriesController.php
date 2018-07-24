<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inquiry;
use Validator;
use Former;
use Mail;

class InquiriesController extends Controller
{
  public function index()
  {
    $inquiries = Inquiry::orderBy('created_at')->get();
    return view('admin.inquiries.index',compact('inquiries'));
  }

  public function show($id)
  {
    $inquiry = Inquiry::find($id);
    return view('admin.inquiries.show',compact('inquiry'));
  }

  public function destroy($id)
  {
    try
    {
      $inquiry = Inquiry::find($id);
      $inquiry->delete();
      return redirect()->route('inquiry.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('inquiry.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  
}
