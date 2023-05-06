
<div class="container">
	<div class="login">
		<h3 class="text-center"><i class="fas fa-user"></i> <?= $akun[0]['nama'] ?></h3>
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