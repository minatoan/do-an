<?php			
		include "../../ketnoicsdl/ketnoi.php";
		if(isset($_POST['timkiem'])){
			$timkiem=$_POST['timkiem'];
			$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
			$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
			$offset = ($page-1)*$rows;
			$result = array();
			$rs = $conn->query("SELECT COUNT(1) FROM dangkyphongthuchanh where dangkyphongthuchanh.mand ='$timkiem' or dangkyphongthuchanh.maphong or dangkyphongthuchanh.mamon like '%$timkiem%' ");	
				$row = mysqli_fetch_row($rs);
				$result["total"] = $row[0]; 
			$s="SELECT * FROM dangkyphongthuchanh where dangkyphongthuchanh.mand ='$timkiem' or dangkyphongthuchanh.maphong or dangkyphongthuchanh.mamon like '%$timkiem%' limit $offset,$rows";	 
				$rs = $conn->query($s);
				$items = array();
			while($row = mysqli_fetch_object($rs)){
					array_push($items, $row);
			} 
			$result["rows"] = $items;
			echo json_encode($result);
		}
		elseif (isset($_GET['id'])) {
			$timkiem=$_GET['id'];
			$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
			$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
			$offset = ($page-1)*$rows;
			$result = array();
			$rs = $conn->query("SELECT COUNT(1) FROM dangkyphongthuchanh where id ='$timkiem'");	
				$row = mysqli_fetch_row($rs);
				$result["total"] = $row[0]; 
			$s="SELECT * FROM dangkyphongthuchanh where id ='$timkiem' limit $offset,$rows";	 
				$rs = $conn->query($s);
				$items = array();
			while($row = mysqli_fetch_object($rs)){
					array_push($items, $row);
			}
			$result["rows"] = $items;
			echo json_encode($result);
		}
		else if(isset($_POST['thamso']) and $_POST['thamso']['loai']="timkiemphongtrong"){
			$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
			$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
			$offset = ($page-1)*$rows;
			$result = array();
			$mand=$_POST['thamso']['mand'];
			$nienkhoa=$_POST['thamso']['nienkhoa'];
			$hocky=$_POST['thamso']['hocky'];
			$maphong=$_POST['thamso']['maphong'];
   			$buoi=$_POST['thamso']['buoi'];
			$mamon=$_POST['thamso']['mamon'];
			$malophp=$_POST['thamso']['malophp'];
			$tungay=$_POST['tungay'];
   			$denngay=$_POST['denngay'];
	   		$ngaythang="";
	   		if ($mand !=""){
				$mand=" and mand ='$mand' ";
			}
			if ($nienkhoa !=""){
				$nienkhoa=" and namhoc ='$nienkhoa' ";
			}
			if ($hocky !=""){
				$hocky=" and hocky ='$hocky' ";
			}
			if ($maphong !=""){
				$maphong=" and maphong ='$maphong' ";
			}
			if ($buoi !=""){
				$buoi=" and buoi ='$buoi' ";
			}
			if ($malophp !="" or $mamon !="") {
				$malophp = " and (mahocphan ='$malophp' or mamon ='$mamon') ";
			}
			if($tungay !="" or $denngay !=""){
				$tungay=date("Y-m-d",strtotime($tungay));
	   			$denngay=date("Y-m-d",strtotime($denngay));
	   			$ngaythang=" and date_format(view_dangkyphonthuhanh.ngaydangky,'%Y-%m-%d') >= date_format('$tungay','%Y-%m-%d') and date_format(view_dangkyphonthuhanh.ngaytraphong,'%Y-%m-%d') <= date_format('$denngay','%Y-%m-%d')";
			}
			
				$rs = $conn->query("SELECT COUNT(1) FROM view_dangkyphonthuhanh WHERE 1".$mand.$nienkhoa.$hocky.$malophp.$ngaythang.$maphong.$buoi);	
				$row = mysqli_fetch_row($rs);
				$result["total"] = $row[0];
				$s="SELECT view_dangkyphonthuhanh.*,monhoc.tenmon,(SELECT nguoidung.tennd FROM nguoidung WHERE nguoidung.mand = view_dangkyphonthuhanh.mand LIMIT 0,1) as tennd,date_format(view_dangkyphonthuhanh.ngaydangky,'%w') as thu FROM view_dangkyphonthuhanh JOIN monhoc ON view_dangkyphonthuhanh.mamon=monhoc.mamon WHERE 1".$mand.$nienkhoa.$hocky.$malophp.$ngaythang.$maphong.$buoi." limit $offset,$rows";
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
			$rs = $conn->query("SELECT COUNT(1) FROM view_dangkyphonthuhanh WHERE view_dangkyphonthuhanh.mand='$mand'");	
			$row = mysqli_fetch_row($rs);
			$result["total"] = $row[0];
			$s="SELECT  tennd, tenphong, tenmon, buoi, tiet, hocky, namhoc, ngaydangky, ngaytraphong, dangkyphongthuchanh.ghichu FROM `dangkyphongthuchanh`JOIN `nguoidung` on dangkyphongthuchanh.mand=nguoidung.mand JOIN phong on dangkyphongthuchanh.maphong = phong.maphong join monhoc on dangkyphongthuchanh.mamon = monhoc.mamon  
				limit $offset,$rows";	
			$rs = $conn->query($s);
				$items = array();
			while($row = mysqli_fetch_object($rs)){
					array_push($items, $row);
			}
			$result["rows"] = $items;
			echo json_encode($result);
		}
	?>