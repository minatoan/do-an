<?php
	/*Load dữ liệu vào combobox in jquery easyui*/
	include "../../ketnoicsdl/ketnoi.php";
	$mand=$_SESSION["mand"];
	// $rs = $conn->query("SELECT nguoidung.mand, nguoidung.tennd FROM `nguoidung` WHERE 1 ");
	$rs = $conn->query("SELECT nguoidung.mand, nguoidung.tennd FROM `nguoidung` WHERE nguoidung.mand='$mand'");

	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	//$result["rows"] = $items;
	echo json_encode($items);
    
?>