<?php

@session_start();
if($_POST) {
include 'action/koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
// query untuk mendapatkan record dari username
$query = "SELECT * FROM admin WHERE username = '$username'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
// cek kesesuaian password
if ($password == $data['password'])
{
    // menyimpan username dan level ke dalam session
    $_SESSION['level_admin'] = $data['level_admin'];
    $_SESSION['username'] = $data['username'];
    $notif = "<center>Please wait ...</center>";
    echo '<meta http-equiv="refresh" content="2;url=user.php">';
}
else{
    $notif = "<center>Username/Password Salah</center>";
    }

}

?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Good News From Indonesia</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="main-wrap">
      <form method="post" action="">
        <div class="login-main">
            <input type="text" placeholder="Masukkan ID Divisi" name="username" class="box1 border1" required>
            <input type="password" placeholder="Password" name="password" class="box1 border2" required>
            <input type="submit" class="send" value="Go">
            <p> <?php if(!empty($notif)) { echo $notif; }  ?></p>    
        </div>
      </form>
    </div>
    
    
    
    
    
  </body>
</html>
