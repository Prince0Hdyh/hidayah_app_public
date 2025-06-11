<?php 


	$nama = $_GET['nama'];
    $pertanyaan = $_GET['pertanyaan'];
    $jawaban = "Sangat Puas";
    $unit_kerja = $_GET['unit_kerja'];


    $sql = $koneksi->query("insert into tb_spk (nama, pertanyaan, jawaban, id_unit_kerja)values('$nama', '$pertanyaan', '$jawaban', '$unit_kerja')");
    
     $sql = $koneksi->query("update tb_tamu set status='sudah' where nama='$nama'");

    if ($sql) {
    	
            
         echo "

                    <script>
                        setTimeout(function() {
                            swal({
                                title: 'TERIMA KASIH..!!',
                                text: 'Anda Telah Membantu Kami Untuk Melayani Lebih Baik Lagi.',
                                type: 'success'
                            }, function() {
                                window.location ='index.php';
                            });
                        }, 300);
                    </script>

            ";      

        }

 ?>