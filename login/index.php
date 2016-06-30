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
echo "sukses";
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
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Good News From Indonesia</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <h3 color="red" > Website Admin email</h3>
  <form method="post" action="" class="login">
    <p> <?php if(!empty($notif)) { echo $notif; }  ?></p>
      <label for="login">ID Divisi:</label>
      <input type="text" name="username" required>
    </p>

    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" required>
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">Login</button>
    </p>
  </form>

  <section class="about">
    <p class="about-links">
      <a href="http://www.cssflow.com/snippets/dark-login-form" target="_parent">View Article</a>
      <a href="http://www.cssflow.com/snippets/dark-login-form.zip" target="_parent">Download</a>
    </p>
    <p class="about-author">
      &copy; 2012&ndash;2013 <a href="http://thibaut.me" target="_blank">Thibaut Courouble</a> -
      <a href="http://www.cssflow.com/mit-license" target="_blank">MIT License</a><br>
      Original PSD by <a href="http://365psd.com/day/2-234/" target="_blank">Rich McNabb</a>
  </section>
</body>
</html>
