// thêm thông tin môn học
function themmonhoc(){
	$("#themmh").show();
	$("#suamh").hide();
	$("#xoamh").hide();
	$("#thoat").hide();
	$("#monhoc-dlg").dialog("open");
	$("#themmh").click(function(){
		$mamon=$("#mamonhoc").textbox("getValue");
		$tenmh=$("#tenkho").textbox("getValue");
		$magv=$("#gvgd").combobox("getValue");
		$sotcthuchanh=$("#sotcthuchanh").textbox("getValue");
		$sotclythuyet=$("#sotclythuyet").textbox("getValue");
		$ghichu=$("#ghichu").textbox("getValue");
		var bien ={mamon:$mamon,tenmh:$tenmh,magv:$magv,sotcthuchanh:$sotcthuchanh,sotclythuyet:$sotclythuyet,ghichu:$ghichu};
		sendajax("../model/them.php",bien,"dg-khnh");
		$("#monhoc-dlg").dialog("close");
	})
}
// sửa thông tin môn học
function suamonhoc(){
	$("#themmh").hide();
	$("#suamh").show();
	$("#xoamh").hide();
	$("#thoat").hide();
	var row = $("#dg-khnh").datagrid("getSelected");
	if(row){
		$mamon=row.mamon;
		$("#monhoc-fm").form("load",row);
		$("#monhoc-dlg").dialog("open");
		$("#suamh").click(function(){
		$mamon=$("#mamonhoc").textbox("getValue");
		$tenmh=$("#tenkho").textbox("getValue");
		$magv=$("#gvgd").combobox("getValue");
		$sotcthuchanh=$("#sotcthuchanh").textbox("getValue");
		$sotclythuyet=$("#sotclythuyet").textbox("getValue");
		$ghichu=$("#ghichu").textbox("getValue");
		var bien ={mamoncu:row.mamon,mamon:$mamon,tenmh:$tenmh,magv:$magv,sotcthuchanh:$sotcthuchanh,sotclythuyet:$sotclythuyet,ghichu:$ghichu};
		sendajax("../model/sua.php",bien,"dg-khnh");
		$("#monhoc-dlg").dialog("close");
	})
	}
	else{
		thongbao("Vui lòng chọn môn học");
	}
}
//xóa môn học
function xoamonhoc(){
	var row = $("#dg-khnh").datagrid("getSelected");
	if(row){
		var bien ={mamon: row.mamon};
		xoadulieuajax("../model/xoa.php",bien,"dg-khnh","Bạn có muốn xóa môn học này không ?");
	}
	else{
		thongbao("Vui lòng chọn môn học cần xóa");
	}
}
//tải lại datagrid
function tailai()
{
         $('#dg-khnh').datagrid('reload'); 
}
// xem giảng viên
function xemgv(){
	$("#themmh").hide();
	$("#suamh").show();
	$("#xoamh").hide();
	$("#thoat").hide();
	var row = $("#dg-khnh").datagrid("getSelected");
	if(row){
		$mamon=row.mamon;
		$("#dgxgv-khnh").datagrid('load',{mamonhoc:$mamon})
		$("#xemgv-dlg").dialog("open");
		
	}
	else{
		thongbao("Vui lòng chọn môn học");
	}
}
//thêm giảng viên
function themgiangvien()
{
	$("#xoamh").hide();
	$("#thoat").hide();
	var row = $("#dg-khnh").datagrid("getSelected");
	$mamh=row.mamon;
	$tennd=$("#tennd").combobox("getValue");
	if($tennd==""){
		thongbao("Vui lòng chọn giảng viên");
		return false;
	}
	else if(!row){
		thongbao("Vui lòng chọn môn học")
		return false;
	}
	var bien ={tennd:$tennd,mamh:$mamh};
	sendajax("../model/themgv.php",bien,"dgxgv-khnh");
}

//xóa tên giảng viên
function xoagiangvien(){
	var row = $("#dgxgv-khnh").datagrid("getSelected");
	if(row){
		var bien ={id:row.idgvmh};
		xoadulieuajax("../model/xoagv.php",bien,"dgxgv-khnh","Bạn có muốn xóa giảng viên này không ?");
	}
	else{
		thongbao("Vui lòng chọn tên giảng viên cần xóa");
	}
}
