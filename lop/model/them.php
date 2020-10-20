<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrungmalop($mma){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select malop from lop where malop ='$mma'";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)>0){
		return true;
	}
	else{ 
		return false;
	}
}
if(isset($_POST["thamso"]["malop"]) and isset($_POST["thamso"]["tenlop"])){
	$malop=$_POST["thamso"]["malop"];
	$tenlop=$_POST["thamso"]["tenlop"];
	$siso=$_POST["thamso"]["siso"];
	$makhoa=$_POST["thamso"]["makhoa"];
	if(kiemtratrungmalop($malop)){
		echo "Mã lớp đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="INSERT INTO `lop`(`malop`, `tenlop`, `siso`, `makhoa`) VALUES ('$malop','$tenlop','$siso','$makhoa')";
		$thucthi=$conn->query($sql);
		if($thucthi){
			echo "Thêm thành công";
		}
		else{
			echo "Có lỗi xảy ra vui lòng kiểm tra lại";
		}
	}
	
}
else{
	echo "thêm không thành công";
}
?>