<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" hx-post="<?= base_url('form/get/tendik/tambah_informasi') ?>" hx-target=".modal-body"><i class="fas fa-plus"></i> Tambah Data</button>
	</div>
	<div class="card-body">
		<?php
		if($informasi){
			?>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Judul Informasi</th>
							<th>Isi Informasi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($informasi as $key => $value): $key++; ?>
							<tr>
								<td class="align-middle"><?= $key ?></td>
								<td class="align-middle"><?= $value->judul ?></td>
								<td><?= htmlspecialchars_decode($value->isi) ?></td>
								<td class="align-middle">
									<button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
									<button class="btn btn-danger btn-sm" hx-post="<?= base_url('lulusan/data_informasi/hapus_informasi/'.$value->uniq) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<?php
		}else{
			?> <div class="alert alert-danger"> 0 Results</div> <?php
		}
		?>
	</div>
</div>