<?php 
include "../../ketnoicsdl/ketnoi.php";
function kiemtratrungnamhoc($maphong,$nienkhoa,$hocky){
	include "../../ketnoicsdl/ketnoi.php";
	$sql="select * from dangkyphongthuchanh where dangkyphongthuchanh.maphong ='$maphong' and dangkyphongthuchanh.namhoc='$nienkhoa' and dangkyphongthuchanh.hocky='$hocky'";
	$thucthi=$conn->query($sql);
	if(mysqli_num_rows($thucthi)==0){
		return true;
	}
	else{ 
		return false;
	}
}
if(isset($_POST["thamso"]["hocky"]) and isset($_POST["thamso"]["namhoc"])){
	$hocky=$_POST["thamso"]["hocky"];
	$namhoc=$_POST["thamso"]["namhoc"];
	$sql="select maphong from phong";
	$thucthi=$conn->query($sql);
	while ($row=mysqli_fetch_array($thucthi)) {
		$maphong=$row[0];
		for ($i=0;$i<3;$i++){
			if($i==0){
				$buoi="Sáng";
			}
			else if($i==1){
				$buoi="Chiều";
			}
			else{
				$buoi="Tối";
			}
			if(kiemtratrungnamhoc($maphong,$namhoc,$hocky)){
				echo "Đăng ký đã tồn tại vui lòng kiểm tra lại";
			}
			else{
				$sql_dk="INSERT INTO `dangkyphongthuchanh`(`ID`, `mand`, `mamon`, `maphong`, `mahocphan`, `namhoc`, `ngaydangky`, `ngaytraphong`, `buoi`, `tiet`, `hocky`, `ghichu`) VALUES (null,'','','','','$namhoc','','','','','$hocky','')";
				$thucthi_dk=$conn->query($sql_dk);
				if($thucthi_dk){
					echo "thêm thành công";
				}
				else{
					echo "Có lỗi xãy ra vui lòng kiểm tra lại";
				}
			}
		}
	}
}

else{
	echo "thêm không thành công";
}

?>