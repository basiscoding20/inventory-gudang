
<script type="text/javascript">
	$(document).ready(function() {

        var pengajuan_barang_masuk = $('#table-pengajuan-barang-masuk').DataTable({
            autoWidth:true,
            
            language: {
                lengthMenu: "_MENU_",
            },
            
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            lengthChange: true ,
            
            dom: 
                "<'row'<'col-sm'l>B<'col-sm'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                    {
                        extend:    'excel',
                        text:      '<i class="fas fa-file-excel" aria-hidden="true"></i>',
                        className: 'btn btn-outline-white btn-rounded btn-sm px-2',
                        titleAttr: 'Export to Excel'
                    },
                    {
                        extend:    'pdf',
                        text:      '<i class="fas fa-file-pdf" aria-hidden="true"></i>',
                        className: 'btn btn-outline-white btn-rounded btn-sm px-2',
                        titleAttr: 'Export to PDF'
                    },
                    {
                        extend:    'print',
                        text:      '<i class="fa fa-print" aria-hidden="true"></i>',
                        className: 'btn btn-outline-white btn-rounded btn-sm px-2',
                        titleAttr: 'Print File'
                    },
                      
                ],


        });

        $('#table-pengajuan-barang-masuk_wrapper .dt-buttons').find('button').each(function () {
        $('button').removeClass('btn-secondary');
        $('button').addClass('btn-outline-white btn-rounded btn-sm px-2');
        });
        $('#table-pengajuan-barang-masuk_wrapper .dt-buttons').removeClass('btn-group');
        $('#table-pengajuan-barang-masuk_wrapper .buttons-html5 .button-print').wrapAll('<div class="pfb-group"></div>');
        $('.button-custom').html($('.pfb-group').html());
        
        $('.dt-buttons').appendTo('.button-custom');

        $('[name="table-pengajuan-barang-masuk_length"]').addClass('browser-default');

        $('#btn-reset').click(function() {
        	$('#filter_size').val('');
        	$('#filter_tanggal').val('');
        	barang_masuk();
        });

        $('#add-pengajuan').on('click', function() {
            $.ajax({
                url: '<?= base_url('operator/Barang/get_kode_barang') ?>',
                type: 'POST',
                dataType: 'JSON',
                success:function (data) {
                    $('[name="kode_barang"]').val(data);
                }
            });
            
            $('#add_pengajuan').modal('show');
        });

        $('#show-table-pengajuan-barang-masuk').on('click', '.edit-barang', function() {
            var kode_barang = $(this).attr('data-kode');
            var quantity = $(this).attr('data-quantity');
            var size = $(this).attr('data-size');
            var nama = $(this).attr('data-nama');

            $('[name="kode_barang_edit"]').val(kode_barang).addClass('text-right');
            $('[name="size_edit"]').val(size).addClass('text-right');
            $('[name="nama_barang_edit"]').val(nama).addClass('text-right');
            $('[name="quantity_edit"]').val(quantity).addClass('text-right');
            $('#edit_pengajuan').modal('show');
        });

        $('#btn-add-barang').on('click', function() {
            $('#btn-add-barang').prop('disabled', true);
            $('#btn-add-barang').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Loading ...');
            var kode_barang = $('[name="kode_barang"]').val();
            var quantity = $('[name="quantity"]').val();
            var size = $('[name="size"]').val();
            var nama_barang = $('[name="nama_barang"]').val();

            $.ajax({
                url: '<?= base_url('operator/Barang/add_barang') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {kode_barang:kode_barang, quantity:quantity, size:size, nama_barang:nama_barang},
                success:function (response) {
                $('#add_pengajuan').modal('hide');

                    if (response.status == 'sukses') {
                      setTimeout(function(){ 
                        window.location.href = response.redirect;
                      }, 1500);
                      toastr.success(response.message, 'Sukses', {positionClass: 'md-toast-top-right'});
                    }else{
                      setTimeout(function(){ 
                        window.location.href = response.redirect;
                      }, 1500);
                      toastr.error(response.message, 'Gagal', {positionClass: 'md-toast-top-right'});
                    }
                }
            });            
        });

        $('#btn-edit-barang').on('click', function() {
            $('#btn-edit-barang').prop('disabled', true);
            $('#btn-edit-barang').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Loading ...');
            var kode_barang = $('[name="kode_barang_edit"]').val();
            var quantity = $('[name="quantity_edit"]').val();
            var size = $('[name="size_edit"]').val();
            var nama_barang = $('[name="nama_barang_edit"]').val();

            $.ajax({
                url: '<?= base_url('operator/Barang/edit_barang') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {kode_barang:kode_barang, quantity:quantity, size:size, nama_barang:nama_barang},
                success:function (response) {

                $('#edit_pengajuan').modal('hide');

                    if (response.status == 'sukses') {
                      setTimeout(function(){ 
                        window.location.href = response.redirect;
                      }, 1500);
                      toastr.success(response.message, 'Sukses', {positionClass: 'md-toast-top-right'});
                    }else{
                      setTimeout(function(){ 
                        window.location.href = response.redirect;
                      }, 1500);
                      toastr.error(response.message, 'Gagal', {positionClass: 'md-toast-top-right'});
                    }
                }
            });            
        });

        $('#show-table-pengajuan-barang-masuk').on('click', '.print-barang', function() {

            var kode_barang = $(this).attr('data-kode');
            var nama_barang = $(this).attr('data-nama');
            var quantity = $(this).attr('data-quantity');
            var size = $(this).attr('data-size');
            var created_at = $(this).attr('data-tanggal');
            var barcode = $(this).attr('data-barcode');

            $.ajax({
                url: '<?= base_url('operator/Barang/cetak_barang') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {kode_barang:kode_barang, quantity:quantity, size:size, nama_barang:nama_barang, created_at:created_at, barcode:barcode}
            });            
        });
	});
</script>
	
</body>
</html>