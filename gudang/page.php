 
<?php 
  
    $page = isset($_GET['p']) ? $_GET['p'] : "";

    if ($page=="") {
        include_once "main.php";
    } else if ($page=="datapesanan") {
        include_once "datapesanan.php";
    }  else if ($page=="material") {
        include_once "material.php";
    } else if ($page=="cetakstok") {
        include_once "halcetak.php";
    } else if($page == "detil"){
        include_once "detilpesan.php";
    } else if ($page=="datapembelian") {
        include_once "datapembelian.php";
    } else if($page == "detilpembelian"){
        include_once "detilpembelian.php";
    } else if($page == "gantipassword"){
        include_once "gantipassword.php";
    } 
 ?>
 
