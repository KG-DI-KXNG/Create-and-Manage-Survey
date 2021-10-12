@component('survey::questions.base', compact('question'))
   <br><input type="text" name="{{ $question->key }}" id="{{ $question->key }}" placeholder="Your Answer" class="p-4 w-full form-control border-b focus:outline-none"
           value="{{ $value ?? old($question->key) }}" {{ ($disabled ?? false) ? 'disabled' : '' }}>
@endcomponent