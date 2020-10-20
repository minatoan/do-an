<?php
/*load danh sach lich cua giang vien
dua vao lịch hoc ly thuye theo hoc ky nien khoa*/
include "../../header/header.php";
$nienkhoa="2019-2020";
$hocky="HK1";
error_reporting(0);
if(isset($_POST['nienkhoa']) and isset($_POST['hocky'])){
	$nienkhoa=$_POST['nienkhoa'];
	$hocky=$_POST['hocky'];
}
include "dangphong.php";
$sql="SELECT DISTINCT lichhoclythuyet.mand FROM lichhoclythuyet WHERE lichhoclythuyet.hocky='$hocky' AND nienkhoa ='$nienkhoa' and sotietth>0";
$thucthi=$conn->query($sql);
/*luu danh sach lich day cua giang vien theo dang mang dachieu*/
$lichday=array();
$i=0;
while ($row=mysqli_fetch_array($thucthi)) {
	$mand=$row[0];
	/*lich trong theo tung nhan vien*/
	$sqlnv="SELECT DISTINCT lichhoclythuyet.mand, concat(lichhoclythuyet.tiet,lichhoclythuyet.thu) as tiet FROM lichhoclythuyet WHERE lichhoclythuyet.hocky='$hocky' AND nienkhoa ='$nienkhoa' and mand ='$mand' and sotietth>0";
	$thucthinv=$conn->query($sqlnv);
	$lich=array();
	$j=0;
	while ($rownv=mysqli_fetch_array($thucthinv)) {
		$lich[$j]=$rownv[1];
		$j=$j+1;
	}
	$lichday["$mand"]=$lich; 
	$i=$i+1;
}
/*lịch học 2-7*/
$thu=array('S2','S3','S4','S5','S6','S7','C2','C3','C4','C5','C6','C7');
$nguoidung=array_keys($lichday);
$lichtrong=array();
foreach ($nguoidung as $key) {
	$lichtrong["$key"]=array_diff($thu,$lichday["$key"]);
}
/*lịch trống của lớp*/
$sqllop="SELECT DISTINCT lichhoclythuyet.malop FROM lichhoclythuyet WHERE lichhoclythuyet.hocky='$hocky' AND nienkhoa ='$nienkhoa' and sotietth>0";
$thucthilop=$conn->query($sqllop);
/*luu danh sach lich day cua giang vien theo dang mang dachieu*/
$lichtrongcualop=array();
$i=0;
while ($row=mysqli_fetch_array($thucthilop)) {
	$malop=$row[0];
	/*lich trong theo tung giao vien*/
	$sqltheolop="SELECT DISTINCT lichhoclythuyet.mand, concat(lichhoclythuyet.tiet,lichhoclythuyet.thu) as tiet FROM lichhoclythuyet WHERE lichhoclythuyet.hocky='$hocky' AND nienkhoa ='$nienkhoa' and malop ='$malop' and sotietth>0";
	$thucthitheolop=$conn->query($sqltheolop);
	$lich=array();
	$j=0;
	while ($rownv=mysqli_fetch_array($thucthitheolop)) {
		$lich[$j]=$rownv[1];
		$j=$j+1;
	}
	$lichtrongcualop["$malop"]=$lich; 
	$i=$i+1;
}
$lop=array_keys($lichtrongcualop);
$lichtrongtheomalop=array();
foreach ($lop as $key) {
	$lichtrongcualop["$key"]=array_diff($thu,$lichtrongcualop["$key"]);
}
/*danh sach cac môn mà gv dạy*/
$danhsachmongianday=array();
foreach ($nguoidung as $key ) {
	$sqlmgd="SELECT ID,sisolhp from lichhoclythuyet WHERE lichhoclythuyet.hocky='$hocky' AND nienkhoa ='$nienkhoa' and mand ='$key' and sotietth>0";
	$thucthimgv=$conn->query($sqlmgd);
	$mgh=array();
	$k=0;
	/*số sinh viên tối đa trên 1/ phòng*/
	$sosvtrenphong=35;
	while ($row=mysqli_fetch_array($thucthimgv)) {
		$sosvloplythuyet=(int)$row[1];
		$sodu=fmod($sosvloplythuyet,$sosvtrenphong);
		//echo "so du:".$sodu."- solythuyet".$sosvloplythuyet;
		if($sodu==0){
			$sophong=(int)($sosvloplythuyet/$sosvtrenphong);
		}
		else{
			$sophong=(int)($sosvloplythuyet/$sosvtrenphong)+1;
		}
		//echo $sophong;
		for($phong=0;$phong<$sophong;$phong++){
			$mgh[$k]=$row[0];
			$k=$k+1;	
		}	
	}
	$danhsachmongianday["$key"]=$mgh;

}
/*danh sach phong*/
$sqlphong="SELECT maphong from phong";
$thucthiphong=$conn->query($sqlphong);
$dsphong=array();
$h=0;
while ($rowphong=mysqli_fetch_array($thucthiphong)) {
	$dsphong[$h]=$rowphong[0];
	$h=$h+1;
}
/*xếp lịch*/
/*random gv */
shuffle($nguoidung);
$m=0;
$d=0;
?>
<!--tao table loi-->
<br>
<br>

<center>
<table border="1"  style="width:1200px">
	<tr>
		<th>Tên người dùng</th>
		<th>Phòng</th>
		<th>Môn học</th>
		<th>Ngày đăng ký</th>
		<th>Ngày trả phòng</th>
		<th>Buổi</th>
		<th>Trạng Thái</th>



	</tr>
<?php
$somonchuaduocsaplich=array();
foreach($nguoidung as $key){
	/*đếm số môn giảng dạy theo từng giảng viên*/
	//$solophp=count($danhsachmongianday["$key"]);
	/*get môn cuối danh sách*/
		$mon=$danhsachmongianday["$key"];
		$lichtrong_gv=$lichtrong["$key"];
		foreach ($mon as $id) {
			$loi="";
			$sql="SELECT malop,ngaybd,sotietth,thu,mamon,tennd from lichhoclythuyet JOIN nguoidung on lichhoclythuyet.mand=nguoidung.mand where ID='$id' and sotietth>0 limit 0,1";
			$thucthi=$conn->query($sql);
			while ($row=mysqli_fetch_array($thucthi)) {
				$malop=$row[0];
				$ngaybd=$row[1];
				$sotietth=$row[2];
				$thuhoclythuyet=$row[3];
				$mh=$row[4];
				$tennd=$row[5];
				break;
			}
			/*lich trong của lớp theo từng lớp*/
			$lichtrong_lop=$lichtrongcualop["$malop"];
			/*lich trong theo từng giảng viên*/
			$lichtrong_lopvagv=array_intersect($lichtrong_gv,$lichtrong_lop); ?>
			<!-- <tr>
				<td colspan="6"> <?php echo "lịch trống của gv: ".$key. " và lớp : ".$malop." Môn: ".$mh." ".var_dump($lichtrong_lopvagv); ?></td>
			</tr> -->
			
			
			<?php 
			$taolichtrong=array();
			foreach ($lichtrong_lopvagv as $keytrong) {
					array_push($taolichtrong, $keytrong);	
			}
			$lichtrong_lopvagv=$taolichtrong;
			$solichtrong=count($lichtrong_lopvagv);
			if($solichtrong>0){
			   for ($r=0; $r<count($lichtrong_lopvagv) ; $r++) {
			   		$trong=$lichtrong_lopvagv[$r];
			   	/*thứ trong tuần mà gv và lớp rãnh*/
				   $thu=$lichtrong_lopvagv[$r][1];
				   /*chênh lệch thứ trong tuần ở lịch dạy lý thuyêt và lịch rãnh
				   Kết quả là số ngày lệch*/
				   $songaylech=$thuhoclythuyet-$thu;
				   $keycuagiatri=array_search($lichtrong_lopvagv[$r],$lichtrong_gv);
				   $keycuagiatrilop=array_search($lichtrong_lopvagv[$r],$lichtrong_lop);
					/*dang ky phong thuc hanh*/
					$mand=$key;
					$mamon=$mh;
					/*ngày đăng ký = ngày bắt đầu học + thêm 2 tuần - ngày lệch*/
					$ngaydangky=date("Y-m-d",strtotime($ngaybd)+(14 * 24 * 60 * 60)-($songaylech*24*60*60));
					if($sotietth==30){
						$ngaytraphong=date("Y-m-d",strtotime($ngaydangky)+(42 * 24 * 60 * 60)-($songaylech*24*60*60));
					}
					if($sotietth==60){
						$ngaytraphong=date("Y-m-d",strtotime($ngaydangky)+(84 * 24 * 60 * 60)-($songaylech*24*60*60));
					}
					if($lichtrong_lopvagv[$r][0]=="S"){
						$buoi="Sáng";
						$tiet="12345";
					}
					else if($lichtrong_lopvagv[$r][0]=="C"){
						$buoi="Chiều";
						$tiet="678910";
					}
					else if($lichtrong_lopvagv[$r][0]=="T"){
						$buoi="Tối";
						$tiet="1112131415";
					}
					else{
						$buoi=$lichtrong_lopvagv[$r][0];
						$tiet=$lichtrong_lopvagv[$r][0];
					}
					
					for ($s=0; $s<count($dsphong);$s++){
						$maphong=$dsphong[$s];
						if(kiemtratrung($buoi,$maphong,$hocky,$ngaydangky,$ngaytraphong,$nienkhoa)){ ?>

				
							<tr>
								<td><?php echo $tennd; ?></td>
								<td><?php echo $maphong;?></td>
								<td><?php echo $mamon;?></td>
								<td><?php echo $ngaydangky;?></td>
								<td><?php echo $ngaytraphong;?></td>
								<td><?php echo $buoi." Thứ ". $thu; ?></td>
								<td><?php dangkyphongthuchanh($mand,$maphong,$mamon,$nienkhoa,$ngaydangky,$ngaytraphong,$buoi,$tiet,$hocky,""); ?></td>
							</tr>
		
								<?php
								unset($lichtrong_gv[$keycuagiatri]);
								unset($lichtrong_lop[$keycuagiatrilop]);
								$r=count($lichtrong_lopvagv);
								$loi="false";
								break;
							
						}
						else{
							/*trường hợp không xếp được lịch thực hành, dời lại ngày cuối của trả phòng*/
							if ($s==count($dsphong)-1){?>
								<!-- <tr>
									<td colspan="7"><?php echo $lichtrong_lopvagv[$r]." Không tìm được lịch trống </br>".$tennd; ?></td>
								</tr> -->
								
							<?php $loi="true";}
						}
					} 
				}
				if ($loi=="true"){
					array_push($somonchuaduocsaplich,$mand."-".$id);
					 // echo $mand." - ". $id.$lop."</br>";
				}
				
			}
			$m=$m+1;
			$d=$d+1;
		}
		/*xác định malop dựa trên ma mon*/
	
}
if (!empty($somonchuaduocsaplich)){
	//var_dump($somonchuaduocsaplich);
	/*danh sách phong thực hành*/
	$dsphong_l2=$dsphong;
	//var_dump($somonchuaduocsaplich);
	/*nhưng môn chưa sắp lịch  mand-id*/
	foreach ($somonchuaduocsaplich as $ndidmh) {
		/*xác định vị trí dấu -*/
		$vitridautru=strpos($ndidmh,"-") ;
		/*lấy căt chuỗi lấy mand*/
		$mand=substr($ndidmh,0,$vitridautru);
		/*lấy id */
		$idmh=substr($ndidmh,$vitridautru+1,strlen($ndidmh));
		/*lich cua giang vien sau khi xoa lich dang ky*/
		$lichtronggv_=$lichtrong["$mand"];
		$sql="SELECT malop,ngaybd,sotietth,thu,mamon,tennd from lichhoclythuyet JOIN nguoidung on lichhoclythuyet.mand=nguoidung.mand  where ID='$idmh' and sotietth>0 limit 0,1";
		$thucthi=$conn->query($sql);
		while ($row=mysqli_fetch_array($thucthi)) {
				$malop=$row[0];
				$ngaybd=$row[1];
				$sotietth=$row[2];
				$thuhoclythuyet=$row[3];
				$mh=$row[4];
				$tennd=$row[5];
				break;
		}
		$lichtrong_lop=$lichtrongcualop["$malop"];
		$lichtrong_lopvagv=array_intersect($lichtronggv_,$lichtrong_lop);
		$lichtrong_lopvagv_l2=$lichtrong_lopvagv;
		$taolichtrong=array();
		foreach ($lichtrong_lopvagv_l2 as $keytrong) {
			array_push($taolichtrong, $keytrong);	
		}
		$lichtrong_lopvagv_l2=$taolichtrong;
		for ($r1=0; $r1<count($lichtrong_lopvagv_l2) ; $r1++) {
			$trong=$lichtrong_lopvagv_l2[$r1];
		/*thứ trong tuần mà gv và lớp rãnh*/
			$thu=$lichtrong_lopvagv_l2[$r1][1];
		/*chênh lệch thứ trong tuần ở lịch dạy lý thuyêt và lịch rãnh
								   Kết quả là số ngày lệch*/
			$keycuagiatri=array_search($lichtrong_lopvagv_l2[$r1],$lichtrong["$mand"]);
			$keycuagiatrilop=array_search($lichtrong_lopvagv_l2[$r1],$lichtrongcualop["$malop"]);
		/*dang ky phong thuc hanh*/
			$mamon=$mh;
		/*ngày đăng ký = ngày bắt đầu học + thêm 2 tuần - ngày lệch*/
			$sql="SELECT max(dangkyphongthuchanh.ngaytraphong) as ngaybd, date_format(max(dangkyphongthuchanh.ngaytraphong),'%w') from dangkyphongthuchanh WHERE (date_format(dangkyphongthuchanh.ngaytraphong,'%w')+1)=$thu and ghichu !='dời ngày dạy do hết phòng'";
			$thucthi=$conn->query($sql);
			$sql_="SELECT mand from dangkyphongthuchanh WHERE (date_format(dangkyphongthuchanh.ngaytraphong,'%w')+1)=$thu and mamon='$mamon' and namhoc='$nienkhoa' and hocky='$hocky'";
			$thucthi_=$conn->query($sql_);
			if(!empty($thucthi)){
				while ($ngay_bd=mysqli_fetch_array($thucthi)) {
					$ngaybd_l2=$ngay_bd[0];
					$thuhoclythuyet_l2=$ngay_bd[1]+1;
				}
				$songaylech=$thuhoclythuyet_l2-$thu;
				$ngaydangky=date("Y-m-d",strtotime($ngaybd_l2)+(14 * 24 * 60 * 60)-($songaylech*24*60*60));
				if($sotietth==30){
					$ngaytraphong=date("Y-m-d",strtotime($ngaydangky)+(42 * 24 * 60 * 60)-($songaylech*24*60*60));
				}
				if($sotietth==60){
					$ngaytraphong=date("Y-m-d",strtotime($ngaydangky)+(84 * 24 * 60 * 60)-($songaylech*24*60*60));
				}
				if($lichtrong_lopvagv_l2[$r1][0]=="S"){
					$buoi="Sáng";
					$tiet="12345";
				}
				else if($lichtrong_lopvagv_l2[$r1][0]=="C"){
					$buoi="Chiều";
					$tiet="678910";
				}
				else if($lichtrong_lopvagv_l2[$r1][0]=="T"){
					$buoi="Tối";
					$tiet="1112131415";
				}
				else{
					$buoi=$lichtrong_lopvagv_l2[$r1][0];
					$tiet=$lichtrong_lopvagv_l2[$r1][0];
				}
				for ($s1=0; $s1<count($dsphong_l2);$s1++){
					$maphong=$dsphong_l2[$s1];
					if(kiemtratrung($buoi,$maphong,$hocky,$ngaydangky,$ngaytraphong,$nienkhoa)){ ?>
						
						<tr style="background-color: #88f59a; color:#0e0e0e;">
							
								<td><?php echo $tennd; ?></td>
								<td><?php echo $maphong;?></td>
								<td><?php echo $mamon;?></td>
								<td><?php echo $ngaydangky;?></td>
								<td><?php echo $ngaytraphong;?></td>
								<td><?php echo $buoi." Thứ ". $thu; ?></td>
								<td ><?php dangkyphongthuchanh($mand,$maphong,$mamon,$nienkhoa,$ngaydangky,$ngaytraphong,$buoi,$tiet,$hocky,"dời ngày dạy do hết phòng"); ?></td>
						</tr>
						<?php
							unset($lichtrong["$mand"][$keycuagiatri]);
							unset($lichtrongcualop["$malop"][$keycuagiatrilop]);
							$r1=count($lichtrong_lopvagv_l2);
								break;	
						}
						else{
							if ($s1==count($dsphong_l2)-1){ ?>
								<!-- <tr>
									<td colspan="7"><?php echo $lichtrong_lopvagv_l2[$r1]." Không tìm được lịch trống 1 </br>"; ?></td>
								</tr> -->
							<?php 
						}
					}
				} 
			}
		}
	}
}
#var_dump($danhsachmongianday);
?>
</table>
</center>
<?php     include "../../footer/footer.php"; ?>