<div id="82_tlbuser_group" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAdduser_group_82()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEdituser_group_82()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeleteuser_group_82()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="82_txtuser_group" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_82()">Find</a>
	</div>
</div>
<table id="82_dtguser_group" class="easyui-datagrid" data-options="title:'Data User Group',url:'<?php echo base_url(); ?>index.php/md_user_group/fnuser_groupData/',toolbar:'#82_tlbuser_group',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'id_user_group',title:'<b>Id User Group</b>',width:80,sortable:true" halign="center"></th>
           
		   <th data-options="field:'nama_user_group',title:'<b>User Group</b>',width:250,sortable:true" halign="center"></th>
           
		   <th data-options="field:'id_group_layanan',title:'<b>Group Layanan</b>',width:200,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="82_dlguser_group" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_82(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="82_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="82_frauser_group" id="82_frauser_group" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_82() {
	$('#82_dtguser_group').datagrid('load',{
		user_groupKeyword: $('#82_txtuser_group').val()
	});
}
function fnResize_82(width,height) {
	$('#82_frauser_group').width(width-14);
	$('#82_frauser_group').height(height-40);
}
function fnResize_82(width,height) {
	$('#82_frauser_group').width(width-14);
	$('#82_frauser_group').height(height-40);
}
function fnAdduser_group_82() {
	$('#82_dlguser_group').dialog({
		title: 'Input Data user_group',
		width: 510,
		height: 390
	});
	$('#82_divWait').show();
	$('#82_frauser_group').hide();
	$('#82_frauser_group').attr('src','<?php echo base_url(); ?>index.php/md_user_group/fnuser_groupAdd');
	$('#82_dlguser_group').window('open');
}
function fnEdituser_group_82() {
	var singleRow = $('#82_dtguser_group').datagrid('getSelected');
	if(singleRow) {
		$('#82_dlguser_group').dialog({
			title: 'Edit Data User_group',
			width: 510,
			height: 390
		});
		$('#82_divWait').show();
		$('#82_frauser_group').hide();
						
		$('#82_frauser_group').attr('src','<?php echo base_url(); ?>index.php/md_user_group/fnuser_groupEdit/'+singleRow.id);
				

		$('#82_dlguser_group').window('open');
	} else {
		alert('Select which user_group data you want to edit.');
	}
}
function fnSelectuser_group_82() {
	var singleRow = $('#82_dtguser_group').datagrid('getSelected');
	if(singleRow) {
		var vuser_groupId = singleRow.user_group_uid;
		var vuser_groupLogin = singleRow.user_group_ulogin;
		$('#82_dlguser_group').dialog({
			title: 'Select user_group for '+vuser_groupLogin,
			width: 365,
			height: 290
		});
		$('#82_divWait').show();
		$('#82_frauser_group').hide();
				
		$('#82_frauser_group').attr('src','<?php echo base_url(); ?>index.php/md_user_group/fnuser_groupChoose/'+vid);
				
		$('#82_dlguser_group').window('open');
	} else {
		alert('Select user_group Datagrid row first.');
	}
}
function fnDeleteuser_group_82() {
	var singleRow = $('#82_dtguser_group').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_user_group/fnuser_groupDelete/',{Id:singleRow.id},function(result) {
				
					if (result.success) {
						$('#82_dtguser_group').datagrid('reload');
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