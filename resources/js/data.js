var table = $('#table_data').DataTable({
    dom: 'lBfrtip',
    buttons: [
        {
            extend: 'excel',
            extension: '.xlsx',
            filename: 'Data Ganti Meter Pascabayar Gianyar (tanggal export: '+ $app.getCurrentDate('-') +')',
            title: '',
            text: 'Export ke Excel',
            exportOptions: {
                columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
            }
        }
    ],
    "processing": true,
    "serverSide": true,
    "order": [[ 3, "desc" ]],
    "ajax": {
        "url": window.location.href,
        "type": "POST",
        "data": function (d) {
            d.from_tgl = $('.from_tgl').val();
            d.to_tgl = $('.to_tgl').val();

        }
    },
    "columns": [
        {"data": null,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }, searchable: false, orderable: false
        },
        {"data": "action", orderable: false, searchable: false},
        {"data": "nama_vendor"},
        {"data": "tgl_ganti"},
        {"data": "pelanggan_id"},
        {"data": "pelanggan_telepon"},
        {"data": "sn_meter_baru"},
        {"data": "merk_meter_lama"},
        {"data": "seri_meter_lama"},
        {"data": "tahun_meter_lama"},
        {"data": "stan_bongkar"},
        {"data": "no_segel"},
        {"data": "pelaksana"}
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