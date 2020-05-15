
<html>
<head>
	<title>Cetak Transaksi <?= $kode_barang ?></title>
</head>
<body style="width: 50%;margin: 0 auto">

	<h1 style="text-align: center">Pengajuan Barang Masuk</h1>

	<table width="50%" style="margin: 0 auto;">
		<tr>
			<td>
				<img width="300" src="<?= base_url('assets/img/barcode/'.$barcode) ?>">
			</td>		
		</tr>
		<tr>
			<td>Nama Barang : <?= $nama_barang ?></td>
		</tr>
		<tr>
			<td>Quantity	: <?= $quantity ?></td>
		</tr>
		<tr>
			<td>Size	: <?= $size ?></td>
		</tr>
		<tr>
			<td>Tanggal Masuk	: <?= $created_at ?></td>
		</tr>
	</table>


</body>
</html>