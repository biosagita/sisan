    <div class="easyui-layout" data-options="fit:true">
    <div data-options="region:'center',title:'Data Loket'" style="padding-bottom:25px;background:#eee;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddloket_81()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditloket_81()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeleteloket_81()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="81_txtloket" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_81()">Find</a>
	</div>

<table id="81_dtgloket" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_loket/fnloketData/',toolbar:'#81_tlbloket',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id_loket',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'nama_loket',title:'<b>Nama Loket</b>',width:200,sortable:true" halign="center"></th>
           
		   <th data-options="field:'id_group_loket',title:'<b>Group loket</b>',width:200,sortable:true" halign="center"></th>
           	
		   <th data-options="field:'no_loket',title:'<b>No Loket</b>',width:80,sortable:true" halign="center"></th>

   		   <th data-options="field:'status_off',title:'<b>Status Off</b>',width:100,sortable:true" halign="center"></th>

   </tr>
</thead>
</table>
	</div>
</div>
<div id="81_dlgloket" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_81(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="81_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="81_fraloket" id="81_fraloket" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_81() {
	$('#81_dtgloket').datagrid('load',{
		loketKeyword: $('#81_txtloket').val()
	});
}
function fnResize_81(width,height) {
	$('#81_fraloket').width(width-14);
	$('#81_fraloket').height(height-40);
}
function fnResize_81(width,height) {
	$('#81_fraloket').width(width-14);
	$('#81_fraloket').height(height-40);
}
function fnAddloket_81() {
	$('#81_dlgloket').dialog({
		title: 'Input Data loket',
		width: 510,
		height: 390
	});
	$('#81_divWait').show();
	$('#81_fraloket').hide();
	$('#81_fraloket').attr('src','<?php echo base_url(); ?>index.php/md_loket/fnloketAdd');
	$('#81_dlgloket').window('open');
}
function fnEditloket_81() {
	var singleRow = $('#81_dtgloket').datagrid('getSelected');
	if(singleRow) {
		$('#81_dlgloket').dialog({
			title: 'Edit Data Loket',
			width: 510,
			height: 390
		});
		$('#81_divWait').show();
		$('#81_fraloket').hide();
						
		$('#81_fraloket').attr('src','<?php echo base_url(); ?>index.php/md_loket/fnloketEdit/'+singleRow.id_loket);
				

		$('#81_dlgloket').window('open');
	} else {
		alert('Select which loket data you want to edit.');
	}
}
function fnSelectloket_81() {
	var singleRow = $('#81_dtgloket').datagrid('getSelected');
	if(singleRow) {
		var vloketId = singleRow.loket_uid;
		var vloketLogin = singleRow.loket_ulogin;
		$('#81_dlgloket').dialog({
			title: 'Select loket for '+vloketLogin,
			width: 365,
			height: 290
		});
		$('#81_divWait').show();
		$('#81_fraloket').hide();
				
		$('#81_fraloket').attr('src','<?php echo base_url(); ?>index.php/md_loket/fnloketChoose/'+vid_loket);
				
		$('#81_dlgloket').window('open');
	} else {
		alert('Select loket Datagrid row first.');
	}
}
function fnDeleteloket_81() {
	var singleRow = $('#81_dtgloket').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_loket/fnloketDelete/',{Id:singleRow.id_loket},function(result) {
				
					if (result.success) {
						$('#81_dtgloket').datagrid('reload');
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