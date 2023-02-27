<?php
include'../koneksi.php';
$idbuku=$_POST['idbuku'];
$judul=$_POST['judulbuku'];
$kategori=$_POST['kategori'];
$pengarang=$_POST['pengarang'];
$penerbit=$_POST['penerbit'];
$status="Tersedia";
	
if(isset($_POST['simpan'])){
	$sql = 
	"INSERT INTO tbbuku
		VALUES('$idbuku','$judulbuku','$kategori','$pengarang','$penerbit','$status')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=buku");
}
?>