<h1>testing</h1><br>

<form action="{{route('survey.dosurvey')}}" method="post">
    @csrf
    <span>test demo survey</span>
    <select name="surveyId" id="" >
        @foreach ($survey as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Test</button>
</form>