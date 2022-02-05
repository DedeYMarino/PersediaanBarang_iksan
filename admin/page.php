 
<?php 
  
    $page = isset($_GET['p']) ? $_GET['p'] : "";

    if ($page == 'formpesan') {
        include_once "formpesan.php";
    } else if ($page=="") {
        include_once "main.php";
    } else if ($page=="datapesanan") {
        include_once "datapesanan.php";
    }  else if ($page=="material") {
        include_once "material.php";
    } else if ($page=="tambahmaterial") {
        include_once "tambahmaterial.php";
    } else if ($page=="user") {
        include_once "user.php";
    }  else if ($page=="edit") {
        include_once "editmaterial.php";
    } else if ($page=="hapus") {
        include_once "hapusmaterial.php";
    } else if ($page=="hapususer") {
        include_once "hapususer.php";
    } else if ($page=="edituser") {
        include_once "edituser.php";
    } else if ($page=="tambahuser") {
        include_once "tambahuser.php";
    } else if ($page=="cetakstok") {
        include_once "halcetak.php";
    } else if($page == "detil"){
        include_once "detilpesan.php";
    } else if($page == "jurnal"){
        include_once "jurnal.php";
    } else if($page == "inputjurnal"){
        include_once "inputjurnal.php";
    }
    else if($page == "bioskop"){
        include_once "bioskop.php";
    } else if($page == "tambahbioskop"){
        include_once "tambahbioskop.php";
    } else if($page == "editbioskop"){
        include_once "editbioskop.php";
    } else if($page == "hapusbioskop"){
        include_once "hapusbioskop.php";

    } else if($page == "suplier"){
        include_once "suplier.php";
    } else if($page == "tambahsuplier"){
        include_once "tambahsuplier.php";
    } else if($page == "hapussuplier"){
        include_once "hapussuplier.php";
    } else if($page == "editsuplier"){
        include_once "editsuplier.php";
    }

    else if($page == "pembayaran"){
        include_once "pembayaran.php";
    } else if($page == "inputpembayaran"){
        include_once "inputpembayaran.php";
    } else if($page == "gantipassword"){
        include_once "gantipassword.php";
    } 
 ?>
 
