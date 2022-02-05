<?php
session_start();


include "fungsi/koneksi.php";
include "fungsi/ceklogin.php";


$err="";

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$level = $_POST['level'];

	$query = "SELECT * FROM user WHERE username='$username' && password='$password'";
	$hasil = mysqli_query($koneksi, $query);
	
	if (!$hasil) {
		echo "ada error";
	} 

	if (mysqli_num_rows($hasil) == 0) {
		$err="
		<div class='row' style='margin-top: 15px';>
	       <div class='col-md-12'>
	        	<div class='box box-solid bg-red'>
	        		<div class='box-header'>
	        			<h3 class='box-title'>Login Gagal!</h3>
	        		</div>
	        		<div class='box-body'>
	        			<p>Username atau password yang anda masukan salah.</p>
	        		</div>
			    </div>
			 </div>
		 </div>
	</div>";
	} else {
		$row = mysqli_fetch_array($hasil);
		$_SESSION['username'] = $row['username'];
		$_SESSION['level'] = $row['level'];

		if($row['level'] == "bioskop" && $level == "bioskop"  ) {
			$_SESSION['login'] = true;
			header("location:bioskop/index.php");
		} else if ($row['level'] == "admin" && $level == "admin" ) {
			$_SESSION['login'] = true;
			header("location:admin/index.php");
			
		} else if ($row['level'] == "receiving" && $level == "receiving") {
			$_SESSION['login'] = true;
			header("location:receiving/index.php");

		} else if ($row['level'] == "pembelian" && $level == "pembelian") {
			$_SESSION['login'] = true;
			header("location:pembelian/index.php");

		}   else if ($row['level'] == "gudang" && $level == "gudang") {
			$_SESSION['login'] = true;
			header("location:gudang/index.php");

		} 
			// else if ($row['level'] == "akuntansi" && $level == "akuntansi") {
		// 	$_SESSION['login'] = true;
		// 	header("location:akuntansi/index.php");
		

		//} 
		else {
			$err="
		<div class='row' style='margin-top: 15px';>
	       <div class='col-md-12'>
	        	<div class='box box-solid bg-red'>
	        		<div class='box-header'>
	        			<h3 class='box-title'>Login Gagal!</h3>
	        		</div>
	        		<div class='box-body'>
	        			<p>Anda salah memilih level login.</p>
	        		</div>
			    </div>
			 </div>
		 </div>
	</div>";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Order Barang</title>
	<!-- Icon  -->
	<link rel="shortcut icon" type="image/icon" href="gambar/logo.png">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/bootstrap/css/custom.css" rel="stylesheet">
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" >
    <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet">
    <link href="assets/fa/css/font-awesome.min.css" rel="stylesheet">  
</head>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">        
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      	<h3 class="text-center">Aplikasi Order Barang </h3>
      	<img src="gambar/logo.png" style="width: 120px; height: 100px;">        
        <form method="post">
          <div class="form-group">           	
          	<div class="input-group">
          		<span class="input-group-addon"><i class="fa fa-user"></i></span>
	            <input type="text" class="form-control" placeholder="Username" name="username" required  />	            
            </div>
          </div>
          <div class="form-group">
          	<div class="input-group">
	            <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
	            <input  type="password" class="form-control" placeholder="Password" name="password"  required>
            </div>
          </div>
          <div class="form-group">
          	<div class="input-group col-md-7">          	
          		<span class="input-group-addon"><i class="fa fa-shield"></i></span>
	            <select class="form-control" name="level" required>            	
	            	<option value>[Pilih Level]</option>
	            	<!-- <option value="akuntansi">Akunting</option> -->
	            	<option value="bioskop">Bioskop</option>
	            	<option value="admin">Admin</option>
	            	<option value="receiving">Receiving</option>
	            	<option value="pembelian">Pembelian</option>
	            	<option value="gudang">Gudang</option>
	            </select>
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" class="btn btn-primary btn-block btn-flat pull-right" value="Login" name="login"/>
            
            </div><!-- /.col -->
          </div>
        </form>
       

      </div>
      <?= $err; ?>
      <!-- /.login-box-body 
      <div class="row" style="margin-top: 15px;">
	       <div class="col-md-12">
	        	<div class="box box-solid bg-red">
	        		<div class="box-header">
	        			<h3 class="box-title">Gagal Login</h3>
	        		</div>
	        		<div class="box-body">
	        			<p>Username atau password salah</p>
	        		</div>
	        	</div>
	        </div>
        </div>
    </div>
	-->     
    <!-- /.login-box -->

    <script src="assets/plugins/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
