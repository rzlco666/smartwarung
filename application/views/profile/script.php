<script>
    function get_details(id) {
        console.log(id);

        $.ajax({
            url: "<?php echo site_url('profile/invoice_details/') ?>" + id,
            type: "GET",
            dataType: "JSON",
            data: {
                get_param: 'value'
            },
            success: function(response) {
                console.log(response);
                var length = response.length;
                console.log(length);
                data = "";
                data +=
                    '<div class="modal-body">' +
                    '<div class="container">' +
                    '<dl class="row">' +
                    '<dt class="col-sm-4">No. Invoice</dt>' +
                    '<dd class="col-sm-8">' + response[0]['invoice_id'] + '<button class="btn btn-info float-right" onclick="printDiv();">Cetak</button></dd>'
                    // '<dd class="col-sm-4"></dd>' +

                <?php if ($this->session->userdata('role') == 0) : ?>
                        +
                        '<dt class="col-sm-4">Warung</dt>' +
                        '<dd class="col-sm-8">' + response[0]['user_name'] + '</dd>'
                <?php elseif ($this->session->userdata('role') == 1) : ?>
                        +
                        '<dt class="col-sm-4">Pembeli</dt>' +
                        '<dd class="col-sm-8">' + response[0]['user_name'] + '</dd>'
                <?php endif; ?>

                    +
                    '<dt class="col-sm-4">Status</dt>' +
                    '<dd class="col-sm-8">' + response[0]['invoice_status'] + '</dd>'

                    +
                    '<dt class="col-sm-4">Tanggal</dt>' +
                    '<dd class="col-sm-8">'+response[0]['tanggal']+'</dd>' +
                    '</dl>' +
                    '<hr>' +
                    '<!-- produk -->';
                for (i = 0; i < length; i++) {
                    data +=
                        '<div class="row mb-3" style="">' +
                        '<div class="col-sm-4"><img width="100%" src="<?php echo base_url('assets/uploads/') ?>' + response[i]['item_photo'] + '" alt=""></div>' +
                        '<div class="col-sm-4 pl-2" style="padding-top:8%">' +
                        '<span><a href="<?php echo site_url('item/show/') ?>' + response[i]['item_id'] + '" class="font-weight-bold">' + response[i]['item_name'] + '</a></span><br>' +
                        '<span>' + response[i]['details_quantity'] + ' x ' + formatNumber(response[i]['details_price']) + '</span>' +
                        '</div>' +
                        '<div class="col-sm-4 text-center" style="border-left: 1px solid rgba(0, 0, 0, 0.1);padding-top:8%">' +
                        '<span class="text-danger font-weight-bold">Total Harga</span><br>' +
                        '<span>' + formatNumber(response[i]['details_quantity'] * response[i]['details_price']) + '</span>' +
                        '</div>';
                    if (response[i]['invoice_status'] === "Sudah diterima") {
                        data += '<a href="<?php echo site_url('rating/create/') ?>' + response[i]['item_id'] + '" class="mt-2 ml-auto btn btn-sm btn-primary px-3 text-white">Beri Ulasan</a>' +
                            '</div>';
                    } else {
                        data += '</div>';
                    }
                }
                data +=
                    '<hr>' +
                    '<!-- end produk -->' +
                    '<h5>Alamat Pengiriman</h5>' +
                    '<p>' +
                    response[0]['destination'] +
                    '</br>' +
                    '<small class="text-primary">Jarak: ' + response[0]['distance'] + ' KM</small>' +
                    '</p>' +
                    '<hr>' +
                    '<dl class="row">' +
                    '<dt class="col-sm-5">Total Belanja</dt>' +
                    '<dd class="col-sm-7">' + formatNumber(response[0]['billing']) + '</dd>'

                    +
                    '<dt class="col-sm-5">Ongkos Kirim</dt>' +
                    '<dd class="col-sm-7">' + formatNumber(response[0]['delivery_fee']) + '</dd>'

                    +
                    '<dt class="col-sm-5 text-primary" >Total</dt>' +
                    '<dt class="col-sm-7 text-primary">' + formatNumber(response[0]['billing']) + '</dt>' +
                    '</dl>' +
                    '</div>' +
                    '</div>';

                dataFooter = "";
                var confirm = "return confirm('Apakah Anda yakin akan membatalkan?')";
                <?php if ($this->session->userdata('role') == 0) : ?>
                    if (response[0]['invoice_status'] === "Menunggu proses penjual") {
                        dataFooter += '<a href="<?php echo site_url('invoice/cancel/') ?>' + response[0]['invoice_id'] + '" class="btn btn-sm btn-danger px-3" onclick="' + confirm + '">Batalkan</a>';
                    } else if (response[0]['invoice_status'] === "Sedang dikirim") {
                        dataFooter += '<a type="button" href="<?php echo site_url('invoice/update_to_done/') ?>' + response[0]['invoice_id'] + '" class="btn btn-sm btn-primary px-3">Terima barang</a>';
                    } else if (response[0]['invoice_status'] === "Sudah diterima") {
                        dataFooter += '<button type="button" class="btn btn-sm btn-secondary px-3" data-dismiss="modal">Close</button>';
                    } else if (response[0]['invoice_status'] === "Dibatalkan") {
                        dataFooter += '<button type="button" class="btn btn-sm btn-secondary px-3" data-dismiss="modal">Close</button>';
                    }
                <?php elseif ($this->session->userdata('role') == 1) : ?>
                    if (response[0]['invoice_status'] === "Menunggu proses penjual") {
                        dataFooter += '<a href="<?php echo site_url('invoice/cancel/') ?>' + response[0]['invoice_id'] + '" class="btn btn-sm btn-danger px-3" onclick="' + confirm + '">Batalkan</a>' +
                            '<a href="<?php echo site_url('invoice/update_to_process/') ?>' + response[0]['invoice_id'] + '" class="btn btn-sm btn-primary px-3" >Proses dan kirimkan</a>';
                    } else if (response[0]['invoice_status'] === "Sedang dikirim") {
                        dataFooter += '<button type="button" class="btn btn-sm btn-secondary px-3" data-dismiss="modal">Close</button>';
                    } else if (response[0]['invoice_status'] === "Sudah diterima") {
                        dataFooter += '<button type="button" class="btn btn-sm btn-secondary px-3" data-dismiss="modal">Close</button>';
                    } else if (response[0]['invoice_status'] === "Dibatalkan") {
                        dataFooter += '<button type="button" class="btn btn-sm btn-secondary px-3" data-dismiss="modal">Close</button>';
                    }
                <?php endif; ?>

                document.getElementById('content').innerHTML = data;
                document.getElementById('footer').innerHTML = dataFooter;
            }
        });
    };

    function formatNumber(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    };

    function printDiv() {

        var divToPrint = document.getElementById('printable');

        var newWin = window.open('', 'Print-Window');

        newWin.document.open();

        newWin.document.write(`<html><style>
            @media print{
            #printable{
                
            }
            button,a{
                visibility: hidden;
            }
            #noprint{
                visibility: hidden;
            }
            }
            </style>
            <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/open-iconic-bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/animate.css">

            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/owl.carousel.min.css">
            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/owl.theme.default.min.css">

            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/magnific-popup.css">

            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/aos.css">

            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/ionicons.min.css">

            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap-datepicker.css">
            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/jquery.timepicker.css">


            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/flaticon.css">
            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/icomoon.css">
            <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules') ?>/chart.js/dist/Chart.min.css">

            <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

            <body onload="window.print()">${divToPrint.innerHTML}</body>

            </html>`);

newWin.document.close();

setTimeout(function() {
newWin.close();
}, 10);

}
</script>
</body>

</html>