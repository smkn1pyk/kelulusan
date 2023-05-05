<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://unpkg.com/htmx.org@1.9.2"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/lulusan.css">
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<link rel="icon" type="images/png" href="<?= base_url('assets/images/favicon.png') ?>">
</head>
<body>
	<div class="container">
		<?php
		if($status){
			?>
			<div class="header">
				<div class="tombol" style="float: right;width: 200mm; text-align: right;">
					<!-- <button onclick="print();"><i class="fas fa-print"></i> Print</button> -->
					<button hx-post="app/keluar"><i class="fas fa-sign-out-alt"></i> Keluar</button>
				</div>
				<div class="header-kiri">
					<img src="<?= base_url('assets/images/logo-prov.png') ?>" width="110px">
				</div>
				<div class="header-tengah">
					<h3 class="m-0">PEMERINTAHAN PROVINSI SUMATERA BARAT</h3>
					<H3 class="m-0">DINAS PENDIDIKAN</H3>
					<h3 class="m-0">CABANG DINAS WILAYAH IV</h3>
					<H2 class="m-0">SMK NEGERI 1 PAYAKUMBUH</H2>
					<P class="m-0">Jalan ASOKA no.6 - Telp/Fax (0752) 92047</P>
					<p class="m-0">E-Mail : smkn1pyk@gmail.com -  WEB : https://smkn1payakumbuh.sch.id - Kode Pos : 26225</p>
				</div>
				<div class="header-kanan">
					<img src="<?= base_url('assets/images/logo.png') ?>" width="120px" class='mt-4'>
				</div>
			</div>

			<div class="judul">
				<div>
					<!-- <h3>SURAT KETERANGAN LULUS</h3> -->
					<H3>PENGUMUMAN KELULUSAN</H3>
				</div>
				<!-- <h4 class="m-0">NO: <?= $lulusan['nomor_surat'] ?></h4> -->
			</div>

			<div class="isi">
				<p>Berdasarkan <!-- Surat --> Keputusan Kepala SMK Negeri 1 Payakumbuh<!--  No. <?= $lulusan['nomor_surat_keputusan'] ?> -->, tentang Kriteria Kelulusan dari Satuan Pendidikan dan hasil Rapat Dewan Guru tanggal: <?= date('d-M-Y', strtotime($lulusan['tanggal_keputusan'])) ?>, dengan  ini Kepala SMK  Negeri 1 Payakumbuh  menerangkan:</p>
				<table class="table-sm table-responsive mb-4">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?= $siswa['nama'] ?></td>
					</tr>
					<tr>
						<td>Tempat/ Tgl. Lahir</td>
						<td>:</td>
						<td><?= $siswa['tempat_lahir'].', '.date('d-m-Y', strtotime($siswa['tanggal_lahir'])) ?></td>
					</tr>
					<tr>
						<td>NIS / NISN</td>
						<td>:</td>
						<td><?= $siswa['nipd'].' / '. $siswa['nisn'] ?></td>
					</tr>
					<?php
					if($rombel){
						?>
						<tr>
							<td>Kompetensi Keahlian</td>
							<td>:</td>
							<td><?= $rombel['jurusan_id_str'] ?></td>
						</tr>
						<?php
					}
					?>
					<tr>
						<td>Kurikulum</td>
						<td>:</td>
						<td><?= $siswa['kurikulum_id'] ?>/<?= $siswa['kurikulum_id_str'] ?></td>
					</tr>
					<tr>
						<td>Nama Orang Tua</td>
						<td>:</td>
						<td>
							<?php
							if($siswa['nama_ayah']){
								echo $siswa['nama_ayah'];
							}else{
								if($siswa['nama_ibu']){
									echo $siswa['nama_ibu'];
								}
							}
							?>
						</td>
					</tr>
				</table>
				<p>Dinyatakan 
					<?php
					if($status['status']=='1'){
						echo "memenuhi";
					}else{
						echo "tidak memenuhi";
					}
					?>
					kriteria dan <b>
						<?php
						if($status['status']=='1'){
							echo "Lulus";
						}else{
							echo "Tidak Lulus";
						}
						?>
					</b> dari SMKN Negeri 1 Payakumbuh Tahun Pelajaran <?= date('Y')-1 ?>/<?= date('Y') ?></p>
					<!-- <p>Demikianlah surat keterangan Lulus ini dikeluarkan untuk digunakan sesuai keperluan</p> -->
				</div>
				<!-- <div class="ttd">
					<div class="ttd-kanan">
						Dikeluarkan di : Payakumbuh<br>
						Pada Tanggal   : <?= date('d-M-Y', strtotime($lulusan['tanggal_surat'])) ?><br>
						Kepala<br>
						<img src="<?= base_url('assets/images/ttd.png') ?>" width="270px" class='ml-0'>
					</div>
				</div> -->
				<div class="ctt">
					Ctt: Mohon dikonfirmasi ke Operator Kesiswaan<br>apabila ada penulisan data yang salah sebelum penulisan ijazah.
				</div>
			</div>
			<?php
		}else{
			?> <div style="background-color: red;padding: 10px; color: #000;"> Kombinasi E-mail dan Kata Sandi tidak cocok ! </div> <?php
		}
		?>
	</body>
	</html>

