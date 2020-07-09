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

$("#checkAll").click(function() {
    $("input:checkbox")
        .not(this)
        .prop("checked", this.checked);
});

$(document).ready(function() {
    $(".deactivate").prop("disabled", false);
    $(".checkboxes").on("change", function() {
        $(this)
            .next()
            .prop("disabled", $(this).prop("checked"));
    });
});
