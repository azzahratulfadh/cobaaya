<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tampil data Anggota</h1>
        
</div>
	
	<p id="tombol-tambah-container"><a href="index.php?p=anggota-input" class="btn btn-primary">Tambah Anggota</a>
	<a target="_blank" href="pages/cetak.php"><img src="print.png" height="50px" height="50px"></a>
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" style="margin-left: 20px;" class="tombol"></form>
	</FORM>
	</p>
	<table class="table table-bordered table-striped">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>ID Anggota</th>
			<th>Nama</th>
			
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			
			<th id="label-opsi">Opsi</th>
		</tr>
		

		
		<?php
		$batas = 5;
		extract($_GET);
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
			$nomor = 1;
		}
		else {
			$posisi = ($hal - 1) * $batas;
			$nomor = $posisi+1;
		}	
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
			if($pencarian != ""){
				$sql = "SELECT * FROM tbanggota WHERE nama LIKE '%$pencarian%'
						OR idanggota LIKE '%$pencarian%'
						OR jeniskelamin LIKE '%$pencarian%'
						OR alamat LIKE '%$pencarian%'";
				
				$query = $sql;
				$queryJml = $sql;	
						
			}
			else {
				$query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbanggota";
				$no = $posisi * 1;
			}			
		}
		else {
			$query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbanggota";
			$no = $posisi * 1;
		}
		
		//$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC";
		$q_tampil_anggota = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_anggota)>0)
		{
		while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)){
			if(empty($r_tampil_anggota['foto'])or($r_tampil_anggota['foto']=='-'))
				$foto = "admin-no-photo.jpg";
			else
				$foto = $r_tampil_anggota['foto'];
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_anggota['idanggota']; ?></td>
			<td><?php echo $r_tampil_anggota['nama']; ?></td>
			
			<td><?php echo $r_tampil_anggota['jeniskelamin']; ?></td>
			
			<td>
				<a target="_blank" href="pages/cetak_kartu.php?id=<?php echo $r_tampil_anggota['idanggota'];?>" class="btn btn-info btn-sm">Cetak Kartu</a>
				<a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota'];?>" class="btn btn-warning btn-sm">Edit</a>
				<a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="btn btn-danger btn-sm">Hapus</a>
			</td>			
		</tr>		
		<?php $nomor++; } 
		}
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}?>		
	</table>
	<?php
	if(isset($_POST['pencarian'])){
	if($_POST['pencarian']!=''){
		echo "<div style=\"float:left;\">";
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Data Hasil Pencarian: <b>$jml</b>";
		echo "</div>";
	}
	}
	else{ ?>
		<div style="float: left;">		
		<?php
			$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			echo "Jumlah Data : <b>$jml</b>";
		?>			
		</div>		
		<div class="pagination" style="justify-content: right; margin-right: 20px; font-weight: bold; color: black;">		
				<?php
				$jml_hal = ceil($jml/$batas);
				for($i=1; $i<=$jml_hal; $i++){
					if($i != $hal){
						echo "<a href=\"?p=anggota&hal=$i\" style='background-color: yellow; padding: 8px; border-radius:10px; text-decoration:none;'>$i</a>";

					}
					else {
						echo "<a class=\"active\" style='background-color: skyblue; padding: 8px; border-radius:10px; text-decoration:none; '>$i</a>";
					}
				}
				?>

		</div>
	<?php
	}
	?>
