
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

function confirmDelete(url_link, message="You won't be able to revert this!") {
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
    "#question_content, #answer_content_1, #answer_content_2, #answer_content_3, #answer_content_4, #category_description"
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
    $(".deactivate").prop("disabled", false);
    $(".checkboxes").on("change", function() {
        $(this)
            .next()
            .prop("disabled", $(this).prop("checked"));
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
        let remain_time = localStorage.minutes * 60 + parseInt(localStorage.seconds);
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
