<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrung($buoi,$maphong,$hocky,$ngaydangky,$ngaytraphong,$namhoc){
	include "../../ketnoicsdl/ketnoi.php";
	$sql_tgdk="select maphong,buoi,hocky,ngaydangky,ngaytraphong from dangkyphongthuchanh where dangkyphongthuchanh.maphong ='$maphong' and dangkyphongthuchanh.buoi ='$buoi' and dangkyphongthuchanh.hocky ='$hocky' and dangkyphongthuchanh.namhoc ='$namhoc'  and date_format('$ngaydangky','%Y-%m-%d') = dangkyphongthuchanh.ngaydangky and date_format('$ngaytraphong','%Y-%m-%d') = date_format(dangkyphongthuchanh.ngaytraphong,'%Y-%m-%d')  ";
	$sql="select maphong,buoi,hocky,ngaydangky,ngaytraphong from dangkyphongthuchanh where dangkyphongthuchanh.maphong ='$maphong' and dangkyphongthuchanh.buoi ='$buoi' and dangkyphongthuchanh.hocky ='$hocky' and dangkyphongthuchanh.namhoc ='$namhoc'   ";
	$sql_ngay="select maphong,buoi,hocky,ngaydangky,ngaytraphong from dangkyphongthuchanh where ( date_format('$ngaydangky','%Y-%m-%d') > (select MAX(dangkyphongthuchanh.ngaytraphong) from dangkyphongthuchanh ) or date_format('$ngaytraphong','%Y-%m-%d') < date_format(dangkyphongthuchanh.ngaydangky,'%Y-%m-%d')) and dangkyphongthuchanh.hocky ='$hocky' and dangkyphongthuchanh.namhoc ='$namhoc' ";
	$khacngay="select maphong,buoi,hocky,ngaydangky,ngaytraphong from dangkyphongthuchanh where (dangkyphongthuchanh.maphong !='$maphong' or dangkyphongthuchanh.buoi !='$buoi' or dangkyphongthuchanh.hocky !='$hocky' or dangkyphongthuchanh.namhoc !='$namhoc')";
	$thucthi=$conn->query($sql);
	$thucthi_kn=$conn->query($khacngay);
	$thucthi_ngay=$conn->query($sql_ngay);
	$thucthi_tgdk=$conn->query($sql_tgdk);
	// kiem tra neu trung nam hoc,hk,nien khoa,buoi,phong va ngaytraphong < ngaydangki hoac ngaydk>ngaytra thi return false
	if(mysqli_num_rows($thucthi_kn)==0 or mysqli_num_rows($thucthi) > 0 ){
		if(mysqli_num_rows($thucthi_ngay) > 0 and mysqli_num_rows($thucthi_tgdk)==0 ){		
			return false;
		}
		else{
			return true;
		}
	}
	else{ 
		//neu khong trung nam hoc,hk,nien khoa,buoi,phong va ngảaphong < ngaydangki hoac ngaydk>ngaytra thi return true
		return false;

	}
}
if(isset($_POST["thamso"]["dkphong"])){
	$mand=$_SESSION['mand'];
	$maphong=$_POST["thamso"]["maphong"];
	$mamon=$_POST["thamso"]["mamon"];
	$namhoc=$_POST["thamso"]["namhoc"];
	$ngaydangky=$_POST["thamso"]["ngaydangky"];
	$ngaydangky=date("Y-m-d",strtotime($ngaydangky));
	$ngaytraphong=$_POST["thamso"]["ngaytraphong"];
	$ngaytraphong=date("Y-m-d",strtotime($ngaytraphong));
	$buoi=$_POST["thamso"]["buoi"];
	$tiet=$_POST["thamso"]["tiet"];
	$hocky=$_POST["thamso"]["hocky"];
	$ghichu=$_POST["thamso"]["ghichu"];
	if(kiemtratrung($buoi,$maphong,$hocky,$ngaydangky,$ngaytraphong,$namhoc)){
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
else{
	echo "thêm không thành công";
}
?>