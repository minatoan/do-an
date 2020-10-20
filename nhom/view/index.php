<?php
include "../../header/header.php"
?>
<!-- Datagrid của nhom-->
<script type="text/javascript" src="../js/ajax_nhom.js"></script>
<br>
<div style="width: 1200px; margin: auto;">
   <table id="nhom_dg" class="easyui-datagrid" title="Quản lý nhóm" style="width:1200px;height:500px;"
        data-options="
        url: '../model/tailieunhom.php',
        fitColumns:true,
        toolbar:'#tb-khnh',
        rownumbers:true,
        singleSelect:true,
        pagination:true">
    <thead>
        <tr>
            <th data-options="field:'manhom', align:'center',width:120" ><b>Mã nhóm</b></th>
            <th data-options="field:'tennhom', align:'lefy',width:320"><b>Tên nhóm</b></th>
            <th data-options="field:'quyen', align:'lefy',width:320"><b>Quyền</b></th>
            <th data-options="field:'ghichu', align:'lefy',width:320"><b>Ghi chú</b></th>
        </tr>
    </thead>     
</table>    
    <!--Tool bar của datagrid nhom-->
    <div id="tb-khnh" style="padding:2px 5px;">
	  <a  onclick="thanhviennhom()" class="easyui-linkbutton" data-options=" iconCls:'icon-add'">Thêm</a> 
	  <a  onclick="suanhom()" class="easyui-linkbutton" data-options=" iconCls:'icon-edit'">Sửa</a>
      <a  onclick="xoa()" class="easyui-linkbutton" data-options=" iconCls:'icon-cancel'">Xoá</a>
      <a  onclick="tailai()" class="easyui-linkbutton" data-options=" iconCls:'icon-reload'">Tải lại</a>
      <a  onclick="xuatex()" class="easyui-linkbutton" data-options="iconCls:'excel_icon'" href= "../export/excel/export_dsNhom.php" >Xuất Excel</a>        
	  <input type="text" id="texb-khnh-search" class="easyui-textbox" prompt="Tìm mã nhóm, tên nhóm" style="width: 200px;" data-options="onChange:function(val1,val2){ $('#nhom_dg').datagrid('load',{timkiem:val1})}"> 
	</div>
</div>
<!--Dialog button thêm-->
<div id="thanhviennhom-dlg" class="easyui-dialog" title="Thông tin thanh viên nhóm" style="width:700px;height:fit-content;padding:10px 20px"
        closed="true" buttons="#themnhom-buttons">
     <!--  <div class="ftitle" style="text-align">Thông Tin nhóm</div> -->
    <form id="themnhom-fm" method="post">        
        <div class="fitem">
            <input name="manhom" class="easyui-textbox" label="Mã nhóm:" labelPosition="top" style="width:262px; float:  right;" id="manhom">
            <input name="tennhom" class="easyui-textbox" label="Tên nhóm:" labelPosition="top" required="true" style="width:262px;float: left;" id="tennhom">
        <input id="nm" class="easyui-combobox" name="quyen" style="width:262px;" data-options="
                    url:'../model/taidulieucomboboxnhom.php',
                    valueField: 'quyen',
                    textField: 'quyen',
                    label: 'Quyền:',
                    labelPosition: 'top'
                    ">              
            <input name="ghichu" class="easyui-textbox" label="Ghi chú:" labelPosition="top" style="width:262px; float:  right;" id="ghichu">              
        </div>
    <br>
    </form> 
</div>
<div id="themnhom-buttons">   
    <a href="javascript:void(0)" class="easyui-linkbutton" id="themnhom" iconCls="icon-ok">Đồng ý</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="sua" iconCls="icon-ok">Sửa</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="thoat" onclick="javascript:$('#thanhviennhom-dlg').dialog('close')" iconCls="icon-cancel">Thoát</a>
</div>

<!--Dialog button sửa nhóm-->
<div id="suanhom-dlg" class="easyui-dialog" title="Thông tin sửa nhóm" style="width:700px;height:fit-content;padding:10px 20px"
        closed="true" buttons="#suanhom-buttons">
     <!--  <div class="ftitle" style="text-align">Thông Tin nhóm</div> -->
    <form id="suanhom-fm" method="post">
        <div class="fitem">
            <input id="mn" class="easyui-combobox" name="quyen" style="width:262px;" data-options="
                    url:'../model/taidulieucomboboxnhom.php',
                    valueField: 'quyen',
                    textField: 'quyen',
                    label: 'Quyền:',
                    labelPosition: 'top'
                    ">     
        </div>
        <div class="fitem">
            <input name="tennhom" class="easyui-textbox" label="Tên nhóm:" labelPosition="top" required="true" style="width:262px;float: left;" id="tennhom">

             <input name="quyen" class="easyui-textbox" label="Quyền:" labelPosition="top" required="true" style="width:262px; float:  right;" id="quyen">

             <input name="ghichu" class="easyui-textbox" label="Ghi chú:" labelPosition="top" style="width:262px; float:  right;" id="ghichu">
        </div>
    <br>
    </form> 
</div>
<div id="suanhom-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton" id="suanhom" iconCls="icon-ok">Cập nhật</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="thoat" onclick="javascript:$('#suanhom-dlg').dialog('close')" iconCls="icon-cancel">Thoát</a>    
</div>
<br>
<?php
 include "../../footer/footer.php"
?>