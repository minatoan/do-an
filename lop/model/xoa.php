<?php
include "../../ketnoicsdl/ketnoi.php";
if(isset($_POST["thamso"]["malop"])){
	$malop=$_POST["thamso"]["malop"];
	$sql="DELETE FROM `lop` WHERE lop.malop='$malop'";
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