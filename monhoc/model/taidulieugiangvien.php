<?php			
		include "../../ketnoicsdl/ketnoi.php";
		if(isset($_POST['mamonhoc'])){
			$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
			$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
			$offset = ($page-1)*$rows;
			$result = array();
			$mamon = $_POST['mamonhoc'];
			$rs = $conn->query("SELECT COUNT(1) FROM monhoc, gvmh, nguoidung 
				where monhoc.mamon = gvmh.mamon and	nguoidung.mand = gvmh.mand and monhoc.mamon = '$mamon' ");	
				$row = mysqli_fetch_row($rs);
				$result["total"] = $row[0]; 
			$s="SELECT id as idgvmh,tenmon,tennd, mota 
				from monhoc, gvmh, nguoidung 
				where monhoc.mamon = gvmh.mamon and	nguoidung.mand = gvmh.mand and monhoc.mamon = '$mamon' limit $offset,$rows";		
				$rs = $conn->query($s);
				$items = array();
			while($row = mysqli_fetch_object($rs)){
					array_push($items, $row);
			}
			$result["rows"] = $items;
			echo json_encode($result);
		}
		
?>