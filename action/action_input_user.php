<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$asal = $_POST['asal'];
$jenis_pengiriman = $_POST['jenis_pengiriman'];
$tujuan = $_POST['tujuan'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$isi = $_POST['isi'];
$nama_file = $_POST['nama_file'];


$query = "INSERT INTO user SET

nama='$nama',
asal='$asal',
jenis_pengiriman='$jenis_pengiriman',
tujuan='$tujuan',
email='$email',
no_hp='$no_hp',
isi='$isi',
file='$nama_file'";


$simpan=mysql_query($query);

$id_user = mysql_insert_id();
	$level_admin = $_POST ['level_admin'];

	$query1 = "INSERT INTO relasi SET
	id_user='$id_user',
	level_admin='$level_admin'";

	$simpan1=mysql_query($query1);

echo '<meta http-equiv="refresh" content="0;url=../index2.php">';

?>


