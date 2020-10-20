<?php
include "../../header/header.php"
?>

<script type="text/javascript" src="../js/ajax_khoa.js"></script>
<br>
<!-- Datagrid của khoa-->

<div style="width: 1200px; margin: auto;">
 <!--   <h2>Thông tin môn học</h2>
    <p>Put buttons on top toolbar of DataGrid.</p> -->
   <table id="dg-khnh" class="easyui-datagrid" title="Quản lý khoa " style="width:1200px;height:500px;"
        data-options="
        url: '../model/taidulieukhoa.php',
        fitColumns:true,
        toolbar:'#tb-khnh',
        rownumbers:true,
        singleSelect:true,
        pagination:true">
    <thead>
        <tr>
            <th data-options="field:'makhoa', align:'center',width:120" ><b>Mã khoa</b></th>
            <th data-options="field:'tenkhoa', align:'lefly',width:320"><b>Tên khoa</b></th>
    </thead>      
</table>
    <!--Tool bar của datagrid môn học-->
    <div id="tb-khnh" style="padding:2px 5px;">
      <a  onclick="themkhoa()" class="easyui-linkbutton" data-options=" iconCls:'icon-add'">Thêm</a> 
      <a  onclick="suakhoa()" class="easyui-linkbutton" data-options=" iconCls:'icon-edit'">Sửa</a>
      <a  onclick="xoakhoa()" class="easyui-linkbutton" data-options=" iconCls:'icon-cancel'">Xoá</a>      
      <a  onclick="tailai()" class="easyui-linkbutton" data-options=" iconCls:'icon-reload'">Tải lại</a>
      <a  onclick="xuatex()" class="easyui-linkbutton" data-options="iconCls:'excel_icon'" href= "../export/excel/export_dskhoa.php">Xuất Excel</a>
      <input type="text" id="texb-khnh-search" class="easyui-textbox" prompt="Tìm kiếm" style="width: 200px;" data-options="onChange:function(val1,val2){ $('#dg-khnh').datagrid('load',{timkiem:val1})}">      
    </div>
</div>
<!--Dialog thêm khoa-->
<div id="khoa-dlg" class="easyui-dialog" title="Thêm khoa" style="width:400px;height:fit-content;padding:10px 20px"
        closed="true" buttons="#them-buttons">
    <form id="khoa-fm" method="post">
    <div class="fitem">
            <input name="makhoa" class="easyui-textbox" label="Mã khoa:" labelPosition="top" 
            required="true" style="width:262px" id="makhoa">
        </div>
        
        <div class="fitem">
            <input name="tenkhoa" class="easyui-textbox" label="Tên khoa:" labelPosition="top" required="true" style="width:262px" id="tenkhoa">
        </div>
        
    </form>
</div>  
<div id="them-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton" id="tk" iconCls="icon-ok">Đồng ý</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="sk" iconCls="icon-save">Sửa</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#khoa-dlg').dialog('close')" iconCls="icon-cancel">Thoát</a>
</div>
<br>
<?php
 include "../../footer/footer.php"
?>






