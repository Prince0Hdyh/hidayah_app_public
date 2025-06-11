<?php 

    date_default_timezone_set('Asia/Jakarta');
    $tgl=date('Y-m-d');
    $jam=date("H:i:s");


 ?>
<link href="css/jquery.signaturepad.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/numeric-1.2.6.min.js"></script> 
        <script src="js/bezier.js"></script>
        <script src="js/jquery.signaturepad.js"></script> 
        
        <script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
        <script src="js/json2.min.js"></script>
        
        
        <style type="text/css">
            body{
                font-family:monospace;
            
            }
            #btnSaveSign {
                color: #fff;
                background: #f99a0b;
                padding: 5px;
                border: none;
                border-radius: 5px;
                font-size: 20px;
                margin-top: 10px;
            }
            #signArea{
                width:304px;
              
            }
            .sign-container {
                width: 60%;
                margin: auto;
            }
            .sign-preview {
                width: 150px;
                height: 50px;
                border: solid 1px #CFCFCF;
                margin: 10px 5px;
            }
            .tag-ingo {
                font-family: cursive;
                font-size: 12px;
                text-align: left;
                font-style: oblique;
            }
        </style>



        <!-- Form Elements -->
       <div class="box box-success box-solid">
                        <div class="box-header with-border">
               
            </div>
            <div class="panel-body" >
                <div class="row">
                   
                        <form role="form" method="POST" enctype="multipart/form-data" action="upload.php" >
                          <div class="col-md-3">   

                            <div class="form-group">
                                <label>Nama :</label>
                                <input type="text" name="nama"  class="form-control"  >
                            </div>
                            
                             <div class="form-group">
                                      <label>Alamat :</label>
                                      <textarea class="form-control" rows="3" name="alamat"></textarea>
                                </div>

                             <div class="form-group">
                                    <label>No Telpon :</label>
                                    <input type="text" name="telp"  class="form-control" >
                                </div> 



                             <div class="form-group">
                            <div id="signArea" >
                                    <h2 class="tag-ingo">Tanda Tangan</h2>
                                    <div class="sig sigWrapper" style="height:auto;">
                                        <div class="typed"></div>
                                        <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
                                    </div>
                                </div>
                             </div>      

                           

                          </div>
                          
                           <div class="col-md-3">  
                               

                                <label> Jenis Kelamin</label>
                                 <select class="form-control" name="jk">

                                         <option>--Pilih Jenis Kelamin--</option>

                                         <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                                         
                                 </select>

                                 <br>
                            

                            <div class="form-group">
                                <label>Bertemu :</label>
                                <input type="text" name="temu" class="form-control" id="nama" data-toggle="modal" data-target="#modal-default"   readonly="">
                            </div>
							
							

                            

                           <div class="form-group">
                                      <label>Keperluan :</label>
                                      <textarea class="form-control" rows="3" name="perlu"></textarea>
                                </div>

                           


                            </div> 


                    <div class="col-md-6">    
                        
                         <p>Ambil Gambar</p>
                                <div id="camera">Capture</div></p>
                                
                                <div id="webcam">
                                    <input type=button value="Capture" class="btn btn-info" onClick="preview()">
                                </div>
                                <div id="simpan" style="display:none">
                                    <input type=button value="Batal" class="btn btn-danger" onClick="batal()">
                                    <input type="submit" id="btnSaveSign" name="save" value="Simpan" onClick="simpan()" class="btn btn-primary">
                                    

                                </div>
                             
                                <div id="hasil"></div>

                    </div>     
                               

	
	 
	
						</form>

               </div>  
               
               </div>  


               </div>  

  </div> 
              


                          


                     <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                 <center><h4 class="modal-title" id="myModalLabel">Pilih Pegawai</h4></center>
              </div>
              <div class="modal-body">
                <table class="table table-striped table-bordered table-hover" id="example1">
                                    <thead>
                                        <tr>
                                           
                                            <th>No HP</th>
                                            <th>NAMA</th>
                                            <th>JABATAN</th>
                                            
                                          
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            

                                            $sql = $koneksi->query("select * from tb_pegawai2, tb_u_kerja tb_pegawai2.id_u_kerja=tb_u_kerja.id ");

                                            while ($r= $sql->fetch_assoc()) {





                                       echo"
                                            <tr style='cursor:pointer' class='pilih' data-nama='$r[nama_peg]'  data-nip='$r[nip]'>
                                                
                                                <td>$r[nip]</td>
                                                <td>$r[nama_peg]</td>
                                                <td>$r[u_kerja]</td>
                                            </tr> 
                     
                                            ";
                                        }
                                        ?>

                                    </table>     

              </div>
              
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<script>
            $(document).ready(function() {
                $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
            });
            
            $("#btnSaveSign").click(function(e){
                html2canvas([document.getElementById('sign-pad')], {
                    onrendered: function (canvas) {
                        var canvas_img_data = canvas.toDataURL('image/png');
                        var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                        //ajax call to save image inside folder
                        $.ajax({
                            url: 'upload.php',
                            data: { img_data:img_data },
                            type: 'post',
                            dataType: 'json',
                            success: function (response) {
                               window.location.reload();
                            }
                        });
                    }
                });
            });
          </script> 

        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>
        


         <script type="text/javascript">

//            jika dipilih, nim akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                
                
                document.getElementById("nama").value = $(this).attr('data-nama');
				
                $('#modal-default').modal('hide');
            });
            

//            tabel lookup mahasiswa
            $(function () {
                $("#lookup").dataTable();
            });
        </script> 
    


 <script src="webcam/webcam.min.js"></script>
    <script language="Javascript">
        // konfigursi webcam
        Webcam.set({
            width: 500,
            height: 340,
            image_format: 'jpg',
            jpeg_quality: 100
        });
        Webcam.attach( '#camera' );
 
        function preview() {
            // untuk preview gambar sebelum di upload
            Webcam.freeze();
            // ganti display webcam menjadi none dan simpan menjadi terlihat
            document.getElementById('webcam').style.display = 'none';
            document.getElementById('simpan').style.display = '';
        }
        
        function batal() {
            // batal preview
            Webcam.unfreeze();
            
            // ganti display webcam dan simpan seperti semula
            document.getElementById('webcam').style.display = '';
            document.getElementById('simpan').style.display = 'none';
        }
        
        function simpan() {
            // ambil foto
            Webcam.snap( function(data_uri) {
                
                // upload foto
                Webcam.upload( data_uri, 'upload.php', function(code, text) {} );
 
                // tampilkan hasil gambar yang telah di ambil
                document.getElementById('hasil').innerHTML = 
                    '<p>Hasil : </p>' + 
                    '<img src="'+data_uri+'"/>';
                
                Webcam.unfreeze();

                document.getElementById('webcam').style.display = '';
                document.getElementById('simpan').style.display = 'none';

                 
                 
                 
            } );
        }
    </script>


    