<?php 

    $page = $_GET['page'];
    $aksi = $_GET['aksi'];

     if ($page == "spk") {

          if ($aksi=="") {
             include "spk_form.php";
          }


          if ($aksi=="spk_aksi") {
             include "spk.php";
      }
      
     }


     if ($page == "spk2") {

          if ($aksi=="") {
             include "spk2.php";
          }


          
      
     }



     if ($page == "spk3") {

          if ($aksi=="") {
             include "spk3.php";
          }


          
      
     }


     if ($page == "sangat_puas") {

          if ($aksi=="") {
             include "sangat_puas.php";
          }

      
     }

     if ($page == "puas") {

          if ($aksi=="") {
             include "puas.php";
          }

      
     }


     if ($page == "cukup_puas") {

          if ($aksi=="") {
             include "cukup_puas.php";
          }

      
     }

     if ($page == "tidak_puas") {

          if ($aksi=="") {
             include "tidak_puas.php";
          }

      
     }



      if ($page == "sangat_puas2") {

          if ($aksi=="") {
             include "sangat_puas2.php";
          }

      
     }

     if ($page == "puas2") {

          if ($aksi=="") {
             include "puas2.php";
          }

      
     }


     if ($page == "cukup_puas2") {

          if ($aksi=="") {
             include "cukup_puas2.php";
          }

      
     }

     if ($page == "tidak_puas2") {

          if ($aksi=="") {
             include "tidak_puas2.php";
          }

      
     }




      if ($page == "sangat_puas3") {

          if ($aksi=="") {
             include "sangat_puas3.php";
          }

      
     }

     if ($page == "puas3") {

          if ($aksi=="") {
             include "puas3.php";
          }

      
     }


     if ($page == "cukup_puas3") {

          if ($aksi=="") {
             include "cukup_puas3.php";
          }

      
     }

     if ($page == "tidak_puas3") {

          if ($aksi=="") {
             include "tidak_puas3.php";
          }

      
     }




     if ($page == "tamu_umum") {

      if ($aksi=="") {
         include "tamu_umum.php";
      }
      
     }

      if ($page == "cektamuumum") {

      if ($aksi=="") {
         include "qrcode/cektamuumum.php";
      }
      
     }

     


    if ($page == "") {
      
        include "home.php";
      
    }


    



   



 ?>