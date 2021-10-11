<form class="col-span-3 mx-72" wire:submit.prevent="submit">
    @csrf
    {{-- <input hidden name="surveyId" value="{{ $survey->id }}"> --}}
    <div class="px-10 bg-gray-100">
      <div class="mt-2 mb-4">
          <h1 class="text-xl md:text-xl flex-justify">
              <p class="text-center font-bold text-black" for="">Survey Name: <p class="text-black text-center font-bold text-green-400">{{$surveyName}}</p></p> 
          </h1>
      </div>
     
       
        @for ($i=0;$i<$sectionNo;$i++)
        <div class="col-span-6 md:col-span-6 mt-4 bg-white rounded-md p-8 shadow-md">
            Question:{{ $i+1 }}
            <fieldset>
              <legend class="text-base font-medium sm:font-medium text-gray-700"><input wire:model="question.{{$i}}" class="w-80 sm:w-80" placeholder="What would you like to see improved?"></legend>
              <p class="text-sm text-gray-500">Select the type of question: 
                <select name="" id="" wire:model="type.{{$i}}" required >
                  <option selected>--Select Option --</option>
                  <option value="sa">Short Answer</option>
                  <option value="tf">True Or False</option>
                  <option value="mc">Multiple Choices</option>
                </select></p>
              
                @if ($type[$i] === "mc")

                    <input name="{{$type[$i].$i}}" type="radio">
                    <label for="comments" class="font-medium text-gray-700 sm:font-medium"><input type="text" value="Full-stack" placeholder="Answer #1" wire:model="options.{{$i}}.1.value"></label>
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
                  <input name="{{$type[$i].$i}}" id="{{$type[$i].$i}}" value="true" type="radio" wire:model="options.{{$i}}.1.value">
                      <label for="{{$type[$i].$i}}" class="font-medium text-gray-700">True</label>
                      <br>
                      <input name="{{$type[$i].$i}}" id="{{$type[$i].$i}}" value="false" type="radio" wire:model="options.{{$i}}.1.value">
                      <label for="{{$type[$i].$i}}" class="font-medium text-gray-700">False</label>
                      <br>
                @endif
              
            </fieldset>
    </div>

        @endfor

                <button class="bg-green-500 p-2 rounded-md mt-4" wire:submit="submit">Submit</button>
            
    </div>
</form>