<?php
 include "../ketnoicsdl/ketnoi.php";
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($mand_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Ld8WIUUAAAAAOUpsLy3zM1R5xSnYIAWWi6mPyT9',
            'response' => $mand_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);
    if (!$res['success']) {
        echo '<script language="javascript">';
        echo 'alert("Vui lòng đảm bảo rằng bạn đã vượt qua xác nhận danh tính của chúng tôi.")';
        echo '</script>';
        header("refresh: 0;");
    } else {
        // $conn = mysqli_connect("localhost", "root", "", "quanlyphongmayth");
        $mand=mysqli_real_escape_string($conn, $_POST['taikhoan']);
        $mand=md5($mand);
        $matkhau=$_POST['matkhau'];
 		$matkhau=md5($matkhau);
        $sql="SELECT nguoidung.mand FROM `nguoidung` WHERE md5(nguoidung.mand)='$mand' and nguoidung.matkhau='$matkhau';";
        $mand = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($mand);
        if ($mand == "" || $matkhau = "") {
            echo '<script language="javascript">';
            echo 'alert("Tên đăng nhập hoặc mật khẩu không được để trống.")';
            echo '</script>';     
            header("refresh: Location: ../trangchu/trangchu.php;");
        }
        else {
        	if ($num_rows == 0) {
                echo '<script language="javascript">';
                echo 'alert("Tên đăng nhập hoặc mật khẩu không đúng.")';
                echo '</script>';
                header("Location:dangnhap.html");

            }
            else {
                while ($num_rows = mysqli_fetch_array($mand)){
                    $_SESSION['mand']=$_POST['taikhoan'];
                }
                header("Location: ../trangchu/trangchu.php");
            }  
        }   
    }
}
?>
