<?php
include "../../ketnoicsdl/ketnoi.php";
if(isset($_POST["thamso"]["ID"])){
	$ID=$_POST["thamso"]["ID"];
	$sql="DELETE FROM `dangkyphongthuchanh` WHERE dangkyphongthuchanh.ID='$ID'";
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