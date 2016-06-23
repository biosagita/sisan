<div id="55_tlbdepartment" style="padding:5px;">
	<div style="float:left;" id=crud_55 >
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAdddepartment_55()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditdepartment_55()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletedepartment_55()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="55_txtdepartment" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_55()">Find</a>
	</div>
</div>
<table id="55_dtgdepartment" class="easyui-datagrid" data-options="title:'Data Department',url:'<?php echo base_url(); ?>index.php/md_department/fndepartmentData/',toolbar:'#55_tlbdepartment',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'f_dept_id',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_dept_name',title:'<b>Name</b>',width:250,sortable:true" halign="center"></th>

		   <th data-options="field:'f_emp_segment_name',title:'<b>Division</b>',width:250,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_dept_remark',title:'<b>Remark</b>',width:300,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="55_dlgdepartment" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_55(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="55_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/attendance/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="55_fradepartment" id="55_fradepartment" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
$(function() {
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url()?>index.php/md_role_access/fnRoleAccessCrud/55/',
		dataType: 'json',
		data: {},
		success: function(data) {
			if(data.crud_55 != 1){
			$('#crud_55').hide();
			
			}	
		}
	});
});	
function fnSearch_55() {
	$('#55_dtgdepartment').datagrid('load',{
		departmentKeyword: $('#55_txtdepartment').val()
	});
}
function fnResize_55(width,height) {
	$('#55_fradepartment').width(width-14);
	$('#55_fradepartment').height(height-40);
}
function fnResize_55(width,height) {
	$('#55_fradepartment').width(width-14);
	$('#55_fradepartment').height(height-40);
}
function fnAdddepartment_55() {
	$('#55_dlgdepartment').dialog({
		title: 'Input Data Department',
		width: 510,
		height: 290
	});
	$('#55_divWait').show();
	$('#55_fradepartment').hide();
	$('#55_fradepartment').attr('src','<?php echo base_url(); ?>index.php/md_department/fndepartmentAdd');
	$('#55_dlgdepartment').window('open');
}
function fnEditdepartment_55() {
	var singleRow = $('#55_dtgdepartment').datagrid('getSelected');
	if(singleRow) {
		$('#55_dlgdepartment').dialog({
			title: 'Edit Data Department',
			width: 510,
			height: 290
		});
		$('#55_divWait').show();
		$('#55_fradepartment').hide();
						
		$('#55_fradepartment').attr('src','<?php echo base_url(); ?>index.php/md_department/fndepartmentEdit/'+singleRow.f_dept_id);
				

		$('#55_dlgdepartment').window('open');
	} else {
		alert('Select which department data you want to edit.');
	}
}
function fnSelectdepartment_55() {
	var singleRow = $('#55_dtgdepartment').datagrid('getSelected');
	if(singleRow) {
		var vdepartmentId = singleRow.department_uid;
		var vdepartmentLogin = singleRow.department_ulogin;
		$('#55_dlgdepartment').dialog({
			title: 'Select department for '+vdepartmentLogin,
			width: 365,
			height: 290
		});
		$('#55_divWait').show();
		$('#55_fradepartment').hide();
				
		$('#55_fradepartment').attr('src','<?php echo base_url(); ?>index.php/md_department/fndepartmentChoose/'+vf_dept_id);
				
		$('#55_dlgdepartment').window('open');
	} else {
		alert('Select department Datagrid row first.');
	}
}
function fnDeletedepartment_55() {
	var singleRow = $('#55_dtgdepartment').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_department/fndepartmentDelete/',{Id:singleRow.f_dept_id},function(result) {
				
					if (result.success) {
						$('#55_dtgdepartment').datagrid('reload');
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