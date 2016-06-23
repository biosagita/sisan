<div class="easyui-layout" data-options="fit:true">
    <div data-options="region:'east',iconCls:'icon-reload',title:'Profile',split:true" style="width:250px;">
		<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'center',border:false,split:true" >
				<div style="float:left;">
						<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-up" plain="true" onclick="fnUploademployee_25()">Upload Photo</a>
				</div>  
				<table id="25_dtgphotoemployeee" class="easyui-datagrid" data-options="url:'<?php echo base_url(); ?>index.php/md_employee/fnemployeeProfileData/',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,view:jvar_cardview_photo">
				<thead>
					<tr>
									<th field="f_emp_id" width="80" sortable="true">employee ID</th>  
									<th field="f_emp_code" width="80" sortable="true">employee Code</th>  
									<th field="f_emp_name" width="200" sortable="true">employee Name</th>  
									<th field="f_emp_gender" width="30" sortable="true">Gender</th>  
									<th field="f_emp_religion" width="80" sortable="true">Religion</th>  
									<th field="f_emp_marital_status" width="80" sortable="true">marital Status</th>  
									<th field="f_emp_mobile_phone" width="120" sortable="true">Mobile Phone</th>  
									<th field="f_emp_pin_bb" width="60" sortable="true">Pin BB</th>  
									<th field="f_emp_email" width="150" sortable="true">Email</th>  
									<th field="f_emp_photo" width="150" sortable="true">File</th>  
					</tr>
				</thead>
				</table>				
			</div>
		</div>	
	</div>  
    <div data-options="region:'center',title:'center title'" style="padding:5px;background:#eee;">
		<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'center',border:false,split:true" >
				<div id="25_tlbemployee" style="padding:5px;">
					<div style="float:left;">
							<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddemployee_25()">Add</a>
							<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditemployee_25()">Edit</a>
							<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeleteemployee_25()">Delete</a> 					
							<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="fnPrintProfileemployee_25()">Print Profile</a> 					
							
					</div>
					<div style="float:right;clear:right;">
							<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-up" plain="true" onclick="fnImportemployee_25()">Import Excel</a> 					
					</div>			
				</div>			
				<table id="25_dtgemployee" class="easyui-datagrid" data-options="title:'Data employee',url:'<?php echo base_url(); ?>index.php/md_employee/fnemployeeData/',toolbar:'#25_tlbemployee',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500],onClickRow:function(rowIndex,rowData){ vClickedRowData = rowData; fnClickRow_employee_25(vClickedRowData); }">
				<thead>
					<tr>
						   <th data-options="field:'f_emp_id',title:'<b>Id</b>',width:60,hidden:true,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_code',title:'<b>Code</b>',width:60,sortable:true" halign="center"></th>

						   <th data-options="field:'f_emp_initial',title:'<b>Initial</b>',width:60,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_name',title:'<b>Name</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_gender',title:'<b>Gender</b>',width:40,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_birthplace',title:'<b>Birth Of Place</b>',width:70,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_datebirth',title:'<b>Date Of Birth</b>',width:70,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_religion',title:'<b>Religion</b>',width:100,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_marital_status',title:'<b>Marital</b>',width:100,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_address1',title:'<b>Address1</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_address2',title:'<b>Address2</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_address3',title:'<b>Address3</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_city_name',title:'<b>City</b>',width:150,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_post_code',title:'<b>Post Code</b>',width:100,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_ext_phone',title:'<b>Ext Phone</b>',width:150,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_office_phone',title:'<b>Office Phone</b>',width:150,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_home_phone',title:'<b>Home Phone</b>',width:150,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_mobile_phone',title:'<b>HandPhone</b>',width:150,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_pin_bb',title:'<b>Pin BB</b>',width:150,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_email',title:'<b>Email</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_website',title:'<b>Website</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_acc_bank',title:'<b>Acc Bank</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_acc_no',title:'<b>Acc No</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_acc_name',title:'<b>Acc Name</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_insurance',title:'<b>Insurance</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_insurance_no',title:'<b>Insurance No</b>',width:200,sortable:true" halign="center"></th>
						   						   
						   <th data-options="field:'f_comp_branch_name',title:'<b>Company Branch</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_segment_name',title:'<b>employee Segment</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_position_name',title:'<b>Position</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_class_name',title:'<b>Class</b>',width:100,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_status_name',title:'<b>Status</b>',width:150,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_group_att_name',title:'<b>Attendance Group</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_start_date',title:'<b>Date Of Start</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_out_date',title:'<b>Date Of Resign</b>',width:200,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_reason_out',title:'<b>Reason Out</b>',width:250,sortable:true" halign="center"></th>
							
						   <th data-options="field:'f_emp_photo',title:'<b>File Photo</b>',width:250,sortable:true" halign="center"></th>

				   </tr>
				</thead>
				</table>

			</div>
			<div data-options="region:'south',title:'Filter BY',split:true" style="height:180px;background-color:#efefef;">  
				<div data-options="region:'center',border:false">
					<div style="padding:0px 15px;">
						<form name="frmFilteremployee" id="frmFilteremployee" accept-charset="utf-8"  method="post" novalidate>
						<div style="width:300px;border:0px dotted #CCCCCC;border-radius:5px;float:left;clear:left;">
						
							<div class="frmItem">
								<label>Company Branch</label>
								<input name='f_comp_branch' id='f_comp_branch' size="20" >
							</div>
							<div class="frmItem">
								<label>employee Segment</label>
								<input name='f_emp_segment_id' id='f_emp_segment_id'  size="20" >
							</div>
							<div class="frmItem">
								<label>Position</label>
								<input name='f_position_id' id='f_position_id'  size="20" >
							</div>
							
						</div>

						<div style="width:300px;border:0px dotted #CCCCCC;border-radius:5px;float:left;clear:right;">

							<div class="frmItem">
								<label>Status</label>
								<input name='f_status' id='f_status'  size="20" >
							</div>		
							<div class="frmItem">
								<label>Attendance Group</label>
								<input name='f_group_att_id' id='f_group_att_id'  size="20" >
							</div>
							
						</div>
						<div id="footBarLeft" style="float:right;width:auto; clear:left;">
							<a href="javascript:void(0)" class="easyui-linkbutton"  onclick="fnPreview()">Preview</a>								
							<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="fnPrint('myPop1',1000,600)">Print</a>								
						</div>						
						
						</form>
					</div>
				</div>
			</div>
		<div id="25_dlgemployee" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_25(width, height) }" closed="true" style="background-color:#F8F8F8;">  
			<div id="25_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/employee/images/loading.gif" /> &nbsp;Loading...</div>
			<iframe name="25_fraemployee" id="25_fraemployee" frameborder="0" style="background-color:#F8F8F8"></iframe>
		</div>

		</div>
	</div>
	
	</div>  
	
	<div data-options="region:'center',border:false,split:true" >

				<div id="24_dlgemployee" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_24(width, height) }" closed="true" style="background-color:#F8F8F8;">  
					<div id="24_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/etnisys/images/loading.gif" /> &nbsp;Loading...</div>
					<iframe name="24_fraemployee" id="24_fraemployee" frameborder="0" style="background-color:#F8F8F8"></iframe>
				</div>
		
	</div>
<script type="text/javascript">
var jvar_cardview_photo = $.extend({},$.fn.datagrid.defaults.view,{
	renderRow:function(target,fields,frozen,rowIndex,rowData){
		var jvar_cardview_file = [];
		jvar_cardview_file.push('<td colspan='+fields.length+' style="padding:0px; border:1;">');
		if(!frozen) {
			var FolderId =  rowData.f_emp_id;
			var img =  rowData.f_emp_photo;			
			jvar_cardview_file.push('<img src="public/upload/photo/'+FolderId+'/'+img+'" style="width:150px;float:left">');  
		
			jvar_cardview_file.push('<div style="float:left; margin:2px 0px 2px 5px; width:221px;">');		
			var jvar_length_filefield = fields.length-1;
			for(var i=0;i<jvar_length_filefield;i++) {
				var jvar_colopts_file = $(target).datagrid('getColumnOption',fields[i]);
				jvar_cardview_file.push('<p><span class="c-label">'+ jvar_colopts_file.title + ':</span> '+rowData[fields[i]]+'</p>');
			}
			jvar_cardview_file.push('</div>');
		}
		jvar_cardview_file.push('</td>');
		return jvar_cardview_file.join('');
	}
});

$(function() {

	$('#f_comp_branch').combobox({
		valueField:'f_branch_id',
		textField:'f_branch_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnCompBranchComboData/'
	});
	$('#f_position_id').combobox({
		valueField:'f_position_id',
		textField:'f_position_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_position/fnPositionComboData/'
	});

	$('#f_status').combobox({
		valueField:'f_status_id',
		textField:'f_status_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_Status/fnStatusComboData/'
	});

	$('#f_emp_segment_id').combobox({
		valueField:'f_emp_segment_id',
		textField:'f_emp_segment_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_employee_segment/fnemployee_segmentComboData/'
	});
	$('#f_group_att_id').combobox({
		valueField:'f_group_att_id',
		textField:'f_group_att_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		onChange:function() {
		fnemployeeDataFilter();
		},			
		url:'<?php echo base_url(); ?>index.php/md_group_attendance/fnGroupAttendanceComboData/'
	});
	
});
function fnPreview(){
	$('#25_dtgemployee').datagrid('load',{
		empCompBranchKeyword: $('#f_comp_branch').combobox('getValue'),
		empStatusKeyword: $('#f_status').combobox('getValue'),
		empSegmentKeyword: $('#f_emp_segment_id').combobox('getValue'),
		empPositionKeyword: $('#f_position_id').combobox('getValue'),
		empGroupAttKeyword: $('#f_group_att_id').combobox('getValue'),
	});
}

function fnSearch_25() {
	$('#25_dtgemployee').datagrid('load',{
		employeeKeyword: $('#25_txtemployee').val()
	});
}
function fnResize_25(width,height) {
	$('#25_fraemployee').width(width-14);
	$('#25_fraemployee').height(height-40);
}
function fnResize_25(width,height) {
	$('#25_fraemployee').width(width-14);
	$('#25_fraemployee').height(height-40);
}
function fnAddemployee_25() {
	$('#25_dlgemployee').dialog({
		title: 'Input Data employee',
		width: 830,
		height: 565
	});
	$('#25_divWait').show();
	$('#25_fraemployee').hide();
	$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployeeAdd');
	$('#25_dlgemployee').window('open');
}
function fnEditemployee_25() {
	var singleRow = $('#25_dtgemployee').datagrid('getSelected');
	if(singleRow) {
		$('#25_dlgemployee').dialog({
			title: 'Edit Data employee',
		width: 830,
		height: 565
		});
		$('#25_divWait').show();
		$('#25_fraemployee').hide();
						
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployeeEdit/'+singleRow.f_emp_id);
				

		$('#25_dlgemployee').window('open');
	} else {
		alert('Select which employee data you want to edit.');
	}
}
function fnPrintProfileemployee_25(title,w,h) {

	var singleRow = $('#25_dtgemployee').datagrid('getSelected');
    var vEmpId = singleRow.f_emp_code;
    var vPositionId = singleRow.f_position_id;
	
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
var targetWin = window.open ('//localhost/attendance/index.php/md_pdf/md_pdf/employee_profile/'+vEmpId+'/'+vPositionId, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);

}

function fnSelectemployee_25() {
	var singleRow = $('#25_dtgemployee').datagrid('getSelected');
	if(singleRow) {
		var vemployeeId = singleRow.employee_uid;
		var vemployeeLogin = singleRow.employee_ulogin;
		$('#25_dlgemployee').dialog({
			title: 'Select employee for '+vemployeeLogin,
			width: 365,
			height: 290
		});
		$('#25_divWait').show();
		$('#25_fraemployee').hide();
				
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployeeChoose/'+vf_emp_id);
				
		$('#25_dlgemployee').window('open');
	} else {
		alert('Select employee Datagrid row first.');
	}
}
function fnDeleteemployee_25() {
	var singleRow = $('#25_dtgemployee').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Anda yakin ingin menghapus data ini?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_employee/fnemployeeDelete/',{Id:singleRow.f_emp_id},function(result) {
				
					if (result.success) {
						$('#25_dtgemployee').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Pilih Data yang ingin di Delete.');
	}
}
function fnImportemployee_25() {
	$('#25_dlgemployee').dialog({
		title: 'Import Data employee',
		width: 470,
		height: 180
	});
	$('#25_divWait').show();
	$('#25_fraemployee').hide();
	$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployeeImport');
	$('#25_dlgemployee').window('open');
}

function fnUploademployee_25() {
	var singleRow = $('#25_dtgemployee').datagrid('getSelected');
	if(singleRow) {
		var vemployeeId = singleRow.f_emp_id;
		$('#25_dlgemployee').dialog({
			title: 'Select employee for '+vemployeeId,
			width: 550,
			height: 270
		});
		$('#25_divWait').show();
		$('#25_fraemployee').hide();
				
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployeeUpload/'+vemployeeId);
				
		$('#25_dlgemployee').window('open');
	} else {
		alert('Select employee Datagrid row first.');
	}
}
function fnClickRow_employee_25(pClickedRowData) {
	var vClickedRowData = pClickedRowData;
	var vemployeeId = vClickedRowData.f_emp_id;
	$('#25_dtgphotoemployeee').datagrid({
		title:'employee - '+vemployeeId,
		url:'<?php echo base_url(); ?>index.php/md_employee/fnemployeeProfileData/'+vemployeeId
	});
}

</script>