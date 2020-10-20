// thêm thông tin người dùng
function themnguoidung(){
	$("#themnd").show();
	$("#suathongtinnd").hide();
	$("#nguoidung-dlg").dialog("open");
	$("#themnd").click(function(){
		$mand=$("#mand").textbox("getValue");
		$tennd=$("#tennd").textbox("getValue");
		$ngaysinh=$("#ngaysinh").textbox("getValue");
		$sdt=$("#sdt").textbox("getValue");
		$email=$("#email").textbox("getValue");
		$gioitinh=$("#gioitinh").textbox("getValue");
		$diachi=$("#diachi").textbox("getValue");
		$makhoa=$("#makhoa").combobox("getValue");
		$manhom=$("#manhom").combobox("getValue");
		var bien ={mand:$mand,tennd:$tennd,ngaysinh:$ngaysinh,sdt:$sdt,email:$email,gioitinh:$gioitinh,diachi:$diachi,makhoa:$makhoa,manhom:$manhom};
		sendajax("../model/them.php",bien,"dg-khnh");
		$("#nguoidung-dlg").dialog("close");
	})
}
// sửa thông tin người dùng
function suattnd(){
	$("#themnd").hide();
	$("#suathongtinnd").show();
	$("#xoanguoidung").hide();
	var row = $("#dg-khnh").datagrid("getSelected");
	if(row){
		$mand=row.mand;
		$("#nguoidung-fm").form("load",row);
		$("#nguoidung-dlg").dialog("open");
		$("#suathongtinnd").click(function(){
		$mand=$("#mand").textbox("getValue");
		$tennd=$("#tennd").textbox("getValue");
		$ngaysinh=$("#ngaysinh").textbox("getValue");
		$sdt=$("#sdt").textbox("getValue");
		$email=$("#email").textbox("getValue");
		$gioitinh=$("#gioitinh").textbox("getValue");
		$diachi=$("#diachi").textbox("getValue");
		$makhoa=$("#makhoa").combobox("getValue");
		$manhom=$("#manhom").combobox("getValue");
		var bien ={mandcu:row.mand,mand:$mand,tennd:$tennd,ngaysinh:$ngaysinh,sdt:$sdt,email:$email,gioitinh:$gioitinh,diachi:$diachi,makhoa:$makhoa,manhom:$manhom};
		sendajax("../model/sua.php",bien,"dg-khnh");
		$("#nguoidung-dlg").dialog("close");
	})
	}
	else{
		thongbao("Vui lòng chọn người dùng");
	}
}
//xóa người dùng
function xoanguoidung(){
	var row = $("#dg-khnh").datagrid("getSelected");
	if(row){
		var bien ={mand:row.mand};
		xoadulieuajax("../model/xoa.php",bien,"dg-khnh","Bạn có muốn xóa người dùng này không ?");
	}
	else{
		thongbao("Vui lòng chọn người dùng cần xóa");
	}
}
//tải lại datagrid
function tailai()
{
         $('#dg-khnh').datagrid('reload'); 
}
