
<script type="text/javascript">
	$(document).ready(function() {
        
        var pengajuan_barang_masuk = $('#table-barang-masuk').DataTable({
          dom: 'Bfrtip',
        });

        $('#btn-reset').click(function() {
        	$('#filter_size').val('');
        	$('#filter_tanggal').val('');
        	barang_masuk();
        });
	});
</script>
	
</body>
</html>