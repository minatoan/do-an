// hiển thị bảng Thêm

function thanhvienlop(){
	$("#themlop").show();
	$("#sua").hide();
	$("#thanhvienlop-dlg").dialog("open");
	$("#themlop").click(function(){
		
		$malop=$("#malop").textbox("getValue");
		$tenlop=$("#tenlop").textbox("getValue");
		$siso=$("#siso").textbox("getValue");		
		$makhoa=$("#makhoa").combobox("getValue");
		
		var bien ={malop:$malop,tenlop:$tenlop,siso:$siso,makhoa:$makhoa};
		sendajax("../model/them.php",bien,"lop_dg");
		$("#thanhvienlop-dlg").dialog("close");
	})

}
// hiển thị bảng sửa lớp
function sualop(){
	$("#themlop").hide();
	$("#sua").show();
	var row = $("#lop_dg").datagrid("getSelected");
	if(row){
		$mamhom=row.malop;
		$("#themlop-fm").form("load",row);
		$("#thanhvienlop-dlg").dialog("open");
		$("#sua").click(function(){
		$malop=$("#malop").textbox("getValue");
		$tenlop=$("#tenlop").textbox("getValue");
		$makhoa=$("#makhoa").combobox("getValue");
		$siso=$("#siso").textbox("getValue");		
		var bien ={malopcu:row.malop,malop:$malop,tenlop:$tenlop,siso:$siso,makhoa:$makhoa};
		sendajax("../model/sua.php",bien,"lop_dg");
		$("#thanhvienlop-dlg").dialog("close");
	})
	}
	else{
		thongbao("Vui lòng chọn lớp");
	}
}
// xoá lớp
function xoa(){
	var row = $("#lop_dg").datagrid("getSelected");
	if(row){
		var bien ={malop:row.malop};
		xoadulieuajax("../model/xoa.php",bien,"lop_dg","Bạn có muốn xóa môn học này không ?");
	}
	else{
		thongbao("Vui lòng chọn lớp cần xóa");
	}
}

// button tải lại
function tailai()
{
         $('#lop_dg').datagrid('reload'); 
}