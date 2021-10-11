<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d9d2bd3ef6.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select A template</title>
  </head>
  <body style="background-image: url('survey.jpg');background-repeat:no-repeat;background-size: cover;">
    <div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          <div class="card p-3 px-5 py-5 mt-3 align-items-center">
            <form class="form" action="{{Route('selectTemplates')}}" method="post">
              @csrf
              <label for="Category" class="mb-2">Select A Category</label>
              <select name="category" id="category" class="form-control">
                <option value=""></option>
                @foreach($TemplateCategories['trivia_categories'] as $templates)
                <option value="{{$templates['id']}}">{{$templates['name']}}</option>
                @endforeach
              </select>
              <br>
              <span class="text-danger">@error('category'){{$message}}@enderror</span>
              <br>
              <label for="type" class="mb-2">Type</label>
              <select name="type" disabled id="type" class="form-control">
                <option></option>
                <option value="multiple">Multiple</option>
                <option value="boolean">True/False</option>
              </select>
              <br>
              <span class="text-danger">@error('type'){{$message}}@enderror</span>
              <br>
              <button type="submit" name="submit" class="btn btn-primary">Get Template</button>
            </form>
          </div>
        </div>
    </div>
  </div>
    <script type="text/javascript">
    document.getElementById("category").addEventListener("change", function(){
      var value=document.getElementById("category").value;
      if(! value){
        document.getElementById("type").disabled=true;
      }
      else{
        document.getElementById("type").disabled=false;
      }
    });
    </script>
  </body>
</html>
