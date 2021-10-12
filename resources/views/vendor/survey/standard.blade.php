<form class="flex justify-center" action="{{route('survey.store')}}" method="post">
    @csrf
    <div class="bg-white p-4 rounded-md shadow-lgw-72 md:w-96 lg:w-1/2 mb-4" id="body">
    <input hidden name="surveyId" value="{{ $survey->id }}">
    <div class="card">
        <div class="card-header p-4 text-xl md:text-xl text-center font-bold text-green-500">
            <h2 class="mb-0">{{ $survey->name }}</h2>

            @if(!$eligible)
                We only accept
                <strong>{{ $survey->limitPerParticipant() }} {{ \Str::plural('entry', $survey->limitPerParticipant()) }}</strong>
                per participant.
            @endif

            @if($lastEntry)
                You last submitted your answers <strong>{{ $lastEntry->created_at->diffForHumans() }}</strong>.
            @endif

        </div>
        @if(!$survey->acceptsGuestEntries() && auth()->guest())
            <div class="p-5">
                Please login to join this survey.
            </div>
        @else
            @foreach($survey->sections as $section)
                @include('survey::sections.single')
            @endforeach

            @foreach($survey->questions()->withoutSection()->get() as $question)
                @include('survey::questions.single')
            @endforeach

            <div class="flex justify-between mt-4">
              @if($eligible)
                <button class="custom-btn btn-3 mb-6" wire:submit="submit"><span> Submit </span></button>
              @endif
                <button class="text-black text-lg hover:text-red-500 pr-4 mb-6 align-top" type="button">Clear Form</button>
            </div>
        @endif
    </div>
  </div>
</form>