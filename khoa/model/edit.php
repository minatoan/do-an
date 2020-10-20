
<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrungmakhoa($mak){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select makhoa from khoa where makhoa ='$mak'";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)>0){
		return true;
	}
	else{ 
		return false;
	}
}
if(isset($_POST["thamso"]["makhoa"]) and isset($_POST["thamso"]["tenkhoa"])){
	$makhoa=$_POST["thamso"]["makhoa"];
	$tenkhoa=$_POST["thamso"]["tenkhoa"];
	$makhoacu=$_POST["thamso"]["makhoacu"];
	if(kiemtratrungmakhoa($makhoa) and $makhoa !=$makhoacu){
		echo "Mã khoa đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="UPDATE `khoa` SET `makhoa`='$makhoa',`tenkhoa`='$tenkhoa' WHERE makhoa='$makhoacu'";
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