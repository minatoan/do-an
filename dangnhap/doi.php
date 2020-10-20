<?php 
include "../ketnoicsdl/ketnoi.php";
   function kiemtratrung($matkhau){
    include "../ketnoicsdl/ketnoi.php";
    $sql="select matkhau from nguoidung where matkhau ='$matkhau'";
    $thucthi=$conn->query($sql);
    if(mysqli_num_rows($thucthi)>0){
        return true;
    }
    else{ 
        return false;
    }
}
    if(isset($_POST['doimatkhau'])){
        $taikhoan=$_POST['tentaikhoan'];
        $matkhau=$_POST['matkhau'];
        $matkhaumoi=$_POST['matkhaumoi'];
        $sql_doimatkhau="select * from nguoidung where mand='$taikhoan' and matkhau='$matkhau'  limit 1";
        if(kiemtratrung($matkhau) and $matkhau !=$matkhaumoi){
        echo "Mật khẩu trùng";
        }else
        {
            $sql_capnhat=mysql_query("UPDATE nguoidung SET matkhau='$matkhaumoi' ");
            $thucthi=$conn->query($sql);
        if($thucthi){
            echo "Sửa thành công";
        }
        else{
            echo "Có lỗi xảy ra vui lòng kiểm tra lại";
        }
    }
    
}
    }

 ?>

<h1 class="page-title" align="center">Thay đổi mật khẩu</h1>
<form action="" method="post">
<table class="grid" style="width: 400px; margin: auto">
    <tr>
        <td>Tài khoản</td>
        <td ><input type="text"  name="tentaikhoan"  style="width: 200px" /></td>
    </tr>
    <tr>
        <td>Mật khẩu cũ</td>
        <td ><input name="matkhau" type="password"  style="width: 200px" /></td>
    </tr>
    <tr>
        <td>Mật khẩu mới</td>
        <td ><input name="matkhaumoi" type="password" style="width: 200px" /></td>
    </tr>
    <tr>

        <td colspan="2" ><div align="center">
            <br>
            <input type="submit" name="doimatkhau" value="Cập nhật mật khẩu"></td>
        </div>
    </tr>
</table>
</form>