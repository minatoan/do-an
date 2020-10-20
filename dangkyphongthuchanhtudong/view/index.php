  <?php
include "../../header/header.php";
            //echo $thucthi["manhom"];
?>
<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/dangkyphongthuchanhtudong/js/ajax_dangky.js"></script>
<!-- Datagrid của nguoidung-->
<div style="width: 1200px; margin: auto;"> <br>
   <table id="dg-khnh1" class="easyui-datagrid" pageSize="10" title="Xếp lịch thực hành tự động " style="width:1200px;"
        data-options="

        url: '../model/dangkythuchanh.php',
        fitColumns:true,
        toolbar:'#tb-khnh',
        singleSelect:true,
        rownumbers:true,
        pagination:true"
        >     
        <thead> 
            <tr>
                <th data-options="field:'tenphong', align:'center',width:70"><b>Phòng</b></th>
                <th data-options="field:'tenmon',  align:'lefy',width:120"><b>Môn học</b></th>
                <th data-options="field:'tennd',  align:'lefy',width:100"><b>Giảng viên</b></th>
                <th data-options="field:'tiet', align:'center',width:30"><b>Tiết</b></th>
                <th data-options="field:'buoi', align:'center',width:30"><b>Buổi</b></th>
                <th data-options="field:'hocky', align:'center',width:40"><b>Học kì</b></th>
                <th data-options="field:'namhoc', align:'center',width:50"><b>Năm học</b></th>
                <th data-options="field:'ngaydangky', align:'center',width:75"><b>Ngày đăng ký</b></th>
                <th data-options="field:'ngaytraphong', align:'center',width:75"><b>Ngày trả phòng</b></th>
                <th data-options="field:'ghichu', align:'center',width:100"><b>Ghi chú</b></th>  
            </tr>
        </thead>
    </table>
<!--Toolbar của datagrid dangky-->
    <div id="tb-khnh" style="padding:2px 5px; text-align: center;">
        <form id="frm_dkphong" action="../model/xeplichtudong.php" method="post">
            <!--combobox hiển thị năm hiện tại và 2 năm tiếp theo-->
            <div class="fitem" >
                <select id="namhoc" class="easyui-combobox" name="nienkhoa" label="Niên khóa:" labelPosition="left" style="width:180px;">
                    <option value="<?php echo date("Y")."-".(date("Y")+1); ?>"><?php  
                            echo date("Y")."-".(date("Y")+1);?>
                    </option>
                    <option value="<?php echo (date("Y")+1)."-".(date("Y")+2); ?>"><?php  
                            echo (date("Y")+1)."-".(date("Y")+2);
                        ?>
                    </option>
                </select>
            <!--Học kỳ 1-3-->
                <select id="hocky" class="easyui-combobox" name="hocky" label="Học kỳ:" labelPosition="left" required="true" style="width:180px;">
                    <option value="HK1">HK1</option>
                    <option value="HK2">HK2</option>
                    <option value="HK3">HK3</option>
                </select>
                <a  onclick="xeplichtudong()" class="easyui-linkbutton" style="width:180px" data-options=" iconCls:'icon-add'"> Xếp lịch</a>
                <a onclick="tailai()" class="easyui-linkbutton" style="width:85px" data-options="iconCls:'icon-reload'">Tải lại</a>
            </div>
        </form>        
    </div>
<?php
    include "../../footer/footer.php"
?> 
