<?php
include "koneksi.php";

$id_relasi = $_POST['id_relasi'];
$id_user = $_POST['id_user'];
$level_admin = $_POST['level_admin'];
$status = $_POST['status'];

$query = mysql_query("UPDATE relasi SET
	id_relasi='$id_relasi', 
	id_user='$id_user',
	level_admin='$level_admin',
	status='$status'
	WHERE id_relasi='$id_relasi'");

echo '<meta http-equiv="refresh" content="0;url=../table2.php">';
?>