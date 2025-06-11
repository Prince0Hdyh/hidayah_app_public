<?php 

    date_default_timezone_set('Asia/Jakarta');
     $tgl=date('Y-m-d');
   


 ?>


<div class="kepuasan-judul flexcenter">
  <h1 style="text-align: center;" class="box-title">Pilih Nama Anda</h1>
</div>


<div class="kepuasan">
    <div class="withscroll">
    
      
      <div class="kepuasan-inner">
                  
               
                <!-- /.box-header -->
           
                    <?php

                          $query = $koneksi->query("SELECT * FROM tb_tamu where tanggal='$tgl' and status!='sudah'  ORDER by jam desc");

                          while ($data=$query->fetch_assoc()) {
                            $foto=$data['foto'];
                            $nama = $data['nama'];
                            $id_tamu = $data['id_tamu'];

                            $jumlah = $query->num_rows;

    

                      ?>



  
                <div class="box-kepuasan">
                  <a href="?page=spk&aksi=spk_aksi&nama=<?php echo $nama ?>" title="">

               <div class="box-kepuasan-image">
                      <img src="upload/<?php echo $foto ?>" width="130" style="max-height: 200px; border-radius: 10px;">
                </div>
                <div class="box-kepuasan-title">
            <div class="box-kepuasan-nama flexcenter">      
                      <?php echo $nama; ?>

               </div>
               </div>       
                     

                      </a>

                   </div>   
                      
                   


                    <?php } ?>



              </div>
              
              </div>

              </div>      
                   
                
                  <!-- /.users-list -->
               
            <!-- /.col -->
          

                          




    