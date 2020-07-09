const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
    },
    buttonsStyling: false
});

function confirmDelete(url_link) {
    swalWithBootstrapButtons
        .fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
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
    var timer2 = "00:03";
    var interval = setInterval(function() {
        var timer = timer2.split(":");
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = seconds < 0 ? --minutes : minutes;
        if (minutes < 0) {
            clearInterval(interval);
            Swal.fire({
                icon: "warning",
                title: "Time's Up",
                text: 'Please submit your exam!',
                showClass: {
                    popup: "animate__animated animate__zoomIn"
                },
                hideClass: {
                    popup: "animate__animated animate__fadeOutUp"
                }
            }).then(result => {
                $("#doQuiz").submit();
            });
        }
        seconds = seconds < 0 ? 59 : seconds;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        $(".countdown").html(minutes + ":" + seconds);
        timer2 = minutes + ":" + seconds;
    }, 1000);
});
