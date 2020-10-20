<?php 
include "../ketnoicsdl/ketnoi.php";
   
    if(isset($_POST['doimatkhau'])){
        $taikhoan=$_POST['tentaikhoan'];
        $matkhau=md5($_POST['matkhau']);
        $matkhaumoi=md5($_POST['matkhaumoi']);
        $query = "select * from nguoidung where mand='$taikhoan' and matkhau='$matkhau'  limit 1";
        $result=mysqli_query($conn,$query);
                
        if (mysqli_num_rows($result)==1) {
            if($_POST['matkhaumoi']==$_POST['matkhau'])
            {
                echo "Mật khẩu mới không được trùng mật khẩu cũ";
            }
            else
            {
            $query_update = "UPDATE nguoidung SET matkhau=('$matkhaumoi') where mand = '$taikhoan' ";
            $sql_capnhat=mysqli_query($conn,$query_update);
            echo "Đổi mật khẩu thành công";
            header("Location:../trangchu/trangchu.php");
            }}
         else
            {
            echo "Sai tài khoản hoặc mật khẩu vui lòng nhập lại";
        }
    }




 ?>
 <link rel="stylesheet" href="styledoipass.css" type="text/css" media="all">
<div class="container">
<h1 class="page-title" align="center">Thay đổi mật khẩu</h1>
<form action="" method="post">
<table class="grid" style="width: 400px; margin: auto">
    <tr>
        <td>Tài khoản</td>
        <td ><input type="text"  name="tentaikhoan" value="<?php echo $_SESSION['mand']?>"  style="width: 200px" /></td>
    </tr>
    <tr>
        <td>Mật khẩu cũ</td>
        <td ><input name="matkhau" type="password" required="true" style="width: 200px" /></td>
    </tr>
    <tr>
        <td>Mật khẩu mới</td>
        <td ><input name="matkhaumoi" type="password" required="true" style="width: 200px" /></td>
    </tr>
    <tr>

        <td colspan="2" ><div align="center">
            <br>
            <a href="../trangchu/trangchu.php" class="btn">
                    <span class="return"></span> Trở về
            </a>
            <input type="submit" name="doimatkhau" value="Cập nhật mật khẩu"></td>
        </div>
    </tr>
</table>
</form>