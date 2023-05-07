<?php
if($id){
	$cekSiswa = $this->db->get_where('getpesertadidik', ['peserta_didik_id'=>$id, 'semester_id'=>$this->session->userdata('semester_id')])->row_array();
	if($cekSiswa){
		$cekPengguna = $this->db->get_where('getpengguna', ['peserta_didik_id'=>$cekSiswa['peserta_didik_id']])->row_array();
		if($cekPengguna){
			?>
			<h3 class="text-center"><?= $cekSiswa['nama'] ?></h3>
			<form hx-post="<?= base_url('form/reset_password_pd/'.$id) ?>" hx-target="#result">
				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="Username" value="<?= $cekPengguna['username'] ?>">
				</div>
				<div class="form-group">
					<input type="text" name="password" class="form-control" placeholder="Password" value="<?= $cekSiswa['tanggal_lahir'] ?>">
				</div>
				<div class="d-block">
					<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
				</div>
			</form>
			<div class="mt-3" id="result"></div>
			<?php
		}else{
			?> <div class="alert alert-danger"> Tidak ditemukan data pengguna </div> <?php
		}
	}else{
		?> <div class="alert alert-danger"> Tidak ditemukan data pesera didik </div> <?php
	}
}