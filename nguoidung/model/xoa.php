<?php
include "../../ketnoicsdl/ketnoi.php";
if(isset($_POST["thamso"]["mand"])){
	$mand=$_POST["thamso"]["mand"];
	$sql="DELETE FROM `nguoidung` WHERE nguoidung.mand='$mand'";
	$thucthi=$conn->query($sql);
	if($thucthi){
			echo "Xóa thành công";
	}
	else{
		echo "Có lỗi xảy ra vui lòng kiểm tra lại";
	}
	
}
else{
	echo " Xóa không thành công";
}

?>