<?php
include'../koneksi.php';

$idbuku=$_POST['idbuku'];
$judul=$_POST['judulbuku'];
$kategori=$_POST['kategori'];
$pengarang=$_POST['pengarang'];
$penerbit=$_POST['penerbit'];

If(isset($_POST['simpan'])){

	$sql = "UPDATE tbbuku
		SET judulbuku='$judul',kategori='$kategori',pengarang='$pengarang',penerbit='$penerbit'
		WHERE idbuku=".$_POST['idbuku']."";

	var_dump($sql);
	
	mysqli_query($db,$sql);
	header("location:../index.php?p=buku");
}
?>
