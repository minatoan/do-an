<?php
	/*Load dữ liệu vào combobox in jquery easyui*/
	include "../../ketnoicsdl/ketnoi.php";
	$rs = $conn->query("SELECT * FROM `monhoc` WHERE 1 ");
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	//$result["rows"] = $items;
	echo json_encode($items);
    
?>