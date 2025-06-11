
<?php 
	  include "koneksi/koneksi.php";
	  $id_tamu = $_GET['id_tamu'];

	  $sql = $koneksi->query("select * from tb_register where id_tamu='$id_tamu'");
	  $data = $sql->fetch_assoc();
	   $qr_code = $data['qr_code'];



 ?>


  <style>

 		@media print{
 			input.noPrint{
 				display: none;
 			}
 		}
 		
 	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;     }
 		
 	
 </style>

 <script>
  

      window.print();
      window.onfocus=function() {window.close();}
        
  

</script>

<body onload="window.print()">

<div style="text-align:  center; font-size: 30px; font-weight: bold; margin-top: 100px;">
	
<img src="temp/<?php echo $data['qr_code']; ?>" width="300" height="300"  alt=""><br><br>

<div style="color: green;">
	
Registrasi Sukses</div>
<div style="color: red; font-size: 24px;">Silahkan Capture/Download QRCode Diatas<br>
Tunjukan Kepetugas Ketika akan Bertamu</div>



</div>

</body>