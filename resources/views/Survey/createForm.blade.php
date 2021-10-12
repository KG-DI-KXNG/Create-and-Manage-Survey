<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation')
    </x-slot>
{{-- <div class="container card-body bg-pink-500 p-10"> --}}
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
          @endif
          <br>
          @livewire('form',['No'=>$survey['section'],'Name'=>$survey['formTitle']])
{{-- </div> --}}

</x-app-layout>