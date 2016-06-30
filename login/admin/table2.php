<?php
@session_start();
include "action/koneksi.php";
        if(empty($_SESSION)){
                echo '<meta http-equiv="refresh" content="0;url=../index.php">';
}else{ 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
    include "include/head.php";
?>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Database Email</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="action/logout.php" onclick="return confirm('Yakin ingin Logout?')" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>
                   <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>   
                      <li>
                        <a class="active-menu"  href="#"><i class="fa fa-table fa-3x"></i> Tabel Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="table.php">Belum Dibaca</a></li>
                            <li><a class="active-menu" href="table2.php">Sudah Dibaca</a></li>
                        </ul>
                    </li>  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Tabel Data <?php
                            $username = $_SESSION['username'];
                            $e = mysql_query("SELECT * FROM admin WHERE username = '$username'");
                            while($e2 = mysql_fetch_array($e)){
                        echo $e2['nama_divisi']; ?></h2>   
                        <h5>Berikut adalah data
                                 <?php echo $e2['nama_divisi'];
                                        }
                                ?>, Love to see you back. </h5>
                    </div>
                </div>  
                 <!-- /. ROW  -->
                 <hr />
               

                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <!-- isi content" .. "-->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <input type="text" id="search" placeholder="Type to search">
                                <table class="table table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Perusahaan/Komunitas</th>
                                            <th>Tujuan</th>
                                            <th>Jenis Pengiriman</th>
                                            <th>Email</th>
                                            <th>No Handphone</th>
                                            <th>Isi</th>
                                            <th>File</th>
                                        </tr>
                                    </thead>

<?php
                
                    $level = $_SESSION['level_admin'];
                    $batas   = 10;
                    $halaman = @$_GET['halaman'];
                    if(empty($halaman)){
                        $posisi  = 0;
                        $halaman = 1;
                    }
                    else{ 
                      $posisi  = ($halaman-1) * $batas; 
                    }


                    $query = "SELECT user.*, relasi.*
                                FROM user,relasi
                                WHERE user.id_user = relasi.id_user
                                AND relasi.level_admin = '$level'
                                AND relasi.status = '1'
                                group by user.id_user order by user.id_user LIMIT $posisi,$batas";
                    $process = mysql_query($query);
                    $no = $posisi+1;
                    while($result = mysql_fetch_array($process)) { 

                             //jenis_pengiriman
                            $jp = $result['jenis_pengiriman'];
                            if ($jp=="1") {
                                $jp="Instansi Pendidikan";
                            }
                            if ($jp=="2") {
                                $jp="Perusahaan";
                            }
                            if ($jp=="3") {
                                $jp="Pemerintah";
                            }
                            if ($jp=="4") {
                                $jp="Personal";
                            }


                            //tujuan
                            $tj = $result['tujuan'];
                            if ($tj=="1") {
                                $tj="Media Partner";
                            }
                            if ($tj=="2") {
                                $tj="Event";
                            }
                            if ($tj=="3") {
                                $tj="Iklan";
                            }
                            if ($tj=="4") {
                                $tj="Bisnis";
                            }

                ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $no; ?>
                                        <input type="hidden" name="id_relasi" value="<?php echo $result['id_relasi']; ?>"/>
                                        <input type="hidden" name="id_user" value="<?php echo $result['id_user']; ?>"/>
                                        <input type="hidden" name="level_admin" value="<?php echo $result['level_admin']; ?>"/>
                                    </td>
                                    <td><?php echo $result['nama']; ?></td>
                                    <td><?php echo $result['asal']; ?></td>
                                    <td><?php echo $tj; ?></td>
                                    <td><?php echo $jp; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td><?php echo $result['no_hp']; ?></td>
                                    <td><?php echo $result['isi']; ?></td>
                                    <td><a href="action/tampil_pdf.php?file=<?php echo $result['file'];?>"><?php echo $result['file']; ?></a></td>
                                </tr>
                    <?php    $no++; }  ?>
                                    </tbody>
                                </table>
                    <?php
                    $query2     = mysql_query("SELECT user.*, relasi.*
                                FROM user,relasi
                                WHERE user.id_user = relasi.id_user
                                AND relasi.level_admin = '$level'
                                AND relasi.status = '1'
                                group by user.id_user order by user.id_user");
                    $jmldata    = mysql_num_rows($query2);
                    $jmlhalaman = ceil($jmldata/$batas);

                        echo "<br> Halaman : ";

                    for($i=1;$i<=$jmlhalaman;$i++)
                    if ($i != $halaman){
                        echo " <a href=\"table.php?halaman=$i\">$i</a> | ";
                    }
                    else{ 
                        echo " <b>$i</b> | "; 
                    }
                        echo "<p>Jumlah Total : <b>$jmldata</b> data</p>";
                    ?>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

     <!--searching-->
    <script type="text/javascript">
    var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>

         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
<?php mysql_close($koneksi); } ?>