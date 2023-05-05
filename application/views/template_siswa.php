<!DOCTYPE html>
<html>
<head>
	<title>SMKN 1 PAYAKUMBUH</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" type="icon/png" href="https://yt3.ggpht.com/Dp77YdComGeOs9_KLKvXNLYbh-veBMF5g9LDNhs7SZOqiRLZ8WbzcXv8-QGCCu4dXM7Hr7Ebdg=s900-c-k-c0x00ffffff-no-rj">
	<script src="https://unpkg.com/htmx.org@1.8.5"></script>
	<style>
		.alert{
			position: absolute;
			top: 1em;
			right: 1em;
			z-index: 10000;
		}
	</style>
</head>
<body class="small">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?= base_url('siswa') ?>">SMKN 1 PAYAKUMBUH</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= base_url('siswa') ?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= base_url('siswa/rekap_data') ?>">Rekap Data</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= base_url('pbm/pembelajaran') ?>">Pembelajaran</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('pbm/pembagian_tugas') ?>">Pembagian Tugas</a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<div class="alert-info p-3 mb-3">
			Informasi: Data divalidasi berdasarkan dengan hasil pemadanan Data Kependudukan (DUKCAPIL), silahkan lakukan perbaikan data sesuai dengan dokumen kependudukan.
		</div>
		<?php
		$this->load->view($page, FALSE);
		?>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-wallet"></i> SMKN 1 PAYAKUMBUH</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					...
				</div>
				<!-- <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div> -->
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(".alert").fadeTo(2000, 500).slideUp(500, function(){
			$(".alert").slideUp(500);
		});

		$('#pilih_rombel').on('change', function(){
			$('#rombel_pilih').submit();
		})
	</script>
</body>
</html>