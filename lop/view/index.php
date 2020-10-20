<?php
include "../../header/header.php"
?>
<!-- Datagrid của lop-->
<script type="text/javascript" src="../js/ajax_lop.js"></script>
<br>
<div style="width: 1200px; margin: auto;">
   <table id="lop_dg" class="easyui-datagrid" title="Quản lý lớp" style="width:1200px;height:500px;"
        data-options="
        url: '../model/tailieulop.php',
        fitColumns:true,
        toolbar:'#tb-khnh',
        rownumbers:true,
        singleSelect:true,
        pagination:true">
    <thead>
        <tr>
            <th data-options="field:'malop', align:'center',width:120" ><b>Mã lớp</b></th>
            <th data-options="field:'tenlop', align:'lefy',width:320"><b>Tên lớp</b></th>
            <th data-options="field:'siso', align:'lefy',width:320"><b>Sỉ số</b></th>
            <th data-options="field:'tenkhoa', align:'lefy',width:320"><b>Tên khoa</b></th>
        </tr>
    </thead>     
</table>    
    <!--Tool bar của datagrid lop-->
    <div id="tb-khnh" style="padding:2px 5px;">
	  <a  onclick="thanhvienlop()" class="easyui-linkbutton" data-options=" iconCls:'icon-add'">Thêm</a> 
	  <a  onclick="sualop()" class="easyui-linkbutton" data-options=" iconCls:'icon-edit'">Sửa</a>
      <a  onclick="xoa()" class="easyui-linkbutton" data-options=" iconCls:'icon-cancel'">Xoá</a>
      <a  onclick="tailai()" class="easyui-linkbutton" data-options=" iconCls:'icon-reload'">Tải lại</a>
      <a  onclick="xuatex()" class="easyui-linkbutton" data-options="iconCls:'excel_icon'" href= "../export/excel/export_dslop.php" >Xuất Excel</a>        
	  <input type="text" id="texb-khnh-search" class="easyui-textbox" prompt="Tìm mã lớp, tên lớp" style="width: 200px;" data-options="onChange:function(val1,val2){ $('#lop_dg').datagrid('load',{timkiem:val1})}"> 
	</div>
</div>
<!--Dialog button thêm-->
<div id="thanhvienlop-dlg" class="easyui-dialog" title="Thông tin thành viên lớp" style="width:700px;height:fit-content;padding:10px 20px"
        closed="true" buttons="#themlop-buttons">
     <!--  <div class="ftitle" style="text-align">Thông Tin lớp</div> -->
    <form id="themlop-fm" method="post">        
        <div class="fitem">
            <input name="malop" class="easyui-textbox" label="Mã lớp:" labelPosition="top" required="true" style="width:262px; float:  right;" id="malop">
            <input name="tenlop" class="easyui-textbox" label="Tên lớp:" labelPosition="top" required="true" style="width:262px;float: left;" id="tenlop">
            <input name="siso" class="easyui-textbox" label="Sỉ số:" labelPosition="top" style="width:262px; float:  right;" id="siso"> 
            <input id="makhoa" class="easyui-combobox" name="makhoa" required="true" style="width:262px;" data-options="
                    url:'../model/taidulieucomboboxlop.php',
                    valueField: 'makhoa',
                    textField: 'tenkhoa',
                    label: 'Tên khoa:',
                    labelPosition: 'top'
                    ">    
        </div>
    <br>
    </form> 
</div>
<div id="themlop-buttons">   
    <a href="javascript:void(0)" class="easyui-linkbutton" id="themlop" iconCls="icon-ok">Đồng ý</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="sua" iconCls="icon-ok">Sửa</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="thoat" onclick="javascript:$('#thanhvienlop-dlg').dialog('close')" iconCls="icon-cancel">Thoát</a>
</div>

<!--Dialog button sửa lớp-->
<div id="sualop-dlg" class="easyui-dialog" title="Thông tin sửa lớp" style="width:700px;height:fit-content;padding:10px 20px"
        closed="true" buttons="#sualop-buttons">
     <!--  <div class="ftitle" style="text-align">Thông Tin lớp</div> -->
    <form id="sualop-fm" method="post">
        <div class="fitem">
            <input id="khoa" class="easyui-combobox" name="khoa" style="width:262px;" data-options="
                    url:'../model/taidulieucomboboxlop.php',
                    valueField: 'makhoa',
                    textField: 'khoa',
                    label: 'Tên khoa:',
                    labelPosition: 'top'
                    ">
        </div>
        <div class="fitem">
            <input name="tenlop" class="easyui-textbox" label="Tên lớp:" labelPosition="top" required="true" style="width:262px;float: left;" id="tenlop">
            <input name="siso" class="easyui-textbox" label="Sỉ số:" labelPosition="top" required="true" style="width:262px; float:  right;" id="siso">
    <br>
    </form> 
</div>
<div id="sualop-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton" id="sualop" iconCls="icon-ok">Cập nhật</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="thoat" onclick="javascript:$('#sualop-dlg').dialog('close')" iconCls="icon-cancel">Thoát</a>    
</div>
</div>
<br>
<?php
 include "../../footer/footer.php"
?>