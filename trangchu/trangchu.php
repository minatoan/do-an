<!DOCTYPE html>
<html>
	<head>
		<title> Quản lý đăng ký phòng máy </title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" type="text/css" href="../css/easyui.css">
		<link rel="stylesheet" type="text/css" href="../css/icon.css">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.easyui.min.js"></script>
	</head> 
	<body background="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/images/br.png">
		<?php
			session_start(); 
			$mand=$_SESSION["mand"];
			$sql= "select nguoidung.*, khoa.tenkhoa FROM nguoidung,khoa WHERE khoa.makhoa=nguoidung.makhoa and mand='$mand'";
			include "../ketnoicsdl/ketnoi.php";
			$thucthi=mysqli_fetch_array($conn->query($sql));
			//echo $thucthi["manhom"];
		?>
		<div id="main"> <!--bao toàn bộ khung websize-->
			<div class="banner" style="background-color:#1ba693;">
				<img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/images/header.png" width="1000" height="100">
				
			</div>			<!--end phần banner-->
			
			<div id="maincontent"> <!--phần bao của content-->
				<div id="right"><!--phan menu ben phai-->
					<div class="dinhdang">
						<h1 style="text-align: center;">CHỨC NĂNG</h1>
						<div id="menuright">
							<ul>
								<?php if ($thucthi["manhom"]!='n01') {?>
									<li>
										<a class="home-menu-item" href="../dangkythuchanh/view" title="" style="text-align: center;">
											<img src="../images/folder_icon.png" width="70px" height="70px" alt="Thông Tin Đăng Kí">
											<div class="menu-item-name" >Đăng ký phòng thực hành</div>
										</a> 
									</li>
								<?php } ?>

								<?php if ($thucthi["manhom"]=='n01') {?>	
									<li>
										<a class="home-menu-item" href="../lichhoclythuyet/view/" title="" style="text-align: center;">
											<img src="../images/icon-tkb.png" width="70px" height="70px alt="Lịch Học Lý Thuyết">
											<div class="menu-item-name">Lịch học lý thuyết</div>
										</a>
									</li>
								<?php } ?>

								<?php if ($thucthi["manhom"]!='n01') {?>
									<li>
										<a class="home-menu-item" href="../lichhoclythuyetnguoidung/view/" title="" style="text-align: center;">
											<img src="../images/icon-tkb.png" width="70px" height="70px alt="Lịch Học Lý Thuyết">
											<div class="menu-item-name">Lịch học lý thuyết</div>
										</a>
									</li>
								<?php } ?>

								<?php if ($thucthi["manhom"]=='n01') {?>
									<li>
										<a class="home-menu-item" href="../dangkythuchanhadmin/view" title="" style="text-align: center;">
											<img src="../images/folder_icon.png" width="70px" height="70px" alt="Thông Tin Đăng Kí">
											<div class="menu-item-name" >Quản lý đăng ký</div>
										</a> 
									</li>
								<?php } ?>

								<?php if ($thucthi["manhom"]=='n01') {?>	
									<li>
										<a class="home-menu-item" href="../dangkyphongthuchanhtudong/view/" title="" style="text-align: center;">
											<img src="../images/attachment-register_icon.png" width="70px" height="70px alt="Lịch Học Lý Thuyết">
											<div class="menu-item-name">Đăng ký tự động</div>
										</a>
									</li>
								<?php } ?>

								<?php if ($thucthi["manhom"]=='n01') {?>
									<li>
										<a class="home-menu-item" href="../phong/view/" title="" style="text-align: center; width: 106px;">
											<img src="../images/icon-home.png" width="70px" height="70px alt="Thông Tin Phòng Thực Hành">
											<div class="menu-item-name">Phòng</div>
										</a>
									</li> 
								<?php } ?>

								<?php if ($thucthi["manhom"]=='n01') { ?>
									<li>
										<a class="home-menu-item" href="../khoa/view/" title="" style="text-align: center; padding-left: 70px;">
											<img src="../images/green_folder_icon.png" width="70px" height="70px alt=" Khoa ">
											<div class="menu-item-name">Khoa</div>
										</a>
									</li>

									<li>
										<a class="home-menu-item" href="../lop/view/" title="" style="text-align: center; padding-left: 42px; width: 106px;">
											<img src="../images/class.png" width="70px" height="70px alt="Lớp">
											<div class="menu-item-name">Lớp</div>
										</a>
									</li>

									<li>
										<a class="home-menu-item" href="../nguoidung/view/" title="" style="text-align: center; padding-left: 60px; ">
											<img src="../images/icon-user.png" width="70px" height="70px alt="Người Dùng">
											<div class="menu-item-name">Giảng viên</div>
										</a>
									</li>

									
									<li>
										<a class="home-menu-item" href="../monhoc/view/" title="" style="text-align: center; padding-left: 42px; width: 106px;">
											<img src="../images/icon-book.png" width="70px" height="70px alt="Môn Học">
											<div class="menu-item-name">Môn học</div>
										</a>
									</li>
								</ul>
							<?php } ?>
						</div>
					</div><!--end phan dinh dang chung-->
				</div> <!--end phan menu ben phai-->

				<div id='content'>
					<div class="dinhdang" style="text-align: center;"><!--phan dinh dang chung cho content va right-->
						<h1>THÔNG TIN GIẢNG VIÊN</h1>
						<div id="noidung"><!--đinh dang cho noi dung-->
							<button style="float: left; margin-left: 17px; transition: 0.5s all; -webkit-transition: 0.5s all; -moz-transition: 0.5s all; -o-transition: 0.5s all;-ms-transition: 0.5s all; font-size: 15px; padding: 5px 20px; background-image: -webkit-gradient(linear, left top, left bottom, from(#acd6ef), to(#6ec2e8)); border: 1.5px solid #66add6; border-radius: 5px;" >
									<a href="../dangnhap/doimatkhau.php" style="text-decoration: none;">Đổi mật khẩu</a>
							</button>

							<button style=" margin-left: 5px; transition: 0.5s all; -webkit-transition: 0.5s all; -moz-transition: 0.5s all; -o-transition: 0.5s all;-ms-transition: 0.5s all; font-size: 15px; padding: 5px 20px; background-image: -webkit-gradient(linear, left top, left bottom, from(#acd6ef), to(#6ec2e8)); border: 1.5px solid #66add6; border-radius: 5px;" >
									<a href="../dangnhap/dangxuat.php" style="text-decoration: none;" >Đăng xuất</a>
							</button><br>
							Mã giảng viên:<?php echo $thucthi["mand"]?> <br>
							Tên giảng viên: <?php  echo $thucthi["tennd"]?> <br>
							Ngày sinh: <?php  echo $thucthi["ngaysinh"]?>  <br>
							Giới tính: <?php  echo $thucthi["gioitinh"]?>  <br>
							Số điện thoại:<?php  echo $thucthi["sdt"]?>  <br>
							Email: <?php  echo $thucthi["email"]?> <br>
							Địa chỉ: <?php  echo $thucthi["diachi"]?> <br>
							Tên khoa: <?php  echo $thucthi["tenkhoa"]?> <br>
						</div><!--end đinh dang cho noi dung-->
					</div><!--end phan dinh dang chung cho content va right-->
				</div>
			</div> <!--end phần bao của content-->
		    <div id="footer" style="text-align: center;"> <!--phan cuoi trang-->
				<div style="background-color:#6ec2d1; width: 1000px; height: 100px;" >
					<div class="banner2" style="width: 800px; text-align: left;">
					<img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/images/footer.png" width="1000" height="100">
		          	</div>
				</div>
			</div> <!--end phan cuoi trang-->
		</div> <!--end bao toàn bộ khung websize-->	
	</body>
    </h
