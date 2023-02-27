<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input data Buku</h1>
        
</div>
<div class="col-lg-6">
	<form action="./proses/buku-input-proses.php" method="post" enctype="multipart/form-data">

	<div class="mb-3">
		<label class="form-label">ID Buku</label>
		<input type="text" class="form-control" name="idbuku">
	</div>
	<div class="mb-3">
		<label class="form-label">Judul</label>
		<input type="text" class="form-control" name="judulbuku">
	</div>
	<div class="mb-3">
		<label class="form-label">Kategori</label>
		<input type="text" class="form-control" name="kategori">
	</div>
	<div class="mb-3">
		<label class="form-label">Pengarang</label>
		<input type="text" class="form-control" name="pengarang">
	</div>
	<div class="mb-3">
		<label class="form-label">Penerbit</label>
		<input type="text" class="form-control" name="penerbit">
	</div>	
	
	<div class="mb-3">
		<label class="form-label"></label>
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
	</div>
		
	</form>
</div>