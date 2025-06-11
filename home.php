<?php 

    date_default_timezone_set('Asia/Jakarta');
    $tgl=date('Y-m-d');
    $jam=date("H:i:s");


 ?>


<!-- Form Elements -->
<div class="box-tamu">
    <div class="row">
        <form role="form" method="POST" enctype="multipart/form-data" action="upload.php" >
        <div class="column-isian">   
        <div class="column-isian-margin">  
        <div class="margin-min5">
            <div class="column-2">
            <div class="pd-lr-5">
            <div class="form-group">
                <input type="text" name="nama"  class="form-control" placeholder="Nama"   required="">
            </div>
            </div>
            </div>
            <div class="column-2">
            <div class="pd-lr-5">
            <div class="form-group">
                <input type="text" name="telp"  class="form-control" placeholder="No Telpon"  required="">
            </div>
            </div>
            </div>
            <div class="column-2">
            <div class="pd-lr-5">
            <div class="form-group">

                 <select class="form-control" name="jk"  required="">
                    <option>--Pilih Status Tamu--</option>
                    <option value="L">Dosen</option>
                    <option value="P">Mahasiswa</option>
                </select>
            </div>
            </div>
            </div>
            <div class="column-2">
            <div class="pd-lr-5">
            <div class="form-group">
                <select class="form-control" name="jk"  required="">
                    <option>--Pilih Jenis Kelamin--</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            </div>
            </div>
            <div class="column-100">
            <div class="pd-lr-5">
            <div class="form-group">
                <input type="text" name="alamat"  class="form-control" placeholder="Alamat"  required="">
            </div>
            </div>
            </div>
            <div class="column-100">
            <div class="pd-lr-5">
                <div class="form-group">
                    <div class="isian-left">
                    <label>Bertemu</label>
                    </div>
                    <div class="isian-right">
                    <select class="form-control select2"  name="pegawai"  required="">

                        <option value=""> Pilih Bertemu   </option>
                      <?php
                           
                            $query = $koneksi->query("SELECT * FROM tb_pegawai2 ORDER BY nip");
                                        
                            while ($row = $query->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $row['nip']; ?>">
                                    <?php echo $row['nama_peg']; ?>
                                </option>
                     <?php
                        
                            }
                        ?>
                    </select>        
                    </div>
                </div>
            </div>
            </div>
            <div class="column-100">
            <div class="pd-lr-5">
                <div class="form-group">
                    <div class="isian-left">
                    <label>Keperluan</label>
                    </div>
                    <div class="isian-right">
                    <select class="form-control select2"  name="perlu"  required="">
                        <option value=""> Pilih Keperluan   </option>
                        <?php
                           
                            $query = $koneksi->query("SELECT * FROM tb_perlu ORDER BY id");
                                        
                            while ($row = $query->fetch_assoc()) {
                         ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['judul']; ?>
                                </option>
                        <?php
                            }
                         ?>
                    </select> 
                    </div>
                </div>
            </div>
            </div>

        </div>
        </div>
        </div>
                  
        <div class="box-camera"> 
            <div class="ambil flexright"><p class="flexcenter">Ambil Foto</p></div>
            <div id="camera">Capture</div>
             <div class="tombol flexright">            
            <div id="webcam" style="float:right;margin-top:5px;">
                <input type=button value="Submit" class="btn ambilfoto" onClick="preview()" style="float:right;height:30px;">
            </div>
            <div id="simpan" style="display:none;margin-top:5px;float:right;">
                <input type=button value="Batal" class="btn batal" onClick="batal()">
                <input type="submit" id="btnSaveSign" name="save" value="Register" class="btn btn-success" onClick="simpan()" >
                <input type="hidden" name="image" class="image-tag">
            </div>
            </div>
        </div> 
      </form>

    </div>  
    </div>  



 <script src="webcam/webcam.min.js"></script>
    <script language="Javascript">
        // konfigursi webcam
        Webcam.set({
            width: 280,
            height: 210,
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
            $(".image-tag").val(data_uri);
           
                
                Webcam.unfreeze();

                document.getElementById('webcam').style.display = '';
                document.getElementById('simpan').style.display = 'none';

                 
                 
                 
            } );
        }
    </script>



    <script type="text/javascript">
        var detik = 56;
        var menit = 23;
        var jam   = 20;
         
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

        

    <script src="admin/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
        //Date range as a button
        $('#daterange-btn').daterangepicker(
          {
            ranges   : {
              'Today'       : [moment(), moment()],
              'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month'  : [moment().startOf('month'), moment().endOf('month')],
              'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
          },
          function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
          }
        )

        //Date picker
        $('#datepicker').datepicker({
          autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
          showInputs: false
        })
      })
    </script>   


   



    