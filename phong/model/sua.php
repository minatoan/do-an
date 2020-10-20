<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrungmaphong($maphong){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select maphong from phong where maphong ='$maphong'";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)>0){
		return true;
	}
	else{ 
		return false;
	}
}
if(isset($_POST["thamso"]["maphong"]) and isset($_POST["thamso"]["tenphong"])){
	$maphong=$_POST["thamso"]["maphong"];
	$tenphong=$_POST["thamso"]["tenphong"];
	$somay=$_POST["thamso"]["somay"];
	$ghichu=$_POST["thamso"]["ghichu"];
	$maphongcu=$_POST["thamso"]["maphongcu"];
	if(kiemtratrungmaphong($maphong) and $maphong !=$maphongcu){
		echo "Mã phòng đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="UPDATE `phong` SET `maphong`='$maphong',`tenphong`='$tenphong',`somay`='$somay',`ghichu`='$ghichu' WHERE maphong ='$maphongcu'";
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