
<?php
if($rombel){
	?>
	<div>
		<form class="form-inline" hx-get="<?= base_url('data_utama/data_peserta_didik') ?>" hx-target="#data">
			<div class="form-group m-1">
				<select class="form-control-sm" name="rombel">
					<?php foreach ($rombel as $key => $value): ?>
						<?php
						if($this->input->get('rombel')){
							if($value->rombongan_belajar_id==$this->input->get('rombel')){
								?> <option value="<?= $value->rombongan_belajar_id ?>" selected><?= $value->nama_rombel ?></option> <?php
							}else{
								?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama_rombel ?></option> <?php
							}
						}else{
							?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama_rombel ?></option> <?php
						}
						?>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group m-1">
				<button class="btn btn-sm btn-primary">Pilih</button>
			</div>
		</form>
	</div>
	<?php
	if($pd){
		?>
		<div class="m-3">
			Jumlah: <?= count($pd) ?> data
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>NISN</th>
					<th>Nama</th>
					<th>Rombel</th>
					<th>Status</th>
					<th>Username</th>
					<th>Password</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pd as $key => $value): $key++; ?>
					<?php
					$kelulusan = $this->db->get_where('data_lulusan', ['peserta_didik_id'=>$value->peserta_didik_id, 'semester_id'=>$value->semester_id])->row_array();
					$pengguna = $this->db->get_where('getpengguna', ['peserta_didik_id'=>$value->peserta_didik_id])->row_array();
					?>
					<tr>
						<td><?= $key ?></td>
						<td><?= $value->nisn ?></td>
						<td><?= $value->nama ?></td>
						<td><?= $value->nama_rombel ?></td>
						<td>
							<?php
							if($kelulusan){
								if($kelulusan['status']=='1'){
									echo "<i class='fas fa-check-circle'></i> Lulus";
								}else{
									echo "<i class='fas fa-circle text-danger'></i> Tidak Lulus";
								}
							}else{
								echo "-";
							}
							?>
						</td>
						<?php
						if($pengguna){
							?>
							<td><i class="fas fa-user"></i> <?= $pengguna['username'] ?></td>
							<td><i class="fas fa-key"></i> <?= $value->tanggal_lahir ?></td>
							<?php
						}else{
							?>
							<td></td>
							<td></td>
							<?php
						}
						?>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php
	}else{
		?> <div class="alert alert-danger"> 0 Results </div> <?php
	}
}