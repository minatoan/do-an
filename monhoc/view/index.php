<?php
include "../../header/header.php"
?>
<script type="text/javascript" src="../js/ajax_monhoc.js"></script>
<br>
<!-- Datagrid của môn học-->
<div style="width: 1200px; margin: auto;">
 <!--   <h2>Thông tin môn học</h2>
    <p>nút trên toolbar của DataGrid.</p> -->
   <table id="dg-khnh" class="easyui-datagrid" title="Quản lý môn học " style="width:1200px;height:500px;"
        data-options="
        url: '../model/taidulieumonhoc.php',
        fitColumns:true,
        toolbar:'#tb-khnh',
        rownumbers:true,
        singleSelect:true,
        pagination:true">
    <thead>
        <tr>
            <th data-options="field:'mamon', align:'center',width:140" ><b>Mã môn học</b></th>
            <th data-options="field:'tenmon', align:'lefly',width:320"><b>Tên môn học</b></th>
            <th data-options="field:'mota', align:'center',width:280"><b>Số tín chỉ</b></th>
            <th data-options="field:'sotclythuyet', align:'center',width:280"><b>Lý thuyết</b></th>
            <th data-options="field:'sotcthuchanh', align:'center',width:280"><b>Thực hành</b></th>
        </tr>        
    </thead>   
</table>
    <!--Toolbar của datagrid môn học-->
    <div id="tb-khnh" style="padding:2px 5px;">
      <a  onclick="themmonhoc()" class="easyui-linkbutton" data-options=" iconCls:'icon-add'">Thêm</a> 
      <a  onclick="suamonhoc()" class="easyui-linkbutton" data-options=" iconCls:'icon-edit'">Sửa</a>
      <a  onclick="xoamonhoc()" class="easyui-linkbutton" data-options=" iconCls:'icon-cancel'">Xoá</a>
      <a  onclick="tailai()" class="easyui-linkbutton" data-options=" iconCls:'icon-reload'">Tải lại</a>
      <a  onclick="xuatex()" class="easyui-linkbutton" data-options="iconCls:'excel_icon'" href= "../export/excel/export_dsMH.php" >Xuất excel</a>
      <a  onclick="xemgv()" class="easyui-linkbutton" data-options=" iconCls:'icon-search'">Xem giảng viên</a>
      <input type="text" id="texb-khnh-search" class="easyui-textbox" prompt="Tìm kiếm" style="width: 200px;" data-options="onChange:function(val1,val2){ $('#dg-khnh').datagrid('load',{timkiem:val1})}">
       
    </div>
</div>

<!--Dialog thêm môn-->
<div id="monhoc-dlg" class="easyui-dialog" title="Thông tin môn học" style="width:400px;height:fit-content;padding:10px 20px"
        closed="true" buttons="#them-buttons">
    <form id="monhoc-fm" method="post">
        <div class="fitem">
           
            <input name="tenmon" class="easyui-textbox" label="Tên môn:" labelPosition="top" required="true" style="width:262px" id="tenkho">
        </div>
        <div class="fitem">
            
            <input name="mamon" class="easyui-textbox" label="Mã môn:" labelPosition="top" 
            required="true" style="width:262px" id="mamonhoc">
        </div>
        <div class="fitem">
            <input id="gvgd" class="easyui-combobox" name="mand" required="true" style="width:262px;" data-options="
                    url:'../model/taidulieucomboboxmonhoc.php',
                    valueField: 'mand',
                    textField: 'tennd',
                    label: 'Giảng viên:',
                    labelPosition: 'top'
                    ">
        </div>
        
        <div class="fitem">            
            <input name="ghichu" class="easyui-textbox" label="Số tín chỉ" labelPosition="top" style="width:262px" id="ghichu">
        </div>
        <div class="fitem">            
            <input name="sotclythuyet" class="easyui-textbox" label="Số lý thuyết" labelPosition="top" style="width:262px" id="sotclythuyet">
        </div><div class="fitem">            
            <input name="sotcthuchanh" class="easyui-textbox" label="Số thực hành" labelPosition="top" style="width:262px" id="sotcthuchanh">
        </div>
    </form>
</div>  
<!--Dialog xem giảng viên-->
<div id="xemgv-dlg" class="easyui-dialog" title="Xem Giảng Viên" style="width:800px;height:fit-content;"
        closed="true" buttons="#xemgv-buttons">
    <table id="dgxgv-khnh" class="easyui-datagrid"  style="width:780px;height:400px;"
        data-options="
        url: '../model/taidulieugiangvien.php',
        fitColumns:true,
        toolbar:'#tbxgv-khnh',
        rownumbers:true,
        singleSelect:true,
        pagination:true">
    <thead>
        <tr>
            <th data-options="field:'tennd', align:'lefly',width:320"><b>Tên giảng viên</b></th>
        </tr>        
    </thead>    
    </table>
<!--Tool bar của datagrid xem giảng viên-->
    <div id="tbxgv-khnh" style="padding:2px 5px;">
    <a  onclick="themgiangvien()" class="easyui-linkbutton" data-options=" iconCls:'icon-add'">Thêm</a>
    <a  onclick="xoagiangvien()" class="easyui-linkbutton" data-options=" iconCls:'icon-cancel'">Xoá</a>
    
        <form id="xemgvv-fm" method="post">
        <div class="fitem" style="float: left;">
            <input id="tennd" class="easyui-combobox" name="tennd" required="true" style="width:262px;" data-options="
                    url:'../model/taidulieucomboboxmonhoc.php',
                    valueField: 'mand',
                    textField: 'tennd',
                    label: '',
                    labelPosition: 'top'
                    ">
        </div>
    </form> 
    </div>

</div>
<!--buttons thêm môn học-->
<div id="them-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton" id="themmh" iconCls="icon-ok">Đồng ý</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="suamh" iconCls="icon-save">Sửa</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="xoamh" iconCls="icon-cancel">Xoá</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#monhoc-dlg').dialog('close')" iconCls="icon-cancel">Thoát</a>
</div>
<br>
<?php
include "../../footer/footer.php"
?>