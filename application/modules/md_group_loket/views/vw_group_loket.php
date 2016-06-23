    <div class="easyui-layout" data-options="fit:true">
    <div data-options="region:'center',title:'Data Group Loket'" style="padding-bottom:25px;background:#eee;">

	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddgroup_loket_80()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditgroup_loket_80()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletegroup_loket_80()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="80_txtgroup_loket" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_80()">Find</a>
	</div>

<table id="80_dtggroup_loket" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_group_loket/fngroup_loketData/',toolbar:'#80_tlbgroup_loket',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id_group_loket',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'nama_group_loket',title:'<b>Group Loket</b>',width:200,sortable:true" halign="center"></th>
           
		   <th data-options="field:'id_group_layanan',title:'<b>Group Layanan</b>',width:200,sortable:true" halign="center"></th>
           
		   <th data-options="field:'id_group_layanan_forward',title:'<b>Group Layanan_Forward</b>',width:200,sortable:true" halign="center"></th>

		   <th data-options="field:'voice_group',title:'<b>Voice Group</b>',width:50,sortable:true" halign="center"></th>
           
		   <th data-options="field:'keterangan',title:'<b>Keterangan</b>',width:300,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
</div>
</div>
<div id="80_dlggroup_loket" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_80(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="80_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="80_fragroup_loket" id="80_fragroup_loket" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_80() {
	$('#80_dtggroup_loket').datagrid('load',{
		group_loketKeyword: $('#80_txtgroup_loket').val()
	});
}
function fnResize_80(width,height) {
	$('#80_fragroup_loket').width(width-14);
	$('#80_fragroup_loket').height(height-40);
}
function fnResize_80(width,height) {
	$('#80_fragroup_loket').width(width-14);
	$('#80_fragroup_loket').height(height-40);
}
function fnAddgroup_loket_80() {
	$('#80_dlggroup_loket').dialog({
		title: 'Input Data group_loket',
		width: 510,
		height: 390
	});
	$('#80_divWait').show();
	$('#80_fragroup_loket').hide();
	$('#80_fragroup_loket').attr('src','<?php echo base_url(); ?>index.php/md_group_loket/fngroup_loketAdd');
	$('#80_dlggroup_loket').window('open');
}
function fnEditgroup_loket_80() {
	var singleRow = $('#80_dtggroup_loket').datagrid('getSelected');
	if(singleRow) {
		$('#80_dlggroup_loket').dialog({
			title: 'Edit Data Group_loket',
			width: 510,
			height: 390
		});
		$('#80_divWait').show();
		$('#80_fragroup_loket').hide();
						
		$('#80_fragroup_loket').attr('src','<?php echo base_url(); ?>index.php/md_group_loket/fngroup_loketEdit/'+singleRow.id_group_loket);
				

		$('#80_dlggroup_loket').window('open');
	} else {
		alert('Select which group_loket data you want to edit.');
	}
}
function fnSelectgroup_loket_80() {
	var singleRow = $('#80_dtggroup_loket').datagrid('getSelected');
	if(singleRow) {
		var vgroup_loketId = singleRow.group_loket_uid;
		var vgroup_loketLogin = singleRow.group_loket_ulogin;
		$('#80_dlggroup_loket').dialog({
			title: 'Select group_loket for '+vgroup_loketLogin,
			width: 365,
			height: 290
		});
		$('#80_divWait').show();
		$('#80_fragroup_loket').hide();
				
		$('#80_fragroup_loket').attr('src','<?php echo base_url(); ?>index.php/md_group_loket/fngroup_loketChoose/'+vid_group_loket);
				
		$('#80_dlggroup_loket').window('open');
	} else {
		alert('Select group_loket Datagrid row first.');
	}
}
function fnDeletegroup_loket_80() {
	var singleRow = $('#80_dtggroup_loket').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_group_loket/fngroup_loketDelete/',{Id:singleRow.id_group_loket},function(result) {
				
					if (result.success) {
						$('#80_dtggroup_loket').datagrid('reload');
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