<?php
include "../../header/header.php";
?>
<script type="text/javascript" src="../js/ajax_dklt.js"></script>
<br>
<!-- Datagrid của lịch học lý thuyết-->

<div style="width: 1200px; margin: auto;">
   <table id="dg-khnh" class="easyui-datagrid" title="Lịch học lý thuyết" style="width:1200px;height:500px;"
        data-options="
        url: '../model/taidulieu.php',
        fitColumns:true,
        toolbar:'#tb-khnh',
        rownumbers:true,
        singleSelect:true,
        pagination:true">
    <thead>
        <tr>
            <th data-options="field:'tennd', align:'left',width:330"><b>Giảng viên</b></th>
            <th data-options="field:'malophp', align:'center',width:240" ><b>Mã lớp học phần</b></th>
            <th data-options="field:'sisolhp', align:'center',width:80"><b>Sỉ số</b></th>
            <th data-options="field:'tenmon', align:'left',width:290"><b>Tên môn</b></th>
            <th data-options="field:'thu', align:'center',width:80"><b>Thứ</b></th>
            <th data-options="field:'sotietlt', align:'center',width:160"><b>Tiết LT</b></th>
            <th data-options="field:'sotietth', align:'center',width:160"><b>Tiết TH</b></th>
            <th data-options="field:'tiet', align:'center',width:80"><b>Tiết</b></th>
            <th data-options="field:'ngaybd', align:'center',width:180"><b>Ngày BĐ</b></th>
            <th data-options="field:'ngaykt', align:'center',width:180"><b>Ngày KT</b></th>
            <th data-options="field:'hocky', align:'center',width:120"><b>Học kỳ</b></th>
            <th data-options="field:'nienkhoa', align:'center',width:200"><b>Năm học</b></th>
            <th data-options="field:'malop', align:'center',width:200"><b>Mã lớp</b></th>
            <th data-options="field:'phong', align:'center',width:160"><b>Phòng</b></th>
        </tr>
    </thead>      
    </table>
    <!--Tool bar của datagrid môn học-->
    <div id="tb-khnh" style="padding:2px 5px;">
      <a onclick="them()" class="easyui-linkbutton" data-options=" iconCls:'icon-add'">Thêm</a> 
      <a onclick="sua()" class="easyui-linkbutton" data-options=" iconCls:'icon-edit'">Sửa</a>
      <a onclick="xoa()" class="easyui-linkbutton" data-options=" iconCls:'icon-cancel'">Xoá</a>      
      <a onclick="tailai()" class="easyui-linkbutton" data-options=" iconCls:'icon-reload'">Tải lại</a>
      <button onclick="xuatex()" class="easyui-linkbutton" data-options="iconCls:'excel_icon'">Xuất excel</button>
      <input type="text" id="texb-khnh-search" class="easyui-textbox" prompt="Tìm kiếm" style="width: 200px;" data-options="onChange:function(val1,val2,val3,val4,val5,val6,val7){ $('#dg-khnh').datagrid('load',{timkiem:val1,val2,val3,val4,val5,val6,val7})}">    
    <form action="../../phpexcellad/index.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="btnGui">Import</button>
    </form>
    </div>
</div>
<!--Dialog thêm dklt-->
<div id="dklt-dlg" class="easyui-dialog" title="Lịch học lý thuyết " style="width:700px;height:fit-content;padding:10px 20px"
        closed="true" buttons="#them-buttons">
    <form id="dklt-fm" method="post">
          <div class="fitem" style="float: left;">
            <input  name="ID" class="easyui-textbox" label="" labelPosition="top"  style="width:0px" id="ID" type="hidden" >
        </div>
         <div class="fitem" style="float: right;">
            <input id="mand" class="easyui-combobox" name="mand" required="true" style="width:290px;" data-options="
                    url:'../../dangkythuchanh/model/taidulieucomboboxnguoidung.php',
                    valueField: 'mand',
                    textField: 'tennd',
                    label: 'Tên người dùng:',
                    labelPosition: 'top'
                    ">
        </div>
        <div class="fitem" style="float: left;">
            <input name="malophp" class="easyui-textbox" label="Mã lớp học phần:" labelPosition="top" required="true" style="width:290px" id="malophp">
        </div>
        <div class="fitem" style="float: right;">
            <input name="sisolhp" class="easyui-textbox" label="Sỉ số:" labelPosition="top" 
            required="true" style="width:290px" id="sisolhp">
        </div>
        <div class="fitem" style="float: left;">
            <input id="mamon" class="easyui-combobox" name="mamon" required="true" style="width:290px;" data-options="
                    url:'../../dangkythuchanh/model/taidulieucomboboxmonhoc.php',
                    valueField: 'mamon',
                    textField: 'tenmon',
                    label: 'Tên môn học:',
                    labelPosition: 'top'
                    ">
        </div>
        <div class="fitem" style="float: right;">
            <input name="tiet" class="easyui-textbox" label="Tiết:" labelPosition="top" 
            required="true" style="width:290px" id="tiet">
        </div>
        <div class="fitem" style="float: left;">
            <input name="sotietlt" class="easyui-textbox" label="Số Tiết Lý Thuyết:" labelPosition="top" 
            required="true" style="width:290px" id="tietlt">
        </div>
        <div class="fitem" style="float: right;">
            <input name="sotietth" class="easyui-textbox" label="Số Tiết Thực Hành:" labelPosition="top" 
            required="true" style="width:290px" id="tietth">
        </div>
        <div class="fitem" style="float: left;">                      
                <select id="thu" class="easyui-combobox" name="thu" label="Thứ" labelPosition="top" style="width:290px;">
                    <option value="Thứ 2">Thứ 2</option>
                    <option value="Thứ 3">Thứ 3</option>
                    <option value="Thứ 4">Thứ 4</option>
                    <option value="Thứ 5">Thứ 5</option>
                    <option value="Thứ 6">Thứ 6</option>
                    <option value="Thứ 7">Thứ 7</option>
                    <option value="Chủ nhật">Chủ nhật</option>
                </select>
        </div>  
        <div class="fitem" style="float: right;">
            <select id="hocky" class="easyui-combobox" name="hocky" label="Học kỳ" labelPosition="top" style="width:290px;">
                <option value="HK1">HK1</option>
                <option value="HK2">HK2</option>
                <option value="HK3">HK3</option>
            </select>
        </div>
        <div class="fitem" style="float: left;">
            <input name="ngaybd" class="easyui-datebox" label="Ngày bắt đầu" labelPosition="top" required="true" style="width:290px" id="ngaybd">
        </div>
        <div class="fitem" style="float: right;">
            <input name="ngaykt" class="easyui-datebox" label="Ngày kết thúc" labelPosition="top" required="true" style="width:290px" id="ngaykt">
        </div>        
         <div class="fitem" style="float: left;">
            <select id="nienkhoa" class="easyui-combobox" name="nienkhoa" label="Niên Khóa:" labelPosition="top" style="width:290px;">
                <option value="<?php echo date("Y")."-".(date("Y")+1); ?>"><?php  
                            echo date("Y")."-".(date("Y")+1);
                        ?>
                </option>
                <option value="<?php echo (date("Y")+1)."-".(date("Y")+2); ?>">
                        <?php  
                            echo (date("Y")+1)."-".(date("Y")+2);
                        ?>
                </option>
            </select>
        </div>
        <div class="fitem" style="float: right;">
            <input name="malop" class="easyui-combobox" label="Mã Lớp:" labelPosition="top" 
            required="true" style="width:290px" id="malop" data-options="
                    url:'../model/taidulieucombobox.php',
                    valueField: 'malop',
                    textField: 'tenlop',
                    label: 'Tên lớp:',
                    labelPosition: 'top'
                    ">
        </div>
        <div class="fitem" style="float: left;">
            <input name="phong" class="easyui-textbox" label="Phòng:" labelPosition="top" 
            required="true" style="width:290px" id="phong">
        </div>
    </form>
</div>  
<div id="them-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton" id="dongy" iconCls="icon-ok">Đồng ý</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" id="sua" iconCls="icon-save">Sửa</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#dklt-dlg').dialog('close')" iconCls="icon-cancel">Thoát</a>
</div>
<br>
<script type="text/javascript">
        function xuatex(){
            let link = '../export/export_lhlt.php';
            let rows = $('#dg-khnh').datagrid('getData').rows;
            let data = [];
            for(const row of rows){
                data.push(row.ID);
            }
            if(!data.includes(undefined)){
                link = link+'?ids=['+data.join()+']';
            }
            window.location = link;

        }
    </script>
<?php
 include "../../footer/footer.php"
?>