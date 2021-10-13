<x-app-layout>
  <x-slot name="header">
    @include('layouts.navigation')
</x-slot>
{{-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d9d2bd3ef6.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Selected Template</title>
    <style media="screen">
      input{
        margin-bottom:20px;
      }
    </style>
  </head>
  <body> --}}
    @php
    $count=0
    @endphp
    <form action="{{Route('storeUserTemplate')}}" method="post" class="flex-justify-center bg-white my-4 col-span-1">
      @csrf
      <div class="p-8 space-y-6">
        <div class="col">
          <input type="text" name="survey" class="text-center form-control"  value="Survey Name">
      </div>
      @foreach($template['results'] as $temp)
          @if($type=='multiple')
            <div class="col-span-1">
                <input type="text" name="{{'question[]'}}" value="{{preg_replace("/&|;|quot|#039|;s|&#039;s/"," " ,$temp['question'])}}" class="form-control text-lg md:text-md w-full">
                <br>
                <input type="radio" name="{{'answer'}}" value="{{$temp['correct_answer']}}">
                <label class="text-lg md:text-md w-full" for="">{{$temp['correct_answer']}}</label><br>
                @foreach($temp['incorrect_answers'] as $answer)
                  <input type="radio" name="{{'answer[]'}}" value="{{$answer}}">
                  <label class="text-lg md:text-md w-full" for="">{{$answer}}</label><br>
                @endforeach
            </div>
          @else
            <div class="col justify-start">
                <input type="text" name="{{'question[]'}}" value="{{preg_replace("/&|;|quot|#039|;s|&#039;s/"," " ,$temp['question'])}}"class="form-control">
                <br>
                <input type="radio" name="{{'answer[]'}}" value="{{$temp['correct_answer']}}">
                <label class="text-lg md:text-md w-full" for="">{{$temp['correct_answer']}}</label><br>
                <input type="radio" name="{{'answer[]'}}" value="{{$temp['incorrect_answers'][0]}}">
                <label class="text-lg md:text-md w-full" for="">{{$temp['incorrect_answers'][0]}}</label><br>
            </div>
          @endif
            @php
            $count++;
            @endphp
        @endforeach
      <hr>
      <div class="flex justify-between">
        <button class="custom-btn btn-3 mb-6" type="submit"><span> Submit </span></button>
        <a href="{{route('dashboard')}}" class="text-black text-lg  hover:text-red-500 pr-4" type="button">Cancel</button>
        
      </div>
      </div>

          {{-- <div class="">
            <button type="submit" name="button" class="btn btn-primary my-5">Select Template</button>
        </div> --}}
    </form>
  {{-- </body>
</html> --}}
</x-app-layout>
