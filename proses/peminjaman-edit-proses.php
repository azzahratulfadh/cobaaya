<?php
include'../koneksi.php';

$idbuku=$_POST['idtransaksi'];
$judul=$_POST['idanggota'];
$kategori=$_POST['idbuku'];
$pengarang=$_POST['tglpinjam'];
$penerbit=$_POST['tglkembali'];

If(isset($_POST['simpan'])){

	$sql = "UPDATE tbtransaksi
		SET idanggota='$judul',idbuku='$kategori',tglpinjam='$pengarang',idkembali='$penerbit'
		WHERE idtransaksi=".$_POST['idtransaksi']."";

	var_dump($sql);
	
	mysqli_query($db,$sql);
	header("location:../index.php?p=peminjaman");
}
?>
