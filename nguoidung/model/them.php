<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrungmand($mnd){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="SELECT * from nguoidung WHERE `mand` ='$mnd'";
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
	
	if(kiemtratrungmand($mand)){
		echo "Mã người dùng đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="INSERT INTO `nguoidung`(`mand`, `tennd`, `ngaysinh`, `diachi`, `sdt`, `email`, `gioitinh`, `matkhau`,`makhoa`,`manhom`)VALUES ('$mand','$tennd','$ngaysinh','$diachi','$sdt','$email','$gioitinh',md5('$mand'),'$makhoa','$manhom')";
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