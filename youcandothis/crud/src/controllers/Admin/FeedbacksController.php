<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;
use Validator;
use Former;
use Mail;

class FeedbacksController extends Controller
{
  public function index()
  {
    $feedbacks = Feedback::paginate(10);
    return view('admin.feedbacks.index',compact('feedbacks'));
  }

  public function show($id)
  {
    $feedback = Feedback::find($id);
    return view('admin.feedbacks.show',compact('feedback'));
  }

  public function destroy($id)
  {
    try
    {
      $feedback = Feedback::find($id);
      $feedback->delete();
      return redirect()->route('feedback.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('feedback.index')->withError('Something went wrong, Please try after sometime.');
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
