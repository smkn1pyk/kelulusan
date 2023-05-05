<?php
error_reporting(false);
if($rombel){
	?>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-primary">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Rombel</th>
					<th>Jumlah Siswa</th>
					<th>Mengisi</th>
					<th>Valid</th>
					<th>Invalid</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($rombel as $key => $value): $key++ ?>
					<?php
					$cekSiswa = $this->db->get_where('getpesertadidik', ['rombongan_belajar_id'=>$value->rombongan_belajar_id])->result();
					?>
					<tr>
						<td><?= $key ?></td>
						<td><?= $value->nama ?></td>
						<td><?= count($cekSiswa) ?></td>
						<?php foreach ($cekSiswa as $key1 => $value1): ?>
							<?php
							$cekVerval = $this->db->get_where('verval_alamat', ['peserta_didik_id'=>$value1->peserta_didik_id])->row_array();
							$cekValid = $this->db->get_where('verval_alamat', ['peserta_didik_id'=>$value1->peserta_didik_id, 'status'=>1])->row_array();
							$cekInvalid = $this->db->get_where('verval_alamat', ['peserta_didik_id'=>$value1->peserta_didik_id, 'status'=>2])->row_array();

							if($cekVerval){
								$jmlMengisi[$value->rombongan_belajar_id][] = $cekVerval;
							}

							if($cekValid){
								$jmlValid[$value->rombongan_belajar_id][] = $cekValid;
							}

							if($cekInvalid){
								$jmlInvalid[$value->rombongan_belajar_id][] = $cekInvalid;
							}
							?>
						<?php endforeach ?>
						<td><?= count($jmlMengisi[$value->rombongan_belajar_id]) ?></td>
						<td><?= count($jmlValid[$value->rombongan_belajar_id]) ?></td>
						
						<td><?= count($jmlInvalid[$value->rombongan_belajar_id]) ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<?php
}