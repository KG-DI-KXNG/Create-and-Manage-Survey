<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Request;
use Livewire\Component;
use MattDaneshvar\Survey\Models\Survey as amberSurvey;


class Form extends Component
{
    public $surveyName;
    public $sectionNo;
    public $type =[];
    public $question = [];
    public $answers = [];
    public $options = [];
    protected $val;
    

    // protected $rules = $this->validateType();


    public function validateType(){

        for($i=0;$i<$this->sectionNo;$i++){
            $val =  ["type[".$i."]" => 'required'];
         }
        return $val;
    }
    

    // public function onChange($objName)
    // {
    //     for($i=0;$i<$this->sectionNo;$i++){
    //         $this->validateOnly($objName, [
    //             "type[".$i."]" => 'required',
    //         ]);
    //     }
    // }


    public function mount($No, $Name)
    {
        $this->sectionNo = $No;
        $this->surveyName = $Name;
        for($i=0;$i<$No;$i++){
            $this->type[$i] = null;
        }
        // dd($this->type[1]);
        
    }
    
    public function addQuestion(array $n){
         array_push($this->question, $n);
    }

    // public function setType($value){
    //     array_push($this->type, $value);
    //     dd($this->type);
    // }

    public function updatedType($value, $key){
        $this->type[$key] = $value;
        // dd($this->type);
    }

    public function submit(Request $request){
        
       
        // dd($this->options);
        // $this->validate();
        // $this->onChange($this->type);
        
        $survey = amberSurvey::create(
            [
                'name' => $this->surveyName,
                'settings' => ['accept-guest-entries' => true],
                'user_id'=>Auth()->id(),
            ]
        );

        for($i=0;$i<$this->sectionNo;$i++){
            if($this->type[$i] == "mc"){
                $survey->questions()->create([
                    'content' => $this->question[$i],
                    'type' => 'radio',
                    'options' => [$this->options[$i][1]['value'], $this->options[$i][2]['value'],$this->options[$i][3]['value'],$this->options[$i][4]['value']]
                ]);

            }elseif($this->type[$i] == "tf"){
                $survey->questions()->create([
                    'content' => $this->question[$i],
                    'type' => 'radio',
                    'options' => ['True', 'False']
                ]);
            }elseif($this->type[$i] == "yn"){
                $survey->questions()->create([
                    'content' => $this->question[$i],
                    'type' => 'radio',
                    'options' => ['Yes', 'No']
                ]);
            }elseif($this->type[$i] == "sa"){
                $survey->questions()->create([
                    'content' => $this->question[$i],  
                ]);
            }
   
        }
        return redirect()->route('dashboard');
        
        }

    public function render()
    {
        // dd($this->type);
        return view('livewire.form');
    }


       



}
