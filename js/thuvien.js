/*
  Điều kiện sử dụng thu vien 
  - them thu vien jqueryeasu
*/
/*sen du lieu su dung phuong thuc post*/
function sendajax(url,bien){
	$.post(
		url,
		{
			thamso:bien
		},
		function(data){
			if(data){
				$.messager.show({
                        title: 'Thông Báo',
                        msg: data 
                        });
			}
		}
	)
}
/*send dữ liệu and set gia trị cho numberbox */
function sendandsetval(url_1,bien_1,arr){
  $.post(
    url_1,
    {
      thamso:bien_1
    },
    function(data){
      if(data){
         Object.keys(arr).forEach(function (key) {
            $("#"+arr[key]).numberbox("setValue",data);
        });      
      }
    }
  )
}
/*Sen dữ liệu kèm load */
/*url: đường dẫn, bien: danh sách bien, datagrid: ten id*/
function sendajax(url,bien,datagrid){
  $.post(
    url,
    {
      thamso:bien
    },
    function(data){
      if(data){
        $.messager.show({
                        title: 'Thông Báo',
                        msg: data 
                        });
        $("#"+datagrid).datagrid("reload");
      }
    }
  )
}
/*Send dữ liệu kèm load */
/*url: đường dẫn, bien: danh sách bien, datagrid: id của datagrid*/
function sendajax(url,bien,datagrid){
  $.post(
    url,
    {
      thamso:bien
    },
    function(data){
      if(data){
        $.messager.show({
                        title: 'Thông Báo',
                        msg: data 
                        });
        $("#"+datagrid).datagrid("reload");
      }
    }
  )
}
/*Send dữ liệu kèm load */
/*url: đường dẫn, bien: danh sách bien, datagrid: id của datagrid, func: ten ham*/
function sendajax(url,bien,datagrid,func){
  $.post(
    url,
    {
      thamso:bien
    },
    function(data){
      if(data){
        $.messager.show({
                        title: 'Thông Báo',
                        msg: data 
                        });
        $("#"+datagrid).datagrid("reload"); 
        func;
      }
        
    }
  )
}
/*Nhân dữ liệu sử dụng phương thức post*/
function getdataajax(url,bien,biensetvalue){
	var tam=0;
	$.post(
		url,
		{
			thamso:bien
		},
		function(data){
			if(data){
				 tam=data;
			}
			else{
				return null;
			}
		}
	)
   return tam;
}
/*Hiển thị thông báo từ dưới lên*/
function thongbao(bien){
	$.messager.show({
                title: 'Thông Báo',
                msg: bien
                });
}
/*Định dạng ngày tháng*/
function myformatter(date){
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    return ((d<10?('0'+d):d) + '-' + (m<10?('0'+m):m) + '-' + y );
  }
  function myparser(s){
    if (!s) return new Date();
    var ss = (s.split('-'));
    var d = parseInt(ss[0],10);
    var m = parseInt(ss[1],10);
    var y = parseInt(ss[2],10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
      return new Date(y,m-1,d);
    } else {
      return new Date();
    }
  }
function parseDate(str) {
    var mdy = str.split('-');
    return new Date(mdy[2], mdy[1], mdy[0]);
}


/*Xóa dữ liệu bằng ajax*/
function xoadulieuajax(url,bien,datagrid,msg){
  $.messager.confirm('Confirm',msg, function(r){
    if(r){
      $.post(
        url,
        {
          thamso:bien
        },
        function(data){
          if(data){
            $.messager.show({
                            title: 'Thông Báo',
                            msg: data 
                            });
            $("#"+datagrid).datagrid("reload");
          }
        }
      )
    }
  })
}
/*timkiem*/
function timkiemJS(datagrid,bien)
{
  $("#"+datagrid).datagrid("load",{thamso:bien})
}
/*tim tư ngày đến ngày 1 tham sô*/
function timkiemtungaydenngay(tu,den,datagrid,giatri){
    $tu=$("#"+tu).datebox("getValue");
    $den=$("#"+den).datebox("getValue");
    if($tu=="" || $den ==""){
        thongbao("Vui lòng nhập ngày bắt đầu và ngày kết thúc");
        return false;
    }
    else{
         $("#"+datagrid).datagrid('load',
            {tungay:$tu,
             denngay:$den,
             thamso:giatri}
        );
    }
}
/*tim kiếm kết hợp nhiều điều kiện*/
function timkiemkethop(tu,den,datagrid,giatri){
  $tu=$("#"+tu).datebox("getValue");
  $den=$("#"+den).datebox("getValue");
  if(($tu !="" ) || ($den !="")){
      timkiemtungaydenngay(tu,den,datagrid,giatri)
  }
  else{
    $("#"+datagrid).datagrid('load',
      { tungay:$tu,
        denngay:$den,
        thamso:giatri
      });
  }
}