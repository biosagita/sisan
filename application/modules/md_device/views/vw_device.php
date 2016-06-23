<div id="56_tlbdevice" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAdddevice_56()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditdevice_56()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletedevice_56()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="56_txtdevice" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_56()">Find</a>
	</div>
</div>
<table id="56_dtgdevice" class="easyui-datagrid" data-options="title:'Data device',url:'<?php echo base_url(); ?>index.php/md_device/fndeviceData/',toolbar:'#56_tlbdevice',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'f_device_id',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_device_name',title:'<b>Name</b>',width:250,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_device_ip',title:'<b>IP_Address</b>',width:150,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_device_port',title:'<b>Port</b>',width:150,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_device_type',title:'<b>Type</b>',width:150,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_connect_type',title:'<b>Connect_Type</b>',width:150,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_description',title:'<b>Description</b>',width:250,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="56_dlgdevice" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_56(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="56_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/attendance/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="56_fradevice" id="56_fradevice" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_56() {
	$('#56_dtgdevice').datagrid('load',{
		deviceKeyword: $('#56_txtdevice').val()
	});
}
function fnResize_56(width,height) {
	$('#56_fradevice').width(width-14);
	$('#56_fradevice').height(height-40);
}
function fnResize_56(width,height) {
	$('#56_fradevice').width(width-14);
	$('#56_fradevice').height(height-40);
}
function fnAdddevice_56() {
	$('#56_dlgdevice').dialog({
		title: 'Input Data device',
		width: 510,
		height: 390
	});
	$('#56_divWait').show();
	$('#56_fradevice').hide();
	$('#56_fradevice').attr('src','<?php echo base_url(); ?>index.php/md_device/fndeviceAdd');
	$('#56_dlgdevice').window('open');
}
function fnEditdevice_56() {
	var singleRow = $('#56_dtgdevice').datagrid('getSelected');
	if(singleRow) {
		$('#56_dlgdevice').dialog({
			title: 'Edit Data Device',
			width: 510,
			height: 390
		});
		$('#56_divWait').show();
		$('#56_fradevice').hide();
						
		$('#56_fradevice').attr('src','<?php echo base_url(); ?>index.php/md_device/fndeviceEdit/'+singleRow.f_device_id);
				

		$('#56_dlgdevice').window('open');
	} else {
		alert('Select which device data you want to edit.');
	}
}
function fnSelectdevice_56() {
	var singleRow = $('#56_dtgdevice').datagrid('getSelected');
	if(singleRow) {
		var vdeviceId = singleRow.device_uid;
		var vdeviceLogin = singleRow.device_ulogin;
		$('#56_dlgdevice').dialog({
			title: 'Select device for '+vdeviceLogin,
			width: 365,
			height: 290
		});
		$('#56_divWait').show();
		$('#56_fradevice').hide();
				
		$('#56_fradevice').attr('src','<?php echo base_url(); ?>index.php/md_device/fndeviceChoose/'+vf_device_id);
				
		$('#56_dlgdevice').window('open');
	} else {
		alert('Select device Datagrid row first.');
	}
}
function fnDeletedevice_56() {
	var singleRow = $('#56_dtgdevice').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_device/fndeviceDelete/',{Id:singleRow.f_device_id},function(result) {
				
					if (result.success) {
						$('#56_dtgdevice').datagrid('reload');
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