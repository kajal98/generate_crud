<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QuestionCategory;
use Validator;
use Former;
use Mail;
use Hash;
class QuestionCategoryController extends Controller
{
  public function index()
  {
    $question_categories = QuestionCategory::paginate(10);
    return view('admin.question_categories.index',compact('question_categories'));
  }
  public function create()
  {
    return view('admin.question_categories.add');
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
    
      $question_category=New QuestionCategory;
      $question_category->name=$request->get('name');
      $question_category->save();
      return redirect()->route('question_categories.index')->withSuccess("Insert record successfully.");
    
  }
  public function edit($id)
  { 
    $question_category = QuestionCategory::find($id);
    return view('admin.question_categories.edit',compact('question_category'));
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
      $question_category=QuestionCategory::find($id);
      $question_category->update($request->all());
      return redirect()->route('question_categories.index')->withSuccess('Record updated successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('question_categories.index')->withError('Something went wrong, Please try after sometime.');
    }       
  }
  public function show($id)
  {
    $question_category = QuestionCategory::find($id);
    return view('admin.question_categories.show',compact('question_category'));
  }
  public function destroy($id)
  {
    try
    {
      $question_category = QuestionCategory::find($id);
      $question_category->delete();
      return redirect()->route('question_categories.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('question_categories.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  public function SwitchStatus($id)
  {
    try
    {
      $question_category = QuestionCategory::find($id);
      $question_category->active = $question_category->active == "1" ? "0" : "1";
      $question_category->save();
      return redirect()->route('question_categories.index')->withSuccess('Status updated successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('question_categories.index')->withError('Something went wrong, Please try after sometime.');
    }
  } 
}
