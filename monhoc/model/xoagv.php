<?php
include "../../ketnoicsdl/ketnoi.php";
if(isset($_POST["thamso"]["id"])){
	$id=$_POST["thamso"]["id"];
	$sql="DELETE FROM `gvmh` WHERE gvmh.id='$id'";
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