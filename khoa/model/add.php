<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrungmakhoa($mak){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select makhoa from khoa where makhoa ='$mak'";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)>0){
		return true;
	}
	else{ 
		return false;
	}
}
if(isset($_POST["thamso"]["makhoa"]) and isset($_POST["thamso"]["tenkhoa"])){
	$makhoa=$_POST["thamso"]["makhoa"];
	$tenkhoa=$_POST["thamso"]["tenkhoa"];
	if(kiemtratrungmakhoa($makhoa)){
		echo "Mã khoa đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="INSERT INTO `khoa`(`makhoa`, `tenkhoa`) VALUES ('$makhoa','$tenkhoa')";
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