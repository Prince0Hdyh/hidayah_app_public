<?php 


	$nama = $_GET['nama'];
    $pertanyaan = $_GET['pertanyaan'];
    $jawaban = "Cukup Puas";
    $unit_kerja = $_GET['unit_kerja'];

   $sql = $koneksi->query("insert into tb_spk (nama, pertanyaan, jawaban, id_unit_kerja)values('$nama', '$pertanyaan', '$jawaban', '$unit_kerja')");

    if ($sql) {
    	

    	 echo "

                    <script>
                        setTimeout(function() {
                            swal({
                                title: 'Survey Berhasil Disimpan!',
                                text: 'Ke Survey Berikutnya',
                                type: 'success'
                            }, function() {
                                window.location ='index.php?page=spk3&nama=$nama&unit_kerja=$unit_kerja';
                            });
                        }, 300);
                    </script>

            ";      
    }

 ?>