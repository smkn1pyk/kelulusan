<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta name="viewport" content="initial-scale=1">
	<script src="https://unpkg.com/htmx.org@1.9.2"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<link rel="icon" type="images/png" href="<?= base_url('assets/images/logo.png') ?>">
	<style type="text/css">
		body{
			font-family: Arial;
			background-image: url("<?= base_url('assets/images/bg-login.jpg') ?>");
			background-size: 230px;
		}
		.header{
			text-align: center;
		}
		.container{
			margin-top: 100px;
		}
		.login{
			background-color: #fff;
			width: 400px;
			margin: auto;
			padding: 20px;
			border: 1px solid #ddd;
			border-radius: 10px;
			box-shadow: 5px 5px 30px #ddd;
		}

		.login .form-group, .login .d-block{
			padding: 5px;
		}

		.login input{
			width: 100%;
			height: 40px;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 5px 5px 60px #ddd;
			padding: 5px;
		}

		.login .btn{
			width: 20%;
			height: 40px;
		}

		.footer{
			margin-top: 20px;
			text-align: right;
			font-size: 10px;
		}

		@media only screen and (max-width: 600px) {
			.container{
				margin-top: 50px;
			}
			.login {
				max-width: 80%;
				/*margin: 0;*/
			}
		}

		.pengumuman{
			font-family: monospace;
			border: 1px solid #ddd;
			padding: 15px;
			background-color: lightgrey;
			text-align: justify;
		}

		.pengumuman table{
			width: 100%;
		}

		.pengumuman table td{
			padding: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="login">
			<div class="header">
				<img src="<?= base_url('assets/images/logo.png') ?>" width="30%">
				<h1>SMKN 1 PAYAKUMBUH</h1>
			</div>
			<?php
			$tanggal_buka = date('Y-m-d H:i' , strtotime('2023-05-05 19:00'));
			if(date('Y-m-d H:i')>=$tanggal_buka){
				?>
				<form hx-post="app/proses_login" hx-target="#result">
					<div class="form-group">
						<input type="email" name="username" class="form-control" placeholder="E-mail">
					</div>

					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Kata Sandi">
					</div>

					<div class="d-block">
						<button class="btn"><i class="fas fa-sign-in-alt"></i> Log-In</button>
					</div>
					<div id="result"></div>
				</form>
				<?php
			}else{
				$tgl = date('d-m-Y', strtotime($tanggal_buka));
				$jam = date('H:i a', strtotime($tanggal_buka));
				?>
				<div class="pengumuman">
					<p>Pengumuman Kelulusan akan dibuka pada: </p>
					<table>
						<tr>
							<td>Tanggal</td>
							<td>:</td>
							<td><?= $tgl ?></td>
						</tr>
						<tr>
							<td>Jam</td>
							<td>:</td>
							<td><?= $jam ?></td>
						</tr>
					</table>
					<p>Silahkan lakukan refresh halaman jika tanggal dan jam sudah sesuai</p>
				</div>
				<?php
			}
			?>
			
			<div class="footer">
				: <?= date('d-m-Y H:i') ?>
			</div>
		</div>
	</div>
</body>
</html>