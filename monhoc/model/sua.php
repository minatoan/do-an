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
	$mamoncu=$_POST["thamso"]["mamoncu"];
	if(kiemtratrungmamh($mamon) and $mamon !=$mamoncu){
		echo "Mã môn đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sqlmonhoc="UPDATE `monhoc` SET `mamon`='$mamon',`tenmon`='$tenmh',`mota`='$ghichu', `sotclythuyet` = '$sotclythuyet', `sotcthuchanh` = '$sotcthuchanh'  WHERE mamon ='$mamoncu'";
		$thucthimonhoc=$conn->query($sqlmonhoc);

		$sqlgvmh="UPDATE `gvmh` SET `mamon`='$mamon',`mand`='$magv' WHERE mamon ='$mamoncu' and mand='$magv'";
		$thucthigvmh=$conn->query($sqlgvmh);
		if($thucthimonhoc and $thucthigvmh){
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