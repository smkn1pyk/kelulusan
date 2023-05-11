<div class="container">
	<div class="login">
		<div class="row mb-3">
			<div class="col-8">
				<h3 class="text-center"><?= $this->session->userdata('nama'); ?></h3>
			</div>
			<div class="col text-end"><a href="<?= base_url('auth/keluar') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Keluar</a></div>
		</div>
		<div class="alert alert-warning">Mohon maaf, sistem mendeteksi anda tidak terdaftar pada data kelulusan<br>Silahkan hubungi Operator Sekolah</div>
	</div>
</div>