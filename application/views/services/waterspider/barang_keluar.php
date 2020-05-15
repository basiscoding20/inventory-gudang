
<script type="text/javascript">
	$(document).ready(function() {

        var barang_keluar = $('#table-barang-keluar').DataTable({
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

        $('#table-barang-keluar_wrapper .dt-buttons').find('button').each(function () {
        $('button').removeClass('btn-secondary');
        $('button').addClass('btn-outline-white btn-rounded btn-sm px-2');
        });
        $('#table-barang-keluar_wrapper .dt-buttons').removeClass('btn-group');
        $('#table-barang-keluar_wrapper .buttons-html5 .button-print').wrapAll('<div class="pfb-group"></div>');
        $('.button-custom').html($('.pfb-group').html());
        
        $('.dt-buttons').appendTo('.button-custom');

        $('[name="table-barang-keluar_length"]').addClass('browser-default');

        $('#btn-reset').click(function() {
        	$('#filter_size').val('');
        	$('#filter_tanggal').val('');
        	barang_keluar();
        });

        $('#show-table-barang-keluar').on('click', '.validasi', function() {
            var kode_barang = $(this).attr('data-kode');
            var quantity = $(this).attr('data-quantity');

            $('#modalValidasiBarangMasuk').modal('show');
            $('[name="kode_barang"]').val(kode_barang);
            $('[name="quantity"]').attr('max', quantity);
            $('[name="checkAll"]').attr('id', kode_barang);
            $('[name="checkAll"]').val(quantity);
            $('.checkAllLabel').attr('for', kode_barang);
        });

        $('[name="checkAll"]').change(function() {

            var checked = $(this).is(':checked');
               if(checked){
                $('[name="quantity"]').prop('disabled', true);
                $('[name="quantity"]').addClass('bg-light');
               }else{
                $('[name="quantity"]').prop('disabled', false);
                $('[name="quantity"]').removeClass('bg-light');
            }
        });

        $('#kirimValidasi').on('click', function() {
            $('#kirimValidasi').prop('disabled', true);
            $('#kirimValidasi').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>');
            var kode_barang = $('[name="kode_barang"]').val();

            if ($('[name="checkAll"]').is(':checked')) {
                var quantity = $('[name="checkAll"]').val();
            }else{
                var quantity = $('[name="quantity"]').val();
            }

            $.ajax({
                url: '<?= base_url('admin/Barang/validasi_barang_keluar') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {kode_barang:kode_barang, quantity:quantity},
                success:function (response) {
                $('#modalValidasiBarangMasuk').modal('hide');

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
	});
</script>
	
</body>
</html>