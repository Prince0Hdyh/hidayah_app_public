<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$koneksi = new mysqli  ("localhost","root","","tamu_bali");
$content ='

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;     }
</style>


';
    $content .= '
<page>
    <h2 style="text-align:center;">Laporan Tamu</h2>
    <br>';


                if (isset($_POST['cetak'])) {
    
                $tgl1 = $_POST['tgl1'];
                $tgl2 = $_POST['tgl2'];

            }

    $content .='
    

    <p></p>
    <table border="1px" class="tabel" align="center">
    	
    		<tr>
    			<th align="center">No</th>
    			<th align="center">Tanggal</th>
    			<th align="center">Jam</th>
    			<th align="center">Nama</th>
    			<th align="center">Alamat</th>
                <th align="center">No Telpon</th>
    			<th align="center">Jenis Kelamin</th>
    			<th align="center">Ketemu</th>
    			<th align="center">Keperluan</th>
    			<th align="center">Foto</th>
               
    		</tr>';

    		
    			$tgl4 = date("d-m-Y");
    			

    			if (isset($_POST['cetak'])) {
	
				$tgl1 = $_POST['tgl1'];
				$tgl2 = $_POST['tgl2'];

				$no = 1;


				$sql = $koneksi->query("select * from tb_tamu where tanggal between '$tgl1' and '$tgl2' ");
				while ($data=$sql->fetch_assoc()) {

					 $jk = ($data['jk']==L)?"Laki-laki":"Wanita";  

					$content .='
					<tr>
		    			<td>'.$no++.' </td>
		    			<td> '.date('d F Y', strtotime( $data['tanggal'])).' </td>
		    			<td> '.$data['jam'].' </td>
		    			<td> '.$data['nama'].' </td>
		    			<td> '.$data['alamat'].' </td>
                          <td> '.$data['telp'].' </td>
		    			<td> '.$jk.' </td>
		    			
		    			
		    			<td> '.$data['ketemu'].' </td>
                        <td> '.$data['keperluan'].' </td>
		    			<td> <img src="upload/'.$data['foto'].' "  width="75" height="50">  </td>
                       
		    			
		    		</tr>
		    		';
		    		

				}

						
				}else{	
    			

    		
        		$no = 1;
        		$sql = $koneksi->query("select * from tb_tamu");
        		while ($data=$sql->fetch_assoc()) {
        		$jk = ($data['jk']==L)?"Laki-laki":"Wanita";  
    	
    		$content .='

    		<tr>
    			<td>'.$no++.' </td>
    			<td> '.date('d F Y', strtotime( $data['tanggal'])).' </td>
    			<td> '.$data['jam'].' </td>
    			<td> '.$data['nama'].' </td>
    			<td> '.$data['alamat'].' </td>
                <td> '.$data['telp'].' </td>
    			<td> '.$jk.' </td>
    			
    			
    			<td> '.$data['ketemu'].' </td>
                <td> '.$data['keperluan'].' </td>
    			<td> <img src="upload/'.$data['foto'].' "  width="75" height="50">  </td>
               

    		</tr>

    		';	
    		
    		}
    		}
    		
    		


$content .=' 	
    </table>

    
</page>';

    require_once('../../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','LEGAL','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('exemple.pdf');
?>