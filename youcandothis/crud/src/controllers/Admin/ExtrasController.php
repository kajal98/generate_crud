<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Extra;
use Validator;
use Former;
use Mail;

class ExtrasController extends Controller
{
  public function index()
  {
    $extras = Extra::paginate(10);
    return view('admin.extras.index',compact('extras'));
  }

  public function create()
  {
    return view('admin.extras.add');
  }

  public function store(Request $request)
  {
    $rules=[
    'title' => 'required',
    'description' => 'required',
    'code' => 'required',
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) { 
      // validation fail then redirect back
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    //if validation success then save data to the database using below code 
   
      // create  new extra
      $extra=New Extra;
      $extra->title=$request->get('title');
      $extra->description=$request->get('description');
      $extra->code=$request->get('code');
      $extra->image=$request->get('image');
      $extra->save();
      return redirect()->route('extra.index')->withSuccess("Insert record successfully.");

    
  }

  public function edit($id)
  { 
    $extra = Extra::find($id);
    //Former::populate($extra);
    return view('admin.extras.edit',compact('extra'));

  }

  public function update(Request $request, $id)
  { 

    $rules=[
      'title' => 'required',
      'description' => 'required',
      'code' => 'required'
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try
    {
      /*if validation success then save data to the database using below code */
      /* create update extra */
      $extra=Extra::find($id);
      $extra->update($request->all());
      return redirect()->route('extra.index')->withSuccess('Record updated successfully');
    }
    catch(\Exception $e)
    {
      dd($e->message);
      return redirect()->route('extra.index')->withError('Something went wrong, Please try after sometime.');
    }       
  }

  public function show($id)
  {
    $extra = Extra::find($id);
    return view('admin.extras.show',compact('extra'));

  }

  public function getDestroy($id)
  {
    try
    {
      $extra = Extra::find($id);
      $extra->delete();
      return redirect()->route('extra.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('extra.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  
}
