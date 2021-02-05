$(document).ready(function () {
    getAllWord();
    $("#form-answer").on("submit", function (e) {
        e.preventDefault();
        checkAnswer();
    });
});

function shuffleWord(word) {
    let temp = word.split("");
    let tempLength = temp.length;

    for (let i = tempLength - 1; i > 0; i--) {
        let randIndex = Math.floor(Math.random() * (i + 1));
        let tmp = temp[i];
        temp[i] = temp[randIndex];
        temp[randIndex] = tmp;
    }

    console.log(temp.join(""), "<<< result shuffle");

    return temp.join("");
}

function getAllWord() {
    $.ajax({
        url: "http://127.0.0.1:8000/words",
        method: "GET",
    })
        .done((response) => {
            localStorage.setItem("currWordId", response.data[0].id);
            $("#word").append(
                `<h1 class="text-2xl text-center mb-4">${shuffleWord(
                    response.data[0].word
                )}</h1>`
            );
        })
        .fail((err) => {
            $("#word").append(`<h1>Error</h1>`);
        });
}

function checkAnswer() {
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
