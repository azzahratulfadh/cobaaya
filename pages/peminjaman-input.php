
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input data Peminjaman</h1>
        
</div>
<div class="col-lg-6">
	<form action="./proses/Peminjaman-input-proses.php" method="post" enctype="multipart/form-data">

	<div class="mb-3">
		<label class="form-label">ID Transaksi</label>
		<input type="text" class="form-control" name="idtransaksi">
	</div>
	<div class="mb-3">
		<label class="form-label">Nama Anggota</label>
		<select class="form-control" name="idanggota">
			<?php
                    $sql="select * from tbanggota";
                    $hasil=mysqli_query($db,$sql);
                    echo "<option value=''>--Pilih --</option>";
                    while ($ambil = mysqli_fetch_array($hasil)) {
                        echo "<option value=".$ambil['idanggota'].">".$ambil['nama']."</option>";
                
                    }
                ?>
		</select>
	</div>
	<div class="mb-3">
		<label class="form-label">Judul Buku</label>
		<select class="form-control" name="idbuku">
			<?php
                    $sql="select * from tbbuku";
                    $hasil=mysqli_query($db,$sql);
                    echo "<option value=''>--Pilih --</option>";
                    while ($ambil = mysqli_fetch_array($hasil)) {
                        echo "<option value=".$ambil['idbuku'].">".$ambil['judulbuku']."</option>";
                
                    }
                ?>
		</select>
	</div>
	<div class="mb-3">
		<label class="form-label">Tanggal Peminjaman</label>
		<input type="text" class="form-control" name="tglpinjam">
	</div>
	<div class="mb-3">
		<label class="form-label">Tanggal Kembali</label>
		<input type="text" class="form-control" name="tglkembali">
	</div>	
	
	<div class="mb-3">
		<label class="form-label"></label>
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
	</div>
		
	</form>
</div>