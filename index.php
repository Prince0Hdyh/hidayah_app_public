<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "koneksi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
?>

<?php 
$sql = $koneksi->query("select * from tb_profile ");
$data = $sql->fetch_assoc();
?>

<?php
$satu_hari = mktime(0,0,0,date("n"),date("j"),date("Y"));
function tglIndonesia($str){
    $tr = trim($str);
    $str = str_replace(
        ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 
         'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 
         'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        $tr
    );
    return $str;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="robots" content="noindex, nofollow">
<title>Catatan Pengunjung</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="assets/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="sw/dist/sweetalert.css">
<script src="sw/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="admin/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="assets/custom.css">
<style>
  #webcam{background:rgba(0,0,0,0.4);border-radius:5px;}
  .ambilfoto{color:#fff;padding:0 30px 0 5px;line-height:1;height:30px;margin:0 5px;background:transparent url(assets/camera.png) no-repeat center right;background-size:auto 22px;}
  @media (max-width: 992px) { 
    #webcam{margin:0 auto;text-align:center;}
  }
</style>
<link rel="stylesheet" href="assets/responsive.css">
</head>
<body class="color-body">

<?php
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo "
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        swal({
            title: 'Sukses!',
            text: 'Pencatatan berhasil disimpan.',
            icon: 'success',
            button: 'OK'
        });
    });
    </script>
    ";
}
?>

<div class="latar-bottom"><img src="assets/login-backg.png"></div>
<div class="header-home">
  <div class="container-custom flexleft">
    <div class="header-home-left">
      <a href="index.php">
        <div class="flexleft">
          <div class="header-home-logo">
            <img src="admin/images/<?php echo $data['foto'] ?>">
          </div>
          <div class="header-home-title">
            <h1><?php echo $data['nama_perusahaan'] ?></h1>
          </div>
        </div>
      </a>
    </div>
    <div class="header-home-right">
      <div class="tanggal">
        <p><b><?php echo tglIndonesia(date('D, d F Y', $satu_hari)); ?></b></p> 
        <p id='clock'></p>
      </div>
      <div class="flexright" style="gap:10px; display:flex; align-items:center;">
        <?php 
        $page = $_GET['page'] ?? '';
        if ($page=="") { ?>
          <a href="?page=spk">
            <div class="link-top flexright" style="background:#007bff; color:white;">IKM</div>
          </a> 
        <?php } else { ?>
          <a href="index.php">
            <div class="link-top flexright" style="background:#007bff; color:white;">Register Tamu</div>
          </a> 
        <?php } ?>
        <a href="admin/login.php" style="text-decoration:none;">
          <div class="link-top merah flexright" style="background:#d9534f;">Login Admin</div>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="container-custom">
  <div class="row">
    <div class="left-register">
      <div class="left-register-margin">
        <div class="left-register-inner">
          <div class="judul">
            <h2>Selamat datang</h2>
            <h1 style="color:#007bff;">Catatan Pengunjung</h1>
            <h3><b><?php echo $data['nama_perusahaan'] ?></b><br/><br/></h3>
          </div>
          <div class="left-register-image"><img src="admin/images/<?php echo $data['foto2'] ?>"></div>
        </div>
      </div>
    </div>

    <div class="right-register">
      <div class="tab-content" id="myTabContent">
        <form role="form" method="POST" enctype="multipart/form-data" action="upload.php" >
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="form-register">
              <?php 
              if ($page=="") { ?>
                <div class="reg">
                  <div class="heading-register"><h2>Register Pengunjung</h2></div>
                </div>
              <?php } else { ?>
                <div class="heading-register"><h2 style="color:#ffffff;">Indek Kepuasan</h2></div>
              <?php } ?>

              <div class="form-register-inner">
                <?php include "isi.php"; ?>
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var detik = <?php echo date('s'); ?>;
  var menit = <?php echo date('i'); ?>;
  var jam   = <?php echo date('H'); ?>;
   
  function clock()
  {
      if (detik!=0 && detik%60==0) {
          menit++;
          detik=0;
      }
      second = detik;
       
      if (menit!=0 && menit%60==0) {
          jam++;
          menit=0;
      }
      minute = menit;
       
      if (jam!=0 && jam%24==0) {
          jam=0;
      }
      hour = jam;
       
      if (detik<10){
          second='0'+detik;
      }
      if (menit<10){
          minute='0'+menit;
      }
       
      if (jam<10){
          hour='0'+jam;
      }
      waktu = hour+':'+minute+':'+second;
       
      document.getElementById("clock").innerHTML = waktu;
      detik++;
  }

  setInterval(clock,1000);
</script>

<script src="jquery-1.10.2.min.js"></script>
<script src="jquery.chained.min.js"></script>

<script>
  $("#pegawai").chained("#unit_kerja");
</script>

<script src="admin/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
$(function () {
  $('.select2').select2()
})
</script>

<style>
  .heading-register {
  background-color: #007bff;
  padding: 10px;
  border-radius: 5px;
}
.heading-register h2 {
  color: #ffffff;
  margin: 0;
}

.header-home-title h1 {
  color: #007bff; /* warna biru */
}


</style>

</body>
</html>
