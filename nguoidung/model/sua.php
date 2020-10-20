<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrungmand($mand){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select mand from nguoidung where mand ='$mand'";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)>0){
		return true;
	}
	else{ 
		return false;
	}
}
if(isset($_POST["thamso"]["mand"]) and isset($_POST["thamso"]["tennd"])){
	$mand=$_POST["thamso"]["mand"];
	$tennd=$_POST["thamso"]["tennd"];
	$ngaysinh=$_POST["thamso"]["ngaysinh"];
	$ngaysinh=date("Y-m-d",strtotime($ngaysinh));
	$diachi=$_POST["thamso"]["diachi"];
	$sdt=$_POST["thamso"]["sdt"];
	$email=$_POST["thamso"]["email"];
	$gioitinh=$_POST["thamso"]["gioitinh"];
	$makhoa=$_POST["thamso"]["makhoa"];
	$manhom=$_POST["thamso"]["manhom"];
	$mandcu=$_POST["thamso"]["mandcu"];
	if(kiemtratrungmand($mand)and $mand !=$mandcu){
		echo "Mã người dùng đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="UPDATE `nguoidung` SET `mand`='$mand',`tennd`='$tennd',`ngaysinh`='$ngaysinh',`diachi`='$diachi',`sdt`='$sdt',`email`='$email',`gioitinh`='$gioitinh',`makhoa`='$makhoa', `manhom`='$manhom' WHERE mand ='$mandcu'";
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
	echo "Sửa không thành công";
}
?>