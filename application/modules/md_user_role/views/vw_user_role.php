<div class="easyui-layout" data-options="fit:true">
	<div data-options="region:'center',border:false,split:true">
		<div id="75_tlbUser" style="padding:5px;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddUser_75()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditUser_75()">Edit</a>
			<!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeleteRole_75()">Delete</a> -->
		</div>
		<table id="75_dtgUser" class="easyui-datagrid" data-options="title:'User',url:'<?php echo base_url(); ?>index.php/md_user_role/fnUserData/',toolbar:'#75_tlbUser',border:false,singleSelect:true,striped:true,fit:true,onClickRow:function(rowIndex,rowData){ vClickedRowData = rowData; fnClickRow_User_75(vClickedRowData); }">
		<thead>
			<tr>
				<th data-options="field:'userrole_user_ulogin',title:'<b>User Login</b>',width:125"></th>
				<th data-options="field:'userrole_user_uname',title:'<b>User Name</b>',width:175"></th>
				<th data-options="field:'userrole_user_umail',title:'<b>Email Address</b>',width:200"></th>
				<th data-options="field:'userrole_user_uactive',title:'<b>Active</b>',width:75"></th>
				<th data-options="field:'userrole_user_group',title:'<b>User Group</b>',width:175"></th>
				
			</tr>
		</thead>
		</table>
	</div>
	<div data-options="region:'east',border:false,split:true" style="width:500px;">
		<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'center',border:false,split:true">
				<div id="75_tlbUserRole" style="padding:5px;">
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnSelectUserRole_75()">Select Role</a>
				</div>
				<table id="75_dtgUserRole" class="easyui-datagrid" data-options="title:'User Role',url:'<?php echo base_url(); ?>index.php/md_user_role/fnUserRoleData/',toolbar:'#75_tlbUserRole',border:false,singleSelect:true,striped:true,fit:true">
				<thead>
					<tr>
						<th data-options="field:'userrole_userrole_rcode',title:'<b>Role Code</b>',width:180"></th>
						<th data-options="field:'userrole_userrole_rname',title:'<b>Role Name</b>',width:260"></th>
					</tr>
				</thead>
				</table>
			</div>
			<div data-options="region:'south',border:false,split:true" style="height:290px;">
				<div id="75_tlbUserEmployee" style="padding:5px;">
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnSelectUserEmployee_75()">Select Employee Data</a>
				</div>
				<table id="75_dtgUserEmployee" class="easyui-datagrid" data-options="title:'User Employee',url:'<?php echo base_url(); ?>index.php/md_user_role/fnUserEmployeeData/',toolbar:'#75_tlbUserEmployee',border:false,singleSelect:true,striped:true,fit:true,view:vUserEmployeeCardView">
				<thead>
					<tr>
						<th data-options="field:'userrole_useremployee_ecode',title:'<b>Employee Code</b>',width:100,hidden:true"></th>
						<th data-options="field:'userrole_useremployee_ename',title:'<b>Employee Name</b>',width:100,hidden:true"></th>
						<th data-options="field:'userrole_useremployee_email',title:'<b>Employee E-Mail</b>',width:140,hidden:true"></th>
						<th data-options="field:'userrole_useremployee_ecard',title:'<b>Employee Info</b>',width:480"></th>
					</tr>
				</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="75_dlgUserRole" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_75(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="75_divWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="75_fraUserRole" id="75_fraUserRole" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnResize_75(width,height) {
	$('#75_fraUserRole').width(width-14);
	$('#75_fraUserRole').height(height-40);
}
function fnAddUser_75() {
	$('#75_dlgUserRole').dialog({
		title: 'Input Data User',
		width: 510,
		height: 390
	});
	$('#75_divWait').show();
	$('#75_fraUserRole').hide();
	$('#75_fraUserRole').attr('src','<?php echo base_url()?>index.php/md_user_role/fnUserAdd');
	$('#75_dlgUserRole').window('open');
}
function fnEditUser_75() {
	var singleRow = $('#75_dtgUser').datagrid('getSelected');
	if(singleRow) {
		$('#75_dlgUserRole').dialog({
			title: 'Edit Data User',
			width: 510,
			height: 390
		});
		$('#75_divWait').show();
		$('#75_fraUserRole').hide();

		$('#75_fraUserRole').attr('src','<?php echo base_url()?>index.php/md_user_role/fnUserEdit/'+singleRow.userrole_user_uid);
		$('#75_dlgUserRole').window('open');
	} else {
		alert('Select which User data you want to edit.');
	}
}
function fnClickRow_User_75(pClickedRowData) {
	var vClickedRowData = pClickedRowData;
	var vUserId = vClickedRowData.userrole_user_uid;
	var vUserLogin = vClickedRowData.userrole_user_ulogin;
	$('#75_dtgUserRole').datagrid({
		title:'User Role - '+vUserLogin,
		url:'<?php echo base_url(); ?>index.php/md_user_role/fnUserRoleData/'+vUserId
	});
	$('#75_dtgUserEmployee').datagrid({
		title:'User Employee - '+vUserLogin,
		url:'<?php echo base_url(); ?>index.php/md_user_role/fnUserEmployeeData/'+vUserId,
	});
}
function fnSelectUserRole_75() {
	var singleRow = $('#75_dtgUser').datagrid('getSelected');
	if(singleRow) {
		var vUserId = singleRow.userrole_user_uid;
		var vUserLogin = singleRow.userrole_user_ulogin;
		$('#75_dlgUserRole').dialog({
			title: 'Select Role for '+vUserLogin,
			width: 365,
			height: 290
		});
		$('#75_divWait').show();
		$('#75_fraUserRole').hide();
		$('#75_fraUserRole').attr('src','<?php echo base_url()?>index.php/md_user_role/fnUserRoleChoose/'+vUserId);
		$('#75_dlgUserRole').window('open');
	} else {
		alert('Select User Datagrid row first.');
	}
}
function fnSelectUserEmployee_75() {
	var singleRow = $('#75_dtgUser').datagrid('getSelected');
	if(singleRow) {
		var vUserId = singleRow.userrole_user_uid;
		var vUserLogin = singleRow.userrole_user_ulogin;
		$('#75_dlgUserRole').dialog({
			title: 'Select Employee Data for '+vUserLogin,
			width: 515,
			height: 290
		});
		$('#75_divWait').show();
		$('#75_fraUserRole').hide();
		$('#75_fraUserRole').attr('src','<?php echo base_url()?>index.php/md_user_role/fnUserEmployeeSelect/'+vUserId);
		$('#75_dlgUserRole').window('open');
	} else {
		alert('Select User Datagrid row first.');
	}
}

var vUserEmployeeCardView = $.extend({}, $.fn.datagrid.defaults.view, {
	renderRow: function(target, fields, frozen, rowIndex, rowData) {
		var vCardView = [];
		vCardView.push('<td colspan='+fields.length+' style="padding:0px; border:1;">');
		if (!frozen) {
			vCardView.push('<div style="float:left; margin:10px 0px 10px 30px; width:450px;">');
			var vLength = fields.length-1;
			for(var i=0; i<vLength; i++) {
				var vColOpts = $(target).datagrid('getColumnOption',fields[i]);
				vCardView.push('<p><span class="c-label">'+vColOpts.title+'<br></span> '+rowData[fields[i]]+'</p>');
			}
			vCardView.push('</div>');
		}
		vCardView.push('</td>');
		return vCardView.join('');
	}
});
</script>