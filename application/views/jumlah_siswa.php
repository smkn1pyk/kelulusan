<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table td{
			padding: 5px;
			border: 1px solid #ddd;
		}
	</style>
</head>
<body>
	<?php
	if($rombel){
		?>
		<table>
			<?php foreach ($rombel as $key => $value): ?>
				<?php
				$jml = $this->db->query("SELECT count(peserta_didik_id) as jml from getpesertadidik where rombongan_belajar_id='$value->rombongan_belajar_id'")->row_array();
				if($value->tingkat_pendidikan_id==10){
					$tingkat_x[] = $value;
				}else
				if($value->tingkat_pendidikan_id==11){
					$tingkat_xi[] = $value;
				}else
				if($value->tingkat_pendidikan_id==12){
					$tingkat_xii[] = $value;
				}

				$total[] = $jml['jml'];
				?>
				<tr>
					<td><?= $value->nama_rombel ?></td>
					<td><?= $jml['jml'] ?></td>
				</tr>
			<?php endforeach ?>
			<tr>
				<td>Total</td>
				<td><?= array_sum($total) ?></td>
			</tr>
		</table>
		<?php
	}
	?>
</body>
</html>