
 // thêm thông tin dang ky
function them(){
	$("#dongy").show();
	$("#sua").hide();
	$("#dklt-dlg").dialog("open");
	$("#dongy").click(function(){
		 $ID=$("#ID").textbox("getValue");
		$mand=$("#mand").combobox("getValue");
		$malophp=$("#malophp").textbox("getValue");
		$mamon=$("#mamon").combobox("getValue");
		$nienkhoa=$("#nienkhoa").combobox("getValue"); 
		$sisolhp=$("#sisolhp").textbox("getValue");
		$hocky=$("#hocky").combobox("getValue");
		$ngaybd=$("#ngaybd").datebox("getValue");
		$ngaykt=$("#ngaykt").datebox("getValue");
		$tiet=$("#tiet").textbox("getValue");
		$sotietlt=$("#tietlt").textbox("getValue");
		$sotietth=$("#tietth").textbox("getValue");
		$thu=$("#thu").combobox("getValue");
		$malop=$("#malop").textbox("getValue");
		$phong=$("#phong").textbox("getValue");
		var bien ={ID:$ID,mand:$mand,malophp:$malophp,mamon:$mamon,nienkhoa:$nienkhoa,sisolhp:$sisolhp,hocky:$hocky,ngaybd:$ngaybd,ngaykt:$ngaykt,tiet:$tiet,sotietlt:$sotietlt,sotietth:$sotietth,thu:$thu,malop:$malop,phong:$phong};
		sendajax("../model/them.php",bien,"dg-khnh");
		$("#dklt-dlg").dialog("close");
	})
}

// sửa đăng ký
function sua(){
	$("#dongy").hide();
	$("#sua").show();
	var row = $("#dg-khnh").datagrid("getSelected");
	if(row){
	$("#dklt-fm").form("load",row);
	$("#dklt-dlg").dialog("open");
	$("#sua").click(function(){
		$ID=$("#ID").textbox("getValue");	
		$mand=$("#mand").combobox("getValue");
		$malophp=$("#malophp").textbox("getValue");
		$mamon=$("#mamon").combobox("getValue");
		$nienkhoa=$("#nienkhoa").combobox("getValue"); 
		$sisolhp=$("#sisolhp").textbox("getValue");
		$hocky=$("#hocky").combobox("getValue");
		$ngaybd=$("#ngaybd").datebox("getValue");
		$ngaykt=$("#ngaykt").datebox("getValue");
		$tiet=$("#tiet").textbox("getValue");
		$sotietlt=$("#tietlt").textbox("getValue");
		$sotietth=$("#tietth").textbox("getValue");
		$thu=$("#thu").combobox("getValue");
		$malop=$("#malop").textbox("getValue");
		$phong=$("#phong").textbox("getValue");
		var bien ={ ID:$ID,mand:$mand,malophp:$malophp,mamon:$mamon,nienkhoa:$nienkhoa,sisolhp:$sisolhp,hocky:$hocky,ngaybd:$ngaybd,ngaykt:$ngaykt,tiet:$tiet,sotietlt:$sotietlt,sotietth:$sotietth,thu:$thu,malop:$malop,phong:$phong};
		sendajax("../model/sua.php",bien,"dg-khnh");
		$("#dklt-dlg").dialog("close");
	})
	}
	else{
		thongbao("Vui lòng chọn đăng ký");
	}
}
//xóa dang ky
function xoa(){
	var row = $('#dg-khnh').datagrid("getSelected");
	if(row){
		var bien ={ID:row.ID};
		xoadulieuajax("../model/xoa.php",bien,"dg-khnh","Bạn có muốn xóa mục này không ?");
	}
	else{
		thongbao("Vui lòng chọn mục cần xóa");
	}
}
//tải lại datagrid
function tailai()
{
         $('#dg-khnh').datagrid('reload'); 
}
