<html>  
  
<head>  
    <title>Danh sách đăng ký</title>  
    <style> 
body{
  /*font-family:Arial, Helvetica, sans-serif;*/
  font-family: "Times New Roman", Times, serif;
}

.tieudepdf{
    color:red;
    text-align:center;

}

table th {
  /*background-color:#c3ddf7;*/
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
  $tendonvi="Trường Đại học Kỹ thuật - Công nghệ Cần Thơ";
  $sdt="0292.3890.698";
  $diachi="256 Nguyễn Văn Cừ, Quận Ninh Kiều, TP.Cần Thơ";
  $hotline="0292.3890.698";
 ?>
<p><b>Đơn vị: <?php echo $tendonvi; ?>
    <br>Địa chỉ: <?php echo $diachi; ?>
    <br>Điện thoại:  <?php echo $sdt; ?>
    <br> Hotline: <?php echo $hotline; ?></b></p>

<h1 class="tieudepdf">DANH SÁCH ĐĂNG KÝ PHÒNG MÁY</h1>

    <table class="table-style-three">  
        <tr>  
            <!-- <th>STT</th> -->
            <th>Giảng viên</th>
            <th>Phòng</th>
            <th>Tên Môn</th>
            <th>Buổi</th>
            <th>Tiết</th>
            <th>Học kì</th>
            <th>Năm Học</th>
            <th>Ngày đăng ký</th>
            <th>Ngày trả phòng</th>
            <th>Ghi Chú</th>                  
        </tr>  
        <?php  
      include('../../../export/excel/thuvienexport.php');
       $sql="SELECT  tennd, tenphong, tenmon, buoi, tiet, hocky, namhoc, ngaydangky, ngaytraphong, dangkyphongthuchanh.ghichu FROM `dangkyphongthuchanh`JOIN `nguoidung` on dangkyphongthuchanh.mand=nguoidung.mand JOIN phong on dangkyphongthuchanh.maphong = phong.maphong join monhoc on dangkyphongthuchanh.mamon = monhoc.mamon  ";
       if (!empty($_GET['ids'])) {
          $ids = json_decode($_GET['ids']);
          $sql.= ' WHERE dangkyphongthuchanh.ID IN ('.join(',',$ids).')';
       }

       $result = $db->query ($sql);
              $sheet = array ();
              $i =1;
            $a=0;
            while ( $row = $result->fetch_array ()){
            $a=$a+1;
echo '  
<tr>  
  <!-- <td style="text-align:center;">'.$a.'</td> -->
  <td>'.$row["tennd"].'</td>
  <td>'.$row["tenphong"].'</td>  
  <td>'.$row["tenmon"].'</td> 
  <td>'.$row["buoi"].'</td>
  <td>'.$row["tiet"].'</td>
  <td>'.$row["hocky"].'</td>
  <td>'.$row["namhoc"].'</td>
  <td>'.$row["ngaydangky"].'</td>
  <td>'.$row["ngaytraphong"].'</td>
  <td>'.$row["ghichu"].'</td>  
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
    <td></td>
  </tr>
  </table>';  

 //$xls = new Excel_XML_Drawing();
//$xls->setPath('../img/logo_bac_a.png');
//$gdImage = imagecreatefromjpeg('img/logo_bac_a.jpg');
 //$xls->setImage($gdImage); 

//$xls->setImage('img/logo_bac_a.jpg');
// khởi tạo đống tượng Excel sheet: hỗ trợ Unicode, tự động nhận kiểu dữ liệu của cột, tên Sheet
$xls = new Excel_XML ( 'UTF-8', true, 'DS đăng kí' );
// gọi phương thức để đổ dữ liệu vào  sheet
$xls->addArray ($sheet);
// gọi phương thức generate để trả về 1 tập tin excel cho trình duyệt, tham số là tên tập tin
$xls->generateXML ( 'Ds_Dk8181' );

//////////////////////////

?>

  
  </body>  
  
</html>  