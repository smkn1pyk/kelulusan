
<div class="container">
	<div class="login">
		<div class="header">
			<img src="<?= base_url('assets/images/logo.png') ?>" width="30%">
			<h1><i class="fas fa-globe"></i> SMKN 1 PAYAKUMBUH</h1>
		</div>
		<?php
		$tanggal_buka = date('Y-m-d H:i' , strtotime('2023-05-06 22:00'));
		if(date('Y-m-d H:i')>=$tanggal_buka){

		}else{
			$tgl = date('d-m-Y', strtotime($tanggal_buka));
			$jam = date('H:i a', strtotime($tanggal_buka));
		}
		?>
		<div class="row">
			<div class="col-md mb-3">
				<div class="bg-light p-3 border rounded">
					<h3>Pengumuman: </h3>
					<table class="table">
						<tr>
							<td>Pengumuman Kelulusan</td>
							<td>:</td>
							<td><?= $tgl ?> Pukul <?= $jam ?></td>
						</tr>
						<tr>
							<td>Penerbitan Surat Keterangan Lulus (SKL)</td>
							<td>:</td>
							<td>08 Mei 2023</td>
						</tr>
					</table>
					<p>Silahkan lakukan refresh halaman jika tanggal dan jam sudah sesuai dengan jadwal yang sudah ditetapkan</p>
				</div>
			</div>
			<div class="col-md mb-3">
				<div class="bg-light p-3 border rounded">
					<h3>Form Login</h3>
					<form hx-post="auth/login" hx-target="#result">
						<div class="form-group mb-3">
							<input type="email" name="username" class="form-control" placeholder="E-mail">
						</div>

						<div class="form-group mb-3">
							<input type="password" name="password" class="form-control" placeholder="Kata Sandi">
						</div>

						<div class="form-group mb-3">
							<select class="form-select" name="semester_id">
								<?php foreach ($semester_id as $key => $value): ?>
									<option><?=$value->semester_id ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="d-block mb-3">
							<button class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Log-In</button>
						</div>
						<div id="result"></div>
					</form>
				</div>
			</div>
		</div>
		<div class="footer">
			: <?= date('d-m-Y H:i') ?>
		</div>
	</div>
</div>