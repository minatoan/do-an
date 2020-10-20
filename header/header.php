<?php
	session_start();
	if(!isset($_SESSION['mand'])){
		header("Location: ../../dangnhap/dangnhap.html");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản lý đăng ký phòng máy thực hành</title>
	<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/css/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/css/home.css">
	<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/css/icon.css">
	<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/css/demo.css">
	<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/js/home.js"></script>
	<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/js/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/js/datagrid-detailview.js"></script>
	<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/js/thuvien.js"></script>
</head>
<body>
	<div style="width: 1200px; text-align: right; margin: 0 auto; background-color:#1ba693;">
		<div class="banner" >
			<img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/images/header.png" width="1000" height="100">

		</div>
	</div>

	
	<div style="width: 1200px; text-align: right; margin: 0 auto">
		<button style="float: right; margin-left: 3px; transition: 0.5s all; -webkit-transition: 0.5s all; -moz-transition: 0.5s all; -o-transition: 0.5s all; -ms-transition: 0.5s all; font-size: 15px; padding: 5px 10px; background-image: -webkit-gradient(linear, left top, left bottom, from(#acd6ef), to(#6ec2e8)); border: 1.5px solid #66add6; border-radius: 5px;" >
			<a href="../../dangnhap/dangxuat.php" style="text-decoration: none;">Đăng xuất</a>
		</button>

		<button style="float: right; transition: 0.5s all; -webkit-transition: 0.5s all; -moz-transition: 0.5s all; -o-transition: 0.5s all; -ms-transition: 0.5s all; font-size: 15px; padding: 5px 10px; background-image: -webkit-gradient(linear, left top, left bottom, from(#acd6ef), to(#6ec2e8)); border: 1.5px solid #66add6; border-radius: 5px;" >
			<a href="../../trangchu/trangchu.php" style=" text-decoration: none;">Trang chủ</a>
		</button>
	</div>
</body>
		<?php
			if(!isset($_SESSION)) {
			     session_start();
			}
			$mand=$_SESSION["mand"];
			$sql= "select nguoidung.*, khoa.tenkhoa FROM nguoidung,khoa WHERE khoa.makhoa=nguoidung.makhoa and mand='$mand'";
			include "../../ketnoicsdl/ketnoi.php";
			$thucthi=mysqli_fetch_array($conn->query($sql));
			
		?>