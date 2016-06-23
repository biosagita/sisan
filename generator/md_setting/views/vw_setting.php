<div id="85_tlbsetting" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddsetting_85()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditsetting_85()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletesetting_85()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="85_txtsetting" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_85()">Find</a>
	</div>
</div>
<table id="85_dtgsetting" class="easyui-datagrid" data-options="title:'Data setting',url:'<?php echo base_url(); ?>index.php/md_setting/fnsettingData/',toolbar:'#85_tlbsetting',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id_setting',title:'<b>Id</b>',width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'setting',title:'<b>Setting</b>',width:200,sortable:true" halign="center"></th>
           
		   <th data-options="field:'nilai',title:'<b>Nilai</b>',width:100,sortable:true" halign="center"></th>
           
		   <th data-options="field:'keterangan',title:'<b>Keterangan</b>',width:100,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="85_dlgsetting" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_85(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="85_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="85_frasetting" id="85_frasetting" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_85() {
	$('#85_dtgsetting').datagrid('load',{
		settingKeyword: $('#85_txtsetting').val()
	});
}
function fnResize_85(width,height) {
	$('#85_frasetting').width(width-14);
	$('#85_frasetting').height(height-40);
}
function fnResize_85(width,height) {
	$('#85_frasetting').width(width-14);
	$('#85_frasetting').height(height-40);
}
function fnAddsetting_85() {
	$('#85_dlgsetting').dialog({
		title: 'Input Data setting',
		width: 510,
		height: 390
	});
	$('#85_divWait').show();
	$('#85_frasetting').hide();
	$('#85_frasetting').attr('src','<?php echo base_url(); ?>index.php/md_setting/fnsettingAdd');
	$('#85_dlgsetting').window('open');
}
function fnEditsetting_85() {
	var singleRow = $('#85_dtgsetting').datagrid('getSelected');
	if(singleRow) {
		$('#85_dlgsetting').dialog({
			title: 'Edit Data Setting',
			width: 510,
			height: 390
		});
		$('#85_divWait').show();
		$('#85_frasetting').hide();
						
		$('#85_frasetting').attr('src','<?php echo base_url(); ?>index.php/md_setting/fnsettingEdit/'+singleRow.id_setting);
				

		$('#85_dlgsetting').window('open');
	} else {
		alert('Select which setting data you want to edit.');
	}
}
function fnSelectsetting_85() {
	var singleRow = $('#85_dtgsetting').datagrid('getSelected');
	if(singleRow) {
		var vsettingId = singleRow.setting_uid;
		var vsettingLogin = singleRow.setting_ulogin;
		$('#85_dlgsetting').dialog({
			title: 'Select setting for '+vsettingLogin,
			width: 365,
			height: 290
		});
		$('#85_divWait').show();
		$('#85_frasetting').hide();
				
		$('#85_frasetting').attr('src','<?php echo base_url(); ?>index.php/md_setting/fnsettingChoose/'+vid_setting);
				
		$('#85_dlgsetting').window('open');
	} else {
		alert('Select setting Datagrid row first.');
	}
}
function fnDeletesetting_85() {
	var singleRow = $('#85_dtgsetting').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_setting/fnsettingDelete/',{Id:singleRow.id_setting},function(result) {
				
					if (result.success) {
						$('#85_dtgsetting').datagrid('reload');
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