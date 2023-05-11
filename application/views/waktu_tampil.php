<div class="container">
	<div class="login">
		<?php
		if($pengaturan){
			?>
			<h3 class="text-center"><?= $this->session->userdata('nama'); ?></h3>
			<div class="alert alert-info">Informasi kelulusan akan ditampilkan pada <?= date('d-m-Y H:i', strtotime($pengaturan['waktu_tampil'])) ?></div>
			<p>Silahkan melakukan refresh halaman jika waktu telah sesuai dengan jadwal yang telah ditetapkan !</p>
			<?php
		}else{
			?> <div class="alert alert-danger"> Terjadi kesalahan sistem </div> <?php
		}
		?>
	</div>
</div>