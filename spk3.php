<?php 

	
		
	  $nama = $_GET['nama'];

     $unit_kerja = $_GET['unit_kerja'];
	  $sql = $koneksi->query("select * from  pertanyaan where id=4");

	  $data = $sql->fetch_assoc();

	  $pertanyaan = $data['pertanyaan']; 



 ?>

             
  <div class="pertanyaan">
        <h1 style="text-align: center; ">
          
         3. <?php echo $pertanyaan; ?>
          
        </h1>
        
      </div> 
        
      <div class="margin-min5">    
                                
                         
  <div class="column-4">
      <div class="pd-lr-5">

        <a href="?page=sangat_puas3&nama=<?php echo $nama; ?>&pertanyaan=<?php echo $pertanyaan ?>&unit_kerja=<?php echo $unit_kerja ?>" title="">
           <div class="box-jawaban flexleft">
          <div class="jawaban-icon">
                 <img src="img/sangat_puas.png">   
            </div>       

                  <p  >SANGAT PUAS</p> 

             

           
           </div>  

               

        </a>
        </div>  
    </div>    
    
      <div class="column-4">
      <div class="pd-lr-5">

        <a href="?page=puas3&nama=<?php echo $nama; ?>&pertanyaan=<?php echo $pertanyaan ?>&unit_kerja=<?php echo $unit_kerja ?>" title="">
           <div class="box-jawaban flexleft">
          <div class="jawaban-icon">
                 <img src="img/puas.png">   
            </div>       

                  <p  >PUAS</p> 

             

           
           </div>  

               

        </a>
        </div>  
    </div>  
        <!-- /.col -->

        <div class="column-4">
      <div class="pd-lr-5">

        <a href="?page=cukup_puas3&nama=<?php echo $nama; ?>&pertanyaan=<?php echo $pertanyaan ?>&unit_kerja=<?php echo $unit_kerja ?>" title="">
           <div class="box-jawaban flexleft">
          <div class="jawaban-icon">
                 <img src="img/cukup.png">   
            </div>       

                  <p  >CUKUP PUAS</p> 

             

           
           </div>  

               

        </a>
        </div>  
    </div>  
        

         <div class="column-4">
      <div class="pd-lr-5">

        <a href="?page=tidak_puas3&nama=<?php echo $nama; ?>&pertanyaan=<?php echo $pertanyaan ?>&unit_kerja=<?php echo $unit_kerja ?>" title="">
           <div class="box-jawaban flexleft">
          <div class="jawaban-icon">
                 <img src="img/tidak_puas.png">   
            </div>       

                  <p  >TIDAK PUAS</p> 

             

           
           </div>  

               

        </a>
        </div>  
    </div>