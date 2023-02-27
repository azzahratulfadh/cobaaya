<?php
include'../koneksi.php';

$idbuku=$_POST['idtransaksi'];
$sekarang = $_POST['tgldikembalikan'];

If(isset($_POST['simpan'])){

	$sql = "UPDATE tbtransaksi
		SET tgldikembalikan = '$sekarang'
		WHERE idtransaksi=".$_POST['idtransaksi']."";

	var_dump($sql);
	
	mysqli_query($db,$sql);
	header("location:../index.php?p=pengembalian");
}
?>
