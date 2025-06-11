<?php 
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date('Y-m-d');
    $jam = date("H:i:s");
?>

<!-- Form Elements -->
<div class="box box-danger box-solid">
  <div class="box-header with-border"></div>
  <div class="panel-body">
    <div class="row">
      <form role="form" method="POST" enctype="multipart/form-data" action="upload.php">
        <div class="col-md-4">   
          <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" class="form-control" >
          </div>

          <div class="form-group">
            <label>Alamat :</label>
            <textarea class="form-control" rows="3" name="alamat"></textarea>
          </div>

          <div class="form-group">
            <label>No Telpon :</label>
            <input type="text" name="telp" id="telp" class="form-control" >
          </div> 

          <div class="form-group">
            <label>Asal Instansi :</label>
            <input type="text" name="instansi" class="form-control" >
          </div> 
        </div>

        <div class="col-md-4"> 
          <div class="form-group">
            <label>Keperluan :</label>
            <textarea class="form-control" rows="3" name="perlu"></textarea>
          </div>

          <label> Jenis Kelamin</label>
          <select class="form-control" name="jk">
            <option>--Pilih Jenis Kelamin--</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
          <br>

          <div class="form-group">
            <label>Bertemu :</label>
            <input type="text" name="temu" class="form-control" id="nama" data-toggle="modal" data-target="#modal-default" readonly="">
          </div>

          <input type="hidden" name="no_hp" id="no_hp" class="form-control">
          <input type="hidden" name="unit_kerja" id="unit_kerja" class="form-control">
        </div>

        <div class="col-md-4">    
          <p>Ambil Foto</p>
          <div id="camera">Capture</div></p>

          <div id="webcam">
            <input type="button" value="Capture" class="btn btn-warning" onClick="preview()">
          </div>
          <div id="simpan" style="display:none">
            <input type="button" value="Batal" class="btn btn-danger" onClick="batal()">
            <input type="submit" id="btnSaveSign" name="save" value="Simpan" onClick="simpan()" >
            <input type="hidden" name="image" class="image-tag">
          </div>
        </div>     
      </form>
    </div>  
  </div>  
</div> 

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('telp').addEventListener('input', function() {
      document.getElementById('no_hp').value = this.value;
    });
  });
</script>
