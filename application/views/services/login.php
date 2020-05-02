
<script type="text/javascript">
	$(document).ready(function() {

		$('#btn-login').on('click', function() {
			var username = $('[name="username"]').val();
			var password = $('[name="password"]').val();

			$.ajax({
				url: '<?= base_url('login/masuk') ?>',
				type: 'POST',
				dataType:'json',
				data: {username:username, password:password},
				success:function(response) {
					if (response.status == 'sukses') {
						setTimeout(function(){ 
							window.location.href = "<?= base_url($this->session->userdata('link').'/dashboard'); ?>";
						}, 1000);
						type = 'success';
						md.showNotification('top','center', response.message, 'verified_user', type);
					}else{
						setTimeout(function(){ 
							window.location.href = "<?= base_url('login'); ?>";
						}, 1000);
						type = 'danger';
						md.showNotification('top','center', response.message, 'error', type);
					}
				}
			});
			
		});
	});
</script>

</body>

</html>