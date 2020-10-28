@extends('layouts.app')

@section('content')

<script>
    $(document).ready(function() {
        var max_answers = 10;
        var container = $("#answers");
        var add_answer = $("#add-answer");

        var i = 2;
        $(add_answer).click(function(e) {
            e.preventDefault();
            if (i < max_answers) {
                i++;
                $(container).append('<div><div class="form-group"><label for="answer' + i + '">Answer</label><a href="#" class="delete float-right"><i class="far fa-trash-alt"></i></a><input name="answers[][answer]" type="text" class="form-control" id="answer' + i + '" aria-describedby="choisesHelp" placeholder="..." value="{{old("answers.' + i + '.answer")}}">@error("answers.' + i + 'answer")<small class="text-danger">{{$message}}</small>@enderror</div></div></div>');
            } else {
                $('<div class="alert alert-danger" role="alert">You have reache the limits of answers</div>').insertBefore('#answers').delay(3000).fadeOut();
            }
        });

        $(container).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            i--;
        });
    });
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new question</div>

                <div class="card-body">
                    <form action="/questionnaires/{{$questionnaire->id}}/questions" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input name="question[question]" type="text" class="form-control" id="question" aria-describedby="questionHelp" placeholder="Do you like {{ config('app.name') }}?" value="{{old('question.question')}}">
                            <small id="questionHelp" class="form-text text-muted">Ask simple and to-the-point questions for the best results.</small>
                            @error('question.question')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button id="add-answer" class="btn btn-secundary">Add answer</button>
                            <button id="save-question" type="submit" class="btn btn-primary">Save question</button>
                        </div>
                        <div id="answers" class="form-group">
                            <fieldset>
                                <legend>Answers</legend>
                                <small id="choisesHelp" class="form-text text-muted">Give answers that give you the most insight into your question.</small>
                                <div>
                                    <div class="form-group">
                                        <label for="answer1">Answer</label>
                                        <input name="answers[][answer]" type="text" class="form-control" id="answer1" aria-describedby="choisesHelp" placeholder="Yes" value="{{old('answers.0.answer')}}">
                                        @error('answers.0.answer')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="answer2">Answer</label>
                                        <input name="answers[][answer]" type="text" class="form-control" id="answer2" aria-describedby="choisesHelp" placeholder="No" value="{{old('answers.1.answer')}}">
                                        @error('answers.1.answer')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection