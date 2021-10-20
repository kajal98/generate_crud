<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Validator;
use Former;
use Mail;

class TestimonialsController extends Controller
{
  public function index()
  {
    $testimonials = Testimonial::orderBy('created_at')->get();
    return view('admin.testimonials.index',compact('testimonials'));
  }

  public function create()
  {
    return view('admin.testimonials.add');
  }

  public function store(Request $request)
  {
    $rules=[
    'name' => 'required',
    'designation' => 'required',
    'text' => 'required',
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
      // create  new testimonial
      $testimonial=New Testimonial;
      $testimonial->name=$request->get('name');
      $testimonial->designation=$request->get('designation');
      $testimonial->text=$request->get('text');
      $testimonial->status=$request->get('status');
      $testimonial->save();
      return redirect()->route('testimonial.index')->withSuccess("Insert record successfully.");

    }
    catch(\Exception $e)
    {
      return redirect()->route('testimonial.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function edit($id)
  { 
    $testimonial = Testimonial::find($id);
    //Former::populate($testimonial);
    return view('admin.testimonials.edit',compact('testimonial'));

  }

  public function update(Request $request, $id)
  { 

    $rules=[
      'name' => 'required',
      'designation' => 'required',
      'text' => 'required'
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try
    {
      /*if validation success then save data to the database using below code */
      /* create update testimonial */
      $testimonial=Testimonial::find($id);
      $testimonial->update($request->all());
      return redirect()->route('testimonial.index')->withSuccess('Record updated successfully');
    }
    catch(\Exception $e)
    {
      dd($e->message);
      return redirect()->route('testimonial.index')->withError('Something went wrong, Please try after sometime.');
    }       
  }

  public function show($id)
  {
    $testimonial = Testimonial::find($id);
    return view('admin.testimonials.show',compact('testimonial'));

  }

  public function destroy($id)
  {
    try
    {
      $testimonial = Testimonial::find($id);
      $testimonial->delete();
      return redirect()->route('testimonial.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('testimonial.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  
}
