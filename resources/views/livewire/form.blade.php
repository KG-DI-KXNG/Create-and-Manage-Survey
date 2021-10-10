<form wire:submit.prevent="submit">
    @csrf
    {{-- <input hidden name="surveyId" value="{{ $survey->id }}"> --}}
    <div class="card items-center justify-content-center bg-white shadow-md p-4">
      <div class="card-header items-center justify-content-center bg-white p-4 ">
          <h1 class="mb-0">
              <label class="text-black " for="">Survey Name: {{$surveyName}}</label> 
          </h1>
      </div>
     
       
        @for ($i=0;$i<$sectionNo;$i++)
        <div class="col-span-6 sm:col-span-6 mt-2">
        <div class="col-span-6 sm:col-span-6 mt-2">
            Question:{{ $i+1 }}
            <fieldset>
              <legend class="text-base font-medium text-gray-700"><input name="c{{$i}}" wire:model="question.{{$i}}" class="w-72" placeholder="What would you like to see improved?"></legend>
              <p class="text-sm text-gray-500">Check all that apply</p>
              <div class="mt-4 space-y-4">

                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="comments" name="comments" type="checkbox" value="FE"
                      class="h-4 w-4 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="comments" class="font-medium text-gray-700">Front-end</label>
                    <p class="text-gray-500">Things like HTML, CSS, JS or React</p>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="comments" name="comments" type="checkbox" value="BE"
                      class="h-4 w-4 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="comments" class="font-medium text-gray-700">Back-end</label>
                    <p class="text-gray-500">APIs and Microservices with NodeJS, Express</p>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="comments" name="comments" type="checkbox" value="FS"
                      class="h-4 w-4 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="comments" class="font-medium text-gray-700">Full-stack</label>
                    <p class="text-gray-500">The complete Stack for an End-to-End understanding</p>
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
    </div>

        @endfor

                <button wire:submit="submit" >Submit</button>
            
    </div>
</form>