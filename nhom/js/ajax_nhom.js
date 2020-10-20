// hiển thị bảng Thêm

function thanhviennhom(){
	$("#themnhom").show();
	$("#sua").hide();
	$("#thanhviennhom-dlg").dialog("open");
	$("#themnhom").click(function(){
		
		$manhom=$("#manhom").textbox("getValue");
		$tennhom=$("#tennhom").textbox("getValue");
		$quyen=$("#mn").combobox("getValue");
		$ghichu=$("#ghichu").textbox("getValue");		
		var bien ={manhom:$manhom,tennhom:$tennhom,quyen:$quyen,ghichu:$ghichu};
		sendajax("../model/them.php",bien,"nhom_dg");
		$("#thanhviennhom-dlg").dialog("close");
	})

}
// hiển thị bảng sửa nhóm
function suanhom(){
	$("#themnhom").hide();
	$("#sua").show();
	var row = $("#nhom_dg").datagrid("getSelected");
	if(row){
		$mamhom=row.manhom;
		$("#themnhom-fm").form("load",row);
		$("#thanhviennhom-dlg").dialog("open");
		$("#sua").click(function(){
		$manhom=$("#manhom").textbox("getValue");
		$tennhom=$("#tennhom").textbox("getValue");
		$quyen=$("#mn").combobox("getValue");
		$ghichu=$("#ghichu").textbox("getValue");		
		var bien ={manhomcu:row.manhom,manhom:$manhom,tennhom:$tennhom,quyen:$quyen,ghichu:$ghichu};
		sendajax("../model/sua.php",bien,"nhom_dg");
		$("#thanhviennhom-dlg").dialog("close");
	})
	}
	else{
		thongbao("Vui lòng chọn môn học");
	}
}
// xoá nhóm
function xoa(){
	var row = $("#nhom_dg").datagrid("getSelected");
	if(row){
		var bien ={manhom:row.manhom};
		xoadulieuajax("../model/xoa.php",bien,"nhom_dg","Bạn có muốn xóa môn học này không ?");
	}
	else{
		thongbao("Vui lòng chọn môn học cần xóa");
	}
}

// button tải lại
function tailai()
{
         $('#nhom_dg').datagrid('reload'); 
}