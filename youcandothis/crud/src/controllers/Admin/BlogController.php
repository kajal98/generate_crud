<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\BlogCategory;
use Validator;
use Former;
use Mail;
use Hash;
class BlogController extends Controller
{
  public function index()
  {
    $blogs = Blog::orderBy('title')->get();
    return view('admin.blogs.index',compact('blogs'));
  }
  public function create()
  {
    return view('admin.blogs.add');
  }
  public function store(Request $request)
  {
    $rules=[
    'title' => 'required',
    'description' => 'required',
    'author' => 'required',
    'blog_category_id' => 'required'
    ];
    $messages=[
    'title.required' => 'The title field is required',
    'description.required' => 'The description field is required',
    'author.required' => 'The author field is required',
    'blog_category_id.required' => 'The blog category field is required'
    ];
    $validator = Validator::make($request->all(),$rules,$messages);
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try
    {
      $blog=New Blog;
      $blog->title=$request->get('title');
      $blog->description= $request->get('description');
      $blog->author=$request->get('author');
      $blog->blog_category_id= $request->get('blog_category_id');
      $blog->image = $request->get('image');
      $blog->publish=$request->get('publish');
      $blog->is_archive=$request->get('is_archive');
      $blog->meta_title=$request->get('meta_title');
      $blog->meta_keyword=$request->get('meta_keyword');
      $blog->meta_description=$request->get('meta_description');
      $blog->save();
      return redirect()->route('blogs.index')->withSuccess("Insert record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('blogs.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  public function edit($id)
  { 
    $blog = Blog::find($id);
    return view('admin.blogs.edit',compact('blog'));
  }
  public function update(Request $request, $id)
  { 
    $rules=[
    'title' => 'required',
    'description' => 'required',
    'author' => 'required',
    'blog_category_id' => 'required'
    ];
    $messages=[
    'title.required' => 'The title field is required',
    'description.required' => 'The description field is required',
    'author.required' => 'The author field is required',
    'blog_category_id.required' => 'The blog category field is required'
    ];
    $validator = Validator::make($request->all(),$rules,$messages);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    
      $blog=Blog::find($id);
      $blog->update($request->all());
      return redirect()->route('blogs.index')->withSuccess('Record updated successfully');
        
  }
  public function show($id)
  {
    $blog = Blog::find($id);
    return view('admin.blogs.show',compact('blog'));
  }
  public function destroy($id)
  {
    try
    {
      $blog = Blog::find($id);
      $blog->delete();
      return redirect()->route('blogs.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('blogs.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  public function SwitchStatus($id)
  {
    try
    {
      $blog = Blog::find($id);
      $blog->publish = $blog->publish == "1" ? "0" : "1";
      $blog->save();
      return redirect()->route('blogs.index')->withSuccess('Status updated successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('blogs.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
}
