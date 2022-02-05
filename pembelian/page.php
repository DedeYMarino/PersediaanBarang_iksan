 
<?php 
  
    $page = isset($_GET['p']) ? $_GET['p'] : "";

    if ($page == 'formpembelian') {
        include_once "formpembelian.php";
    } else if ($page=="") {
        include_once "main.php";
    } else if ($page=="datapembelian") {
        include_once "datapembelian.php";
    } else if ($page=="hapusps") {
        include_once "hapusps.php";
    } else if ($page=="edit") {
        include_once "editpesan.php";
    } else if ($page=="hapus") {
        include_once "hapuspesan.php";
    } else if($page == "cetakpembelian"){
        include_once "cetakbeli.php";
    } else if($page == "detil"){
        include_once "detilpembelian.php";
    } else if($page == "material"){
        include_once "material.php";
    } else if($page == "tambahmaterial"){
        include_once "tambahmaterial.php";
    } else if($page == "editmaterial"){
        include_once "editmaterial.php";
    } else if($page == "hapusmaterial"){
        include_once "hapusmaterial.php";
    
    } else if($page == "suplier"){
        include_once "suplier.php";
    } else if($page == "suplier"){
        include_once "suplier.php";
    } else if($page == "tambahsuplier"){
        include_once "tambahsuplier.php";
    } else if($page == "editsuplier"){
        include_once "editsuplier.php";
    } else if($page == "hapussuplier"){
        include_once "hapussuplier.php";
    } 

    else if($page == "pembayaran"){
        include_once "pembayaran.php";
    } else if($page == "inputpembayaran"){
        include_once "inputpembayaran.php";
    } else if($page == "gantipassword"){
        include_once "gantipassword.php";
    } 
 ?>
 
