<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta name="viewport" content="initial-scale=1">
	<script src="https://unpkg.com/htmx.org@1.9.2"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<link rel="icon" type="images/png" href="<?= base_url('assets/images/favicon.png') ?>">
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

		.login select{
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

		@media only screen and (max-width: 600px) {
			.container{
				margin-top: 50px;
			}
			.login {
				max-width: 80%;
				/*margin: 0;*/
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="login">
			<div class="header">
				<img src="<?= base_url('assets/images/logo.png') ?>" width="30%">
				<h1><i class="fas fa-user"></i> <?= $this->session->userdata('akun')[0]->nama; ?></h1>
			</div>
			<form hx-post="app/proses_pilih_akun" hx-target="#result">
				<div class="form-group">
					<label>Pilih Hak Akses</label>
					<select name="akun" class="form-control">
						<?php foreach ($akun as $key => $value): ?>
							<?php
							$encrypt = $this->encryption->encrypt(json_encode($value));
							?>
							<option value="<?= $encrypt ?>"><?= $value->peran_id_str ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="d-block">
					<button class="btn"><i class="fas fa-check"></i> Pilih</button>
					<button class="btn" hx-post="app/keluar"><i class="fas fa-sign-out-alt"></i> Keluar</button>
				</div>
				<div id="result"></div>
			</form>
		</div>
	</div>
</body>
</html>