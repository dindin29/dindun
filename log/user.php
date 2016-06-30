<?php
// memulai session
@session_start();
error_reporting(0);
if (isset($_SESSION['level_admin']))
{
	// jika level admin
	if ($_SESSION['level_admin'] == "0")
   {   
   		echo '<meta http-equiv="refresh" content="0;url=superadmin/index.php">';
   }
   // jika kondisi level user maka akan diarahkan ke halaman lain
   else if ($_SESSION['level_admin'])
   {
       echo '<meta http-equiv="refresh" content="0;url=admin/index.php">';
   }
}
if (!isset($_SESSION['level_admin']))
{
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
}
 ?>
