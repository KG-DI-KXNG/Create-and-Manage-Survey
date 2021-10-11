<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    return view('Templates.SelectedTemplates',['template'=>$template,'type'=>$request->type]);
  }
  function storeUserTemplate(Request $request){
    dd($request);
  }
}
