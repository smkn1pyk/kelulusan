<?php
$cekSiswa = $this->db->get_where('getpesertadidik', ['peserta_didik_id'=>$id])->row_array();
$nik = $cekSiswa['nik'];
$nama = $cekSiswa['nama'];
$tempat_lahir = $cekSiswa['tempat_lahir'];
$tanggal_lahir = $cekSiswa['tanggal_lahir'];
$nama_ibu = $cekSiswa['nama_ibu'];
if($siswa){
	

	$provinsi = $siswa['provinsi'];
	$kota_kabupaten = $siswa['kota_kabupaten'];
	$kecamatan = $siswa['kecamatan'];
	$desa_kelurahan = $siswa['desa_kelurahan'];
}else{
	$provinsi = null;
	$kota_kabupaten = null;
	$kecamatan = null;
	$desa_kelurahan = null;
}
?>
<div class="alert-info p-3 mb-2">Pastikan Data Diisi sesuai data yang tertera pada Kartu Keluarga</div>
<form hx-post="<?= base_url('siswa/index/simpan/'.$id) ?>" hx-target=".container">
	<fieldset>
		<legend>Biodata</legend>
		<div class="form-floating mb-3">
			<input type="text" name="nik" class="form-control" value="<?= $nik ?>" required>
			<label>NIK</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="nama" class="form-control" value="<?= $nama ?>" required>
			<label>Nama</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="tempat_lahir" class="form-control" value="<?= $tempat_lahir ?>" required>
			<label>Tempat Lahir</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="tanggal_lahir" class="form-control" value="<?= $tanggal_lahir ?>" required>
			<label>Tanggal Lahir</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="nama_ibu" class="form-control" value="<?= $nama_ibu ?>" required>
			<label>Nama Ibu Kandung</label>
		</div>
	</fieldset>
	<fieldset>
		<legend>Data Alamat</legend>
		<div class="form-floating mb-3">
			<input type="text" name="provinsi" class="form-control" value="<?= $provinsi ?>" required>
			<label>Provinsi</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="kota_kabupaten" class="form-control" value="<?= $kota_kabupaten ?>" required>
			<label>Kota/Kabupaten</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="kecamatan" class="form-control" value="<?= $kecamatan ?>" required>
			<label>Kecamatan</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="desa_kelurahan" class="form-control" value="<?= $desa_kelurahan ?>" required>
			<label>Nama Nagari/Kelurahan</label>
		</div>
	</fieldset>
	<div class="d-block">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>
<div class="message m-3"></div>