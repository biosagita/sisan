<div id="18_tlbclass" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddclass_18()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditclass_18()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeleteclass_18()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="18_txtclass" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_18()">Find</a>
	</div>
</div>
<table id="18_dtgclass" class="easyui-datagrid" data-options="title:'Data Class',url:'<?php echo base_url(); ?>index.php/md_class/fnclassData/',toolbar:'#18_tlbclass',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'f_class_id',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_class_name',title:'<b>Name</b>',width:200,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_class_remark',title:'<b>Remark</b>',width:300,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="18_dlgclass" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_18(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="18_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/attendance/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="18_fraclass" id="18_fraclass" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_18() {
	$('#18_dtgclass').datagrid('load',{
		classKeyword: $('#18_txtclass').val()
	});
}
function fnResize_18(width,height) {
	$('#18_fraclass').width(width-14);
	$('#18_fraclass').height(height-40);
}
function fnResize_18(width,height) {
	$('#18_fraclass').width(width-14);
	$('#18_fraclass').height(height-40);
}
function fnAddclass_18() {
	$('#18_dlgclass').dialog({
		title: 'Input Data class',
		width: 510,
		height: 230
	});
	$('#18_divWait').show();
	$('#18_fraclass').hide();
	$('#18_fraclass').attr('src','<?php echo base_url(); ?>index.php/md_class/fnclassAdd');
	$('#18_dlgclass').window('open');
}
function fnEditclass_18() {
	var singleRow = $('#18_dtgclass').datagrid('getSelected');
	if(singleRow) {
		$('#18_dlgclass').dialog({
			title: 'Edit Data class',
			width: 510,
			height: 230
		});
		$('#18_divWait').show();
		$('#18_fraclass').hide();
						
		$('#18_fraclass').attr('src','<?php echo base_url(); ?>index.php/md_class/fnclassEdit/'+singleRow.f_class_id);
				

		$('#18_dlgclass').window('open');
	} else {
		alert('Select which class data you want to edit.');
	}
}
function fnSelectclass_18() {
	var singleRow = $('#18_dtgclass').datagrid('getSelected');
	if(singleRow) {
		var vclassId = singleRow.class_uid;
		var vclassLogin = singleRow.class_ulogin;
		$('#18_dlgclass').dialog({
			title: 'Select class for '+vclassLogin,
			width: 365,
			height: 290
		});
		$('#18_divWait').show();
		$('#18_fraclass').hide();
				
		$('#18_fraclass').attr('src','<?php echo base_url(); ?>index.php/md_class/fnclassChoose/'+vf_class_id);
				
		$('#18_dlgclass').window('open');
	} else {
		alert('Select class Datagrid row first.');
	}
}
function fnDeleteclass_18() {
	var singleRow = $('#18_dtgclass').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_class/fnclassDelete/',{Id:singleRow.f_class_id},function(result) {
				
					if (result.success) {
						$('#18_dtgclass').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Select the data that you want to Delete.');
	}
}
</script>