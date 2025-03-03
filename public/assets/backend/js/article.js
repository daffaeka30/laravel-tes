let submit_method;

$(document).ready(function () {
    articleTable();
});

// datatable serverside
function articleTable() {
    $('#yajra').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        // pageLength: 20, // set default records per page
        ajax: "/admin/articles/serverside",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'category_id',
                name: 'category_id'
            },
            {
                data: 'tag_id',
                name: 'tag_id'
            },
            {
                data: 'views',
                name: 'views'
            },
            {
                data: 'published',
                name: 'published'
            },
            {
                data: 'is_confirm',
                name: 'is_confirm'
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });
};

const deleteData = (e) => {
    let id = e.getAttribute('data-id');

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        allowOutsideClick: false,
        showCancelButton: true,
        showCloseButton: true,
        preConfirm: () => {
            startLoading();
        },
        onClose: () => {
            stopLoading();
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                url: "/admin/articles/" + id,
                dataType: "json",
                success: function (response) {
                    reloadTable();
                    toastSuccess(response.message);
                },
                error: function (response) {
                    console.log(response);
                }
            });
        } else {
            stopLoading();
        }
    })
}

const deleteForceData = (e) => {
    let id = e.getAttribute('data-id');

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        allowOutsideClick: false,
        showCancelButton: true,
        showCloseButton: true,
        preConfirm: () => {
            startLoading();
        },
        onClose: () => {
            stopLoading();
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                url: "/admin/articles/force-delete/" + id,
                dataType: "json",
                success: function (response) {
                    stopLoading();

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    }).then(result => {
                        if (result.isConfirmed) {
                            window.location.href = '/admin/articles';
                        }
                    });
                },
                error: function (response) {
                    console.log(response);
                }
            });
        } 
    })
}