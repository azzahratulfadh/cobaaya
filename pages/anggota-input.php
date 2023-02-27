<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input data Anggota</h1>
        
</div>
<div class="col-lg-6">
	<form action="./proses/anggota-input-proses.php" method="post" enctype="multipart/form-data">
	
	<div class="mb-3">
		<label class="form-label">Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="mb-3">
		<label class="form-label">ID Anggota</label>
		<input type="text" class="form-control" name="id_anggota">
	</div>
	<div class="mb-3">
		<label class="form-label">Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>	
		
	<div class="mb-2">
	<label class="form-label">Jenis Kelamin</label>
	</div>
	<div class="mb-3">
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="jenis_kelamin" value="Pria" checked>
			<label class="form-check-label" for="inlineRadio1">Pria</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="jenis_kelamin" value="Wanita">
			<label class="form-check-label" for="inlineRadio2">Wanita</label>
		</div>
	</div>
	
	<div class="mb-3">
		<label class="form-label">Alamat</label>
		<textarea class="form-control" name="alamat" rows="3"></textarea>
	</div>
	
	<div class="mb-3">
		<label class="form-label"></label>
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
	</div>
		
	</form>
</div>