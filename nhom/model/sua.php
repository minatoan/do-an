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
	$manhomcu=$_POST["thamso"]["manhomcu"];
	if(kiemtratrungmanhom($manhom) and $manhom !=$manhomcu){
		echo "Mã nhóm đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="UPDATE `nhom` SET `manhom`='$manhom',`tennhom`='$tennhom',`ghichu`='$ghichu',`quyen`='$quyen' WHERE manhom ='$manhomcu'";
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