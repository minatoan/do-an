<?php 

include "../../ketnoicsdl/ketnoi.php";
// function kiemtratrungkhoachinh($ID){
// 	include "../../ketnoicsdl/ketnoi.php";
// 	$sql="select * from lichhoclythuyet where ID ='$ID'";
// 	$thucthi=$conn->query($sql);
// 	if(mysqli_num_rows($thucthi)>0){
// 		return true;
// 	}
// 	else{ 
// 		return false;
// 	}
// }
if(isset($_POST["thamso"]["mamon"]) and isset($_POST["thamso"]["mand"])){
	// $ID=$_SESSION["ID"];
	// $ID=$_POST["thamso"]["ID"];
	$ID=$_POST["thamso"]["ID"];
	$mand=$_POST["thamso"]["mand"];
	$malophp=$_POST["thamso"]["malophp"];
	$sisolhp=$_POST["thamso"]["sisolhp"];
	$mamon=$_POST["thamso"]["mamon"];
	$thu=$_POST["thamso"]["thu"];
	$sotietlt=$_POST["thamso"]["sotietlt"];
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
	// $mandcu=$_POST["thamso"]["mandcu"];
	// $IDpast=$_POST["thamso"]["IDpast"];
	// if ($ID=$_SESSION["ID"]) {
		# code...
	
		$sql="UPDATE `lichhoclythuyet` SET `ID`='$ID',`mand`='$mand',`malophp`='$malophp',`sisolhp`='$sisolhp',`mamon`='$mamon',`thu`='$thu',`sotietlt`='$sotietlt',`sotietth`='$sotietth',`tiet`='$tiet',`ngaybd`='$ngaybd',`ngaykt`='$ngaykt',`hocky`='$hocky',`nienkhoa`='$nienkhoa',`malop`='$malop',`phong`='$phong'where `ID`='$ID'";
	
		$thucthi=$conn->query($sql);
	// }
		
			echo "Sửa thành công";
		// else{
		// 	echo "Có lỗi xảy ra vui lòng kiểm tra lại";
		// }
	}


	

// function sua(){
// 	$("#dongy").hide();
// 	$("#sua").show();
// 	var row = $("#dklt-dlg").datagrid("getSelected");
// 	if(row){		
		// $("#dangkythuchanh-fm").form("load",row);
// 		$("#dklt-dlg").dialog("open");
// 		$("#sua").click(function(){
// 		$ID=$("#ID").textbox("getValue");
// 		$mand=$("#mand").combobox("getValue");
// 		$maphong=$("#maphong").combobox("getValue");
// 		$mamon=$("#mamon").combobox("getValue");
// 		$namhoc=$("#namhoc").textbox("getValue"); 
// 		$ngaydangky=$("#ngaydangky").datebox("getValue");
// 		$ngaytraphong=$("#ngaytraphong").datebox("getValue");
// 		$thu=$("#thu").combobox("getValue");
// 		$tuan=$("#tuan").textbox("getValue");
// 		$sonhom=$("#sonhom").combobox("getValue");
// 		$tiet=$("#tiet").textbox("getValue");
// 		$buoi=$("#buoi").combobox("getValue");
// 		$hocky=$("#hocky").combobox("getValue");
// 		$ghichu=$("#ghichu").textbox("getValue");
// 		// $trangthai=$("#trangthai").textbox("getValue");
// 		var bien ={
// 			buoicu:row.buoi,
// 			maphongcu:row.maphong,
// 			hockycu:row.hocky,
// 			ngaydangkycu:row.ngaydangky,
// 			ngaytraphongcu:row.ngaytraphong,
// 			ID:$ID,
// 			mand:$mand,
// 			maphong:$maphong,
// 			mamon:$mamon,
// 			namhoc:$namhoc,
// 			ngaydangky:$ngaydangky,
// 			ngaytraphong:$ngaytraphong,
// 			thu:$thu,
// 			tuan:$tuan,
// 			sonhom:$sonhom,		
// 			tiet:$tiet,
// 			buoi:$buoi,
// 			hocky:$hocky,
// 			ghichu:$ghichu};
// 		sendajax("../model/sua.php",bien,"dg-khnh");
// 		$("#dangkythuchanh-dlg").dialog("close");
// 	})
// 	}
// 	else{
// 		thongbao("Vui lòng chọn đăng ký");
// 	}
// }
	?>