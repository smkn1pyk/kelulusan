<form hx-get="<?= base_url('pbm') ?>" hx-target=".container" class="row mb-3">
	<div class="form_floating col-4">
		<select name="rombel" class="form-select">
			<option value="">...</option>
			<?php foreach ($srombel as $key => $value): ?>
				<?php
				if($this->input->get('rombel')){
					if($this->input->get('rombel')==$value->rombongan_belajar_id){
						?> <option value="<?= $value->rombongan_belajar_id ?>" selected><?= $value->nama ?> <?= $value->jenis_rombel_str ?></option> <?php
					}else{
						?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?> <?= $value->jenis_rombel_str ?></option> <?php
					}
				}else{
					?>
					<option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?> <?= $value->jenis_rombel_str ?></option>
				<?php } ?>
			<?php endforeach ?>
		</select>
	</div>
	<div class="d-block col-2">
		<button class="btn btn-primary"><i class="fas fa-search"></i></button>
	</div>
</form>
<?php
if($rombel){
	?>

	<?php foreach ($rombel as $key => $value): ?>
		<?php
		$this->db->order_by('status_di_kurikulum', 'asc');
		$cekPembelajaran = $this->db->get_where('pembelajaran', ['rombongan_belajar_id'=>$value->rombongan_belajar_id,'semester_id'=>$this->session->userdata('semester_id')])->result();
		?>
		<div class="card mb-3">
			<div class="card-header bg-primary text-light">
				<div class="card-title">
					<?= $value->jenis_rombel_str ?>: <?= $value->nama ?> 
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-sm">
						<tbody>
							<?php foreach ($cekPembelajaran as $key1 => $value1): $key1++ ?>
								<?php
								$cekGtk = $this->db->get_where('getgtk', ['ptk_terdaftar_id'=>$value1->ptk_terdaftar_id])->row_array();
								$cekIndukPbm = $this->db->get_where('pembelajaran', ['pembelajaran_id'=>$value1->induk_pembelajaran_id,'semester_id'=>$this->session->userdata('semester_id')])->row_array();
								$jmlJJM[$value->rombongan_belajar_id][] = $value1->jam_mengajar_per_minggu;
								?>
								<tr>
									<td><?= $key1 ?></td>
									<td><?= $value1->mata_pelajaran_id ?></td>
									<td><?= $value1->mata_pelajaran_id_str ?></td>
									<td><?= $cekGtk['nama'] ?></td>
									<td><?= $value1->jam_mengajar_per_minggu ?></td>
									<!-- <td><?= $cekIndukPbm['mata_pelajaran_id_str'] ?></td> -->
									<td><?= $value1->status_di_kurikulum_str ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr class="fw-bold">
								<td colspan="4">Total</td>
								<td><?= array_sum($jmlJJM[$value->rombongan_belajar_id]); ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		<?php endforeach ?>
		<?php
	}