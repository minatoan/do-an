<?php
include "../../ketnoicsdl/ketnoi.php";
if(isset($_POST["thamso"]["manhom"])){
	$manhom=$_POST["thamso"]["manhom"];
	$sql="DELETE FROM `nhom` WHERE nhom.manhom='$manhom'";
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