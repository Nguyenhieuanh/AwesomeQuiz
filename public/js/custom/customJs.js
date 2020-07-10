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

/* -------------------------------------------------------------------------- */
/*                              Textarea autosize                             */
/* -------------------------------------------------------------------------- */
/**
 * TODO: Auto resize textarea method
 */
$(
    "textarea"
)
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

$(document).ready(function() {
    var i = 2;
    // Add answer option
    $(document).on("click", "#add-answer", function() {
        console.log($("#add-answer"));
        i++;
        $("#dynamic-field").append(
            '<div class="form-group">' +
                '<label for="password">Answer option #' +
                i +
                ":</label>" +
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
                '<textarea class="form-control answers" name="answer_content[]" rows="2"></textarea>' +
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
                  .prop("disabled", true)
            : $(this)
                  .prev()
                  .prop("disabled", false);
        $(this).prop("checked")
            ? $(this)
                  .next()
                  .children()
                  .removeClass("bg-light")
            : $(this)
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
            count--;
        }
        if (count == 0) {
            $("#myForm").submit();
        }
        console.log(count);
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
