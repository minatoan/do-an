<?php
include "../../header/header.php"
?>
<br>
<script type="text/javascript" src="../js/ajax_phong.js"></script>
<!-- Datagrid của phòng-->
<div style="width: 1200px; margin: auto;">
   <table id="dg-khnh" class="easyui-datagrid" title="Quản lý phòng " style="width:1200px;height:500px;"
        data-options="
        url:'../model/tailieuphong.php',
        fitColumns:true,
        toolbar:'#tb-khnh',
        rownumbers:true,
        singleSelect:true,
        pagination:true">
    <thead>
        <tr>
            <th data-options="field:'maphong', align:'center',width:90" ><b>Mã phòng</b></th>
            <th data-options="field:'tenphong', align:'center',width:90"><b>Tên phòng</b></th>
            <th data-options="field:'somay', align:'center',width:100"><b>Số máy</b></th>
            <th data-options="field:'ghichu', align:'lefy',width:150"><b>Ghi chú</b></th>           
        </tr>        
    </thead>    
    </table>
    <!--Tool bar của datagrid phòng-->
    <div id="tb-khnh" style="padding:2px 5px;">
      <a  onclick="themphong()" class="easyui-linkbutton" data-options=" iconCls:'icon-add'">Thêm</a> 
      <a  onclick="sua()" class="easyui-linkbutton" data-options=" iconCls:'icon-edit'">Sửa</a>
      <a  onclick="xoa()" class="easyui-linkbutton" data-options=" iconCls:'icon-cancel'">Xoá</a>
      <a  onclick="tailai()" class="easyui-linkbutton" data-options=" iconCls:'icon-reload'">Tải lại</a>
       <a  onclick="xuatex()" class="easyui-linkbutton" data-options="iconCls:'excel_icon'" href= "../export/excel/export_dsphong.php" >Xuất Excel</a>
      <input type="text" id="texb-khnh-search" class="easyui-textbox" prompt="Tìm kiếm" style="width: 200px;" data-options="onChange:function(val1,val2){ $('#dg-khnh').datagrid('load',{timkiem:val1})}">
    </div>
</div>
<!--Dialog thêm phòng-->
<div id="phong-dlg" class="easyui-dialog" title="Thông tin phòng" style="width:500px;height:fit-content;padding:10px 20px"
        closed="true" buttons="#them-buttons">

    <form id="phong-fm" method="post">
            
        <div class="fitem">
            <input name="maphong" class="easyui-textbox" label="Mã phòng:" labelPosition="top" required="true" style="width:300px;float: left;" id="maphong">
            
        </div> 
        <br>
        <div class="fitem">
            <input name="tenphong" class="easyui-textbox" label="Tên phòng:" labelPosition="top" required="true" style="width:300px;float: left;" id="tenphong">
            
        </div>
        <div class="fitem">
            <input name="somay" class="easyui-textbox" label="Số máy:" labelPosition="top" required="true" style="width:300px;float: left;" id="somay">
            
        </div>
        <div class="fitem">
            <input name="ghichu" class="easyui-textbox" label="Ghi chú:" labelPosition="top"  style="width:300px;float: left;" id="ghichu">
           
        </div>
        
    </form>
</div>  
<div id="them-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton" id="them" iconCls="icon-ok">Đồng ý</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="suaphong" iconCls="icon-save">Sửa</a>
     <a href="javascript:void(0)" class="easyui-linkbutton" id="thoat" onclick="javascript:$('#phong-dlg').dialog('close')" iconCls="icon-cancel">Thoát</a>
</div>
<br>
<?php
 include "../../footer/footer.php"
?>