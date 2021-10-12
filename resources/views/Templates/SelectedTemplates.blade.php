<!DOCTYPE html>
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
  <body>
    @php
    $count=0
    @endphp
    <form action="{{Route('storeUserTemplate')}}" method="post">
      @csrf
        <div class="col">
          <div class="row">
            <input type="text" name="survey" class="text-center form-control"  value="Survey Name">
          </div>
        </div>
        @foreach($template['results'] as $temp)
            @if($type=='multiple')
              <div class="col">
                <div class="row">
                  <input type="text" name="{{'question[]'}}" value="{{preg_replace("/&|;|quot|#039|;s|&#039;s/"," " ,$temp['question'])}}" class="form-control">
                  <br>
                  <label for="">{{$temp['correct_answer']}}</label>
                  <input type="radio" name="{{'answer'}}" value="{{$temp['correct_answer']}}">
                  @foreach($temp['incorrect_answers'] as $answer)
                    <label for="">{{$answer}}</label>
                      <input type="radio" name="{{'answer[]'}}" value="{{$answer}}">
                      @endforeach
                </div>
              </div>
            @else
              <div class="col">
                <div class="row">
                  <input type="text" name="{{'question[]'}}" value="{{preg_replace("/&|;|quot|#039|;s|&#039;s/"," " ,$temp['question'])}}"class="form-control">
                  <br>
                  <label for="">{{$temp['correct_answer']}}</label>
                  <input type="radio" name="{{'answer[]'}}" value="{{$temp['correct_answer']}}">
                  <label for="">{{$temp['incorrect_answers'][0]}}</label>
                  <input type="radio" name="{{'answer[]'}}" value="{{$temp['incorrect_answers'][0]}}">
                </div>
              </div>
            @endif
              @php
              $count++;
              @endphp
          @endforeach
        <hr>
        <div class="col">
          <div class="row">
            <button type="submit" name="button" class="btn btn-primary my-5">Select Template</button>
          </div>
        </div>
    </form>
  </body>
</html>
