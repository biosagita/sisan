<div id="tlbGroupClient" style="padding:5px;">
	<div style="float:left;">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnGroupClientAdd()">Add Group Client</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnGroupClientEdit()">Edit Group Client</a>
	</div>
	<div style="float:right;clear:right;">
		<span>Code:</span>
		<input id="txtGroupClientCode" style="width:75px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<span>Name:</span>
		<input id="txtGroupClientName" style="width:150px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnGroupClientSearch()">Cari</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnGroupClientReset()">Reset</a>
	</div>
</div>
<table id="dtgGroupClient" class="easyui-datagrid" data-options="title:'Datagrid Group Client',url:'<?php echo base_url(); ?>index.php/md_group_client/fnGroupClientData/',toolbar:'#tlbGroupClient',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
		<th data-options="field:'groupclient_code',title:'<strong>Code</strong>',width:100,sortable:true" halign="center"></th>
        <th data-options="field:'groupclient_name',title:'<strong>Name</strong>',width:200,sortable:true" halign="center"></th>
		<th data-options="field:'groupclient_address',title:'<strong>Address</strong>',width:250" halign="center"></th>
		<th data-options="field:'groupclient_city',title:'<strong>City</strong>',width:200,sortable:true" halign="center"></th>
		<th data-options="field:'groupclient_postcode',title:'<strong>Post Code</strong>',width:100" halign="center"></th>
		<th data-options="field:'groupclient_phone',title:'<strong>Phone</strong>',width:100" halign="center"></th>
		<th data-options="field:'groupclient_fax',title:'<strong>Fax</strong>',width:100" halign="center"></th>
	</tr>
</thead>
</table>
<div id="dlgGroupClient" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnGroupClientResize(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="divGroupClientWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="fraGroupClient" id="fraGroupClient" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnGroupClientSearch() {
	$('#dtgGroupClient').datagrid('load',{
		groupclient_code: $('#txtGroupClientCode').val(),
		groupclient_name: $('#txtGroupClientName').val()
	});
}
function fnGroupClientReset() {
	$('#txtGroupClientCode').val('');
	$('#txtGroupClientName').val('');
	$('#dtgGroupClient').datagrid('load',{
		groupclient_code: $('#txtGroupClientCode').val(),
		groupclient_name: $('#txtGroupClientName').val()
	});
}
function fnGroupClientResize(width,height) {
	$('#fraGroupClient').width(width-14);
	$('#fraGroupClient').height(height-40);
}
function fnGroupClientAdd() {
	$('#dlgGroupClient').dialog({
		title: 'Input Data Group Client',
		width: 480,
		height: 465
	});
	$('#divGroupClientWait').show();
	$('#fraGroupClient').hide();
	$('#fraGroupClient').attr('src','<?php echo base_url()?>index.php/md_group_client/fnGroupClientAdd');
	$('#dlgGroupClient').window('open');
}
function fnGroupClientEdit() {
	var singleRow = $('#dtgGroupClient').datagrid('getSelected');
	if (singleRow) {
		$('#dlgGroupClient').dialog({
			title: 'Edit Data Group Client',
			width: 480,
			height: 465
		});
		$('#divGroupClientWait').show();
		$('#fraGroupClient').hide();
		$('#fraGroupClient').attr('src','<?php echo base_url()?>index.php/md_group_client/fnGroupClientEdit/'+singleRow.groupclient_id);
		$('#dlgGroupClient').window('open');
	} else {
		alert('Pilih Group Client yang ingin di Edit.');
	}
}
</script>