<?php
if($rombel){
	?>
	<div class="mb-5">
		<form method="GET" class="row row-cols-lg-auto g-3 align-items-center" id="rombel_pilih">
			<div class="col-9">
				<div class="form-floating">
					<select name="rombel" class="form-select" id="pilih_rombel">
						<?php foreach ($rombel as $key => $value): ?>
							<?php
							if($this->input->get('rombel')){
								if($this->input->get('rombel')==$value->rombongan_belajar_id){
									?> <option value="<?= $value->rombongan_belajar_id ?>" selected><?= $value->nama ?></option> <?php
								}else{
									?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?></option> <?php
								}
							}else{
								?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?></option> <?php
							}
							?>
						<?php endforeach ?>
					</select>
					<label>Pilih Rombel</label>
				</div>
			</div>
			<div class="col-3">
				<button class="btn btn-primary btn-lg"><i class="fas fa-search"></i></button>
			</div>
		</form>
	</div>
	<div id="data">
		<?php
		if($siswa){
			?>
			<table class="table table-striped">
				<tbody>
					<?php foreach ($siswa as $key => $value): $key++ ?>
						<?php 
						$cekVervalAlamat = $this->db->get_where('verval_alamat', ['peserta_didik_id'=>$value->peserta_didik_id])->row_array();
						if($cekVervalAlamat){
							$status = "<i class='fas fa-check-circle text-primary'></i>";
							if($cekVervalAlamat['status']=='1'){
								$class = 'alert-success';
							}else
							if($cekVervalAlamat['status']=='2'){
								$class = 'alert-warning';
							}else{
								$class = null;
							}
						}else{
							$status = "<i class='fas fa-circle'></i>";
							$class = null;
						}
						?>
						<tr class="<?= $class ?>">
							<td><?= $key ?></td>
							<!-- <td><?= $value->nisn ?></td> -->
							<td><?= $value->nama ?></td>
							<td><?= $status ?></td>
							<td class="text-center">
								<?php
								if($cekVervalAlamat){
									if($cekVervalAlamat['status']=='0'){
										?>
										<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('siswa/detail/'.$value->peserta_didik_id) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
										<?php
									}else
									if($cekVervalAlamat['status']=='1'){
										?> <i class="fas fa-check-circle text-primary"> <?php
									}else
									if($cekVervalAlamat['status']=='2'){
										?>
										<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('siswa/detail/'.$value->peserta_didik_id) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
										<button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('siswa/pesan/'.$value->peserta_didik_id) ?>" hx-target=".modal-body"><i class="fas fa-info-circle"></i></button>
										<?php
									}
								}else{
									?>
									<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('siswa/detail/'.$value->peserta_didik_id) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
									<?php
								}
								?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php
		}else{
			?> <div class="alert alert-danger p-5" > 0 Results </div> <?php
		}
		?>
	</div>
	<?php
}
?>