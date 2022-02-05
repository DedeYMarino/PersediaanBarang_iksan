 
<?php 
  
    $page = isset($_GET['p']) ? $_GET['p'] : "";

    if ($page == 'material') {
        include_once "material.php";
    } else if ($page=="") {
        include_once "main.php";
    } else if ($page=="datapesanan") {
        include_once "datapesanan.php";
    } else if($page == "cetakpesanan"){
        include_once "cetakpesan.php";
    }
    else if ($page=="datapembelian") {
        include_once "datapembelian.php";
    } else if ($page=="editpembelian") {
        include_once "editpembelian.php";
    } else if ($page=="editpesan") {
        include_once "editpesan.php";
    } else if ($page=="tidaksetuju") {
        include_once "tidaksetuju.php";
    } else if ($page=="disetujui") {
        include_once "disetujui.php";
    } else if($page == "detil"){
        include_once "detilpesan.php";
    } else if($page == "detilpembelian"){
        include_once "detilpembelian.php";
    } else if($page == "bioskop"){
        include_once "bioskop.php";
    } else if($page == "tambahbioskop"){
        include_once "tambahbioskop.php";
    } else if($page == "editbioskop"){
        include_once "editbioskop.php";
    } else if($page == "hapusbioskop"){
        include_once "hapusbioskop.php";
    } 
    else if($page == "suplier"){
        include_once "suplier.php";
    } else if($page == "tambahsuplier"){
        include_once "tambahsuplier.php";
    } else if($page == "editsuplier"){
        include_once "editsuplier.php";
    } else if($page == "hapussuplier"){
        include_once "hapussuplier.php";
    } 

    else if($page == "pemasukan"){
        include_once "pemasukan.php";
    } else if($page == "gantipassword"){
        include_once "gantipassword.php";
    } 
 ?>
 
