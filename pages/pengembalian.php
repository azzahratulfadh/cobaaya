<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tampil data Pengembalian</h1>
        
</div>
	
	<p id="tombol-tambah-container"><a href="index.php?p=pengembalian-input" class="btn btn-primary">Tambah Pengembalian</a>
	
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" style="margin-left: 20px;" class="tombol"></form>
	</FORM>
	</p>
	<table class="table table-bordered table-striped">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>ID Peminjaman</th>
			<th>ID Anggota</th>
			<th>ID Buku</th>			
			<th>Tanggal Peminjaman</th>
			<th>Tanggal Pengembalian</th>
			<th>Tanggal Dikembalikan</th>
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
				$sql = "SELECT * FROM tbtransaksi WHERE idbuku LIKE '%$pencarian%'
						OR idanggota LIKE '%$pencarian%'
						OR idtransaksi LIKE '%$pencarian%'
						OR tglpinjam LIKE '%$pencarian%'
						OR tglkembali LIKE '%$pencarian%'";
				
				$query = $sql;
				$queryJml = $sql;	
						
			}
			else {
				$query = "SELECT * FROM tbtransaksi WHERE tgldikembalikan LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbtransaksi WHERE tgldikembalikan";
				$no = $posisi * 1;
			}			
		}
		else {
			$query = "SELECT * FROM tbtransaksi WHERE tgldikembalikan LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbtransaksi WHERE tgldikembalikan";
			$no = $posisi * 1;
		}
		
		//$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC";
		$q_tampil_pinjam = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_pinjam)>0)
		{
		while($r_tampil_pinjam=mysqli_fetch_array($q_tampil_pinjam)){
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_pinjam['idtransaksi']; ?></td>
			<td><?php echo $r_tampil_pinjam['idanggota']; ?></td>
			<td><?php echo $r_tampil_pinjam['idbuku']; ?></td>
			<td><?php echo $r_tampil_pinjam['tglpinjam']; ?></td>
			<td><?php echo $r_tampil_pinjam['tglkembali']; ?></td>
			<td><?php echo $r_tampil_pinjam['tgldikembalikan']; ?></td>
			
			<td>
				<a href="index.php?p=peminjaman-edit&id=<?php echo $r_tampil_pinjam['idtransaksi'];?>" class="btn btn-warning btn-sm">Edit</a>
				<a href="proses/peminjaman-hapus.php?id=<?php echo $r_tampil_pinjam['idbuku']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="btn btn-danger btn-sm">Hapus</a>
			</td>			
		</tr>		
		<?php $nomor++;  
		}}
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}
		?>		
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
						echo "<a href=\"?p=buku&hal=$i\" style='background-color: yellow; padding: 8px; border-radius:10px; text-decoration:none;'>$i</a>";

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
