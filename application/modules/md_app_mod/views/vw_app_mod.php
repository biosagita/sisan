<!---
Module Id   : 1_
Module Code : md_app_mod
Module Name : Application Modules
Description : Modul ini digunakan untuk Menginput Applikasi dan Module yang terkait.
--->
<div class="easyui-layout" data-options="fit:true">
	<div data-options="title:'&nbsp;',region:'west',border:false,split:true" style="width:400px;">
		<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'north',border:false,split:true" style="height:260px;">
				<div id="1_tlbGrpMod" style="padding:5px;">
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnGrpModAdd_1()">Add</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnGrpModEdit_1()">Edit</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnGrpModDelete_1()">Delete</a>
				</div>
				<table id="1_dtgGrpMod" class="easyui-datagrid" data-options="title:'Group Module',url:'<?php echo base_url(); ?>index.php/md_app_mod/fnGrpModData/',toolbar:'#1_tlbGrpMod',border:false,singleSelect:true,striped:true,fit:true">
				<thead>
					<tr>
						<th data-options="field:'appModGrpMod_code',title:'<b>Code</b>',width:115"></th>
						<th data-options="field:'appModGrpMod_appl',title:'<b>App</b>',width:70"></th>
						<th data-options="field:'appModGrpMod_name',title:'<b>Name</b>',width:135"></th>
						<th data-options="field:'appModGrpMod_active',title:'<b>Active</b>',width:50,halign:'center'"></th>
					</tr>
				</thead>
				</table>
			</div>
			<div data-options="region:'center',border:false,split:true">
				<div id="1_tlbAction" style="padding:5px;">
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnActionAdd_1()">Add</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnActionEdit_1()">Edit</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnActionDelete_1()">Delete</a>
				</div>
				<table id="1_dtgAction" class="easyui-datagrid" data-options="title:'Action',url:'<?php echo base_url(); ?>index.php/md_app_mod/fnActionData/',toolbar:'#1_tlbAction',border:false,singleSelect:true,striped:true,fit:true">
				<thead>
					<tr>
						<th data-options="field:'appModAction_code',title:'<b>Code</b>',width:100"></th>
						<th data-options="field:'appModAction_name',title:'<b>Name</b>',width:100"></th>
					</tr>
				</thead>
				</table>
			</div>
		</div>
	</div>
	<div data-options="region:'center',border:false,split:true">
		<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'north',border:false,split:true" style="height:230px;">
				<div id="1_tlbApp" style="padding:5px;">
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAppAdd_1()">Add</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnAppEdit_1()">Edit</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnAppDelete_1()">Delete</a>
				</div>
				<table id="1_dtgApp" class="easyui-datagrid" data-options="title:'Application',url:'<?php echo base_url(); ?>index.php/md_app_mod/fnApplData/',toolbar:'#1_tlbApp',border:false,singleSelect:true,striped:true,fit:true,onClickRow:function(rowIndex,rowData){ var vApplClickedRow = rowData; fnAppSelect_1(vApplClickedRow);},onSelect:function(rowIndex,rowData){$('#1_trgAppMod').treegrid({title:'Modules - '+rowData.appModAppl_code})},onLoadSuccess:function(){ $('#1_dtgApp').datagrid('selectRow',0);}">
				<thead>
					<tr>
						<th data-options="field:'appModAppl_id',title:'<b>ID#</b>',width:30"></th>
						<th data-options="field:'appModAppl_code',title:'<b>Code</b>',width:100"></th>
						<th data-options="field:'appModAppl_name',title:'<b>Name</b>',width:200"></th>
						<th data-options="field:'appModAppl_url',title:'<b>URL</b>',width:120"></th>
						<th data-options="field:'appModAppl_path',title:'<b>Path</b>',width:120"></th>
						<th data-options="field:'appModAppl_active',title:'<b>Active</b>',width:50,halign:'center'"></th>
					</tr>
				</thead>
				</table>
			</div>
			<div data-options="region:'center',border:false,split:true">
				<div class="easyui-layout" data-options="fit:true">
					<div data-options="region:'west',border:false,split:true" style="width:440px;">
						<div id="1_tlbAppMod" style="padding:5px;">
							<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAppModAdd_1()">Add</a>
							<a href="javascript:void(0)" id="linkAppModModulesEdit" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnAppModEdit_1()">Edit</a>														
                            <a href="javascript:void(0)" id="linkAppModModulesMoveUp" class="easyui-linkbutton" iconCls="icon-up" plain="true" onclick="fnMoveModule_1('Up')">Move Up</a>
							<a href="javascript:void(0)" id="linkAppModModulesMoveDown" class="easyui-linkbutton" iconCls="icon-down" plain="true" onclick="fnMoveModule_1('Down')">Move Down</a>
						</div>
						<table id="1_trgAppMod" class="easyui-treegrid" idField="appModModules_id" treeField="appModModules_name" data-options="title:'Modules',url:'<?php echo base_url(); ?>index.php/md_app_mod/fnModulesData/',toolbar:'#1_tlbAppMod',border:false,singleSelect:true,striped:true,fit:true,onClickRow:function(row){ var vModulesClickedRow = row; fnModSelect_1(vModulesClickedRow);}">
						<thead>
							<tr>
								<th data-options="field:'appModModules_name',title:'<b>Name</b>',width:190"></th>
								<th data-options="field:'appModModules_desc',title:'<b>Description</b>',width:170"></th>
								<th data-options="field:'appModModules_active',title:'<b>Active</b>',width:50,halign:'center'"></th>
							</tr>
						</thead>
						</table>
					</div>
					<div data-options="region:'center',border:false,split:true">
						<div id="1_tlbAppModAct" style="padding:5px;">
							<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAppModActSelect_1()">Select Action</a>
						</div>
						<table id="1_dtgAppModAct" class="easyui-datagrid" data-options="title:'Module Action',toolbar:'#1_tlbAppModAct',border:false,singleSelect:true,striped:true,fit:true">
						<thead>
							<tr>
								<th data-options="field:'appModModuleAction_code',title:'<b>Action Code</b>',width:100"></th>
								<th data-options="field:'appModModuleAction_name',title:'<b>Action Name</b>',width:125"></th>
							</tr>
						</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="1_dlgAppMod" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_1(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="1_divWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="1_fraAppMod" id="1_fraAppMod" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnResize_1(width,height) {
	$('#1_fraAppMod').width(width-14);
	$('#1_fraAppMod').height(height-40);
}
function fnGrpModAdd_1() {
	$('#1_dlgAppMod').dialog({
		title: 'Input Data Group Module',
		width: 510,
		height: 295
	});
	$('#1_divWait').show();
	$('#1_fraAppMod').hide();
	$('#1_fraAppMod').attr('src','<?php echo base_url()?>index.php/md_app_mod/fnGrpModAdd');
	$('#1_dlgAppMod').window('open');
}
function fnGrpModEdit_1() {
	var singleRow = $('#1_dtgGrpMod').datagrid('getSelected');
	if (singleRow) {
		$('#1_dlgAppMod').dialog({
			title: 'Edit Data Group Module',
			width: 510,
			height: 295
		});
		$('#1_divWait').show();
		$('#1_fraAppMod').hide();
		$('#1_fraAppMod').attr('src','<?php echo base_url()?>index.php/md_app_mod/fnGrpModEdit/'+singleRow.appModGrpMod_id);
		$('#1_dlgAppMod').window('open');
	} else {
		alert('Pilih Group Module yang ingin di Edit.');
	}
}
function fnGrpModDelete_1() {
	var singleRow = $('#1_dtgGrpMod').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Anda yakin ingin menghapus data group module ini?',function(res) {
			if (res) {
				$.post('<?php echo base_url(); ?>index.php/md_app_mod/fnGrpModDelete/',{Id:singleRow.appModGrpMod_id},function(result) {
					if (result.success) {
						$('#1_dtgGrpMod').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Pilih Group Module yang ingin di Delete.');
	}
}
function fnActionAdd_1() {
	$('#1_dlgAppMod').dialog({
		title: 'Input Data Action',
		width: 510,
		height: 265
	});
	$('#1_divWait').show();
	$('#1_fraAppMod').hide();
	$('#1_fraAppMod').attr('src','<?php echo base_url()?>index.php/md_app_mod/fnActionAdd');
	$('#1_dlgAppMod').window('open');
}
function fnActionEdit_1() {
	var singleRow = $('#1_dtgAction').datagrid('getSelected');
	if (singleRow) {
		$('#1_dlgAppMod').dialog({
			title: 'Edit Data Action',
			width: 510,
			height: 265
		});
		$('#1_divWait').show();
		$('#1_fraAppMod').hide();
		$('#1_fraAppMod').attr('src','<?php echo base_url()?>index.php/md_app_mod/fnActionEdit/'+singleRow.appModAction_id);
		$('#1_dlgAppMod').window('open');
	} else {
		alert('Pilih Action yang ingin di Edit.');
	}
}
function fnActionDelete_1() {
	var singleRow = $('#1_dtgAction').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Anda yakin ingin menghapus data action ini?',function(res) {
			if (res) {
				$.post('<?php echo base_url(); ?>index.php/md_app_mod/fnActionDelete/',{Id:singleRow.appModAction_id},function(result) {
					if (result.success) {
						$('#1_dtgAction').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Pilih Action yang ingin di Delete.');
	}
}
function fnAppAdd_1() {	
	$('#1_dlgAppMod').dialog({
		title: 'Input Data Application',
		width: 510,
		height: 340
	});
	$('#1_divWait').show();
	$('#1_fraAppMod').hide();
	$('#1_fraAppMod').attr('src','<?php echo base_url()?>index.php/md_app_mod/fnApplAdd');
	$('#1_dlgAppMod').window('open');
}
function fnAppEdit_1() {
	var singleRow = $('#1_dtgApp').datagrid('getSelected');
	if (singleRow) {
		$('#1_dlgAppMod').dialog({
			title: 'Edit Data Application',
			width: 510,
			height: 340
		});
		$('#1_divWait').show();
		$('#1_fraAppMod').hide();
		$('#1_fraAppMod').attr('src','<?php echo base_url()?>index.php/md_app_mod/fnApplEdit/'+singleRow.appModAppl_id);
		$('#1_dlgAppMod').window('open');
	} else {
		alert('Pilih Application yang ingin di Edit.');
	}
}
function fnAppDelete_1() {
	var singleRow = $('#1_dtgApp').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Anda yakin ingin menghapus data application ini?',function(res) {
			if (res) {
				$.post('<?php echo base_url(); ?>index.php/md_app_mod/fnApplDelete/',{Id:singleRow.appModAppl_id},function(result) {
					if (result.success) {
						$('#1_dtgApp').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Pilih Application yang ingin di Delete.');
	}
}
function fnAppModAdd_1() {	
	$('#1_dlgAppMod').dialog({
		title: 'Input Data Modules',
		width: 510,
		height: 415
	});
	$('#1_divWait').show();
	$('#1_fraAppMod').hide();
	$('#1_fraAppMod').attr('src','<?php echo base_url()?>index.php/md_app_mod/fnModulesAdd');
	$('#1_dlgAppMod').window('open');
}
function fnAppModEdit_1() {
	var singleRow = $('#1_trgAppMod').treegrid('getSelected');
	if (singleRow) {
		$('#1_dlgAppMod').dialog({
			title: 'Edit Data Modules',
			width: 510,
			height: 415
		});
		$('#1_divWait').show();
		$('#1_fraAppMod').hide();
		$('#1_fraAppMod').attr('src','<?php echo base_url()?>index.php/md_app_mod/fnModulesEdit/'+singleRow.appModModules_id);
		$('#1_dlgAppMod').window('open');
	} else {
		alert('Pilih Module yang ingin di Edit.');
	}
}

function fnAppModActSelect_1() {
	var singleRow = $('#1_trgAppMod').treegrid('getSelected');
	if(singleRow) {
		var vModId = singleRow.appModModules_id;
		$('#1_dlgAppMod').dialog({
			title: 'Pilih Action',
			width: 510,
			height: 290
		});
		$('#1_divWait').show();
		$('#1_fraAppMod').hide();
		$('#1_fraAppMod').attr('src','<?php echo base_url()?>index.php/md_app_mod/fnModuleActionChoose/'+vModId);
		$('#1_dlgAppMod').window('open');
	} else {
		alert('Pilih Module terlebih dahulu.');
	}
}
// ============================================================
function fnAppSelect_1(pAppRow) {
	var vApplId = pAppRow.appModAppl_id;
	var vApplName = pAppRow.appModAppl_name;
	// $('#trgAppModModules').datagrid('load',{ApplId:vApplId});
	$('#1_trgAppMod').treegrid({
		title:'Modules - '+vApplName,
		url:'<?php echo base_url(); ?>index.php/md_app_mod/fnModulesData2/'+vApplId
	});
	$('#1_dtgAppModAct').datagrid({
		title:'Modules Action',
		url:'<?php echo base_url(); ?>index.php/md_app_mod/fnModuleActionData/'
	});
}
function fnModSelect_1(pModulesClickedRow) {
	var vModuleId = pModulesClickedRow.appModModules_id;
	var vModuleIsParent = pModulesClickedRow.appModModules_isParent;
	var vModuleName = pModulesClickedRow.appModModules_name;
	if(vModuleIsParent=='1') {
		$('#linkAppModModulesEdit').linkbutton({disabled:true});
		$('#linkAppModModulesDelete').linkbutton({disabled:true});
		$('#linkAppModModulesMoveUp').linkbutton({disabled:true});
		$('#linkAppModModulesMoveDown').linkbutton({disabled:true});
	} else {
		$('#linkAppModModulesEdit').linkbutton({disabled:false});
		$('#linkAppModModulesDelete').linkbutton({disabled:false});
		$('#linkAppModModulesMoveUp').linkbutton({disabled:false});
		$('#linkAppModModulesMoveDown').linkbutton({disabled:false});
		$('#dtgAppModModuleAction').datagrid({
			title:'Module Action - '+vModuleName,
			url:'<?php echo base_url(); ?>index.php/md_app_mod/fnModuleActionData/'+vModuleId
		});
	}
}
function fnMoveModule_1(pMove) {
	var singleRow = $('#1_trgAppMod').treegrid('getSelected');
	if(singleRow) {
		var modId = singleRow.appModModules_id;
		var modGroup = singleRow.appModModules_grpMod;
		var modSort = singleRow.appModModules_modSort;
		if(pMove == 'Up') {
			$.ajax({
				url: '<?php echo base_url()?>index.php/md_app_mod/fnUpModSort/'+modId+'/'+modGroup+'/'+modSort,
				success: function() {
					$('#1_trgAppMod').treegrid('reload');
				}
			});
		} else if(pMove == 'Down') {
			$.ajax({
				url: '<?php echo base_url()?>index.php/md_app_mod/fnDownModSort/'+modId+'/'+modGroup+'/'+modSort,
				success: function() {
					$('#1_trgAppMod').treegrid('reload');
				}
			});
		}
	} else {
		alert('Select module to Move '+pMove);
	}
}
</script>