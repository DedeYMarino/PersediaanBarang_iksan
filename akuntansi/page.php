 
<?php 
  
    $page = isset($_GET['p']) ? $_GET['p'] : "";

    if ($page == 'akun') {
        include_once "akun.php";
    } else if ($page=="") {
        include_once "main.php";
    } else if($page == "jurnal"){
        include_once "jurnal.php";
    } else if($page == "inputjurnal"){
        include_once "inputjurnal.php";
    }
    else if($page == "tambahakun"){
        include_once "tambahakun.php";
    }
 ?>
 
