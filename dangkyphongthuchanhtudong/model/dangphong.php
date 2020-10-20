<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrung($buoi,$maphong,$hocky,$ngaydangky,$ngaytraphong,$namhoc){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select maphong from dangkyphongthuchanh where (dangkyphongthuchanh.maphong ='$maphong' and dangkyphongthuchanh.buoi ='$buoi' and dangkyphongthuchanh.hocky ='$hocky' and dangkyphongthuchanh.namhoc ='$namhoc' and date_format('$ngaydangky','%w') = date_format(dangkyphongthuchanh.ngaydangky,'%w') and date_format('$ngaydangky','%Y-%m-%d') = dangkyphongthuchanh.ngaydangky and date_format('$ngaytraphong','%Y-%m-%d') = date_format(dangkyphongthuchanh.ngaytraphong,'%Y-%m-%d')) or
		(dangkyphongthuchanh.maphong ='$maphong' and dangkyphongthuchanh.buoi ='$buoi' and dangkyphongthuchanh.hocky ='$hocky' and dangkyphongthuchanh.namhoc ='$namhoc' and date_format('$ngaydangky','%w') = date_format(dangkyphongthuchanh.ngaydangky,'%w') and date_format('$ngaydangky','%Y-%m-%d') >= dangkyphongthuchanh.ngaydangky and date_format('$ngaydangky','%Y-%m-%d') <= date_format(dangkyphongthuchanh.ngaytraphong,'%Y-%m-%d')) or (dangkyphongthuchanh.maphong ='$maphong' and dangkyphongthuchanh.buoi ='$buoi' and dangkyphongthuchanh.hocky ='$hocky' and date_format('$ngaydangky','%w') = date_format(dangkyphongthuchanh.ngaydangky,'%w') and dangkyphongthuchanh.namhoc ='$namhoc' and date_format('$ngaytraphong','%Y-%m-%d') >= dangkyphongthuchanh.ngaydangky and date_format('$ngaytraphong','%Y-%m-%d') <= date_format(dangkyphongthuchanh.ngaytraphong,'%Y-%m-%d')) or (dangkyphongthuchanh.maphong ='$maphong' and dangkyphongthuchanh.buoi ='$buoi' and dangkyphongthuchanh.hocky ='$hocky' and date_format('$ngaydangky','%w') = date_format(dangkyphongthuchanh.ngaydangky,'%w') and dangkyphongthuchanh.namhoc ='$namhoc' and date_format('$ngaytraphong','%Y-%m-%d') < dangkyphongthuchanh.ngaydangky and date_format('$ngaytraphong','%Y-%m-%d') > date_format(dangkyphongthuchanh.ngaytraphong,'%Y-%m-%d'))";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)==0){
		return true;
	}
	else{ 
		return false;
	}
}
function dangkyphongthuchanh($mand,$maphong,$mamon,$namhoc,$ngaydangky,$ngaytraphong,$buoi,$tiet,$hocky,$ghichu){
	include "../../ketnoicsdl/ketnoi.php";
	if(!kiemtratrung($buoi,$maphong,$hocky,$ngaydangky,$ngaytraphong,$namhoc)){
		echo "Đăng ký đã tồn tại vui lòng kiểm tra lại";
	}
	else{
		$sql="INSERT INTO `dangkyphongthuchanh`(`ID`,`mand`, `maphong`, `mamon`, `mahocphan`, `namhoc`, `ngaydangky`, `ngaytraphong`, `buoi`, `tiet`, `hocky`, `ghichu`) VALUES ('','$mand','$maphong','$mamon','','$namhoc','$ngaydangky','$ngaytraphong','$buoi','$tiet','$hocky','$ghichu')";
		$thucthi=$conn->query($sql);
		if($thucthi){
			echo "Thêm thành công";
		}
		else{
			echo "Có lỗi xảy ra vui lòng kiểm tra lại";
		}
	}
}	
?>