<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;
use Validator;
use Former;
use Mail;

class FaqsController extends Controller
{
  public function index()
  {
    $faqs = Faq::paginate(10);
    return view('admin.faqs.index',compact('faqs'));
  }

  public function create()
  {
    return view('admin.faqs.add');
  }

  public function store(Request $request)
  {
    $rules=[
    'question' => 'required',
    'answer' => 'required',
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
      // create  new faq
      $faq=New Faq;
      $faq->question=$request->get('question');
      $faq->answer=$request->get('answer');
      $faq->status=$request->get('status');
      $faq->save();
      return redirect()->route('faq.index')->withSuccess("Insert record successfully.");

    }
    catch(\Exception $e)
    {
      return redirect()->route('faq.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function edit($id)
  { 
    $faq = Faq::find($id);
    //Former::populate($faq);
    return view('admin.faqs.edit',compact('faq'));

  }

  public function update(Request $request, $id)
  { 

    $rules=[
      'question' => 'required',
      'answer' => 'required',
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try
    {
      /*if validation success then save data to the database using below code */
      /* create update faq */
      $faq=Faq::find($id);
      $faq->update($request->all());
      return redirect()->route('faq.index')->withSuccess('Record updated successfully');
    }
    catch(\Exception $e)
    {
      dd($e->message);
      return redirect()->route('faq.index')->withError('Something went wrong, Please try after sometime.');
    }       
  }

  public function show($id)
  {
    $faq = Faq::find($id);
    return view('admin.faqs.show',compact('faq'));

  }

  public function destroy($id)
  {
    try
    {
      $faq = Faq::find($id);
      $faq->delete();
      return redirect()->route('faq.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('faq.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  
}
