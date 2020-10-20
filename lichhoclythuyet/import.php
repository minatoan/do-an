<?php
  include "../ketnoicsdl/ketnoi.php";
  require('reader.php');
  $loi = array();
  $file=$_FILES["fileToUpload"]["tmp_name"];
  $data = new Spreadsheet_Excel_Reader($file,true,"UTF-8");
  $data->read($file);
  $i=1;
  $j=0;
  echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
  echo "<title>IMPORT Lịch Học Lý Thuyết</title>";
  echo "<center>";
  $t=0;
  function themlichlythuyet($mand,$malophp,$síolophp,$mamon,$thu,$sotietlt,$sotietth,$tiet,$ngaybd,$ngaykt,$hocky,$nienkhoa,$malop,$phong){
    $sql="INSERT INTO `lichhoclythuyet`(`ID`, `mand`, `malophp`, `sisolhp`, `mamon`, `thu`, `sotietlt`, `sotietth`, `tiet`, `ngaybd`, `ngaykt`, `hocky`, `nienkhoa`, `malop`, `phong`) VALUES ('','$mand','$malophp','$sisolhp','$mamon','$thu','$tietlt','$sotietth','$tiet','$ngaybd','$ngaykt','$hocky','$nienkhoa','$malop','$phong')";
    $thucthi=$conn->query($sql);
        if($thucthi){
          return true;
        }
    else{
      return false;
    }
  }
  $dem=0;
  for ($k = 2; $k<=count($data->sheets[0]["cells"]); $k++) 
  {
    $mand= $data->sheets[0]["cells"][$k][1];
    $malophp= $data->sheets[0]["cells"][$k][2];
    $sisolhp= $data->sheets[0]["cells"][$k][3];
    $mamon= $data->sheets[0]["cells"][$k][4];
    $thu= $data->sheets[0]["cells"][$k][5];
    $sotietlt= $data->sheets[0]["cells"][$k][6];
    $sotietth= $data->sheets[0]["cells"][$k][7];
    $tiet= $data->sheets[0]["cells"][$k][8];
    $ngaybd= $data->sheets[0]["cells"][$k][9];
    $date=date_create($ngaybd);
    $ngaybd=date_format($date,"Y-m-d");
    $ngaykt= $data->sheets[0]["cells"][$k][10];
    $date=date_create($ngaykt);
    $ngaykt=date_format($date,"Y-m-d");
    $hocky= $data->sheets[0]["cells"][$k][11];
    $nienkhoa= $data->sheets[0]["cells"][$k][12];
    $malop= $data->sheets[0]["cells"][$k][13];
    $phong= $data->sheets[0]["cells"][$k][14];
    if(themlichlythuyet($mand,$malophp,$sisolophp,$mamon,$thu,$sotietlt,$sotietth,$tiet,$ngaybd,$ngaykt,$hocky,$nienkhoa,$malop,$phong)){
    $dem=$dem+1;
    }
  } 
  echo $dem
  ?>
