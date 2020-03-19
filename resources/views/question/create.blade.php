@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Question</div>

                <div class="card-body">
                    <form action="/questionnaires/{{$questionnaire->id}}/questions" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="question">Title</label>
                            <input  name="question[question]" type="text" class="form-control" 
                                    id="question" aria-describedby="questionHelp" placeholder="Enter Question"
                                    value="{{old('question.question')}}">
                            <small id="questionHelp" class="form-text text-muted">Ask simple and to-the-point questions for the best results.</small>
                            @error('question.question')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                <small id="choisesHelp" class="form-text text-muted">Give choices that give you the most insight into your question.</small>
                                <div>
                                    <div class="form-group">
                                        <label for="answer1">Choices 1</label>
                                        <input  name="answers[][answer]" type="text" class="form-control" 
                                                id="answer1" aria-describedby="choisesHelp" placeholder="Enter Choices 1"
                                                value="{{old('answers.0.answer')}}">
                                        @error('answers.0.answer')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="answer2">Choices 2</label>
                                        <input  name="answers[][answer]" type="text" class="form-control" 
                                                id="answer2" aria-describedby="choisesHelp" placeholder="Enter Choices 2"
                                                value="{{old('answers.1.answer')}}">
                                        @error('answers.1.answer')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="answer3">Choices 3</label>
                                        <input  name="answers[][answer]" type="text" class="form-control" 
                                                id="answer3" aria-describedby="choisesHelp" placeholder="Enter Choices 3"
                                                value="{{old('answers.2.answer')}}">
                                        @error('answers.2.answer')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="answer4">Choices 4</label>
                                        <input  name="answers[][answer]" type="text" class="form-control" 
                                                id="answer4" aria-describedby="choisesHelp" placeholder="Enter Choices 4"
                                                value="{{old('answers.3.answer')}}">
                                        @error('answers.3.answer')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Question                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection