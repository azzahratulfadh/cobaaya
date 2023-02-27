
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input data Pengembalian</h1>
        
</div>
<div class="col-lg-6">
	<form action="./proses/pengembalian-input-proses.php" method="post" enctype="multipart/form-data">

	<div class="mb-3">
		<label class="form-label">ID Transaksi</label>
		<select class="form-control" name="idtransaksi">
			<?php
                    $sql="select * from tbtransaksi";
                    $hasil=mysqli_query($db,$sql);
                    echo "<option value=''>--Pilih --</option>";
                    while ($ambil = mysqli_fetch_array($hasil)) {
                        echo "<option value=".$ambil['idtransaksi'].">".$ambil['idtransaksi']."</option>";
                
                    }
                ?>
		</select>
	</div>	

	<div class="mb-3">
		<label class="form-label">Dikembalikan</label>
		<input type="date" class="form-control" name="tgldikembalikan">
	</div>

	<div class="mb-3">
		<label class="form-label"></label>
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
	</div>
		
	</form>
</div>