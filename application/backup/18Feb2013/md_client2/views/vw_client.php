<div id="tlbClient" style="padding:5px;">
	<div style="float:left;">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnClientAdd()">Add Client</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnClientEdit()">Edit Client</a>
	</div>
	<div style="float:right;clear:right;">
		<span>Code:</span>
		<input id="txtClientCode" style="width:75px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<span>Name:</span>
		<input id="txtClientName" style="width:150px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnClientSearch()">Cari</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnClientReset()">Reset</a>
	</div>
</div>
<table id="dtgClient" class="easyui-datagrid" data-options="title:'Datagrid Client',url:'<?php echo base_url(); ?>index.php/md_client/fnClientData/',toolbar:'#tlbClient',rownumbers:true,border:false,singleSelect:true,fit:true,pagination:true,striped:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
		<th data-options="field:'client_code',title:'<strong>Code</strong>',width:100,sortable:true" halign="center"></th>
        <th data-options="field:'client_name',title:'<strong>Name</strong>',width:250,sortable:true" halign="center"></th>
        <th data-options="field:'client_group',title:'<strong>Group</strong>',width:100,sortable:true" halign="center"></th>
		<th data-options="field:'client_address',title:'<strong>Address</strong>',width:300" halign="center"></th>
		<th data-options="field:'client_city',title:'<strong>City</strong>',width:125,sortable:true" halign="center"></th>
		<th data-options="field:'client_postcode',title:'<strong>Post Code</strong>',width:100" halign="center"></th>
		<th data-options="field:'client_phone',title:'<strong>Phone</strong>',width:100" halign="center"></th>
		<th data-options="field:'client_home',title:'<strong>Home</strong>',width:100" halign="center"></th>
		<th data-options="field:'client_fax',title:'<strong>Fax</strong>',width:100" halign="center"></th>
	</tr>
</thead>
</table>
<div id="dlgClient" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnClientResize(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="divClientWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="fraClient" id="fraClient" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnClientSearch() {
	$('#dtgClient').datagrid('load',{
		client_code: $('#txtClientCode').val(),
		client_name: $('#txtClientName').val()
	});
}
function fnClientReset() {
	$('#txtClientCode').val('');
	$('#txtClientName').val('');
	$('#dtgClient').datagrid('load',{
		client_code: $('#txtClientCode').val(),
		client_name: $('#txtClientName').val()
	});
}
function fnClientResize(width,height) {
	$('#fraClient').width(width-14);
	$('#fraClient').height(height-40);
}
function fnClientAdd() {
	$('#dlgClient').dialog({
		title: 'Input Data Client',
		width: 510,
		height: 540
	});
	$('#divClientWait').show();
	$('#fraClient').hide();
	$('#fraClient').attr('src','<?php echo base_url()?>index.php/md_client/fnClientAdd');
	$('#dlgClient').window('open');
}
function fnClientEdit() {
	var singleRow = $('#dtgClient').datagrid('getSelected');
	if (singleRow) {
		$('#dlgClient').dialog({
			title: 'Edit Data Client',
			width: 510,
			height: 540
		});
		$('#divClientWait').show();
		$('#fraClient').hide();
		$('#fraClient').attr('src','<?php echo base_url()?>index.php/md_client/fnClientEdit/'+singleRow.client_id);
		$('#dlgClient').window('open');
	} else {
		alert('Pilih Client yang ingin di Edit.');
	}
}
</script>