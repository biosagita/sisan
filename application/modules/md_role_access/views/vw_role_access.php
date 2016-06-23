<div class="easyui-layout" data-options="fit:true">
	<div data-options="region:'center',border:false,split:true">
		<div id="74_tlbRole" style="padding:5px;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddRole_74()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditRole_74()">Edit</a>
			<!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnRoleAccess_RoleDelete()">Delete</a> -->
		</div>
		<table id="74_dtgRole" class="easyui-datagrid" data-options="title:'Role',url:'<?php echo base_url(); ?>index.php/md_role_access/fnRoleData/',toolbar:'#74_tlbRole',border:false,singleSelect:true,striped:true,fit:true,onClickRow:function(rowIndex,rowData){ var vClickedRoleRow = rowData; fnClickRow_Role_74(vClickedRoleRow); },onDblClickRow:function(){ fnEditRole_74(); },onSelect:function(rowIndex,rowData){$('#74_trgRoleModule').treegrid({title:'Role Module - '+rowData.roleaccess_role_name+' ('+rowData.roleaccess_role_appl+')'})},onLoadSuccess:function(){ $('#74_dtgRole').datagrid('selectRow',0);}">
		<thead>
			<tr>
				<th data-options="field:'roleaccess_role_code',title:'<b>Role Code</b>',width:80"></th>
				<th data-options="field:'roleaccess_role_name',title:'<b>Role Name</b>',width:175"></th>
				<th data-options="field:'roleaccess_role_appl',title:'<b>Application</b>',width:80"></th>
				<th data-options="field:'roleaccess_role_desc',title:'<b>Role Description</b>',width:200"></th>
				<th data-options="field:'roleaccess_role_BranchStatus',title:'<b>Status</b>',width:50"></th>
				<th data-options="field:'roleaccess_role_DataLimitation',title:'<b>Priviledge</b>',width:50"></th>
				<th data-options="field:'roleaccess_role_Category',title:'<b>Category</b>',width:50"></th>
				
				<th data-options="field:'roleaccess_role_active',title:'<b>Active</b>',width:50"></th>
			</tr>
		</thead>
		</table>
	</div>
	<div data-options="region:'east',border:false,split:true" style="width:500px;">
		<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'center',border:false,split:true">
				<div id="74_tlbRoleModule" style="padding:5px;">
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnSelectRoleModule_74()">Select Module</a>
				</div>
				<table id="74_trgRoleModule" class="easyui-treegrid" idField="roleaccess_rolemodule_id" treeField="roleaccess_rolemodule_name" data-options="title:'Role Module',url:'<?php echo base_url(); ?>index.php/md_role_access/fnRoleModData/',toolbar:'#74_tlbRoleModule',border:false,singleSelect:true,fit:true,onClickRow:function(row){ fnClickRow_RoleModule_74(row); }">
				<thead>
					<tr>
						<th data-options="field:'roleaccess_rolemodule_name',title:'<b>Module Name</b>',width:400"></th>
					</tr>
				</thead>
				</table>
			</div>
			<div data-options="title:'&nbsp;',region:'south',border:false,split:true" style="height:290px;">
				<div id="74_tlbRolModAct" style="padding:5px;">
					<a href="javascript:void(0)" id="74_btnRolModActSave" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnCrud()" >Crud</a>
					<a href="javascript:void(0)" id="74_btnRolModActSave" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnNoCrud()" >Not Crud</a>
					
				</div>
				<table id="74_dtgRolModAct" class="easyui-datagrid" data-options="title:'Role Module Action',url:'<?php echo base_url(); ?>index.php/md_role_access/fnRoleAction/',toolbar:'#74_tlbRolModAct',border:false,singleSelect:false,striped:true,fit:true,onLoadSuccess:function(data){ fnLoadedRolModAct_74(); }">
				<!-- <table id="74_dtgRolModAct" class="easyui-datagrid" data-options="title:'Role Module Action',url:'<?php echo base_url(); ?>index.php/md_role_access/fnRoleModActData/',toolbar:'#74_tlbRolModAct',border:false,singleSelect:true,fit:true"> -->
				<thead>
					<tr>
						<th data-options="field:'f_role_id',title:'<b>Id</b>',width:30"></th>
						<th data-options="field:'f_role_name',title:'<b>Role Code</b>',width:100"></th>						
						<th data-options="field:'f_role_module',title:'<b>Id</b>',width:30"></th>
						<th data-options="field:'f_role_module_name',title:'<b>Module</b>',width:150"></th>						
						<th data-options="field:'f_role_crud',title:'<b>Crud Acces</b>',width:150"></th>
						
					</tr>
				</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="74_dlgRoleAccess" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_74(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="74_divWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="74_fraRoleAccess" id="74_fraRoleAccess" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnResize_74(width,height) {
	$('#74_fraRoleAccess').width(width-14);
	$('#74_fraRoleAccess').height(height-40);
}
function fnAddRole_74() {
	$('#74_dlgRoleAccess').dialog({
		title: 'Input Data Role',
		width: 510,
		height: 340
	});
	$('#74_divWait').show();
	$('#74_fraRoleAccess').hide();
	$('#74_fraRoleAccess').attr('src','<?php echo base_url()?>index.php/md_role_access/fnRoleAdd');
	$('#74_dlgRoleAccess').window('open');
}
function fnEditRole_74() {
	var singleRow = $('#74_dtgRole').datagrid('getSelected');
	if(singleRow) {
		$('#74_dlgRoleAccess').dialog({
			title: 'Edit Data Role',
			width: 510,
			height: 340
		});
		$('#74_divWait').show();
		$('#74_fraRoleAccess').hide();
		$('#74_fraRoleAccess').attr('src','<?php echo base_url()?>index.php/md_role_access/fnRoleEdit/'+singleRow.roleaccess_role_id);
		$('#74_dlgRoleAccess').window('open');
	} else {
		alert('Pilih Role yang ingin di Edit.');
	}
}
/*
function fnRoleAccess_RoleDelete() {
	var singleRow = $('#74_dtgRole').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Anda yakin ingin menghapus data role ini?',function(res) {
			if (res) {
				$.post('<?php echo base_url(); ?>index.php/md_role_access/fnRoleDelete/',{Id:singleRow.roleaccess_role_id},function(result) {
					if (result.success) {
						$('#74_dtgRole').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Pilih Role yang ingin di Delete.');
	}
}
*/
// =============================================
function fnSelectRoleModule_74() {
	var singleRow = $('#74_dtgRole').datagrid('getSelected');
	var vRoleName = singleRow.roleaccess_role_name;
	var vRoleAppl = singleRow.roleaccess_role_appl;
	var vRoleApp = singleRow.roleaccess_role_applid;
	var vRoleId = singleRow.roleaccess_role_id;
	$('#74_dlgRoleAccess').dialog({
		title: 'Select Modules for '+vRoleName+' ('+vRoleAppl+')',
		width: 439,
		height: 440
	});
	$('#74_divWait').show();
	$('#74_fraRoleAccess').hide();
	$('#74_fraRoleAccess').attr('src','<?php echo base_url()?>index.php/md_role_access/fnRoleModChoose/'+vRoleApp+'/'+vRoleId);
	$('#74_dlgRoleAccess').window('open');
}
// =============================================
function fnSaveRolModAct_74() {
	var vChoosenRows = $('#74_dtgRolModAct').datagrid('getSelections');
	if(vChoosenRows) {
		var vSelectedRole = $('#74_dtgRole').datagrid('getSelected');
		var vSelectedModule = $('#74_trgRoleModule').treegrid('getSelected');
		var vRoleId = vSelectedRole.roleaccess_role_id;
		var vRoleModuleId = vSelectedModule.roleaccess_rolemodule_id;
		var vTemp = new Array();
		for(var i=0; i<vChoosenRows.length; i++) {
			var vRow = vChoosenRows[i];
			vTemp[i] = vRow.roleaccess_rolemoduleaction_actionid
		}
		var vActions = vTemp.toString();
		var vData=vActions.replace(/,/g,"_");
	}
	if(!vData) {
		vData = "emptydata";
	}
	$.ajax({
		type: "POST",
		url: '<?php echo base_url()?>index.php/md_role_access/fnSaveRMA/'+vRoleId+'/'+vRoleModuleId+'/'+vData,
		success: function(){
			$('#74_dtgRolModAct').datagrid('reload');
		}
	});
	/*
	// ================================================
	var vRoleId = vChoosenRows[0].roleaccess_rolemoduleaction_roleid;
	var vRoleModuleId = vChoosenRows[0].roleaccess_rolemoduleaction_rolemoduleid;
	var vTemp = new Array();
	for(var i=0; i<vChoosenRows.length; i++) {
		var vRow = vChoosenRows[i];
		vTemp[i] = vRow.roleaccess_rolemoduleaction_actionid
	}
	var vActions = vTemp.toString();
	var vData=vActions.replace(/,/g,"_");
	// var vStringUrl = '<?php echo base_url()?>index.php/md_role_access/fnSaveRMA/'+vRoleId+'/'+vRoleModuleId+'/'+vData;
	// alert(vStringUrl);
	$.ajax({
		type: "POST",
		url: '<?php echo base_url()?>index.php/md_role_access/fnSaveRMA/'+vRoleId+'/'+vRoleModuleId+'/'+vData,
		success: function(){
			$('#74_dtgRolModAct').datagrid('reload');
		}
	});
	*/
}
// =============================================
function fnClickRow_Role_74(pClickedRoleRow) {
	var vRoleId = pClickedRoleRow.roleaccess_role_id;
	var vRoleName = pClickedRoleRow.roleaccess_role_name;
	var vRoleAppl = pClickedRoleRow.roleaccess_role_appl;
	$('#74_trgRoleModule').treegrid({
		title:'Role Module - '+vRoleName+' ('+vRoleAppl+')',
		url:'<?php echo base_url(); ?>index.php/md_role_access/fnRoleModData/'+vRoleId
	});
	$('#74_dtgRolModAct').datagrid({
		title:'Role Module Action',
		url:'<?php echo base_url(); ?>index.php/md_role_access/fnRoleModActData/'
	});
}
function fnClickRow_RoleModule_74(pClickedRoleModuleRow) {
	var vGetSelectedRole = $('#74_dtgRole').datagrid('getSelected');
	var vGetSelectedRoleModule = $('#74_trgRoleModule').treegrid('getSelected');
	var vIsParent = pClickedRoleModuleRow.roleaccess_rolemodule_isparent;
	if(vIsParent!=1) {
		var vRoleId = vGetSelectedRole.roleaccess_role_id;
		var vRoleName = vGetSelectedRole.roleaccess_role_name;
		var vRoleAppl = vGetSelectedRole.roleaccess_role_appl;
		var vRoleModuleId = vGetSelectedRoleModule.roleaccess_rolemodule_id;
		var vRoleModuleName = vGetSelectedRoleModule.roleaccess_rolemodule_name;
		$('#74_dtgRolModAct').datagrid({
			title:'Role Module Action - '+vRoleModuleName+' ['+vRoleName+' ('+vRoleAppl+')]',
			url:'<?php echo base_url(); ?>index.php/md_role_access/fnRoleAction/'+vRoleId+'/'+vRoleModuleId
		});
	}
}
function fnCrud() {
	var vGetSelectedRole = $('#74_dtgRole').datagrid('getSelected');
	var vGetSelectedRoleModule = $('#74_trgRoleModule').treegrid('getSelected');
	if(vGetSelectedRole) {

		var vRoleId = vGetSelectedRole.roleaccess_role_id;
		var vRoleName = vGetSelectedRole.roleaccess_role_name;
		var vRoleAppl = vGetSelectedRole.roleaccess_role_appl;
		var vRoleModuleId = vGetSelectedRoleModule.roleaccess_rolemodule_id;
		var vRoleModuleName = vGetSelectedRoleModule.roleaccess_rolemodule_name;
	
		$('#74_fraRoleAccess').attr('src','<?php echo base_url(); ?>index.php/md_role_access/fnCrud/'+vRoleId+'/'+vRoleModuleId);
				
				$('#74_dtgRolModAct').datagrid('reload');
				

	} else {
		alert('Select which Role data you want to remove.');
	}
}
function fnNoCrud() {
	var vGetSelectedRole = $('#74_dtgRole').datagrid('getSelected');
	var vGetSelectedRoleModule = $('#74_trgRoleModule').treegrid('getSelected');
	if(vGetSelectedRole) {

		var vRoleId = vGetSelectedRole.roleaccess_role_id;
		var vRoleName = vGetSelectedRole.roleaccess_role_name;
		var vRoleAppl = vGetSelectedRole.roleaccess_role_appl;
		var vRoleModuleId = vGetSelectedRoleModule.roleaccess_rolemodule_id;
		var vRoleModuleName = vGetSelectedRoleModule.roleaccess_rolemodule_name;
	
		$('#74_fraRoleAccess').attr('src','<?php echo base_url(); ?>index.php/md_role_access/fnNoCrud/'+vRoleId+'/'+vRoleModuleId);
				
				$('#74_dtgRolModAct').datagrid('reload');
				

	} else {
		alert('Select which Role data you want to remove.');
	}
}

function fnLoadedRolModAct_74() {
	var rows = $('#74_dtgRolModAct').datagrid('getRows');
	for(var i=0;i<rows.length;++i) {
		if(rows[i]['roleaccess_rolemoduleaction_box']==1) {
			$('#74_dtgRolModAct').datagrid('checkRow',i);
		}
	}
}
</script>