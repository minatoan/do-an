  <?php
include "../../header/header.php";
            //echo $thucthi["manhom"];
?>
<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/qlpmth/dangkythuchanh/js/ajax_dangky.js"></script>
<!-- Datagrid của nguoidung-->
<div style="width: 1200px; margin: auto;"> <br>
   <table id="dg-khnh1" class="easyui-datagrid" pageSize="10" title="Đăng ký thực hành " style="width:1200px;"
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
                <th data-options="field:'tenmh',  align:'lefy',width:120"><b>Môn học</b></th>
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
        <form id="frm_dkphong">
            <div class="fitem" required="true" style="float: left; padding-top: 10px; padding-left: 10px; margin-left: 30px;">
                <select id="cbgdangky"class="easyui-combogrid" style="width:200px;" data-options="
                      rownumbers:'true',
                                panelWidth: 500,
                                idField: 'id',
                                textField: 'tenmon',
                                url: '../model/taidulieucombogriddangky.php',
                                method: 'get',
                                columns: [[
                                    {field:'tenmon',title:'Tên học phần',width:100,align:'center'},
                                    {field:'tenlop',title:'Lớp',width:120,align:'center'},
                                    {field:'sisolhp',title:'Sỉ số',width:60,align:'center'},
                                    {field:'thu',title:'Thứ',width:60,align:'center'},
                                    {field:'tiet',title:'Tiết',width:60,align:'center'},
                                    <!-- {field:'status',title:'Status',width:60,align:'center'} -->
                                ]],
                                fitColumns: true,
                                label: 'Lớp học phần:',
                                labelPosition: 'top'
                            ">
                </select>
            </div>
            
            <div class="fitem" style="float: left; padding-top: 10px; padding-left: 50px;">
                <select id="namhoc" class="easyui-combobox" name="namhoc" label="Niên khóa:" labelPosition="top" style="width:180px;">
                    <option value="<?php echo date("Y")."-".(date("Y")+1); ?>"><?php  
                            echo date("Y")."-".(date("Y")+1);?>
                    </option>
                    <option value="<?php echo (date("Y")+1)."-".(date("Y")+2); ?>"><?php  
                            echo (date("Y")+1)."-".(date("Y")+2);
                        ?>
                    </option>
                </select>
            </div>

            <div class="fitem" style="float: left; padding-top: 10px; padding-left: 50px;;">
                <select id="hocky" class="easyui-combobox" name="hocky" label="Học kỳ:" labelPosition="top" required="true" style="width:180px;">
                    <option value="HK1">HK1</option>
                    <option value="HK2">HK2</option>
                    <option value="HK3">HK3</option>
                </select>
            </div>

            <div class="fitem" style="float: left; padding-top: 10px; padding-left: 50px;">
                <input name="ngaydangky" class="easyui-datebox" label="Ngày đăng ký:" labelPosition="top" required="true" style="width:180px" id="ngaydangky" data-options="formatter:myformatter,parser:myparser,panelHeight:300" >
            </div>

            <div class="fitem" style="float: left; padding-top: 10px; padding-left: 50px;">
                <input name="ngaytraphong" class="easyui-datebox" label="Ngày trả phòng:" labelPosition="top" required="true" style="width:180px" id="ngaytraphong" data-options="formatter:myformatter,parser:myparser,panelHeight:300" >
            </div>

            <div class="fitem" style="float: left; padding-bottom: 10px; padding-left: 10px; margin-left: 30px;">
                <input id ="maphong" class="easyui-combobox" name="maphong" required="true" style="width:200px;" data-options="
                                textField: 'tenphong',
                                valueField: 'maphong',
                                url: '../model/taidulieucomboboxphong.php',
                                label: 'Phòng:',
                                labelPosition: 'top'
                            ">
            </div>

            <div class="fitem" style="float: left; padding-bottom: 10px; padding-left: 50px;">                      
                    <select id="buoi" class="easyui-combobox" name="buoi" label="Buổi" labelPosition="top" required="true" style="width:180px;">
                        <option value="Sáng">Sáng</option>
                        <option value="Chiều">Chiều</option>
                        <option value="Tối">Tối</option>
                    </select>
            </div>  
        </form>        

<!--Buttons thêm, xóa, tìm du lieu-->   
        <!-- <div class="fitem" style="float: left; padding-bottom: 10px; padding-left: 50px;">
            <a  onclick="themdl()" class="easyui-linkbutton" data-options=" iconCls:'icon-add'">Thêm dữ liệu</a>
        </div> -->

        <div class="fitem" style="float: left; padding-left: 50px; padding-top: 20px;">
            <a  onclick="themdk()" class="easyui-linkbutton" style="width:180px" data-options=" iconCls:'icon-edit'"> Thêm đăng ký</a>
        </div>
        
        <div class="fitem" style="float: left; padding-left: 50px; padding-top: 20px;">   
            <a onclick="
                $nienkhoa=$('#namhoc').combobox('getValue')
                $hocky=$('#hocky').combobox('getValue')
                $tu=$('#ngaydangky').combobox('getValue')
                $den=$('#ngaytraphong').combobox('getValue')
                $maphong=$('#maphong').combobox('getValue')
                $buoi=$('#buoi').combobox('getValue')
                var row = $('#cbgdangky').combogrid('grid').datagrid('getSelected');
                if(row){
                    $mamon= row.mamon
                    $malophp=row.malophp
                }
                else{
                    $mamon=''
                    $malophp=''
                }
                $bien={loai:'timkiemphongtrong', nienkhoa:$nienkhoa,hocky:$hocky,tu:$tu,den:$den,mamon:$mamon,malophp:$malophp,maphong:$maphong,buoi:$buoi}
                timkiemkethop('ngaydangky','ngaytraphong','dg-khnh1',$bien)
                " class="easyui-linkbutton" style="width:85px" data-options=" iconCls:'icon-search'">Tìm</a>
        </div>

        <div class="fitem" style="float: left; padding-left: 26px; padding-top: 20px;"> 
            <a onclick="xoadangky()" class="easyui-linkbutton" style="width:85px" data-options="iconCls:'icon-cancel'">Xóa</a>
        </div>
        
        <div class="fitem" style="float: left; padding-left: 26px; padding-top: 20px;"> 
            <a onclick="tailai()" class="easyui-linkbutton" style="width:85px" data-options="iconCls:'icon-reload'">Tải lại</a>
        </div>
        <div class="fitem" style="float: left; padding-left: 26px; padding-top: 20px;"> 
        <button  onclick="xuatex()" class="easyui-linkbutton" data-options="iconCls:'excel_icon'" >Xuất excel</button>
        </div>        
    <!--Dialog  dang ky-->
        <div id="dangkythuchanh-dlg" class="easyui-dialog" title="Thông tin đăng ký" style="width:650px;height:fit-content;padding:10px 20px;" closed="true" buttons="#them-buttons">
            <form id="dangkythuchanh-fm" method="post"> 
                <div class="fitem" style="float: left;">
                    <input name="tiet" class="easyui-textbox" label="Tiết học" labelPosition="top" style="width:290px" id="tiet">
                </div>         
                <div class="fitem" style="float: right:;">
                    <input name="ghichu" class="easyui-textbox" label="Ghi chú" labelPosition="top" style="width:100%; height: 100px" id="ghichu">
                </div>    
            </form>
        </div>  
        <div id="them-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton" id="themdk" iconCls="icon-ok">Đồng ý</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" id="thoat" onclick="javascript:$('#dangkythuchanh-dlg').dialog('close')" iconCls="icon-cancel">Thoát</a>
        </div>
    </div>
    <script >
        window.xuatex = () => {
            let link = '../export/excel/export_dsDK.php';
            let rows = $('#dg-khnh1').datagrid('getData').rows;
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
