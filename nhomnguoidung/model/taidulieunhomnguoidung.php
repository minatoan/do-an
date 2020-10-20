<?php			
	include "../../ketnoicsdl/ketnoi.php";
	if(isset($_POST["nhom"])){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$offset = ($page-1)*$rows;
		$result = array();
		$manhom=$_POST["nhom"];
		$rs = $conn->query("SELECT COUNT(1) FROM nhomnguoidung, nguoidung WHERE nguoidung.mand=nhomnguoidung.manguoidung AND nhomnguoidung.manhom='$manhom'");	
			$row = mysqli_fetch_row($rs);
			$result["total"] = $row[0];  
		$s="SELECT nguoidung.mand,nguoidung.tennd, nhomnguoidung.manhom FROM nhomnguoidung, nguoidung WHERE nguoidung.mand =nhomnguoidung.manguoidung  AND nhomnguoidung.manhom='$manhom' limit $offset,$rows";
			$rs = $conn->query($s);
			$items = array();
		while($row = mysqli_fetch_object($rs)){
			array_push($items, $row);
		} 
		$result["rows"] = $items;
		echo json_encode($result);
	}
	else{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$offset = ($page-1)*$rows;
		$result = array();
		$rs = $conn->query("SELECT COUNT(1) FROM `nhomnguoidung`");	
			$row = mysqli_fetch_row($rs);
			$result["total"] = $row[0];  
		$s="SELECT * FROM `nhomnguoidung` limit $offset,$rows";
			$rs = $conn->query($s);
			$items = array();
		while($row = mysqli_fetch_object($rs)){
				array_push($items, $row);
		}
		$result["rows"] = $items;
		echo json_encode($result);
	}
?>