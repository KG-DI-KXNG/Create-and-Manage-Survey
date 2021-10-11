<form class="col-span-3 mx-60" wire:submit.prevent="submit">
    @csrf
    {{-- <input hidden name="surveyId" value="{{ $survey->id }}"> --}}
    <div class="px-10 bg-gray-100 mb-4">
      <div class="mt-2 mb-4">
          <h1 class="flex-justify">
              <p class="text-md sm:text-md text-center text-black" for="">Survey Name: <p class="text-xl md:text-xl text-black text-center font-bold text-green-400">{{$surveyName}}</p></p> 
          </h1>
      </div>
     
       
        @for ($i=0;$i<$sectionNo;$i++)
        <div class="col-span-6 md:col-span-6 mt-2 mb-8 bg-white rounded-md py-8 px-4 shadow-md text-md">
            <h2 class="text-green-500 text-xl mb-4 py-2">Question:{{ $i+1 }}
            <fieldset class="w-full">
              <legend class="text-base text-lg md:text-md text-gray-700 w-full mb-2"><input wire:model="question.{{$i}}" class="w-full mt-2 hover:bg-blue-100" placeholder="What would you like to see improved?"></legend>
              <p class="text-lg md:text-md text-gray-500 w-full">Select the type of question: 
                <select name="" id="" wire:model="type.{{$i}}" required >
                  <option selected>--Select Option --</option>
                  <option value="sa">Short Answer</option>
                  <option value="tf">True Or False</option>
                  <option value="mc">Multiple Choices</option>
                </select></p>
              
                @if ($type[$i] === "mc")

                    <input name="{{$type[$i].$i}}" type="radio">
                    <label for="comments" class="font-medium text-gray-700 sm:font-medium"><input class="" type="text" value="Full-stack" placeholder="Answer #1" wire:model="options.{{$i}}.1.value"></label>
                    <br>
                    <input name="{{$type[$i].$i}}" type="radio">
                    <label for="comments" class="font-medium text-gray-700"><input class="" type="text" value="Front-End" placeholder="Answer #2" wire:model="options.{{$i}}.2.value"></label>
                    <br>
          
                    <input name="{{$type[$i].$i}}" type="radio">
                    <label for="comments" class="font-medium text-gray-700"><input class="" type="text" value="Back-End" placeholder="Answer #3" wire:model="options.{{$i}}.3.value"></label>
                    <br>
                        
                    <input name="{{$type[$i].$i}}" type="radio">
                    <label class="font-medium text-gray-700"><input class="" type="text" value="Lamp-Stack" placeholder="Answer #4" wire:model="options.{{$i}}.4.value"></label>
                    
                    @endif
              
                @if ($type[$i] === "sa")
                
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

        <div class="flex justify-between">
          <button class="bg-green-500 hover:bg-green-700 text-white p-2 rounded-md mt-4 w-1/4" wire:submit="submit">Create</button>
          <button class="text-black hover:text-red-500 pr-4" wire:submit="#">Cancel</button>
          
        </div>
      
    </div>
</form>