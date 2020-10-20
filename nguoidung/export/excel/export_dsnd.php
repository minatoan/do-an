<html>  
  
<head>  
    <title>Danh sách người dùng</title>  
    <style> 
body{
  font-family: "Times New Roman", Times, serif;
}

.tieudepdf{
    color:red;
    text-align:center;
}

table th {
  color:black;
  font-weight:bold;
  border:1px solid #110101;
  background-color: #e8e8e8;
}

table  th,
table  td {
  vertical-align:top;
  padding:5px 10px;
  border:1px solid black;
}

</style>
</head>  
  
<body> 
<?php
// thông tin cấu hình hệ thống
  $tendonvi="Công Nghệ Thông Tin";
  $sdt="0292.3890.698";
  $diachi="256 Nguyễn Văn Cừ, Quận Ninh Kiều, TP.Cần Thơ";
  $hotline="0292.3890.698";
 ?>
<p> <b>Đơn vị: <?php echo $tendonvi; ?>
    <br>Địa chỉ: <?php echo $diachi; ?>
    <br>Điện thoại:  <?php echo $sdt; ?>
    <br> Hotline: <?php echo $hotline; ?></b>
</p>
<h1 class="tieudepdf">DANH SÁCH NGƯỜI DÙNG</h1>
    <table class="table-style-three" style="text-align: center;">  
        <tr>  
            <!-- <th>STT</th> -->
            <th>Mã người dùng</th>
            <th>Tên người dùng</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Giới tính</th>
            <th>Tên khoa</th>
            <th>Tên nhóm</th>
        </tr>  
        <?php  
      include('../../../export/excel/thuvienexport.php');
      $sql="SELECT nguoidung.*, khoa.tenkhoa, nhom.tennhom FROM `nguoidung` JOIN khoa ON nguoidung.makhoa = khoa.makhoa JOIN nhom ON nguoidung.manhom = nhom.manhom";
      $result = $db->query ($sql);
      $sheet = array ();
      $i =1;
      $a=0;
            while ( $row = $result->fetch_array () ) {
            $a=$a+1;
echo '  
<tr>  
  <td> '.$row["mand"].'</td>
  <td> '.$row["tennd"].'</td> 
  <td> '.$row["ngaysinh"].'</td>
  <td> '.$row["diachi"].'</td>
  <td> '.$row ["sdt"].'</td>
  <td> '.$row["email"].'</td>
  <td> '.$row["gioitinh"].'</td>
  <td> '.$row["tenkhoa"].'</td>
  <td> '.$row["tennhom"].'</td> 
</tr>';
} 
echo '
 <tr>
    <td></td>  
    <td></td>  
    <td></td> 
    <td></td> 
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td> 
  </tr>
  <tr>
    <td></td>  
    <td></td> 
    <td></td> 
    <td></td> 
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td> 
  </tr>
  </table>';  

 //$xls = new Excel_XML_Drawing();
//$xls->setPath('../img/logo_bac_a.png');
//$gdImage = imagecreatefromjpeg('img/logo_bac_a.jpg');
 //$xls->setImage($gdImage); 

//$xls->setImage('img/logo_bac_a.jpg');
// khởi tạo đống tượng Excel sheet: hỗ trợ Unicode, tự động nhận kiểu dữ liệu của cột, tên Sheet
$xls = new Excel_XML ( 'UTF-8', true, 'DS nguoidung' );
// gọi phương thức để đổ dữ liệu vào  sheet
$xls->addArray ($sheet);
// gọi phương thức generate để trả về 1 tập tin excel cho trình duyệt, tham số là tên tập tin
$xls->generateXML ( 'DS_NGUOIDUNG' );

//////////////////////////

?>


  </body>  
  
</html>  