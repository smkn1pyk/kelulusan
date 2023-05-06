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
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin.css') ?>">
	<script src="https://unpkg.com/htmx.org@1.9.2"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" href="<?= base_url('assets/images/logo.png') ?>">
</head>
<body>
	<div class="container-fluid" hx-get="<?= $page ?>" hx-target="#data" hx-trigger="load">
		<nav class="navbar">
			<a href="auth/keluar">Keluar</a>
		</nav>
		<div class="row">
			<div class="col-md-3">
				<ul>
					<li><a href="app/users">Users</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<div id="data"></div>
			</div>
		</div>
	</div>
</body>
</html>