<?php
include "../../header/header.php"
?>
<script type="text/javascript" src="../js/ajax_nguoidung.js"></script>
<!-- Datagrid của nguoidung-->
<div style="width: 1200px; margin:auto;"><br>
   <table id="dg-khnh" class="easyui-datagrid" pageSize="20" title="Quản lý giảng viên" style="width:1200px;height:500px; text-align: center;"
        data-options="
        url: '../model/taidulieunguoidung.php',
        fitColumns:true,
        toolbar:'#tb-khnh',
        rownumbers:true,
        singleSelect:true,
        pagination:true">
    <thead>
         <tr>
            <th data-options="field:'mand', align:'center',width:100" ><b>Mã giảng viên</b></th>
            <th data-options="field:'tennd', align:'left',width:170"><b>Tên giảng viên</b></th>
            <th data-options="field:'ngaysinhnd', align:'center',width:90"><b>Ngày sinh</b></th>
            <th data-options="field:'diachi', align:'center',width:250"><b>Địa chỉ</b></th>
            <th data-options="field:'sdt', align:'center',width:90"><b>Số điện thoại</b></th>
            <th data-options="field:'email', align:'center',width:110"><b>Email</b></th>
            <th data-options="field:'gioitinh', align:'center',width:70"><b>Giới tính</b></th>
            <th data-options="field:'tenkhoa', align:'left',width:150"><b>Tên khoa</b></th>
            <th data-options="field:'tennhom', align:'left',width:130"><b>Tên nhóm</b></th>
        </tr>     
    </thead>       
</table>
    <!--Toolbar của datagrid nguoidung-->
    <div id="tb-khnh" style="padding:2px 5px;">
      <a onclick="themnguoidung()" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Thêm</a> 
      <a onclick="suattnd()" class="easyui-linkbutton" data-options="iconCls:'icon-edit'">Sửa</a>
      <a onclick="xoanguoidung()" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'">Xóa</a>
      <a onclick="tailai()" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Tải lại</a>
      <a  onclick="xuatex()" class="easyui-linkbutton" data-options="iconCls:'excel_icon'" href= "../export/excel/export_dsnd.php" >Xuất Excel</a>
      <input type="text" id="texb-khnh-search" class="easyui-textbox" prompt="Tìm kiếm" style="width: 200px;" data-options="onChange:function(val1,val2){ $('#dg-khnh').datagrid('load',{timkiem:val1})}">
    </div>
</div>

<!--Dialog thêm-->
<div id="nguoidung-dlg" class="easyui-dialog" title="Thông Tin Người Dùng" style="width:400px;height:fit-content;padding:10px 20px;"
        closed="true" buttons="#them-buttons">
    <form id="nguoidung-fm" method="post">
        <div class="fitem">
            <input name="mand" class="easyui-textbox" label="Mã người dùng:" labelPosition="top" required="true" style="width:100%" float ="left" id="mand">
        </div>
        <div class="fitem">
            <input name="tennd" class="easyui-textbox" label="Tên người dùng:" labelPosition="top" required="true" style="width:100%" id="tennd">
        </div>
        <div class="fitem">
            <input name="ngaysinh" class="easyui-datebox" label="Ngày sinh:" labelPosition="top" style="width:100%" id="ngaysinh">
        </div>
        <div class="fitem">
            <input name="diachi" class="easyui-textbox" label="Địa chỉ:" labelPosition="top" style="width:100%" id="diachi">
        </div>
        <div class="fitem">
            <input name="sdt" class="easyui-textbox" label="Số điện thoại:" labelPosition="top" style="width:100%" id="sdt">
        </div>
        <div class="fitem">
            <input name="email" class="easyui-textbox" label="Email:" labelPosition="top" style="width:100%" id="email">
        </div>
        <div class="fitem">
            <select id="gioitinh" class="easyui-combobox" name="gioitinh" label="Giới tính:" labelPosition="top" style="width:100%;">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
            </select>
        </div>
        <div class="fitem">
            <input id="makhoa" class="easyui-combobox" name="makhoa" style="width:100%;" data-options="
                    url:'../model/taidulieucomboboxnguoidung.php',
                    valueField: 'makhoa',
                    textField: 'tenkhoa',
                    label: 'Tên khoa:',
                    labelPosition: 'top'
                    ">
        </div>
        <div class="fitem">
            <input id="manhom" class="easyui-combobox" name="manhom" style="width:100%;" required="trues" data-options="
                    url:'../model/taidulieucomboboxnhom.php',
                    valueField: 'manhom',
                    textField: 'tennhom',
                    label: 'Tên nhóm:',
                    labelPosition: 'top'
                    ">
        </div>
    </form>
</div>  
<div id="them-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton" id="themnd" iconCls="icon-ok">Đồng ý</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="suathongtinnd" iconCls="icon-save">Sửa</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="thoat" onclick="javascript:$('#nguoidung-dlg').dialog('close')" iconCls="icon-cancel">Thoát</a>
</div>
<br>
<?php
 include "../../footer/footer.php"
?>