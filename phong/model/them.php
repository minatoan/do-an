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
	if(kiemtratrungmaphong($maphong)){
		echo "Mã phòng đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="INSERT INTO `phong`(`maphong`, `tenphong`, `somay`, `ghichu`) VALUES ('$maphong','$tenphong','$somay','$ghichu')";
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