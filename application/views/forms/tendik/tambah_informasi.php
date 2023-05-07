<form hx-post="<?= base_url('lulusan/data_informasi/tambah_informasi') ?>" hx-target="#data">
	<div class="mb-3">
		<input type="text" name="judul" class="form-control" placeholder="Judul Informasi">
	</div>
	<div class="mb-3">
		<textarea name="isi" id="summernote"></textarea>
	</div>
	<div class="mb-3">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>
<script type="text/javascript">
	$('#summernote').summernote({
		placeholder: 'Hello Bootstrap 4',
		tabsize: 2,
		height: 200
	});
</script>