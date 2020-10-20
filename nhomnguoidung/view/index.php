<?php
include "../../header/header.php"
?>
<script type="text/javascript" src="../js/ajax_nhomnguoidung.js"></script>
<br>
<!-- Datagrid của nhóm người dùng-->
<div style="width: 1200px; margin: auto;">
    <!--<h2>DataGrid with Toolbar</h2>
    <p>Put buttons on top toolbar of DataGrid.</p>-->
   <table id="dg-khnh" class="easyui-datagrid" title="Quản lý nhóm người dùng " style="width:1200px;height:500px;"
        data-options="
        url: '../model/taidulieunhomnguoidung.php',
        fitColumns:true,
        toolbar:'#tb-khnh',
        rownumbers:true,
        singleSelect:true,
        pagination:true">
    <thead>
        <tr>

            <th data-options="field:'id', align:'center',width:120" ><b>Mã số</b></th>
            <th data-options="field:'manguoidung', align:'center',width:320"><b>Mã người dùng</b></th>
            <th data-options="field:'manhom', align:'center',width:320"><b>Mã nhóm</b></th>            
        </tr>
    
    </thead>
</table>
    <!--Tool bar của datagrid nhóm người dùng-->
    <div id="tb-khnh" style="padding:2px 5px;">
      <!--<a  onclick="Them()" class="easyui-linkbutton" data-options=" iconCls:'icon-add'">Thêm</a> 
      <a  onclick="Sua()" class="easyui-linkbutton" data-options=" iconCls:'icon-save'">Sửa</a>
      <a  onclick="Xoa()" class="easyui-linkbutton" data-options=" iconCls:'icon-add'">Xoá</a>-->
       <a onclick="tailai()" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Tải lại</a>
      
    </div>
</div>
<br>
<?php
 include "../../footer/footer.php"
?>