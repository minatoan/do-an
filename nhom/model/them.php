<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrungmanhom($mma){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select manhom from nhom where manhom ='$mma'";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)>0){
		return true;
	}
	else{ 
		return false;
	}
}
if(isset($_POST["thamso"]["manhom"]) and isset($_POST["thamso"]["tennhom"])){
	$manhom=$_POST["thamso"]["manhom"];
	$tennhom=$_POST["thamso"]["tennhom"];
	$quyen=$_POST["thamso"]["quyen"];
	$ghichu=$_POST["thamso"]["ghichu"];
	if(kiemtratrungmanhom($manhom)){
		echo "Mã nhóm đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="INSERT INTO `nhom`(`manhom`, `tennhom`, `ghichu`, `quyen`) VALUES ('$manhom','$tennhom','$quyen','$ghichu')";
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