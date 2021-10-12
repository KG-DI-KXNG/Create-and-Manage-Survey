<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use MattDaneshvar\Survey\Http\View\Composers as Vieww;
use MattDaneshvar\Survey\Models\Survey as amberSurvey;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Answer;
use MattDaneshvar\Survey\Models\Question;
use MattDaneshvar\Survey\Models\Section;

class surveyController extends Controller
{
    /***
     *  to display survey page
     */
    public function index(){
        return view('Survey.create');
    }

    /***
     * view created survey
     */
    public function view(Request $request){
        $url = URL::signedRoute('survey', ['surveyid' => $request->surveyid]);
        // dd($url);
        
        return \redirect()->route('survey.testing')->with(['url'=>$url]);
    }


      /***
     * delete created survey
     */
    public function delete(Request $request){
        // dd($request->id);
        amberSurvey::destroy($request->id);
        Section::where('survey_id',$request->id)->delete();
        Question::where('survey_id',$request->id)->delete();



        return redirect()->route('survey.testing');
    }


    public function toTesting(){
        $getSurvey = amberSurvey::where('user_id', Auth::id())->with('users','questions','sections')->paginate(10);

        $g = amberSurvey::where('user_id', Auth::id())->get();
        // dd($g);
        $url = [];
        for ($i=0;$i<count($g);$i++){
           $url[$i] = URL::signedRoute('survey', ['surveyid' => $g[0]->id]);
        }
        // dd($url);

        return view('Survey.test',['survey'=>$getSurvey,'url'=>$url]);
    }

    public function publicSurvey(Request $request){
        // dd($request);
        $survey = amberSurvey::find($request->surveyId);
        return view('Survey.view',['survey'=>$survey]);
    }



    /***
     * 
     * just for testing function to get surveyID
     */
    public function testdemo(Request $request){
        // dd($request);
        $survey = amberSurvey::find($request->surveyId);
        return view('Survey.view',['survey'=>$survey]);
    }

    /***
     * @param Request $request
     */
    public function create(){
        $survey = amberSurvey::create(
            [
                'name' => 'Test Survey 2',
                'settings' => ['limit-per-participant' => 10],
                'user_id'=>Auth::id(),
            ]
        );

        $one = $survey->sections()->create(['name' => 'add anything here again']);

        $one->questions()->create([
            'content' => 'How many cats do you have?',
            'type' => 'number',
            'rules' => ['numeric', 'min:0']
        ]);

        $two = $survey->sections()->create(['name' => 'And here as well']);

        $two->questions()->create([
            'content' => 'What\'s the name of your first cat?',
        ]);

        $two->questions()->create([
            'content' => 'Would you want a new cat?',
            'type' => 'radio',
            'options' => ['Yes', 'Oui']
        ]);

        return view('Survey.create');
    }

    public function storeSurveyAnswer(Request $request)
    {

        if ($request->has('cancel')) {
            return redirect()->route('survey.testing');
        }

        dd($request);
        $survey = amberSurvey::where('id','=',$request->surveyId)->first();
        $count = count($request->request->all());
        $answers = [];
        $count1 = 0;
        foreach ($request->request->all() as $key => $value) {
            if ($count1 != 0) {
                if ($count1 != 1) {
                    $answers[$key] = $value;
                }
            }
            ++$count1;
        }
        // dd($answers);
        $user = Auth::user();

        (new Entry)->for($survey)->by($user)->fromArray($answers)->push();
    }
}
