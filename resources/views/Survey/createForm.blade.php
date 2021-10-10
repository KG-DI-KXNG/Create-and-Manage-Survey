<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation')
    </x-slot>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <div class="card-body grid justify-item-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    @livewire('form',['No'=>$survey['section'],'Name'=>$survey['formTitle']])
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>