
<!DOCTYPE html>
<html lang="id">
  <head>
 <?php 
    include "include/head.php";
    include "action/koneksi.php";
  ?>
  </head>
  <body>
  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 left">
          <div class="card" style="overflow:hidden">
            <div class="card-image waves-effect waves-block waves-light">
              
            </div>
           <form method="POST" Action="action/action_input_user.php" enctype="multipart/form-data">
            <div class="card-content">
              <h4>Selamat Data Anda berhasil kami simpan.</h4>
              <h6> Tunggu Sebentar. Halaman akan dialihkan ke halaman awal</h6>
              <?php echo '<meta http-equiv="refresh" content="2;url=index.php">'; ?>
          </div>
        </div>
      </div>

    </div>
  </div>

  <footer class="page-footer red darken-4">
    <div class="footer-copyright">
      <div class="container">
      Submit Database Email <a class="white-text text-lighten-3" href="">Good News from Indonesia</a>
      </div>
    </div>
  </footer>



    <!--  Scripts-->
<?php
  include "include/script.php";
?>


  </body>
</html>