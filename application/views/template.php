<!DOCTYPE html>
<html>
<head>
	<title>SMKN 1 PAYAKUMBUH</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" type="icon/png" href="https://yt3.ggpht.com/Dp77YdComGeOs9_KLKvXNLYbh-veBMF5g9LDNhs7SZOqiRLZ8WbzcXv8-QGCCu4dXM7Hr7Ebdg=s900-c-k-c0x00ffffff-no-rj">
</head>
<body class="small">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?= base_url('pbm') ?>">SMKN 1 PAYAKUMBUH</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= base_url('pbm') ?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= base_url('pbm/pembelajaran') ?>">Pembelajaran</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('pbm/pembagian_tugas') ?>">Pembagian Tugas</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<?php
		$this->load->view($page, FALSE);
		?>
	</div>

	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>