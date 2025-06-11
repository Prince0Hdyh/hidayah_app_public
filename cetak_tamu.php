
<?php 
	  include "koneksi/koneksi.php";
	  $id_tamu = $_GET['id_tamu'];

	  $sql = $koneksi->query("select * from tb_register where id_tamu='$id_tamu'");
	  $data = $sql->fetch_assoc();
	   


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

<div style="text-align:  center; font-size: 20px; font-weight: bold; margin-top: 100px;">
	
<img src="upload/<?php echo $data['foto']; ?>" width="300" height="300"  alt=""><br><br>

<div style="color: green;">
	
Nama Tamu : <?php echo $data['nama'] ?></div>
<div style="color: green;">
	
Alamat : <?php echo $data['alamat'] ?></div>
<div style="color: green;">
	
Instansi : <?php echo $data['instansi'] ?></div>

<div style="color: green;">
	
Keperluan : <?php echo $data['keperluan'] ?></div>

<div style="color: green;">
	
Ketemu : <?php echo $data['ketemu'] ?></div>




</div>

</body>