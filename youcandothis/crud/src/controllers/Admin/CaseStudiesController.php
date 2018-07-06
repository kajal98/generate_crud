<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CaseStudy;
use App\CaseStudyPhoto;
use Validator;
use Former;

class CaseStudiesController extends Controller
{
    public function index()
  {
    $case_studies = CaseStudy::paginate(10);
    return view('admin.case_studies.index',compact('case_studies'));
  }
  public function create()
  {
    return view('admin.case_studies.add');
  }
  public function store(Request $request)
  {
    $rules=[
    'title' => 'required',
    'content' => 'required',
    'why_case_study' => 'required',
    'images' => 'required'
    ];
    $messages=[
    'title.required' => 'The title field is required',
    'content.required' => 'The content field is required',
    'why_case_study.required' => 'The why case study field is required',
    'images.required' => 'Please upload images'
    ];
    $validator = Validator::make($request->all(),$rules,$messages);
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    
        $count = $request->get('images');
        if(count($count)>0)
        {
          if(count($count)>4){
            return redirect()->back()->with('error','4 maximum photos you can upload.');
          }

          $case_study=New CaseStudy;
          $case_study->title=$request->get('title');
          $case_study->content= $request->get('content');
          $case_study->why_case_study=$request->get('why_case_study');
          $case_study->save();

          foreach ($count as $key => $value) {
            $photos = new CaseStudyPhoto;
            $photos->image=$value;
            $photos->case_study_id=$case_study->id;
            $photos->save();
          }

        }

      return redirect()->route('case_studies.index')->withSuccess("Insert record successfully.");

  }
  public function edit($id)
  { 
    $case_study = CaseStudy::find($id);
    return view('admin.case_studies.edit',compact('case_study'));
  }
  public function update(Request $request, $id)
  { 
    $rules=[
    'title' => 'required',
    'content' => 'required',
    'why_case_study' => 'required'
    ];
    $messages=[
    'title.required' => 'The title field is required',
    'content.required' => 'The content field is required',
    'why_case_study.required' => 'The why case study field is required'
    ];
    $validator = Validator::make($request->all(),$rules,$messages);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $case_study=CaseStudy::find($id);

    if($request->get('images'))          
        {
          $uploaded_photos = count($case_study->photos);
          $get_images = count($request->get('images'));
          $count = $uploaded_photos + $get_images;
          if ($count>4) {
            return redirect()->back()->with('error','You have already uploaded 4 pics');
          }
          else{
              foreach ($request->get('images') as $key => $value) {
              $photos = new CaseStudyPhoto;
              $photos->image=$value;
              $photos->case_study_id=$case_study->id;
              $photos->save();
            }
          }
        }
    
      
      $case_study->update($request->all());
      return redirect()->route('case_studies.index')->withSuccess('Record updated successfully');
        
  }
  public function show($id)
  {
    $case_study = CaseStudy::find($id);
    return view('admin.case_studies.show',compact('case_study'));
  }
  public function destroy($id)
  {
    try
    {
      $case_study = CaseStudy::find($id);
      $case_study->delete();
      return redirect()->route('case_studies.index')->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('case_studies.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function removePhoto($id)
  {
    try
    {
      $photo = CaseStudyPhoto::find($id);
      $photo->delete();
      return redirect()->back()->withSuccess('Photo removed successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->back()->withError('Something went wrong, Please try after sometime.');
    }
  }
}
