<html>  
  
<head>  
    <title>Danh sách khách hàng</title>  
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
 $tendonvi="";
  $sdt="";
  $diachi="";
  $hotline="";
 ?>
<p><b>Đơn vị: <?php echo $tendonvi; ?>
    <br>Địa chỉ: <?php echo $diachi; ?>
    <br>Điện thoại:  <?php echo $sdt; ?>
    <br> Hotline: <?php echo $hotline; ?></b></p>

<!-- <img src ="../img/checkvuong.jpg" width="10" height="10"/> -->
<h1 class="tieudepdf">DANH SÁCH KHÁCH HÀNG</h1>

    <table class="table-style-three">  
        <tr>  
            <!-- <th>STT</th> -->
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Điện thoại</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Email</th>                   
        </tr>  
        <?php  
      include('thuvienexport.php');
       $sql="select * from nguoidung";
       $result = $db->query ($sql);
              $sheet = array ();
              $i =1;
        
            $a=0;
            //$tongcong=0;

            while ( $row = $result->fetch_array () ) {
            // $tongcong=$tongcong+$row[5];
            $a=$a+1;
echo '  
<tr>  
  <!-- <td style="text-align:center;">'.$a.'</td> -->
  <td> '.$row["mand"].'</td>
  <td>'.$row["tennd"].'</td>  
  <td style="text-align:center;">'.$row["gioitinh"].'</td>
  <td>`'.$row ["sdt"].'</td> 
  <td>'.$row["ngaysinh"].'</td>
  <td>'.$row["diachi"].'</td>
  <td>'.$row["email"].'</td>

  
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
  
  </tr>
  <tr>
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
$xls = new Excel_XML ( 'UTF-8', true, 'DS Khách hàng' );
// gọi phương thức để đổ dữ liệu vào  sheet
$xls->addArray ($sheet);
// gọi phương thức generate để trả về 1 tập tin excel cho trình duyệt, tham số là tên tập tin
$xls->generateXML ( 'Ds_khachhang8181' );

//////////////////////////

?>


  </body>  
  
</html>  