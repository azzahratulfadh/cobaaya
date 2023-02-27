<?php
	$idbuku=$_GET['id'];
	$q_tampil_buku=mysqli_query($db,"SELECT * FROM tbbuku WHERE idbuku='$idbuku'");
	$r_tampil_buku=mysqli_fetch_array($q_tampil_buku);
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit data Buku</h1>
        
</div>
<div class="col-lg-6">
	<form action="./proses/buku-edit-proses.php" method="post" >

	<div class="mb-3">
		<label class="form-label">ID Buku</label>
		<input type="text" class="form-control" name="idbuku" value="<?php echo $r_tampil_buku['idbuku']; ?>">
	</div>
	<div class="mb-3">
		<label class="form-label">Judul</label>
		<input type="text" class="form-control" name="judulbuku" value="<?php echo $r_tampil_buku['judulbuku']; ?>">
	</div>
	<div class="mb-3">
		<label class="form-label">Kategori</label>
		<input type="text" class="form-control" name="kategori" value="<?php echo $r_tampil_buku['kategori']; ?>">
	</div>
	<div class="mb-3">
		<label class="form-label">Pengarang</label>
		<input type="text" class="form-control" name="pengarang" value="<?php echo $r_tampil_buku['pengarang']; ?>">
	</div>
	<div class="mb-3">
		<label class="form-label">Penerbit</label>
		<input type="text" class="form-control" name="penerbit" value="<?php echo $r_tampil_buku['penerbit']; ?>">
	</div>	
	
	<div class="mb-3">
		<label class="form-label"></label>
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
	</div>
		
	</form>
</div>