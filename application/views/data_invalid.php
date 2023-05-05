<?php
if($rombel){
	$dataInvalid =[];
	foreach ($rombel as $key => $value) {
		$siswarombel = $this->db->get_where('getpesertadidik', ['rombongan_belajar_id'=>$value->rombongan_belajar_id])->result();
		foreach ($siswarombel as $key1 => $value1) {
			$cekInvalid = $this->db->get_where('verval_alamat', ['peserta_didik_id'=>$value1->peserta_didik_id,'status'=>2])->result();
			if($cekInvalid){
				$dataInvalid[] = [
					'rombel' => $value->nama,
					'dataInvalid' => $cekInvalid,
				];
			}
		}
	}
	$dataInvalid = json_decode(json_encode($dataInvalid));
	?>
	<table class="table table-sm table-bordered table-striped table-primary">
		<tbody>
			<?php foreach ($dataInvalid as $key => $value): $key++ ?>
				<tr>
					<td><?= $key ?></td>
					<td><?= $value->rombel ?></td>
					<?php foreach ($value->dataInvalid as $key1 => $value1): ?>
						<td><?= $value1->nama ?></td>
						<td><?= $value1->pesan ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<?php
}