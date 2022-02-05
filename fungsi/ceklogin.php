<?php  

	if (isset($_SESSION['login'])) {
		if ($_SESSION['level'] == "unit_pelayanan") {
			header("location:bioskop/index.php");
		} else if ($_SESSION['level'] == "admin_gudang"){
			header("location:admin/index.php");
		} else if ($_SESSION['level'] == "asisten_manajer"){
			header("location:receiving/index.php");
		} else {
			header("location:index.php");
		}
	}

?>