//thêm khoa
function themkhoa(){
	$("#tk").show();
	$("#sk").hide();
	$("#khoa-dlg").dialog("open");
	$("#tk").click(function(){
		$makhoa=$("#makhoa").textbox("getValue");
		$tenkhoa=$("#tenkhoa").textbox("getValue");
		var bien ={makhoa:$makhoa,tenkhoa:$tenkhoa};
		sendajax("../model/add.php",bien,"dg-khnh");
		$("#khoa-dlg").dialog("close");
	})
}

// sửa thông tin khoa
function suakhoa(){
	$("#tk").hide();
	$("#sk").show();
	var row = $("#dg-khnh").datagrid("getSelected");
	if(row){
		$makhoa=row.makhoa;
		$("#khoa-fm").form("load",row);
		$("#khoa-dlg").dialog("open");
		$("#sk").click(function(){
		$makhoa=$("#makhoa").textbox("getValue");
		$tenkhoa=$("#tenkhoa").textbox("getValue");
		var bien ={makhoacu:row.makhoa,makhoa:$makhoa,tenkhoa:$tenkhoa};
		sendajax("../model/edit.php",bien,"dg-khnh");
		$("#khoa-dlg").dialog("close");
	})
	}
	else{
		thongbao("Vui lòng chọn khoa");
	}
}
// xóa khoa
function xoakhoa(){
	var row = $("#dg-khnh").datagrid("getSelected");
	if(row){
		var bien ={makhoa:row.makhoa};
		xoadulieuajax("../model/delete.php",bien,"dg-khnh","Bạn có muốn xóa môn học này không ?");
	}
	else{
		thongbao("Vui lòng chọn môn học cần xóa");
	}
}

//tải lại
function tailai()
{
         $("#dg-khnh").datagrid("reload"); 
}