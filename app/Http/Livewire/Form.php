<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Request;
use Livewire\Component;
use MattDaneshvar\Survey\Models\Survey as amberSurvey;


class Form extends Component
{
    public $surveyName;
    public $sectionNo;
    public $type;
    public $question = [];
    

    public function mount($No, $Name)
    {
        $this->sectionNo = $No;
        $this->surveyName = $Name;
    }

    // protected $rules[
    //     ''
    // ]

    public function addQuestion(array $n){
         array_push($this->question, $n);
    }

    public function submit(Request $request){
        
        // dd($this->question);
        // $this->validate();
        
        $survey = amberSurvey::create(
            [
                'name' => $this->surveyName,
                'settings' => ['limit-per-participant' => 10]
            ]
        );

        for($i=0;$i<$this->sectionNo;$i++){
    
            $survey->questions()->create([
                'content' => $this->question[$i],
                'type' => 'number',
                'rules' => ['numeric', 'min:0']
            ]);
   
        }
        return redirect()->route('dashboard');
        
        }

    public function render()
    {
        return view('livewire.form');
    }


       



}
