<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://unpkg.com/htmx.org@1.9.2"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" href="<?= base_url('assets/images/logo.png') ?>">
	<style type="text/css">
		body{
			font-family: Arial;
			background-image: url("<?= base_url('assets/images/bg-login.jpg') ?>");
			background-size: 230px;
		}
		.header{
			/*background-color: #fff;*/
			text-align: center;
			width: 550px;
			margin: auto;
			/*border-bottom: 1px solid #ddd;*/
		}

		.header h1, .header p{
			margin: 0;
			/*background-color: #fff;
			padding: 2px;*/
		}

		.header h1{
			font-size: 22px;
		}

		.header p{
			font-family: monospace;
			font-size: 12px;
		}

		.container{
			margin-top: 30px;
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

		.footer{
			margin-top: 20px;
			text-align: right;
			font-size: 10px;
		}

		@media only screen and (max-width: 600px) {
			.container{
				margin-top: 50px;
			}
			.header{
				width: 90%;
			}
			.login {
				max-width: 90%;
				/*margin: 0;*/
			}
		}
	</style>
</head>
<body>
	<div class="header">
		<img src="<?= base_url('assets/images/logo.png') ?>" width="100px">
		<h1>SMK NEGERI 1 PAYAKUMBUH</h1>
		<p>Jalan ASOKA no.6 - Telp/Fax (0752) 92047</p>
		<p>E-Mail : smkn1pyk@gmail.com - WEB : https://smkn1payakumbuh.sch.id - Kode Pos : 26225</p>
	</div>

	<div class="container" hx-get="<?= $page ?>" hx-target="#data" hx-trigger="load">
		<div id="data"></div>
	</div>
</body>
</html>