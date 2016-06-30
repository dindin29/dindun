
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
              <img class="activator" src="http://himatifums.org/wp-content/uploads/2015/03/GoodNews-From-INdonesia.png">
              <span class="card-title">Email Database</span>
            </div>
           <form id="upload_form" action="action/action_input_user.php" enctype="multipart/form-data" id="submitanu" name="submitanu" method="post" onsubmit="return validate()">
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">Form Submit</span>
              <div class="row">
                  <div class="row msg-container" style="display:none">
                    <div class="col s12">
                      <div class="card-panel" id="msg-type">
                        <span class="white-text msg">
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input placeholder="Nama Lengkap" name="nama" type="text" required class="validate">
                      <label for="name" >Nama Lengkap</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input placeholder="Instansi/Perusahaan/Komunitas" name="asal" type="text" required class="validate">
                      <label for="name">Instansi/Perusahaan/Komunitas</label>
                    </div>
                  </div>
                  <div class="form-group">
                  <label>Jenis Pengiriman : </label>
                  <select class="form-control" name="jenis_pengiriman" required>
                      <option value="1">Instansi Pendidikan</option>
                      <option value="2">Perusahaan</option>
                      <option value="3">Pemerintah</option>
                      <option value="4">Personal</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Tujuan : </label>
                  <select class="form-control" name="tujuan" required>
                      <option value="1">Media Partner</option>
                      <option value="2">Event</option>
                      <option value="3">Iklan</option>
                      <option value="4">Press Release</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Divisi : </label>
                  <select class="form-control" name="level_admin" required>
                      <option value="1">Bussines & Partner</option>
                      <option value="2">IT Support</option>
                      <option value="3">Sales</option>
                      <option value="4">Komunitas</option>
                      <option value="5">Redaksi</option>
                  </select>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input placeholder="Email" name="email" type="email" required class="validate">
                      <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input placeholder="08xxxxxxxxx" name="no_hp" type="text" required class="validate">
                      <label for="mobile">No. HP (opsional)</label>
                    </div>
                  </div>
                  
                  

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea name="isi" class="materialize-textarea" length="250" required placeholder="Pesan untuk GNFI"></textarea>
                      <label for="message">Pesan</label>
                    </div>
                  </div>
                <div class="row video upload">
                  <div class="input-field col s12">
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>File</span>
                        <input type="file" multiple name="file" id="file" data-url='action/action_upload_file.php' onchange="ValidateSingleInput(this);">
                        <input type='hidden' name="nama_file" id="nama_file">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                    <div class="progress progress-upload" style="display:none">
                        <div class="indeterminate"></div>
                    </div>
                    <div class="row upload-container" style="display:none">
                      <div class="col s12">
                        <div class="card-panel" id="upload-type">
                          <span class="white-text upload-msg">
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
            </div>
            <div class="card-action">
              <div class="progress" style="display:none">
                  <div class="indeterminate"></div>
              </div>
              <button class="btn waves-effect waves-light" type="submit">Submit
                <i class="material-icons right">send</i>
              </button>
             </div>
            </form>
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

 
<script type="text/javascript">
  var file = $("#file");
        var nama_file = $("#nama_file");

        file.fileupload({
          dataType: 'json',
          acceptFileTypes: /(\.|\/)(doc|docx|pdf)$/i,
          formData : function(form){
            return [{ name: 'file', value: '9334a2f5fd78b9c1548b9d94f81ff6f8' }];
          },
          beforeSend: function()
          {
            $(".progress-upload").show();
          },
          uploadProgress: function(event, position, total, percentComplete)
          {
            $(".progress-upload").show();
          },
          success: function (response){
            $(".progress-upload").fadeOut('slow');
            //$.getJSON(response);
            //console.log(response);
            if(response.status==0){
              $('#upload-type').addClass('red darken-4');
              $('.upload-msg').html(response.message);
            } else if(response.status==1){
              $('#upload-type').addClass('green accent-3');
              $('.upload-msg').html(response.message);
              file.prop('disabled', true);
              nama_file.val(response.name);
            }
            $('.upload-container').show();

          },
           error: function(data, status, e) {
            //console.log(data+'---'+status+'---'+e);
          }
        });

        $('#btn-save').click(function(){
            $('#submitanu').submit();
        });

</script>
 <script>
var _validFileExtensions = [".pdf", ".docx", ".doc"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;


                }
            }
             
            if (!blnValid) {
                alert("Maaf, file " + sFileName + " bukan " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}

  </script>



  </body>
</html>