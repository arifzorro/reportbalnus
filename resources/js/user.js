var table = $('#table_user').DataTable({
    dom: 'lfrtip',
    "processing": true,
    "serverSide": true,
    "order": [[ 3, "asc" ]],
    "ajax": {
        "url": window.location.href,
        "type": "POST"
    },
    "columns": [
        {"data": null,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }, searchable: false, orderable: false
        },
        {"data": "name"},
        {"data": "username"},
        {"data": "role_name"},
        {"data": "status"},
        {"data": "action", orderable: false, searchable: false},
    ]
});

$('body').on('click', '.action_btn_edit', function () {
    window.location = $(this).data('url');
});

$('body').on('click', '.action_btn_delete', function () {
    var url = $(this).data('url');
    swal("Apakah anda yakin ingin menghapus data ini?", {
        buttons: {
            cancel: "Batal",
            delete: {
                text: "Hapus",
                value: "delete"
            }
        }
    })
        .then(function (value) {
            switch (value) {
                case "delete":
                    $.ajax({
                        url: url,
                        success: function (response) {
                            if (!response) {
                                swal("Error", "Terjadi Kesalahan. Data gagal terhapus!", "error");
                            } else {
                                swal(response, "", "success");
                                table.ajax.reload();
                            }
                        }
                    });
                    break;
            }
        });
});

$('.refresh_filter_data').click(function () {
    table.ajax.reload();
});