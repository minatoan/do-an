//thêm thông tin dang ky
function themdk(){
	$("#frm_dkphong").form('enableValidation').form('validate');
    if( !$("#frm_dkphong").form('validate')){
                return false;
    }
	$("#themdk").show();

	 $tu=$('#ngaydangky').combobox('getValue')
	 $ngaybatdau=$tu.toString()

                $den=$('#ngaytraphong').combobox('getValue')
                $ngayketthuc=$den.toString()
                var startDate = parseDate($ngaybatdau).getTime();
				var endDate = parseDate($ngayketthuc).getTime();
				if (startDate > endDate) {
				    thongbao(" ngày đăng ký phải < ngày trả phòng")
				    return false;
  				}
	$("#dangkythuchanh-dlg").dialog("open");
	$("#themdk").removeClass('clicked');
	$("#themdk").click(function(){
		$mand=$('#mand').combobox('getValue')
		alert($mand)
		$nienkhoa=$('#namhoc').combobox('getValue')
        $hocky=$('#hocky').combobox('getValue')
        $maphong=$('#maphong').combobox('getValue')
        $buoi=$('#buoi').combobox('getValue')
        var row = $('#cbgdangky').combogrid('grid').datagrid('getSelected');
            if(row){
                $mamon= row.mamon
                malophp=row.malophp
            }
            else{
                thongbao(" Vui lòng chọn lớp học phần")
                return false
            }
		$tiet=$("#tiet").textbox("getValue");
		$ghichu=$("#ghichu").textbox("getValue");	
		if (!$(this).hasClass('clicked')){
            $("#themdk").addClass('clicked')
            var bien ={dkphong:'',mand:$mand,maphong:$maphong,mamon:$mamon,namhoc:$nienkhoa,hocky:$hocky,ngaydangky:$tu,ngaytraphong:$den,buoi:$buoi,tiet:$tiet,ghichu:$ghichu};
			sendajax("../model/themdk.php",bien,"dg-khnh1")
			$("#dangkythuchanh-dlg").dialog("close");
        }
		
	})
}

//thêm dữ liệu
function themdl(){
	$("#themdl").show();
	$("#sua").hide();
	$("#dangkythuchanh1-dlg").dialog("open");
	$("#themdl").click(function(){
		$hocky=$("#hocky").combobox("getValue");
		$namhoc=$("#namhoc").textbox("getValue");
		var bien ={hocky:$hocky,namhoc:$namhoc};
		sendajax("../model/khoitaodulieu.php",bien,"dg-khnh1");
		$("#dangkythuchanh1-dlg").dialog("close");
	})
}
// sửa đăng ký
function suadangky(){
	$("#themdk").hide();
	$("#sua").show();
	var row = $("#dg-khnh").datagrid("getSelected");
	if(row){		
		$buoi=row.buoi;
		$maphong=row.maphong;
		$hocky=row.hocky;

		$("#dangkythuchanh-fm").form("load",row);
		$("#dangkythuchanh-dlg").dialog("open");
		$("#sua").click(function(){
		$ID=$("#ID").textbox("getValue");
		$mand=$("#mand").combobox("getValue");
		$maphong=$("#maphong").combobox("getValue");
		$mamon=$("#mamon").combobox("getValue");
		$namhoc=$("#namhoc").textbox("getValue"); 
		$ngaydangky=$("#ngaydangky").datebox("getValue");
		$ngaytraphong=$("#ngaytraphong").datebox("getValue");
		$thu=$("#thu").combobox("getValue");
		$tuan=$("#tuan").textbox("getValue");
		$sonhom=$("#sonhom").combobox("getValue");
		$tiet=$("#tiet").textbox("getValue");
		$buoi=$("#buoi").combobox("getValue");
		$hocky=$("#hocky").combobox("getValue");
		$ghichu=$("#ghichu").textbox("getValue");
		// $trangthai=$("#trangthai").textbox("getValue");
		var bien ={
			buoicu:row.buoi,
			maphongcu:row.maphong,
			hockycu:row.hocky,
			ngaydangkycu:row.ngaydangky,
			ngaytraphongcu:row.ngaytraphong,
			ID:$ID,
			mand:$mand,
			maphong:$maphong,
			mamon:$mamon,
			namhoc:$namhoc,
			ngaydangky:$ngaydangky,
			ngaytraphong:$ngaytraphong,
			thu:$thu,
			tuan:$tuan,
			sonhom:$sonhom,		
			tiet:$tiet,
			buoi:$buoi,
			hocky:$hocky,
			ghichu:$ghichu};
		sendajax("../model/sua.php",bien,"dg-khnh");
		$("#dangkythuchanh-dlg").dialog("close");
	})
	}
	else{
		thongbao("Vui lòng chọn đăng ký");
	}
}
//xóa dang ky
function xoadangky(){
	var row = $('#dg-khnh1').datagrid("getSelected");
	if(row){
		var bien ={ID:row.ID};
		xoadulieuajax("../model/xoa.php",bien,"dg-khnh1","Bạn có muốn xóa mục này không ?");
	}
	else{
		thongbao("Vui lòng chọn mục cần xóa");
	}
}
//tải lại datagrid
function tailai()
{
         $('#dg-khnh1').datagrid('reload'); 
}
 /*subgrid */
/*$(function(){
    $('#dg-khnh').datagrid({
        view: detailview,
        detailFormatter:function(index,row){
            return '<div style="padding:2px"><table pagination="true"  class="ddv' + index + '"></table></div>';
             
        },
        onExpandRow: function(index,row){
            var ddv = $(this).datagrid('getRowDetail',index).find('table.ddv'+index);
            var phu = row.mamon;
            ddv.datagrid({
                url: '../model/dangkythuchanh.php?id='+phu,
                fitColumns:true,
                singleSelect:true,
                rownumbers:true,
                loadMsg:'đang tải dữ liệu',
                emptyMsg:'Không tải được dữ liệu',
                height:'auto',
                columns:[[
                // damh sách các cột của bảng chi tiết đăng ký phòng thực hành
                // {field:'tennd',title:'Tên người dùng',width:'150px'},
                // {field:'maphong',title:'Mã phòng',width:120,align:'center'},
                // {field:'tenmon',title:'Tên môn',width:250,align:'right'},
                // {field:'namhoc',title:'Năm học',width:100,align:'center'},
                // {field:'hocky',title:'Học kỳ',width:100,align:'center'},
                {field:'ngaydangky',title:'Ngày đăng ký',width:180,align:'center'},
                {field:'ngaytraphong',title:'Ngày trả phòng',width:180,align:'center'},
                {field:'tuan',title:'Số tuần',width:100,align:'center'},
                {field:'buoi',title:'Buổi',width:100,align:'center'},
                {field:'tiet',title:'Tiết học',width:100,align:'center'},
                {field:'thu',title:'Thứ',width:100,align:'center'},
                {field:'sonhom',title:'Nhóm',width:100,align:'center'},
                {field:'maphong',title:'Phòng',width:100,align:'center'},
                {field:'ghichu',title:'Ghi chú',width:180,align:'center'},
                ]],
                onResize:function(){
                    $('#dg-khnh').datagrid('fixDetailRowHeight',index);
                },
                onLoadSuccess:function(){
                    setTimeout(function(){
                        $('#dg-khnh').datagrid('fixDetailRowHeight',index);
                    },0);
                }
            });
            $('#dg-khnh').datagrid('fixDetailRowHeight',index);
            index2=index;
        }
    });
});*/