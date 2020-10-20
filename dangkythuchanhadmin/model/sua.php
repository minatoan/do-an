<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrung($buoi,$maphong,$hocky,$ngaydangky,$ngaytraphong){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select maphong,buoi,hocky,ngaydangky,ngaytraphong from dangkyphongthuchanh where dangkyphongthuchanh.maphong='$maphong' AND dangkyphongthuchanh.buoi='$buoi' AND dangkyphongthuchanh.hocky='$hocky' AND date_format($ngaydangky,'%d-%m-%Y') >= date_format(dangkyphongthuchanh.ngaydangky,'%d-%m-%Y') AND date_format($ngaydangky,'%d-%m-%Y') <= date_format(dangkyphongthuchanh.ngaytraphong,'%d-%m-%Y') AND date_format($ngaytraphong,'%d-%m-%Y') >= date_format(dangkyphongthuchanh.ngaydangky,'%d-%m-%Y') AND date_format($ngaytraphong,'%d-%m-%Y') <= date_format(dangkyphongthuchanh.ngaytraphong,'%d-%m-%Y') ";
	
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)>0){
		return true;
	}
	else{ 
		return false;
	}
}
// && isset($_POST["thamso"]["tennd"])
if(isset($_POST["thamso"]["mand"]) ){
	$ID=$_POST["thamso"]["ID"];
	$mand=$_POST["thamso"]["mand"];
	$maphong=$_POST["thamso"]["maphong"];
	$mamon=$_POST["thamso"]["mamon"];
	$namhoc=$_POST["thamso"]["namhoc"];
	$ngaydangky=$_POST["thamso"]["ngaydangky"];
	$ngaydangky=date("Y-m-d",strtotime($ngaydangky));
	$ngaytraphong=$_POST["thamso"]["ngaytraphong"];
	$ngaytraphong=date("Y-m-d",strtotime($ngaytraphong));
	$thu=$_POST["thamso"]["thu"];
	$tuan=$_POST["thamso"]["tuan"];
	$sonhom=$_POST["thamso"]["sonhom"];
	$tiet=$_POST["thamso"]["tiet"];	
	$buoi=$_POST["thamso"]["buoi"];
	$hocky=$_POST["thamso"]["hocky"];	
	$ghichu=$_POST["thamso"]["ghichu"];
	// $trangthai=$_POST["thamso"]["trangthai"];
	$hocky=$_POST["thamso"]["hocky"];
	$ghichu=$_POST["thamso"]["ghichu"];
	$buoicu=$_POST["thamso"]["buoicu"];
	$maphongcu=$_POST["thamso"]["maphongcu"];
	$hockycu=$_POST["thamso"]["hockycu"];
	$ngaydangkycu=$_POST["thamso"]["ngaydangkycu"];
	$ngaydangkycu=date("Y-m-d",strtotime($ngaydangkycu));
	$ngaytraphongcu=$_POST["thamso"]["ngaytraphongcu"];
	$ngaytraphongcu=date("Y-m-d",strtotime($ngaytraphongcu));
	if(kiemtratrung($buoi,$maphong,$hocky,$ngaydangky,$ngaytraphong) && $buoi ==$buoicu && $maphong ==$maphongcu && $hocky ==$hockycu && $ngaydangky ==$ngaydangkycu && $ngaytraphong ==$ngaytraphongcu){
		echo "Đăng ký đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="UPDATE `dangkyphongthuchanh` SET `mand`='$mand',`maphong`='$maphong',`mamon`='$mamon',`namhoc`='$namhoc',`ngaydangky`='$ngaydangky',`ngaytraphong`='$ngaytraphong',`thu`='$thu',`tuan`='$tuan',`sonhom`='$sonhom',`tiet`='$tiet',`buoi`='$buoi',`hocky`='$hocky',`ghichu`='$ghichu' WHERE `ID` = $ID";
		$thucthi=$conn->query($sql);
		if($thucthi){
			echo "sửa thành công";
		}
		else{
			echo "Có lỗi xảy ra vui lòng kiểm tra lại: ";
		}
		
	}
	
}
else{
	echo "sửa không thành công";
}
?>