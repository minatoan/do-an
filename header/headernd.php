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
	<div style="background-color:#1ba693;">
		<div class="banner" >
			<img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/images/banner12.jpg" width="1000" height="100">

		</div>
	</div>
	<div style="width: 1200px; text-align: right; margin: 0 auto">
		<button style="float: right; background-color: #FFFFFF ;" ><a href="../../trangchu/trangchu.php" style=" text-decoration: none;">Trang chủ</a></button>
		<button style="float: right; background-color: #FFFFFF"><a href="../../dangnhap/dangxuat.php" style="text-decoration: none;">Đăng xuất</a></button>
	</div>
</body>
		