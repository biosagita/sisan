<div id="17_tlbposition" style="padding:5px;">
	<div style="float:left;" id=crud_17>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddposition_17()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditposition_17()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeleteposition_17()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="17_txtposition" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_17()">Find</a>
	</div>
</div>
<table id="17_dtgposition" class="easyui-datagrid" data-options="title:'Data Position',url:'<?php echo base_url(); ?>index.php/md_position/fnpositionData/',toolbar:'#17_tlbposition',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'f_position_id',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_position_name',title:'<b>Name</b>',width:250,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_position_remark',title:'<b>Remark</b>',width:300,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="17_dlgposition" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_17(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="17_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/attendance/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="17_fraposition" id="17_fraposition" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
$(function() {
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url()?>index.php/md_role_access/fnRoleAccessCrud/17/',
		dataType: 'json',
		data: {},
		success: function(data) {
			if(data.crud_17 != 1){
			$('#crud_17').hide();
			
			}	
		}
	});
});
function fnSearch_17() {
	$('#17_dtgposition').datagrid('load',{
		positionKeyword: $('#17_txtposition').val()
	});
}
function fnResize_17(width,height) {
	$('#17_fraposition').width(width-14);
	$('#17_fraposition').height(height-40);
}
function fnResize_17(width,height) {
	$('#17_fraposition').width(width-14);
	$('#17_fraposition').height(height-40);
}
function fnAddposition_17() {
	$('#17_dlgposition').dialog({
		title: 'Input Data position',
		width: 510,
		height: 230
	});
	$('#17_divWait').show();
	$('#17_fraposition').hide();
	$('#17_fraposition').attr('src','<?php echo base_url(); ?>index.php/md_position/fnpositionAdd');
	$('#17_dlgposition').window('open');
}
function fnEditposition_17() {
	var singleRow = $('#17_dtgposition').datagrid('getSelected');
	if(singleRow) {
		$('#17_dlgposition').dialog({
			title: 'Edit Data position',
			width: 510,
			height: 230
		});
		$('#17_divWait').show();
		$('#17_fraposition').hide();
						
		$('#17_fraposition').attr('src','<?php echo base_url(); ?>index.php/md_position/fnpositionEdit/'+singleRow.f_position_id);
				

		$('#17_dlgposition').window('open');
	} else {
		alert('Select which position data you want to edit.');
	}
}
function fnSelectposition_17() {
	var singleRow = $('#17_dtgposition').datagrid('getSelected');
	if(singleRow) {
		var vpositionId = singleRow.position_uid;
		var vpositionLogin = singleRow.position_ulogin;
		$('#17_dlgposition').dialog({
			title: 'Select position for '+vpositionLogin,
			width: 365,
			height: 290
		});
		$('#17_divWait').show();
		$('#17_fraposition').hide();
				
		$('#17_fraposition').attr('src','<?php echo base_url(); ?>index.php/md_position/fnpositionChoose/'+vf_position_id);
				
		$('#17_dlgposition').window('open');
	} else {
		alert('Select position Datagrid row first.');
	}
}
function fnDeleteposition_17() {
	var singleRow = $('#17_dtgposition').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_position/fnpositionDelete/',{Id:singleRow.f_position_id},function(result) {
				
					if (result.success) {
						$('#17_dtgposition').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Select the data that you want to Delete');
	}
}
</script>