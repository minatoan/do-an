<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrungmamh($mamh){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select mamon from monhoc where mamon ='$mamh'";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)>0){
		return true;
	}
	else{ 
		return false;
	}
}
if(isset($_POST["thamso"]["mamon"]) and isset($_POST["thamso"]["tenmh"])){
	$mamon=$_POST["thamso"]["mamon"];
	$tenmh=$_POST["thamso"]["tenmh"];
	$magv=$_POST["thamso"]["magv"];	
	$sotclythuyet=$_POST["thamso"]["sotclythuyet"];
	$sotcthuchanh=$_POST["thamso"]["sotcthuchanh"];	
	$ghichu=$_POST["thamso"]["ghichu"];
	if(kiemtratrungmamh($mamon)){
		echo "Mã môn đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sqlmonhoc="INSERT INTO `monhoc`(`mamon`, `tenmon`, `mota`, `sotclythuyet`, `sotcthuchanh` ) VALUES ('$mamon','$tenmh','$ghichu','$sotclythuyet' ,'$sotcthuchanh')";
		$thucthimonhoc=$conn->query($sqlmonhoc);

		$sqlgvmh="INSERT INTO `gvmh`(`id`, `mamon`, `mand`) VALUES ('','$mamon','$magv')";
		$thucthigvmh=$conn->query($sqlgvmh);
		if($thucthimonhoc and $thucthigvmh){
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