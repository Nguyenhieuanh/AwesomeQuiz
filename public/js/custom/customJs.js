
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
    "#question_content, #answer_content_1, #answer_content_2, #answer_content_3, #answer_content_4"
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
