<?php
include'../koneksi.php';
$idbuku=$_POST['idtransaksi'];
$judul=$_POST['idanggota'];
$kategori=$_POST['idbuku'];
$pengarang=$_POST['tglpinjam'];
$penerbit=$_POST['tglkembali'];
	
if(isset($_POST['simpan'])){
	$sql = 
	"INSERT INTO tbtransaksi
		VALUES('$idbuku','$judulbuku','$kategori','$pengarang','$penerbit')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=peminjaman");
}
?>