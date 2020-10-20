<?php
include "../ketnoicsdl/ketnoi.php";
require('Classes/PHPExcel.php');

if(isset($_POST['btnGui'])){
	$file = $_FILES['file']['tmp_name'];
	echo $file;

	$objReader = PHPExcel_IOFactory::createReaderForFile($file);

	$listWorkSheets = $objReader->listWorksheetNames($file);
	


	foreach($listWorkSheets as $name){
		$sql="SELECT * FROM `nguoidung` WHERE mand='$name'";
		$thucthi=$conn->query($sql);
		echo $sql;
		// $name = $thucthi
			$objReader->setLoadSheetsOnly($name);
			$objExcel = $objReader->load($file);
			$sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);
				// print_r($sheetData);
			$highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
			
				// echo $highestRow; 
		for($row = 2; $row<=$highestRow; $row++){
			$malop = $sheetData[$row]['B'];
			$sisolhp = $sheetData[$row]['C'];
			$mamon = $sheetData[$row]['D'];
			$nhom = $sheetData[$row]['E']; 
			$sotietlt = $sheetData[$row]['F'];
			$sotietth = $sheetData[$row]['G'];
			$thu = $sheetData[$row]['H'];
			$tiet = $sheetData[$row]['I'];
			$phong = $sheetData[$row]['K'];
			$ngaybd = $sheetData[$row]['L'];
			$ngaykt = $sheetData[$row]['M'];
			$hocky = $sheetData[$row]['N'];
			//trong csdl có hk và niên khóa
		// $hocky = $sheetData[$row]['D'];
		$nienkhoa = $sheetData[$row]['O'];
		$sql = "INSERT INTO `lichhoclythuyet`(`ID`, `mand`, `malophp`, `sisolhp`, `mamon`, `thu`, `sotietlt`, `sotietth`, `tiet`, `ngaybd`, `ngaykt`, `hocky`, `nienkhoa`, `malop`, `phong`) VALUES ('','$name','$nhom','$sisolhp','$mamon','$thu','$sotietlt','$sotietth','$tiet', STR_TO_DATE('$ngaybd', '%m/%d/%Y'), STR_TO_DATE('$ngaykt', '%m/%d/%Y'),'$hocky','$nienkhoa','$malop','$phong')";
		$thucthi=$conn->query($sql);
		if ($thucthi) {
			
			header("Location:../lichhoclythuyet/view/index.php");
		}
		// header("Location:../lichhoclythuyet/view/index.php");
		// echo $sql;
		// echo "Import thành công";
	}

 }
	

}
 
?>

