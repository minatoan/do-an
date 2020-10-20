<?php
include "../../ketnoicsdl/ketnoi.php";
if(isset($_POST["thamso"]["maphong"])){
	$maphong=$_POST["thamso"]["maphong"];
	$sql="DELETE FROM `phong` WHERE phong.maphong='$maphong'";
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