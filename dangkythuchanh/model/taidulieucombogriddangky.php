<?php
	/*Load dữ liệu vào combobox in jquery easyui*/
	include "../../ketnoicsdl/ketnoi.php";
	$mand=$_SESSION['mand'];
	$rs = $conn->query("SELECT malophp,tenmon,sisolhp,thu,tiet,tenlop,lichhoclythuyet.mamon,lichhoclythuyet.id FROM `lichhoclythuyet`JOIN `monhoc` ON lichhoclythuyet.mamon=monhoc.mamon JOIN `lop` on lichhoclythuyet.malop=lop.malop WHERE lichhoclythuyet.mand='$mand' ");
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	//$result["rows"] = $items;
	echo json_encode($items);
    
?>