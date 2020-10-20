<?php			
		include "../../ketnoicsdl/ketnoi.php";
		if(isset($_POST['timkiem'])){
		$timkiem=$_POST['timkiem'];
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$offset = ($page-1)*$rows;
		$result = array();

		$mand=$_SESSION["mand"];
		$rs = $conn->query("SELECT  COUNT(1) FROM `lichhoclythuyet`JOIN `nguoidung` on lichhoclythuyet.mand=nguoidung.mand join monhoc on lichhoclythuyet.mamon = monhoc.mamon WHERE nguoidung.mand='$mand'and tenmon like '%$timkiem%'
		or nguoidung.mand='$mand' and tennd like '%$timkiem%' or   lichhoclythuyet.ngaybd ='$timkiem' or lichhoclythuyet.ngaykt ='$timkiem' 
		or nguoidung.mand='$mand' and lichhoclythuyet.sotietlt ='$timkiem' or nguoidung.mand='$mand' and lichhoclythuyet.sotietth like '%$timkiem%' 
		or nguoidung.mand='$mand' and lichhoclythuyet.hocky like '%$timkiem%' or nguoidung.mand='$mand' and lichhoclythuyet.nienkhoa like '%$timkiem%' 
		or nguoidung.mand='$mand' and lichhoclythuyet.thu like '%$timkiem%' or nguoidung.mand='$mand' and lichhoclythuyet.sisolhp like '%$timkiem%' 
		or nguoidung.mand='$mand' and lichhoclythuyet.phong like '%$timkiem%'
		or nguoidung.mand='$mand' and lichhoclythuyet.tiet like '%$timkiem%'   ");	
			$row = mysqli_fetch_row($rs);
			$result["total"] = $row[0];  

		$s="SELECT lichhoclythuyet.mand,sisolhp, tennd,thu, phong, tenmon, sotietlt, sotietth, tiet, hocky,nienkhoa, ngaybd, ngaykt,  malop, malophp FROM `lichhoclythuyet`JOIN `nguoidung` on lichhoclythuyet.mand=nguoidung.mand join monhoc on lichhoclythuyet.mamon = monhoc.mamon WHERE nguoidung.mand='$mand'and tenmon like '%$timkiem%' 
		or nguoidung.mand='$mand' and tennd like '%$timkiem%' or   lichhoclythuyet.ngaybd ='$timkiem' 
		or lichhoclythuyet.ngaykt ='$timkiem' or nguoidung.mand='$mand' and lichhoclythuyet.sotietlt ='$timkiem' 
		or nguoidung.mand='$mand' and lichhoclythuyet.sotietth like '%$timkiem%' 
		or nguoidung.mand='$mand' and lichhoclythuyet.hocky like '%$timkiem%' 
		or nguoidung.mand='$mand' and lichhoclythuyet.nienkhoa like '%$timkiem%' 
		or nguoidung.mand='$mand' and lichhoclythuyet.thu like '%$timkiem%' 
		or nguoidung.mand='$mand' and lichhoclythuyet.sisolhp like '%$timkiem%' 
		or nguoidung.mand='$mand' and lichhoclythuyet.phong like '%$timkiem%' 
		or nguoidung.mand='$mand' and lichhoclythuyet.tiet like '%$timkiem%' 
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
		$mand=$_SESSION["mand"];
		// echo $mand;
		$rs = $conn->query("SELECT COUNT(1) FROM lichhoclythuyet where lichhoclythuyet.mand='$mand'");	
			$row = mysqli_fetch_row($rs);
			$result["total"] = $row[0];  
		$s="SELECT * FROM lichhoclythuyet where lichhoclythuyet.mand='$mand' limit $offset,$rows";
		$s="SELECT lichhoclythuyet.*,nguoidung.tennd, monhoc.tenmon FROM `lichhoclythuyet` JOIN nguoidung ON lichhoclythuyet.mand = nguoidung.mand JOIN monhoc ON lichhoclythuyet.mamon = monhoc.mamon  where lichhoclythuyet.mand='$mand' limit $offset,$rows";
			$rs = $conn->query($s);
			$items = array();
		while($row = mysqli_fetch_object($rs)){
			array_push($items, $row);
		}
		$result["rows"] = $items;
		echo json_encode($result);
	}
?>