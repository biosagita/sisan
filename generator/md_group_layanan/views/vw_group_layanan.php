<div id="78_tlbgroup_layanan" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddgroup_layanan_78()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditgroup_layanan_78()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletegroup_layanan_78()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="78_txtgroup_layanan" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_78()">Find</a>
	</div>
</div>
<table id="78_dtggroup_layanan" class="easyui-datagrid" data-options="title:'Data group_layanan',url:'<?php echo base_url(); ?>index.php/md_group_layanan/fngroup_layananData/',toolbar:'#78_tlbgroup_layanan',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id_group_layanan',title:'<b>Id</b>',width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'nama_group_layanan',title:'<b>Nama_Group</b>',width:200,sortable:true" halign="center"></th>
           
		   <th data-options="field:'no_start',title:'<b>Start_NO</b>',width:60,sortable:true" halign="center"></th>
           
		   <th data-options="field:'no_end',title:'<b>End_No</b>',width:60,sortable:true" halign="center"></th>
           
		   <th data-options="field:'jml_tiket',title:'<b>Jml_Ticket</b>',width:80,sortable:true" halign="center"></th>
           
		   <th data-options="field:'keterangan',title:'<b>Keterangan</b>',width:150,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="78_dlggroup_layanan" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_78(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="78_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="78_fragroup_layanan" id="78_fragroup_layanan" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_78() {
	$('#78_dtggroup_layanan').datagrid('load',{
		group_layananKeyword: $('#78_txtgroup_layanan').val()
	});
}
function fnResize_78(width,height) {
	$('#78_fragroup_layanan').width(width-14);
	$('#78_fragroup_layanan').height(height-40);
}
function fnResize_78(width,height) {
	$('#78_fragroup_layanan').width(width-14);
	$('#78_fragroup_layanan').height(height-40);
}
function fnAddgroup_layanan_78() {
	$('#78_dlggroup_layanan').dialog({
		title: 'Input Data group_layanan',
		width: 510,
		height: 390
	});
	$('#78_divWait').show();
	$('#78_fragroup_layanan').hide();
	$('#78_fragroup_layanan').attr('src','<?php echo base_url(); ?>index.php/md_group_layanan/fngroup_layananAdd');
	$('#78_dlggroup_layanan').window('open');
}
function fnEditgroup_layanan_78() {
	var singleRow = $('#78_dtggroup_layanan').datagrid('getSelected');
	if(singleRow) {
		$('#78_dlggroup_layanan').dialog({
			title: 'Edit Data Group_layanan',
			width: 510,
			height: 390
		});
		$('#78_divWait').show();
		$('#78_fragroup_layanan').hide();
						
		$('#78_fragroup_layanan').attr('src','<?php echo base_url(); ?>index.php/md_group_layanan/fngroup_layananEdit/'+singleRow.id_group_layanan);
				

		$('#78_dlggroup_layanan').window('open');
	} else {
		alert('Select which group_layanan data you want to edit.');
	}
}
function fnSelectgroup_layanan_78() {
	var singleRow = $('#78_dtggroup_layanan').datagrid('getSelected');
	if(singleRow) {
		var vgroup_layananId = singleRow.group_layanan_uid;
		var vgroup_layananLogin = singleRow.group_layanan_ulogin;
		$('#78_dlggroup_layanan').dialog({
			title: 'Select group_layanan for '+vgroup_layananLogin,
			width: 365,
			height: 290
		});
		$('#78_divWait').show();
		$('#78_fragroup_layanan').hide();
				
		$('#78_fragroup_layanan').attr('src','<?php echo base_url(); ?>index.php/md_group_layanan/fngroup_layananChoose/'+vid_group_layanan);
				
		$('#78_dlggroup_layanan').window('open');
	} else {
		alert('Select group_layanan Datagrid row first.');
	}
}
function fnDeletegroup_layanan_78() {
	var singleRow = $('#78_dtggroup_layanan').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_group_layanan/fngroup_layananDelete/',{Id:singleRow.id_group_layanan},function(result) {
				
					if (result.success) {
						$('#78_dtggroup_layanan').datagrid('reload');
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