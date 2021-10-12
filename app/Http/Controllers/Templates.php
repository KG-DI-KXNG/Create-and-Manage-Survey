<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Templates extends Controller
{
  function TempOptions(){
    $client=new \GuzzleHttp\Client();
    $category=$client->get('https://opentdb.com/api_category.php');
    $categories=json_decode($category->getBody(), true);
    return view('Templates.Templates',['TemplateCategories'=>$categories]);
  }
  function selectTemplates(Request $request){
      $request->validate([
      'category'=>'required',
      'type'=>'required',
    ]);
    $client=new \GuzzleHttp\Client();
    $link='https://opentdb.com/api.php?amount=5&';
    $link.='category='.$request->category;
    $link.='&difficulty=hard&';
    $link.='type='.$request->type;
    $survey=$client->get($link);
    $template=json_decode($survey->getBody(),true);
    session()->put('survey',$template);
    return view('Templates.SelectedTemplates',['template'=>$template,'type'=>$request->type]);
  }
  function storeUserTemplate(Request $request){
    $request->validate([
    'survey'=>'required'
    ]);
    $survey_info=Session('survey');
    $survey=DB::table('surveys')->insertGetId(['name'=>$request->survey]);
    $section=DB::table('sections')->insertGetId(['survey_id'=>$survey,'name'=>'survey'.$survey]);
    foreach($survey_info['results'] as $surveyData){
      $addOption=sizeof($surveyData['incorrect_answers']);
      $surveyData['incorrect_answers'][$addOption]=$surveyData['correct_answer'];
      DB::table('questions')->Insert([
        'survey_id'=>$survey,
        'section_id'=>$section,
        'content'=>$surveyData['question'],
        'type'=>$surveyData['type'],
        'options'=>json_encode($surveyData['incorrect_answers'])
      ]);
    }
    return redirect()->route('dashboard');
  }
}
