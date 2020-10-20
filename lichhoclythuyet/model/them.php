<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrung($phong,$hocky,$ngaybd,$ngaykt){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select phong,hocky,ngaybd,ngaykt from lichhoclythuyet where lichhoclythuyet.phong='$phong' AND lichhoclythuyet.hocky='$hocky' AND date_format('$ngaybd','%d-%m-%Y') >= date_format(lichhoclythuyet.ngaybd,'%d-%m-%Y') AND date_format('$ngaybd','%d-%m-%Y') <= date_format(lichhoclythuyet.ngaykt,'%d-%m-%Y') AND date_format('$ngaykt','%d-%m-%Y') >= date_format(lichhoclythuyet.ngaybd,'%d-%m-%Y') AND date_format('$ngaykt','%d-%m-%Y') <= date_format(lichhoclythuyet.ngaykt,'%d-%m-%Y') ";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)>0){
		return true;
	}
	else{ 
		return false;
	}
}
if(isset($_POST["thamso"]["mamon"]) and isset($_POST["thamso"]["mand"])){
	$ID=$_POST["thamso"]["ID"];
	$mamon=$_POST["thamso"]["mamon"];
	$mand=$_POST["thamso"]["mand"];
	$malophp=$_POST["thamso"]["malophp"];
	$sisolhp=$_POST["thamso"]["sisolhp"];
	$thu=$_POST["thamso"]["thu"];
	$tietlt=$_POST["thamso"]["sotietlt"];
	$sotietth=$_POST["thamso"]["sotietth"];
	$tiet=$_POST["thamso"]["tiet"];
	$ngaybd=$_POST["thamso"]["ngaybd"];
	$ngaybd=date("Y-m-d",strtotime($ngaybd));
	$ngaykt=$_POST["thamso"]["ngaykt"];
	$ngaykt=date("Y-m-d",strtotime($ngaykt));
	$hocky=$_POST["thamso"]["hocky"];
	$nienkhoa=$_POST["thamso"]["nienkhoa"];
	$malop=$_POST["thamso"]["malop"];
	$phong=$_POST["thamso"]["phong"];
	
	if(kiemtratrung($phong,$hocky,$ngaybd,$ngaykt)){
		echo "Đăng ký đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="INSERT INTO `lichhoclythuyet`(`ID`, `mand`, `malophp`, `sisolhp`, `mamon`, `thu`, `sotietlt`, `sotietth`, `tiet`, `ngaybd`, `ngaykt`, `hocky`, `nienkhoa`, `malop`, `phong`) VALUES ('','$mand','$malophp','$sisolhp','$mamon','$thu','$tietlt','$sotietth','$tiet','$ngaybd','$ngaykt','$hocky','$nienkhoa','$malop','$phong')";
		$thucthi=$conn->query($sql);
		if($thucthi){
			echo "thêm thành công";
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