<!DOCTYPE html>
<html>
<head>
	<title>Maintanance</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style type="text/css">
		.quote{
			width: 400px;
			border: 1px solid #ddd;
			padding: 10px;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<h3 class="text-center"><?= $this->session->userdata('nama'); ?></h3>
		<div class="quote">
			<blockquote>Mohon maaf, aplikasi ini masih dalam masa pengembangan, silahkan kembali beberapa saat lagi<br>Tekan <a href='<?= base_url('auth/keluar') ?>'>Disini</a> untuk keluar";</blockquote>
		</div>
	</div>
</body>
</html>