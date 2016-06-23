<div class="easyui-layout" data-options="fit:true">
    <div data-options="region:'east',iconCls:'icon-reload',title:'Profile',split:true" style="width:200px;">
		<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'center',border:false,split:true" >
				<div style="float:left;" id=crud_25A>
						<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-up" plain="true" onclick="fnUploademployee_25()">Upload Photo</a>
				</div>  
				<table id="25_dtgphotoemployeee" class="easyui-datagrid" data-options="url:'<?php echo base_url(); ?>index.php/md_employee/fnemployeeProfileData/',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,view:jvar_cardview_photo">
				<thead>
					<tr>
									<th field="f_emp_id" width="80" sortable="true">ID</th>  
									<th field="f_emp_no" width="80" sortable="true">Code</th>  
									<th field="f_emp_name" width="200" sortable="true">Nama Karyawan</th>  
																			
					</tr>
				</thead>
				</table>				
			</div>
		</div>	
	</div>  
    <div data-options="region:'center',title:'Data Karyawan'" style="padding:5px;background:#efefef;">
		<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'center',border:false,split:true" style="background-color:#efefef;" >
				<div id="25_tlbemployee" style="padding:5px;">

							<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddemployee_25()">Add</a>
							<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditemployee_25()">Edit</a>
							<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeleteemployee_25()">Delete</a> 					

							<input id="25_txtemployee" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
							<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_25()">Cari</a>
				</div>			
				<table id="25_dtgemployee" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_employee/fnemployeeData/',toolbar:'#25_tlbemployee',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500],onClickRow:function(rowIndex,rowData){ vClickedRowData = rowData; fnClickRow_employee_25(vClickedRowData); }">
				<thead>
					<tr>
						   <th data-options="field:'f_emp_id',title:'<b>Id</b>',width:60,hidden:true,sortable:true" halign="center"></th>
						   						   
						   <th data-options="field:'f_emp_name',title:'<b>Nama Karyawan</b>',width:200,sortable:true" halign="center"></th>

						   <th data-options="field:'f_status_name',title:'<b>Status</b>',width:100,sortable:true" halign="center"></th>
						   
						   <th data-options="field:'f_emp_gender',title:'<b>J/K</b>',width:40,sortable:true" halign="center"></th>

						   						   						   
						   <th data-options="field:'f_emp_address1',title:'<b>Alamat</b>',width:200,sortable:true" halign="center"></th>
						   
				   </tr>
				</thead>
				</table>

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
function fnPreview_25(){
	$('#25_dtgemployee').datagrid('load',{
		cityKeyword: $('#f_city_id').combobox('getValue'),
		kecKeyword: $('#f_kec_id').combobox('getValue'),
		statusKeyword: $('#f_status_id').combobox('getValue'),
		
	});
}

function fnPrint_25_pdf( title,w,h) {
   if (($('#f_city_id').combobox('getValue') != '')&&($('#f_kec_id').combobox('getValue') != '')){
		var cityKeyword = $('#f_city_id').combobox('getValue');
		var kecKeyword = $('#f_kec_id').combobox('getValue');
		var statusKeyword = $('#f_status_id').combobox('getValue');	
	}
   if (($('#f_city_id').combobox('getValue') != '')&&($('#f_kec_id').combobox('getValue') == '')){
		var cityKeyword = $('#f_city_id').combobox('getValue');
		var kecKeyword = 0;
		var statusKeyword = $('#f_status_id').combobox('getValue');	
	}
	else{
		var cityKeyword = 0;
		var kecKeyword = 0;
		var statusKeyword = $('#f_status_id').combobox('getValue');		
	}		
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_employee/md_employee/fnEmployeeDataPrint/'+cityKeyword+'/'+kecKeyword+'/'+statusKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}
function fnPrint_25_pdf_absen( title,w,h) {
   if (($('#f_city_id').combobox('getValue') != '')&&($('#f_kec_id').combobox('getValue') != '')){
		var cityKeyword = $('#f_city_id').combobox('getValue');
		var kecKeyword = $('#f_kec_id').combobox('getValue');
		var statusKeyword = $('#f_status_id').combobox('getValue');	
	}
   if (($('#f_city_id').combobox('getValue') != '')&&($('#f_kec_id').combobox('getValue') == '')){
		var cityKeyword = $('#f_city_id').combobox('getValue');
		var kecKeyword = 0;
		var statusKeyword = $('#f_status_id').combobox('getValue');	
	}
	else{
		var cityKeyword = 0;
		var kecKeyword = 0;
		var statusKeyword = $('#f_status_id').combobox('getValue');		
	}		
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_employee/md_employee/fnEmployeeAbsenDataPrint/'+cityKeyword+'/'+kecKeyword+'/'+statusKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}
function fnPrint_25_excel( title,w,h) {
   if (($('#f_city_id').combobox('getValue') != '')&&($('#f_kec_id').combobox('getValue') != '')){
		var cityKeyword = $('#f_city_id').combobox('getValue');
		var kecKeyword = $('#f_kec_id').combobox('getValue');
		var statusKeyword = $('#f_status_id').combobox('getValue');	
	}
   if (($('#f_city_id').combobox('getValue') != '')&&($('#f_kec_id').combobox('getValue') == '')){
		var cityKeyword = $('#f_city_id').combobox('getValue');
		var kecKeyword = 0;
		var statusKeyword = $('#f_status_id').combobox('getValue');	
	}
	else{
		var cityKeyword = 0;
		var kecKeyword = 0;
		var statusKeyword = $('#f_status_id').combobox('getValue');		
	}		
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open ('index.php/md_employee/md_employee/fnEmployeeDataPrintExcel/'+cityKeyword+'/'+kecKeyword+'/'+statusKeyword, title, 'toolbar=yes, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		
}

$(function() {
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url()?>index.php/md_role_access/fnRoleAccessCrud/25/',
		dataType: 'json',
		data: {},
		success: function(data) {
			if(data.crud_25 != 1){
			$('#crud_25').hide();
			$('#crud_25A').hide();			
			$('#crud_25B').hide();
			$('#crud_25C').hide();
			$('#crud_25D').hide();
			$('#crud_25E').hide();
			$('#crud_25F').hide();
			
			}	
		}
	});
	
	$('#f_city_id').combobox({
		valueField:'f_city_id',
		textField:'f_city_name',
		mode:'remote',
		panelWidth:200,
		onChange: function(){
			var CityId = $('#f_city_id').combobox('getValue');
			$('#f_kec_id').combobox({
				valueField:'f_kec_id',
				textField:'f_kec_name',
				mode:'remote',
				panelWidth:200,
				panelHeight:'auto',
				url:'<?php echo base_url(); ?>index.php/md_kecamatan/fnkecamatanComboData2/'+CityId
			});

		},		
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_city/fncityComboData/'
	});


			$('#f_status_id').combobox({
				valueField:'f_status_id',
				textField:'f_status_name',
				mode:'remote',
				panelWidth:200,
				panelHeight:'auto',
				url:'<?php echo base_url(); ?>index.php/md_status/fnstatusComboData/',
			});

	$('#f_emp_id').combogrid({
    idField:'f_emp_id',  
    textField:'f_emp_name',  	
    panelWidth:450,  
	 mode:'remote',	
    columns:[[  
        {field:'f_emp_id',title:'Id',width:60},  
        {field:'f_emp_name',title:'Name',width:150},  
        {field:'f_emp_segment_name',title:'Division',width:100},  
        {field:'f_dept_name',title:'Departement',width:100},  
        
    ]],  		
		url:'<?php echo base_url(); ?>index.php/md_employee/fnemployeeComboData/'
	});
	
});


function fnSearch_25() {
	$('#25_dtgemployee').datagrid('load',{
		empIdKeyword: $('#25_txtemployee').val()	
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
		title: 'Input Data Relawan',
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
			title: 'Edit Data Relawan',
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
function fnAddemployee_educations_25() {

	var singleRow = $('#25_dtgemployee').datagrid('getSelected');
	if(singleRow) {
		$('#25_dlgemployee').dialog({
			title: 'Edit Data employee',
		width: 550,
		height: 385
		});
		$('#25_divWait').show();
		$('#25_fraemployee').hide();
						
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployee_educationsAdd/'+singleRow.f_emp_id);
				

		$('#25_dlgemployee').window('open');
	} else {
		alert('Select which Employee data you want to Add.');
	}
	
}
function fnAddemployee_family_25() {

	var singleRow = $('#25_dtgemployee').datagrid('getSelected');
	if(singleRow) {
		$('#25_dlgemployee').dialog({
			title: 'Edit Data Employee family',
		width: 550,
		height: 385
		});
		$('#25_divWait').show();
		$('#25_fraemployee').hide();
						
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployee_familyAdd/'+singleRow.f_emp_id);
				

		$('#25_dlgemployee').window('open');
	} else {
		alert('Select which Employee data you want to Add.');
	}
	
}
function fnAddemployee_courses_25() {

	var singleRow = $('#25_dtgemployee').datagrid('getSelected');
	if(singleRow) {
		$('#25_dlgemployee').dialog({
			title: 'Edit Data Employee Courses',
		width: 550,
		height: 385
		});
		$('#25_divWait').show();
		$('#25_fraemployee').hide();
						
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployee_coursesAdd/'+singleRow.f_emp_id);
				

		$('#25_dlgemployee').window('open');
	} else {
		alert('Select which Employee data you want to Add.');
	}
	
}
function fnAddemployee_experience_25() {

	var singleRow = $('#25_dtgemployee').datagrid('getSelected');
	if(singleRow) {
		$('#25_dlgemployee').dialog({
			title: 'Edit Data Employee Experience',
		width: 550,
		height: 385
		});
		$('#25_divWait').show();
		$('#25_fraemployee').hide();
						
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployee_experienceAdd/'+singleRow.f_emp_id);
				

		$('#25_dlgemployee').window('open');
	} else {
		alert('Select which Employee data you want to Add.');
	}
	
}
function fnEditemployee_educations_25() {

	var singleRow = $('#25_dtgemployee_educations').datagrid('getSelected');
	if(singleRow) {
		$('#25_dlgemployee').dialog({
			title: 'Edit Data Employee Education',
		width: 550,
		height: 385
		});
		$('#25_divWait').show();
		$('#25_fraemployee').hide();
						
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployee_educationsEdit/'+singleRow.f_emp_education_id);
				

		$('#25_dlgemployee').window('open');
	} else {
		alert('Select which Employee data you want to Edit.');
	}
	
}
function fnEditemployee_family_25() {

	var singleRow = $('#25_dtgemployee_family').datagrid('getSelected');
	if(singleRow) {
		$('#25_dlgemployee').dialog({
			title: 'Edit Data Employee Family',
		width: 550,
		height: 385
		});
		$('#25_divWait').show();
		$('#25_fraemployee').hide();
						
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployee_familyEdit/'+singleRow.f_emp_family_id);
				

		$('#25_dlgemployee').window('open');
	} else {
		alert('Select which Employee data you want to Edit.');
	}
	
}
function fnEditemployee_courses_25() {

	var singleRow = $('#25_dtgemployee_courses').datagrid('getSelected');
	if(singleRow) {
		$('#25_dlgemployee').dialog({
			title: 'Edit Data Employee Courses',
		width: 550,
		height: 385
		});
		$('#25_divWait').show();
		$('#25_fraemployee').hide();
						
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployee_coursesEdit/'+singleRow.f_emp_courses_id);
				

		$('#25_dlgemployee').window('open');
	} else {
		alert('Select which Employee data you want to Edit.');
	}
	
}
function fnEditemployee_experience_25() {

	var singleRow = $('#25_dtgemployee_experience').datagrid('getSelected');
	if(singleRow) {
		$('#25_dlgemployee').dialog({
			title: 'Edit Data Employee Experience',
		width: 550,
		height: 385
		});
		$('#25_divWait').show();
		$('#25_fraemployee').hide();
						
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployee_experienceEdit/'+singleRow.f_emp_experience_id);
				

		$('#25_dlgemployee').window('open');
	} else {
		alert('Select which Employee data you want to Edit.');
	}
	
}
function fnPrintProfileemployee_25(title,w,h) {

	var singleRow = $('#25_dtgemployee').datagrid('getSelected');
    var vEmpId = singleRow.f_emp_no;
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
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
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
		alert('Select the data that you want to Delete.');
	}
}
function fnDeleteemployee_educations_25() {
	var singleRow = $('#25_dtgemployee_educations').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_employee_educations/fnemployee_educationsDelete/',{Id:singleRow.f_emp_education_id},function(result) {
				
					if (result.success) {
						$('#25_dtgemployee_educations').datagrid('reload');
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
function fnDeleteemployee_family_25() {
	var singleRow = $('#25_dtgemployee_family').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_employee_family/fnemployee_familyDelete/',{Id:singleRow.f_emp_family_id},function(result) {
				
					if (result.success) {
						$('#25_dtgemployee_family').datagrid('reload');
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
function fnDeleteemployee_courses_25() {
	var singleRow = $('#25_dtgemployee_courses').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_employee_courses/fnemployee_coursesDelete/',{Id:singleRow.f_emp_courses_id},function(result) {
				
					if (result.success) {
						$('#25_dtgemployee_courses').datagrid('reload');
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
function fnDeleteemployee_experience_25() {
	var singleRow = $('#25_dtgemployee_experience').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_employee_experience/fnemployee_experienceDelete/',{Id:singleRow.f_emp_experience_id},function(result) {
				
					if (result.success) {
						$('#25_dtgemployee_experience').datagrid('reload');
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
function fnDeleteemployee_attachment_file_25() {
	var singleRow = $('#25_dtgemployee_attachment_file').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_employee_attachment_file/fnemployee_attachment_fileDelete/',{Id:singleRow.f_emp_attachment_file_id},function(result) {
				
					if (result.success) {
						$('#25_dtgemployee_attachment_file').datagrid('reload');
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
function fnUploademployee_attachment_file_25() {
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
				
		$('#25_fraemployee').attr('src','<?php echo base_url(); ?>index.php/md_employee/fnemployee_attachment_file_Upload/'+vemployeeId);
				
		$('#25_dlgemployee').window('open');
	} else {
		alert('Select employee Datagrid row first.');
	}
}
function fnDownloademployee_attachment_file_25() {
	var jvar_selected = $('#25_dtgemployee_attachment_file').datagrid('getSelected');
	if (jvar_selected) {
		var jvar_file_name = jvar_selected.f_emp_attachment_file_name;
		var jvar_file_url = jvar_selected.f_emp_id;
		
		var url_download = '<?php echo base_url(); ?>/public/upload/employee_file/'+jvar_file_url+'/'+jvar_file_name;
		$(location).attr('href',url_download);		
	} else {
		alert('Select Attachment File datagrid row first.');
	}

	
}
function fnClickRow_employee_25(pClickedRowData) {
	var vClickedRowData = pClickedRowData;
	var vemployeeId = vClickedRowData.f_emp_id;
	$('#25_dtgphotoemployeee').datagrid({
		url:'<?php echo base_url(); ?>index.php/md_employee/fnemployeeProfileData/'+vemployeeId
	});
	$('#25_dtgemployee_educations').datagrid({
		url:'<?php echo base_url(); ?>index.php/md_employee_educations/fnemployee_educationsData/'+vemployeeId
	});	
	$('#25_dtgemployee_family').datagrid({
		url:'<?php echo base_url(); ?>index.php/md_employee_family/fnemployee_familyData/'+vemployeeId
	});	
	$('#25_dtgemployee_courses').datagrid({
		url:'<?php echo base_url(); ?>index.php/md_employee_courses/fnemployee_coursesData/'+vemployeeId
	});	

	$('#25_dtgemployee_experience').datagrid({
		url:'<?php echo base_url(); ?>index.php/md_employee_experience/fnemployee_experienceData/'+vemployeeId
	});	

	$('#25_dtgemployee_attachment_file').datagrid({
		url:'<?php echo base_url(); ?>index.php/md_employee_attachment_file/fnemployee_attachment_fileData/'+vemployeeId
	});	
	
}

</script>