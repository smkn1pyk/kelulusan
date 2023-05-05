<form hx-get="<?= base_url('pbm/pembagian_tugas') ?>" hx-target=".container" class="row mb-3">
	<div class="form-floating col-4">
		<select name="gtk" class="form-select">
			<option value="">...</option>
			<?php foreach ($sgtk as $key => $value): $key++; ?>
				<?php
				if($this->input->get('gtk')){
					if($this->input->get('gtk')==$value->ptk_id){
						?> <option value="<?= $value->ptk_id ?>" selected><?= $value->nama ?></option> <?php
					}else{
						?> <option value="<?= $value->ptk_id ?>"><?= $value->nama ?></option> <?php
					}
				}else{
					?>
					<option value="<?= $value->ptk_id ?>"><?= $value->nama ?></option>
				<?php } ?>
			<?php endforeach ?>
		</select>
		<label>Nama GTK</label>
	</div>
	<div class="d-block col-2">
		<button class="btn btn-primary btn-lg"><i class="fas fa-search"></i></button>
	</div>
</form>

<?php
if($gtk){
	foreach ($gtk as $key => $value) {
		$this->db->order_by('rombongan_belajar_id', 'asc');
		$cekPembelajaran = $this->db->get_where('pembelajaran', ['ptk_id'=>$value->ptk_id])->result();
		?>
		<div class="card">
			<div class="card-header bg-primary text-light">
				<div class="card-title"><i class="fas fa-user"></i> <?= $value->nama ?></div>
			</div>
			<div class="card-body">
				<?php
				if($cekPembelajaran){
					?>
					<div class="table-responsive">
						<table class="table table-sm table-bordered table-striped">
							<tbody>
								<?php foreach ($cekPembelajaran as $key1 => $value1): $key1++; ?>
									<?php 
									$detailRombel = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$value1->rombongan_belajar_id])->row_array();
									$jmlJJM[$value1->ptk_id][] = $value1->jam_mengajar_per_minggu;
									?>
									<tr>
										<td><?= $key1 ?></td>
										<td><?= $detailRombel['nama'] ?></td>
										<td><?= $value1->mata_pelajaran_id ?></td>
										<td><?= $value1->mata_pelajaran_id_str ?></td>
										<td><?= $value1->jam_mengajar_per_minggu ?></td>
										<td><?= $value1->status_di_kurikulum_str ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr class="fw-bold">
									<td colspan="4">Total</td>
									<td><?= array_sum($jmlJJM[$value->ptk_id]) ?></td>
								</tr>
							</tfoot>
						</table>
					</div>
					<?php
				}else{
					?> <div class="alert alert-danger">0 Results</div> <?php
				}
				?>
			</div>
		</div>
		<?php
	}
}