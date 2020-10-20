<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrungmamh($mgv,$mamh){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select mand from gvmh where mand ='$mgv' and mamon='$mamh'";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)>0){
		return true;
	}
	else{ 
		return false;
	}
}
if(isset($_POST["thamso"]["tennd"]) ){
	$tennd=$_POST["thamso"]["tennd"];
	$mamh=$_POST["thamso"]["mamh"];
	if(kiemtratrungmamh($tennd,$mamh)){
		echo "Tên giảng viên đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sqlgvmh="INSERT INTO `gvmh`(`id`, `mamon`, `mand`) VALUES ('','$mamh','$tennd')";
		$thucthigvmh=$conn->query($sqlgvmh);
		if( $thucthigvmh){
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