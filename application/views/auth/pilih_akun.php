
<div class="container">
	<div class="login">
		<div class="header">
			<img src="<?= base_url('assets/images/logo.png') ?>" width="30%">
			<h1><i class="fas fa-user"></i> <?= $this->session->userdata('akun')[0]['nama']; ?></h1>
		</div>
		<form hx-post="auth/pilih_akun" hx-target="#result">
			<div class="form-group mb-3">
				<label>Pilih Hak Akses</label>
				<select name="akun" class="form-control">
					<?php foreach ($akun as $key => $value): ?>
						<?php
						$encrypt = $this->encryption->encrypt(json_encode($value));
						?>
						<option value="<?= $encrypt ?>"><?= $value['peran_id_str'] ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="d-block">
				<div class="row">
					<div class="col">
						<button class="btn btn-primary"><i class="fas fa-check"></i> Pilih</button>
					</div>
					<div class="col text-end">
						<a class="btn btn-danger" href="auth/keluar"><i class="fas fa-sign-out-alt"></i> Keluar</a>
					</div>
				</div>
			</div>
			<div id="result"></div>
		</form>
	</div>
</div>