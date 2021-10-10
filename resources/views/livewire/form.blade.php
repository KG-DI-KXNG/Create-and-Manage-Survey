<form wire:submit.prevent="submit">
    @csrf
    {{-- <input hidden name="surveyId" value="{{ $survey->id }}"> --}}
    <div class="card mb-4">
        <div class="card-header bg-white p-4">
            <h2 class="mb-0">
                <label for="">Survey Name: {{$surveyName}}</label> 
            </h2>
        </div>
     
       
        @for ($i=0;$i<$sectionNo;$i++)
        <div class="col-span-6 sm:col-span-6 mt-2">
        <div class="col-span-6 sm:col-span-6 mt-2">
            Question:{{ $i+1 }}
            <fieldset>
              <legend class="text-base font-medium text-gray-700"><input wire:model="question.{{$i}}" class="w-72" placeholder="What would you like to see improved?"></legend>
              <p class="text-sm text-gray-500">Check all that apply in 
                <select name="" id="" wire:model="type.{{$i}}" >
                  <option value="sa">Short Answer</option>
                  <option value="tf">True Or False</option>
                  <option value="mc">Multiple Choices</option>
                </select></p>
              
              <div class="mt-4 space-y-4">
                @if ($type[$i] === "mc")

                    <input name="{{$type[$i].$i}}" type="radio">
                    <label for="comments" class="font-medium text-gray-700"><input type="text" value="Full-stack" placeholder="Answer #1" wire:model="options.{{$i}}.1.value"></label>
                    <br>
                    <input name="{{$type[$i].$i}}" type="radio">
                    <label for="comments" class="font-medium text-gray-700"><input type="text" value="Front-End" placeholder="Answer #2" wire:model="options.{{$i}}.2.value"></label>
                    <br>
          
                    <input name="{{$type[$i].$i}}" type="radio">
                    <label for="comments" class="font-medium text-gray-700"><input type="text" value="Back-End" placeholder="Answer #3" wire:model="options.{{$i}}.3.value"></label>
                    <br>
                        
                    <input name="{{$type[$i].$i}}" type="radio">
                    <label class="font-medium text-gray-700"><input type="text" value="Lamp-Stack" placeholder="Answer #4" wire:model="options.{{$i}}.4.value"></label>
                    
                    @endif
                @if ($type[$i] === "sa")

                    {{-- <input id="sa" name="short_answer"  type="text"
                      class="border-gray-300 rounded"> --}}
                 
              {{  $type[$i]}}
           
              <input type="text" name="{{$type[$i].$i}}" id="">
                
                @endif
                @if ($type[$i] === "tf")

{{--              
                    <input id="tf" name="tf" type="radio" value="true"
                      class="h-4 w-4 border-gray-300 rounded">
                  
                    <label for="tf" class="font-medium text-gray-700">Front-end</label>
                    <p class="text-gray-500">Things like HTML, CSS, JS or React</p>
                  
               
                    <input id="tf" name="tf" type="radio" value="false"
                      class="h-4 w-4 border-gray-300 rounded">
            
                    <label for="tf" class="font-medium text-gray-700">Back-end</label>
                    <p class="text-gray-500">APIs and Microservices with NodeJS, Express</p> --}}
                  
                {{$type[$i]}}
                <input name="{{$type[$i].$i}}" type="radio">
                <input name="{{$type[$i].$i}}" type="radio">

                @endif
                
              </div>
            </fieldset>
          </div>
    </div>

        @endfor

                <button wire:submit="submit" >Submit</button>
            
    </div>
</form>