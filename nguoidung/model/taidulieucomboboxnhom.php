<?php
	/*Load dữ liệu vào combobox */
	include "../../ketnoicsdl/ketnoi.php";
	$rs = $conn->query("SELECT nhom.manhom, nhom.tennhom FROM `nhom` WHERE 1");
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	//$result["rows"] = $items;
	echo json_encode($items);
?>