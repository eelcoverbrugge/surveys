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
            alert('You have reache the limits of answers');
        }
    });

    $(container).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        i--;
    });
});