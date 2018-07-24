<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BlogCategory;
use Validator;
use Former;
use Mail;
use Hash;
class BlogCategoryController extends Controller
{
  public function index()
  {
    $blog_categories = BlogCategory::orderBy('name')->get();
    return view('admin.blog_categories.index',compact('blog_categories'));
  }
  public function create()
  {
    return view('admin.blog_categories.add');
  }
  public function store(Request $request)
  {
    $rules=[
    'name' => 'required',
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try
    {
      $blog_category=New BlogCategory;
      $blog_category->name=$request->get('name');
      $blog_category->save();
      return redirect()->route('blog_categories.index')->withSuccess("Insert record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('blog_categories.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  public function edit($id)
  { 
    $blog_category = BlogCategory::find($id);
    return view('admin.blog_categories.edit',compact('blog_category'));
  }
  public function update(Request $request, $id)
  { 
    $rules=[
    'name' => 'required',
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try
    {
      $blog_category=BlogCategory::find($id);
      $blog_category->update($request->all());
      return redirect()->route('blog_categories.index')->withSuccess('Record updated successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('blog_categories.index')->withError('Something went wrong, Please try after sometime.');
    }       
  }
  public function show($id)
  {
    $blog_category = BlogCategory::find($id);
    return view('admin.blog_categories.show',compact('blog_category'));
  }
  public function destroy($id)
  {
    try
    {
      $blog_category = BlogCategory::find($id);
      $blog_category->delete();
      return redirect()->route('blog_categories.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('blog_categories.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  public function SwitchStatus($id)
  {
    try
    {
      $blog_category = BlogCategory::find($id);
      $blog_category->active = $blog_category->active == "1" ? "0" : "1";
      $blog_category->save();
      return redirect()->route('blog_categories.index')->withSuccess('Status updated successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('blog_categories.index')->withError('Something went wrong, Please try after sometime.');
    }
  } 
}
