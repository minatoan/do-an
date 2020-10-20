<?php			
	include "../../ketnoicsdl/ketnoi.php";
	if(isset($_POST['timkiem'])){
		$timkiem=$_POST['timkiem'];
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$offset = ($page-1)*$rows;
		$result = array();
		$rs = $conn->query("SELECT COUNT(1) FROM nguoidung JOIN khoa ON nguoidung.makhoa = khoa.makhoa JOIN nhom ON nguoidung.manhom = nhom.manhom where nguoidung.mand  like '%$timkiem%' or nguoidung.tennd like '%$timkiem%' or nguoidung.ngaysinh like '%$timkiem%' or nguoidung.sdt like '%$timkiem%' 
		or nguoidung.diachi like '%$timkiem%' or nguoidung.gioitinh like '%$timkiem%' or khoa.tenkhoa like '%$timkiem%' or nguoidung.email like '%$timkiem%' ");	
			$row = mysqli_fetch_row($rs);
			$result["total"] = $row[0]; 
		$s="SELECT nguoidung.*,nhom.tennhom, DATE_FORMAT(nguoidung.ngaysinh,'%d-%m-%Y') as ngaysinhnd, khoa.tenkhoa FROM nguoidung JOIN khoa ON nguoidung.makhoa = khoa.makhoa JOIN nhom ON nguoidung.manhom = nhom.manhom where nguoidung.mand like '%$timkiem%' or nguoidung.tennd like '%$timkiem%' or nguoidung.tennd like '%$timkiem%'
		or nguoidung.ngaysinh like '%$timkiem%' or nguoidung.sdt like '%$timkiem%' or nguoidung.email like '%$timkiem%' 
		or nguoidung.diachi like '%$timkiem%' or nguoidung.gioitinh like '%$timkiem%' or khoa.tenkhoa like '%$timkiem%' 
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
		$rs = $conn->query("SELECT COUNT(1) FROM nguoidung ");
			$row = mysqli_fetch_row($rs);
			$result["total"] = $row[0]; 
		$s="SELECT * FROM nguoidung  limit $offset,$rows";
		$s="SELECT nguoidung.*,nhom.tennhom, DATE_FORMAT(nguoidung.ngaysinh,'%d-%m-%Y') as ngaysinhnd, khoa.tenkhoa FROM `nguoidung` JOIN khoa ON nguoidung.makhoa = khoa.makhoa JOIN nhom ON nguoidung.manhom = nhom.manhom ORDER BY `nhom`.`tennhom` ASC limit $offset,$rows";
			$rs = $conn->query($s);
			$items = array();
		while($row = mysqli_fetch_object($rs)){
				array_push($items, $row);
		}
		$result["rows"] = $items;
		echo json_encode($result);
	}
?>