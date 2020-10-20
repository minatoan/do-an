<?php			
		include "../../ketnoicsdl/ketnoi.php";
		if(isset($_POST['timkiem'])){
		$timkiem=$_POST['timkiem'];
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$offset = ($page-1)*$rows;
		$result = array();
		$rs = $conn->query("SELECT COUNT(1) FROM `lichhoclythuyet` JOIN nguoidung ON lichhoclythuyet.mand = nguoidung.mand JOIN monhoc ON lichhoclythuyet.mamon = monhoc.mamon where lichhoclythuyet.sisolhp ='$timkiem'  or lichhoclythuyet.malophp ='$timkiem' or lichhoclythuyet.thu ='$timkiem' or lichhoclythuyet.mamon ='$timkiem' or lichhoclythuyet.tiet ='$timkiem'  or lichhoclythuyet.hocky ='$timkiem' or tennd like '%$timkiem%' or tenmon like '%$timkiem%' or  lichhoclythuyet.phong like '%$timkiem%' or ngaybd like '%$timkiem%' or ngaykt like '%$timkiem%' or sotietlt like '%$timkiem%' or sotietth like '%$timkiem%' ");	
			$row = mysqli_fetch_row($rs);
			$result["total"] = $row[0];  
		$s="SELECT lichhoclythuyet.*,nguoidung.tennd, monhoc.tenmon FROM `lichhoclythuyet` JOIN nguoidung ON lichhoclythuyet.mand = nguoidung.mand JOIN monhoc ON lichhoclythuyet.mamon = monhoc.mamon where lichhoclythuyet.sisolhp ='$timkiem'  or lichhoclythuyet.malophp ='$timkiem' or lichhoclythuyet.thu ='$timkiem' or lichhoclythuyet.mamon ='$timkiem' or lichhoclythuyet.tiet ='$timkiem'  or lichhoclythuyet.hocky ='$timkiem' or tennd like '%$timkiem%' or tenmon like '%$timkiem%' or lichhoclythuyet.phong like '%$timkiem%' or ngaybd like '%$timkiem%' or ngaykt like '%$timkiem%' or sotietlt like '%$timkiem%' or sotietth like '%$timkiem%'
		  limit $offset,$rows"; 	
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
		$rs = $conn->query("SELECT COUNT(1) FROM `lichhoclythuyet`");
			
			$row = mysqli_fetch_row($rs);
			$result["total"] = $row[0];  
		$s="SELECT * FROM `lichhoclythuyet`  limit $offset,$rows";
		$s="SELECT lichhoclythuyet.*,nguoidung.tennd, monhoc.tenmon FROM `lichhoclythuyet` JOIN nguoidung ON lichhoclythuyet.mand = nguoidung.mand JOIN monhoc ON lichhoclythuyet.mamon = monhoc.mamon limit $offset,$rows";
			$rs = $conn->query($s);
			$items = array();
		while($row = mysqli_fetch_object($rs)){
				array_push($items, $row);
		}
		$result["rows"] = $items;
		echo json_encode($result);
	}
?>