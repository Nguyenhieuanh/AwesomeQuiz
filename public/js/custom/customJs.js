/* -------------------------------------------------------------------------- */
/*                            Alert confirm delete                            */
/* -------------------------------------------------------------------------- */
/**
 * TODO: Alert Confirm Delete with Sweetalert2
 */
const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
    },
    buttonsStyling: false
});

function confirmDelete(
    url_link,
    message = "You won't be able to revert this!"
) {
    swalWithBootstrapButtons
        .fire({
            title: "Are you sure?",
            text: message,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!"
        })
        .then(result => {
            if (result.value) {
                window.location = url_link;
            }
        });
}
/* ----------------------------------- End ---------------------------------- */

$(document).ready(function() {
    "use strict";
    /* -------------------------------------------------------------------------- */
    /*                              Textarea autosize                             */
    /* -------------------------------------------------------------------------- */
    /**
     * TODO: Auto resize textarea method
     */
    $("#myForm textarea")
        .each(function() {
            this.setAttribute(
                "style",
                "height:" + this.scrollHeight + "px;overflow-y:hidden;"
            );
        })
        .on("input", function() {
            this.style.height = "auto";
            this.style.height = this.scrollHeight + "px";
        });

    /* ----------------------------------- End ---------------------------------- */
    var i = $("#myForm textarea").size() - 1;
    // Add answer option
    $(document).on("click", "#add-answer", function() {
        i++;
        $("#dynamic-field").append(
            '<div class="form-group">' +
                '<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<div class="input-group-text" id="basic-addon1">' +
                '<input type="hidden" name="corrects[]" class="deactivate" value="0">' +
                '<input class="inp-cbx checkboxes" id="cbx' +
                i +
                '" data-id="' +
                i +
                '" type="checkbox" name="corrects[]" style="display: none" value="1" />' +
                '<label class="cbx" for="cbx' +
                i +
                '">' +
                '<span class="bg-light" title="Correct answer">' +
                '<svg width="12px" height="10px" viewbox="0 0 12 10">' +
                '<polyline points="1.5 6 4.5 9 10.5 1"></polyline>' +
                "</svg>" +
                "</span>" +
                "</label>" +
                "</div>" +
                "</div>" +
                '<div class="input-group-prepend">' +
                '<label class="input-group-text"> <strong> Answer Option #' +
                i +
                "</strong></label></div>" +
                '<textarea class="form-control answers" name="answer_content[]" rows="1"></textarea>' +
                '<div class="input-group-append">' +
                '<span role="button" class="input-group-text remove" title="Delete">' +
                '<i class="far fa-trash-alt"></i></span>' +
                "</div>" +
                '<div class="invalid-feedback">This is a required field.</div>' +
                "</div>" +
                "</div>"
        );
    });

    // Remove answer option
    $(document).on("click", ".remove", function() {
        $(this)
            .closest("div.form-group")
            .remove();
        i--;
    });

    // Check right/wrong answer
    $(document).on("change", ".checkboxes", function() {
        $(this).prop("checked")
            ? $(this)
                  .prev()
                  .prop("disabled", true) &&
              $(this)
                  .next()
                  .children()
                  .removeClass("bg-light")
            : $(this)
                  .prev()
                  .prop("disabled", false) &&
              $(this)
                  .next()
                  .children()
                  .addClass("bg-light");
    });

    // Validate answer option
    $(document).on("click", "#btn-submit", function() {
        var count = 0;
        $(".answers").each(function() {
            if ($(this).val() == "") {
                $(this).addClass("is-invalid");
                count++;
            } else {
                $(this).removeClass("is-invalid");
            }
        });

        if ($("#question_content").val() == "") {
            $("#question_content").addClass("is-invalid");
            count++;
        } else {
            $("#question_content").removeClass("is-invalid");
        }
        if (count == 0) {
            $("#myForm").submit();
        }
    });

    $("#checkAll").click(function() {
        $("input:checkbox")
            .not(this)
            .prop("checked", this.checked);
    });

    // Countdown function
    var timer2 = $(".countdown").html();
    var timer = timer2.split(":");
    if (localStorage.minutes && localStorage.seconds && localStorage.start) {
        let d = Math.floor(new Date().getTime() / 1000);
        let ran_time = d - localStorage.start;
        let remain_time =
            localStorage.minutes * 60 + parseInt(localStorage.seconds);
        let real_time = remain_time - ran_time;
        var minutes = Math.floor(real_time / 60);
        var seconds = Math.floor(real_time % 60);
        localStorage.start = d;
    } else {
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        let remain_time = localStorage.minutes * 60 + localStorage.seconds;
        let d = Math.floor(new Date().getTime() / 1000);
        localStorage.start = d;
    }
    var interval = setInterval(function() {
        localStorage.minutes = minutes;
        localStorage.seconds = seconds;
        --seconds;
        minutes = seconds < 0 ? --minutes : minutes;
        if (minutes < 0) {
            clearInterval(interval);
            Swal.fire({
                icon: "warning",
                title: "Time's Up",
                text: "Please submit your exam!",
                showClass: {
                    popup: "animate__animated animate__zoomIn"
                },
                hideClass: {
                    popup: "animate__animated animate__fadeOutUp"
                }
            }).then(result => {
                localStorage.clear();
                $("#doQuiz").submit();
            });
        }
        seconds = seconds < 0 ? 59 : seconds;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        $(".countdown").html(minutes + ":" + seconds);
        timer2 = minutes + ":" + seconds;
    }, 1000);
});

// function search dynamic question
$("#search-input").keyup(function() {
    var inputSearch = $(this)
        .val()
        .toUpperCase();
    var difficultySelect = $("#difficulty-select")
        .val()
        .toUpperCase();
    $(".filter-row").each(function() {
        var question = $(this)
            .children()
            .children()[1].textContent;
        if (!difficultySelect) {
            if (question.toUpperCase().indexOf(inputSearch) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        } else {
            var difficulty = $(this)
                .children("td.item-difficulty")
                .children("h5")
                .children("span")
                .text();
            if (
                question.toUpperCase().indexOf(inputSearch) > -1 &&
                difficulty.toUpperCase().indexOf(difficultySelect) > -1
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        }
    });
});

// search question user ajax

$("#ajax-search").on("keydown", function(e) {
    if(e.keyCode == 13) {
        e.preventDefault();
        var url = $("#searchForm").attr("data-entry-id");
        console.log(url);
        var keyword = $("#ajax-search").val();
        var category_id = $("#category-select").val();
        var difficulty = $("#difficulty-select").val();
        var data = {
            keyword: keyword,
            category_id: category_id,
            difficulty: difficulty
        };
        console.log(data);
        if (!keyword && !difficulty && !category_id) {
            $("#paginate").show();
        }
        var html = "";
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $.ajax({
            type: "get",
            url: url,
            data: data,
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response) {
                    for (i = 1; i <= response.length; i++) {
                        html +=
                            "<tr>" +
                            '<td scoope="row" class="text text-center">' +
                            i +
                            "</td>" +
                            '<td class="item">' +
                            '<p data-toggle="collapse" href="#_' +
                            response[i - 1].id +
                            '" aria-expanded="false" title="Click for answers">' +
                            response[i - 1].content +
                            "</p>" +
                            '<div class="collapse" id="_' +
                            response[i - 1].id +
                            '">' +
                            '<div class="card card-body">';
                        for (j = 0; j < response[i - 1].answers.length; j++) {
                            html += "<p>";
                            switch (response[i - 1].answers[j].correct) {
                                case 1:
                                    html +=
                                        '<strong><span class="badge badge-success">Answer #' +
                                        (j + 1) +
                                        "</span></strong>";
                                    break;
                                default:
                                    html +=
                                        '<strong><span class="badge badge-danger">Answer #' +
                                        j +
                                        1 +
                                        "</span></strong>";
                                    break;
                            }
                            html +=
                                response[i - 1].answers[j].answer_content + " </p>";
                        }
                        html += "</div>" + "</div>" + "</td>";
                        switch (response[i - 1].difficulty) {
                            case 1:
                                html +=
                                    "<td>" +
                                    '<h5><span class="badge badge-pill badge-success">Easy</span></h5>' +
                                    "</td>";
                                break;
                            case 2:
                                html +=
                                    "<td>" +
                                    '<h5> <span class="badge badge-pill badge-warning">Medium</span></h5>' +
                                    "</td>";
                                break;
                            case 3:
                                html +=
                                    "<td>" +
                                    '<h5> <span class="badge badge-pill badge-danger">Hard</span></h5>' +
                                    "</td>";
                                break;
                        }
                        html +=
                            "<td>" +
                            response[i - 1].category +
                            "</td>" +
                            "<td>" +
                            '<a href="#" class="btn btn-sm btn-info">' +
                            '<span><i class="fas fa-info-circle"></i> Detail</span></a>';
                        if (response[i - 1].userRole == 2) {
                            html +=
                                '<a href="' +
                                route("question.edit", [response[i - 1].id]) +
                                '" class="btn btn-sm btn-primary"> <span><i class="far fa-edit"></i></span> Edit' +
                                "</a>" +
                                '<button class="btn btn-sm btn-danger" onclick="confirmDelete(\'' +
                                route("question.destroy", [response[i - 1].id]) +
                                "')\">" +
                                '<span><i class="fas fa-trash-alt"></i> Delete</span>' +
                                "</button>" +
                                "</td>";
                        }
                        html += "</tr>";
                    }
                }
                if (keyword == "" && difficulty == "" && category_id == "") {
                    $("#paginate").show();
                } else {
                    $("#paginate").hide();
                    $("tbody#list-question")
                        .children("tr")
                        .hide();
                    $("tbody#list-question").append(html);
                }
            },
            error: function() {
                console.log('error');
            }
        });
    }
});
