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
	$malopcu=$_POST["thamso"]["malopcu"];
	if(kiemtratrungmalop($malop) and $malop !=$malopcu){
		echo "Mã lớp đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="UPDATE `lop` SET `malop`='$malop',`tenlop`='$tenlop',`makhoa`='$makhoa',`siso`='$siso' WHERE malop ='$malopcu'";
		$thucthi=$conn->query($sql);
		if($thucthi){
			echo "Sửa thành công";
		}
		else{
			echo "Có lỗi xảy ra vui lòng kiểm tra lại";
		}
	}
	
}
else{
	echo "sửa không thành công";
}
?>