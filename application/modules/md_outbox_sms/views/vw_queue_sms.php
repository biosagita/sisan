    <div class="easyui-layout" data-options="fit:true">
    <div data-options="region:'center',title:'Data Queue SMS'" style="padding-bottom:25px;background:#eee;">

	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddoutbox_sms_75()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddBulkoutbox_sms_75()">Bulk</a>
			
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditoutbox_sms_75()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeleteoutbox_sms_75()">Delete</a> 
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletealloutbox_sms_75()">Delete All</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="75_txtoutbox_sms" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_75()">Find</a>
	</div>
<table id="75_dtgoutbox_sms" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_outbox_sms/fnqueue_smsData/',toolbar:'#75_tlboutbox_sms',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'f_outbox_id',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_outbox_date',title:'<b>Datetime</b>',width:120,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_destination_number',title:'<b>Destination Number</b>',width:120,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_outbox_message',title:'<b>Message</b>',width:350,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_com_id',title:'<b>Com</b>',width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_outbox_status',title:'<b>Status</b>',width:100,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_outbox_remark',title:'<b>Remafk</b>',width:250,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_outbox_send_date',title:'<b>Sended%20%20Date</b>',width:120,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
    
    </div>
    </div>

<div id="75_dlgoutbox_sms" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_75(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="75_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/bbc/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="75_fraoutbox_sms" id="75_fraoutbox_sms" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_75() {
	$('#75_dtgoutbox_sms').datagrid('load',{
		outbox_smsKeyword: $('#75_txtoutbox_sms').val()
	});
}
function fnResize_75(width,height) {
	$('#75_fraoutbox_sms').width(width-14);
	$('#75_fraoutbox_sms').height(height-40);
}
function fnResize_75(width,height) {
	$('#75_fraoutbox_sms').width(width-14);
	$('#75_fraoutbox_sms').height(height-40);
}
function fnAddoutbox_sms_75() {
	$('#75_dlgoutbox_sms').dialog({
		title: 'Input Data outbox_sms',
		width: 510,
		height: 390
	});
	$('#75_divWait').show();
	$('#75_fraoutbox_sms').hide();
	$('#75_fraoutbox_sms').attr('src','<?php echo base_url(); ?>index.php/md_outbox_sms/fnoutbox_smsAdd');
	$('#75_dlgoutbox_sms').window('open');
}
function fnAddBulkoutbox_sms_75() {
	$('#75_dlgoutbox_sms').dialog({
		title: 'Input Data outbox_sms',
		width: 510,
		height: 490
	});
	$('#75_divWait').show();
	$('#75_fraoutbox_sms').hide();
	$('#75_fraoutbox_sms').attr('src','<?php echo base_url(); ?>index.php/md_outbox_sms/fnbulk_outbox_smsAdd');
	$('#75_dlgoutbox_sms').window('open');
}

function fnEditoutbox_sms_75() {
	var singleRow = $('#75_dtgoutbox_sms').datagrid('getSelected');
	if(singleRow) {
		$('#75_dlgoutbox_sms').dialog({
			title: 'Edit Data Outbox_sms',
			width: 510,
			height: 490
		});
		$('#75_divWait').show();
		$('#75_fraoutbox_sms').hide();
						
		$('#75_fraoutbox_sms').attr('src','<?php echo base_url(); ?>index.php/md_outbox_sms/fnoutbox_smsEdit/'+singleRow.f_outbox_id);
				

		$('#75_dlgoutbox_sms').window('open');
	} else {
		alert('Select which outbox_sms data you want to edit.');
	}
}
function fnSelectoutbox_sms_75() {
	var singleRow = $('#75_dtgoutbox_sms').datagrid('getSelected');
	if(singleRow) {
		var voutbox_smsId = singleRow.outbox_sms_uid;
		var voutbox_smsLogin = singleRow.outbox_sms_ulogin;
		$('#75_dlgoutbox_sms').dialog({
			title: 'Select outbox_sms for '+voutbox_smsLogin,
			width: 365,
			height: 290
		});
		$('#75_divWait').show();
		$('#75_fraoutbox_sms').hide();
				
		$('#75_fraoutbox_sms').attr('src','<?php echo base_url(); ?>index.php/md_outbox_sms/fnoutbox_smsChoose/'+vf_outbox_id);
				
		$('#75_dlgoutbox_sms').window('open');
	} else {
		alert('Select outbox_sms Datagrid row first.');
	}
}
function fnDeleteoutbox_sms_75() {
	var singleRow = $('#75_dtgoutbox_sms').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_outbox_sms/fnoutbox_smsDelete/',{Id:singleRow.f_outbox_id},function(result) {
				
					if (result.success) {
						$('#75_dtgoutbox_sms').datagrid('reload');
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
function fnDeletealloutbox_sms_75() {
		$.messager.confirm('Confirm','Are you sure you want to delete All Queue this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_outbox_sms/fnoutbox_smsDelete_all/',function(result) {
				
					if (result.success) {
						$('#75_dtgoutbox_sms').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
}

</script>