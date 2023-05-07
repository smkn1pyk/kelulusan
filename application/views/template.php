<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin.css') ?>">
	<script src="https://unpkg.com/htmx.org@1.9.2"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="<?= base_url('assets/images/logo.png') ?>">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!-- sidebar -->
			<div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
				<h1 class="bi bi-bootstrap text-primary d-flex my-4 justify-content-center"></h1>
				<div class="list-group rounded-0">
					<a href="#" class="list-group-item list-group-item-action active border-0 d-flex align-items-center">
						<span class="bi bi-border-all"></span>
						<span class="ml-2">Dashboard</span>
					</a>
					<!-- <a href="#" class="list-group-item list-group-item-action border-0 align-items-center">
						<span class="bi bi-box"></span>
						<span class="ml-2">Products</span>
					</a> -->

				<!-- 	<button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#sale-collapse">
						<div>
							<span class="bi bi-cart-dash"></span>
							<span class="ml-2">Data Master</span>
						</div>
						<span class="bi bi-chevron-down small"></span>
					</button>
					<div class="collapse" id="sale-collapse" data-parent="#sidebar">
						<div class="list-group">
							<a href="<?= base_url('data_utama/peserta_didik') ?>" class="list-group-item list-group-item-action border-0 pl-5">Peserta Didik</a>
							<a href="#" class="list-group-item list-group-item-action border-0 pl-5">Sale Orders</a>
						</div>
					</div> -->

					<button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#purchase-collapse">
						<div>
							<span class="bi bi-cart-plus"></span>
							<span class="ml-2">Data Lulusan</span>
						</div>
						<span class="bi bi-chevron-down small"></span>
					</button>
					<div class="collapse" id="purchase-collapse" data-parent="#sidebar">
						<div class="list-group">
							<a href="<?= base_url('lulusan/informasi') ?>" class="list-group-item list-group-item-action border-0 pl-5">Informasi</a>
							<a href="#" class="list-group-item list-group-item-action border-0 pl-5">Purchase Orders</a>
						</div>
					</div>
				</div>
			</div>
			<!-- overlay to close sidebar on small screens -->
			<div class="w-100 vh-100 position-fixed overlay d-none" id="sidebar-overlay"></div>
			<!-- note: in the layout margin auto is the key as sidebar is fixed -->
			<div class="col-md-9 col-lg-10 ml-md-auto px-0">
				<!-- top nav -->
				<nav class="w-100 d-flex px-4 py-2 mb-4 shadow-sm">
					<!-- close sidebar -->
					<button class="btn py-0 d-lg-none" id="open-sidebar">
						<span class="bi bi-list text-primary h3"></span>
					</button>
					<div class="dropdown ml-auto">
						<button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-toggle="dropdown" aria-expanded="false">
							<span class="bi bi-person text-primary h4"></span>
							<span class="bi bi-chevron-down ml-1 mb-2 small"></span>
						</button>
						<div class="dropdown-menu dropdown-menu-right border-0 shadow-sm" aria-labelledby="logout-dropdown">
							<a class="dropdown-item" href="<?= base_url('auth/keluar') ?>">Logout</a>
							<a class="dropdown-item" href="#">Settings</a>
						</div>
					</div>
				</nav>
				<!-- main content -->
				<main class="container-fluid" hx-get="<?= $page ?>" hx-target="#data" hx-trigger="load">
					<div id="data"></div>
				</main>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/admin.js') ?>"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</body>
</html>