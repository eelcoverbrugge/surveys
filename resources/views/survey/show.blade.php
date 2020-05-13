@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $questionnaire->title }}</h1>
            <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
                @csrf
                @foreach($questionnaire->questions as $key => $question)
                <div class="card mb-4">
                    <div class="card-header">{{ $key + 1 }}. {{$question->question}}</div>

                    <div class="card-body">
                        @error('responses.' . $key . '.answer_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                            <label for="answer{{ $answer->id }}">
                                <li class="list-group-item">
                                    <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}" class="mr-2" value="{{ $answer->id }}" {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : '' }}>
                                    {{ $answer->answer }}
                                </li>
                                <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                            </label>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
                <div class="card">
                    <div class="card-header">Your information</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input name="survey[name]" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Your Name">
                            <small id="nameHelp" class="form-text text-muted">Hello! What's your name?</small>
                            @error('survey.name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Your E-mail</label>
                            <input name="survey[email]" type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Your E-mail">
                            <small id="emailHelp" class="form-text text-muted">Enter your e-mail please.</small>
                            @error('survey.email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button class="btn btn-dark" type="submit">Complete survey</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection