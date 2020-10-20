//Xếp lịch tự động
function xeplichtudong(){
/*Xếp lịch tự động*/
	$.messager.confirm({
		title: 'Xác nhận',
		msg: 'Bạn có muốn thực hiện xếp lịch tự động không?',
		fn: function(r){
			if (r){
				$("#frm_dkphong").submit();
			}
		}
	});
}
//tải lại datagrid
function tailai()
{
	$('#dg-khnh1').datagrid('reload'); 
}
 /*subgrid */
$(function(){
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
});