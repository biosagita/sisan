    <div class="easyui-layout" data-options="fit:true">
    <div data-options="region:'center',title:'Data Layanan'" style="padding-bottom:25px;background:#eee;">
	
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddlayanan_79()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditlayanan_79()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletelayanan_79()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="79_txtlayanan" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_79()">Find</a>
	</div>
<table id="79_dtglayanan" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_layanan/fnlayananData/',toolbar:'#79_tlblayanan',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id_layanan',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'nama_layanan',title:'<b>Nama Layanan</b>',width:250,sortable:true" halign="center"></th>
           
		   <th data-options="field:'id_group_layanan',title:'<b>Group Layanan</b>',width:150,sortable:true" halign="center"></th>
           
		   <th data-options="field:'layanan_status',title:'<b>Status</b>',width:60,sortable:true" halign="center"></th>

		   <th data-options="field:'id_layanan_forward',title:'<b>Layanan Forward</b>',width:150,sortable:true" halign="center"></th>

		   <th data-options="field:'stok',title:'<b>Stock</b>',width:150,sortable:true" halign="center"></th>

		   <th data-options="field:'status_popup',title:'<b>Status Popup</b>',width:150,sortable:true" halign="center"></th>

		   <th data-options="field:'estimasi',title:'<b>Estimasi</b>',width:150,sortable:true" halign="center"></th>
           
		   <th data-options="field:'keterangan',title:'<b>Keterangan</b>',width:300,sortable:true" halign="center"></th>
           
           
           	

   </tr>
</thead>
</table>
<div id="79_dlglayanan" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_79(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="79_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="79_fralayanan" id="79_fralayanan" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_79() {
	$('#79_dtglayanan').datagrid('load',{
		layananKeyword: $('#79_txtlayanan').val()
	});
}
function fnResize_79(width,height) {
	$('#79_fralayanan').width(width-14);
	$('#79_fralayanan').height(height-40);
}
function fnResize_79(width,height) {
	$('#79_fralayanan').width(width-14);
	$('#79_fralayanan').height(height-40);
}
function fnAddlayanan_79() {
	$('#79_dlglayanan').dialog({
		title: 'Input Data Layanan',
		width: 510,
		height: 390
	});
	$('#79_divWait').show();
	$('#79_fralayanan').hide();
	$('#79_fralayanan').attr('src','<?php echo base_url(); ?>index.php/md_layanan/fnlayananAdd');
	$('#79_dlglayanan').window('open');
}
function fnEditlayanan_79() {
	var singleRow = $('#79_dtglayanan').datagrid('getSelected');
	if(singleRow) {
		$('#79_dlglayanan').dialog({
			title: 'Edit Data Layanan',
			width: 510,
			height: 390
		});
		$('#79_divWait').show();
		$('#79_fralayanan').hide();
						
		$('#79_fralayanan').attr('src','<?php echo base_url(); ?>index.php/md_layanan/fnlayananEdit/'+singleRow.id_layanan);
				

		$('#79_dlglayanan').window('open');
	} else {
		alert('Select which layanan data you want to edit.');
	}
}
function fnSelectlayanan_79() {
	var singleRow = $('#79_dtglayanan').datagrid('getSelected');
	if(singleRow) {
		var vlayananId = singleRow.layanan_uid;
		var vlayananLogin = singleRow.layanan_ulogin;
		$('#79_dlglayanan').dialog({
			title: 'Select layanan for '+vlayananLogin,
			width: 365,
			height: 290
		});
		$('#79_divWait').show();
		$('#79_fralayanan').hide();
				
		$('#79_fralayanan').attr('src','<?php echo base_url(); ?>index.php/md_layanan/fnlayananChoose/'+vid_layanan);
				
		$('#79_dlglayanan').window('open');
	} else {
		alert('Select layanan Datagrid row first.');
	}
}
function fnDeletelayanan_79() {
	var singleRow = $('#79_dtglayanan').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_layanan/fnlayananDelete/',{Id:singleRow.id_layanan},function(result) {
				
					if (result.success) {
						$('#79_dtglayanan').datagrid('reload');
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