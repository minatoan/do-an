<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrungnamhoc($nh){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select namhoc from dangkyphongthuchanh where namhoc ='$nh'";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)>0){
		return true;
	}
	else{ 
		return false;
	}
}
if(isset($_POST["thamso"]["hocky"]) and isset($_POST["thamso"]["namhoc"])){
	$hocky=$_POST["thamso"]["hocky"];
	$namhoc=$_POST["thamso"]["namhoc"];
	if(kiemtratrungnamhoc($namhoc)){
		echo "Mã  đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="INSERT INTO `dangkyphongthuchanh`(`hocky`, `namhoc`) VALUES ('$hocky','$namhoc')";
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