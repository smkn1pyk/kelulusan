
<?php
if($rombel){
	?>
	<div class="row">
		<div class="col-md">
			<div class="float-md-left">
				<div class="m-1">
					<button class="btn btn-primary btn-sm" data-target="#exampleModal" data-toggle="modal" hx-post="<?= base_url('form/get/tendik/tambah_data_lulusan/') ?>" hx-target=".modal-body"><i class="fas fa-plus"></i></button>
				</div>
			</div>
		</div>
		<div class="col-md">
			<div class="form-inline float-right">
				<div class="m-1">
					<select class="form-control-sm" name="rombel" hx-get="<?= base_url('app/data_peserta_didik') ?>" hx-target="#data">
						<option value="">Rombel</option>
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
				<div class="m-1">
					<input type="text" name="pencarian" class="form-control-sm" placeholder="Pencarian" hx-get="<?= base_url('app/data_peserta_didik') ?>" hx-target="#data" autocomplete="off" autofocus>
				</div>
			</div>
		</div>
	</div>
	<?php
	if($pd){
		// echo $this->db->last_query();
		?>
		<div class="m-3">
			Jumlah: <?= count($pd) ?> data
		</div>
		<div class="table-responsive">
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
								<td><button class="btn btn-sm" data-target="#exampleModal" data-toggle="modal" hx-post="<?= base_url('form/get/tendik/reset_password_pd/'.$value->peserta_didik_id) ?>" hx-target=".modal-body"><i class="fas fa-key"></i></button> <?= $value->tanggal_lahir ?></td>
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
		</div>
		<?php
	}else{
		?> <div class="alert alert-danger"> 0 Results </div> <?php
	}
}