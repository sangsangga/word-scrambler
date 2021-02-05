$(document).ready(function () {
    getAllWord();
    $("#form-answer").on("submit", function (e) {
        e.preventDefault();
        checkAnswer();
    });
});

function getAllWord() {
    $.ajax({
        url: "http://127.0.0.1:8000/words",
        method: "GET",
    })
        .done((response) => {
            localStorage.setItem("currWordId", response.data[0].id);
            $("#word").append(`<h1>${response.data[0].word}</h1>`);
        })
        .fail((err) => {
            $("#word").append(`<h1>Error</h1>`);
        });
}

function checkAnswer(currWord) {
    let answer = $("#answer").val();
    let _token = $('meta[name="csrf-token"]').attr("content");
    console.log(answer);
    $.ajax({
        url: `http://127.0.0.1:8000/answer/${localStorage.getItem(
            "currWordId"
        )}`,
        method: "POST",
        data: {
            _token,
            answer,
        },
    })
        .done((response) => {
            if (response === "false") {
                Swal.fire("Wrong!");
            } else {
                Swal.fire("Correct");
            }
        })
        .fail((err) => {
            $("#word").append(`<h1>Error</h1>`);
        });
}
