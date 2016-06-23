<!--
Module Id	: 76_
Module Code	: md_comp_profile
Module Name	: Company Profile
Description	: Modul ini dipergunakan untuk melakukan perubahan data company profile
Aseloleee.... Enaknya coding
-->
<div class="easyui-layout" data-options="fit:true">
	<div data-options="region:'north',border:false,split:true" style="height:200px;">
		<div id="76_tlbCompProfile" style="padding:5px;">
			<a href="javascript:void(0)" class="easyui-linkbutton" id="76_btnAdd" iconCls="icon-add" plain="true" onclick="fnAdd_76()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" id="76_btnEdit" iconCls="icon-edit" plain="true" onclick="fnEdit_76()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDelete_76()">Delete</a>
		</div>
		<table id="76_dtgCompProfile" class="easyui-datagrid" data-options="title:'Company Profile',url:'<?php echo base_url(); ?>index.php/md_comp_profile/fnCompProfileData/',toolbar:'#76_tlbCompProfile',border:false,singleSelect:true,fit:true,onClickRow:function(rowIndex,rowData){ fnClickCompProfileRow_76(); }">
		<thead>
			<tr>
				<th data-options="field:'compprofile_cid',halign:'center',align:'right',title:'<b>#ID</b>',width:50"></th>
				<th data-options="field:'compprofile_ccode',halign:'center',title:'<b>Code</b>',width:150"></th>
				<th data-options="field:'compprofile_cname',halign:'center',title:'<b>Name</b>',width:175"></th>
				<th data-options="field:'compprofile_caddress',halign:'center',title:'<b>Address</b>',width:250"></th>
				<th data-options="field:'compprofile_ccity',halign:'center',title:'<b>City</b>',width:200"></th>
				<th data-options="field:'compprofile_cpost',halign:'center',title:'<b>Post Code</b>',width:100"></th>
				<th data-options="field:'compprofile_cphone',halign:'center',title:'<b>Phone</b>',width:150"></th>
				<th data-options="field:'compprofile_cfax',halign:'center',title:'<b>Fax</b>',width:150"></th>
				<th data-options="field:'compprofile_ceom',halign:'center',title:'<b>EOM</b>',width:150"></th>
			</tr>
		</thead>
		</table>
	</div>
	<div data-options="region:'center',border:false,split:true">
		<div class="easyui-layout" data-options="fit:true"style="background-color:#FFF;">
			<div data-options="region:'center',border:false"style="background-color:#F9F9F9">
				<div id="76_formDiv" style="padding:10px 20px;">
					<form name="76_frmCompProfile" id="76_frmCompProfile" method="post" novalidate>
					<input type="hidden" id="76_txtActive" value="0">
					<div class="frmTitle">Company Profile Data</div>
					<div class="frmItem">
						<label>#ID</label>
						<input name="76_fldId" id="76_fldId" class="easyui-validatebox" data-options="required:true,missingMessage:'Must be filled.'" size="5">
					</div>
					<div class="frmItem">
						<label>Code</label>
						<input name="76_fldCode" id="76_fldCode" class="easyui-validatebox" data-options="required:true,missingMessage:'Must be filled.'" size="15">
					</div>
					<div class="frmItem">
						<label>Name</label>
						<input name="76_fldName" id="76_fldName" class="easyui-validatebox" data-options="required:true,missingMessage:'Must be filled.'" size="50">
					</div>
					<div class="frmItem">
						<label>Address</label>
						<input name="76_fldAddress1" id="76_fldAddress1" class="easyui-validatebox" data-options="required:true,missingMessage:'Must be filled.'" size="75">
					</div>
					<div class="frmItem">
						<blank>&nbsp;</blank>
						<input name="76_fldAddress2" id="76_fldAddress2" size="75">
					</div>
					<div class="frmItem">
						<blank>&nbsp;</blank>
						<input name="76_fldAddress3" id="76_fldAddress3" size="75">
					</div>
					<div class="frmItem">
						<label>Province</label>
						<input name="76_fldProv" id="76_fldProv" style="width:325px;">
					</div>
					<div class="frmItem">
						<label>City</label>
						<input name="76_fldCity" id="76_fldCity" style="width:325px;">
					</div>
					<div class="frmItem">
						<label>Post Code</label>
						<input name="76_fldPostCode" id="76_fldPostCode" size="20">
					</div>
					<div class="frmItem">
						<label>Phone</label>
						<input name="76_fldPhone" id="76_fldPhone" size="20">
					</div>
					<div class="frmItem">
						<label>Fax</label>
						<input name="76_fldFax" id="76_fldFax" size="20">
					</div>
					<div class="frmItem">
						<label>Eom</label>
						<input name="76_fldEom" id="76_fldEom" size="20">
					</div>
					</form>
				</div>
			</div>
			<div data-options="region:'south',border:false" style="height:35px; background-color:#E3E3E3;">
				<div id="76_btn" align="right" style="padding:5px;">
					<div id="76_footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;">
						<span style="background-color:#FF9; border:1px solid #666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Must be filled.
					</div>
					<div id="76_footBarRight" style="float:right; width:auto; clear:right;">
						<a href="javascript:void(0)" id="76_btnSave" name="76_btnSave" class="easyui-linkbutton" iconCls="icon-ok" onclick="fnSave_76()">Save</a>
						<a href="javascript:void(0)" id="76_btnCancel" name="76_btnCancel" class="easyui-linkbutton" iconCls="icon-cancel" onclick="fnCancel_76()">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var vLastFocus;
$(function() {
	$('#76_fldProv').combobox({
		valueField:'f_province_id',
		textField:'f_province_name',
		mode:'remote',
		panelWidth:325,
		panelHeight:125,
		onChange:function() {
			fnProvChange();
		},
		url:0
	});
	$('#76_fldCity').combobox({
		valueField:'f_city_id',
		textField:'f_city_name',
		mode:'remote',
		panelWidth:325,
		panelHeight:125,
		url:0
	});
	$('#76_formDiv :input').on('focus',function(){
		vLastFocus=this;
	});
});
fnDisableForm_76();
function fnDisableForm_76() {
	$('#76_txtActive').val(0);
	$('#76_btnSave').linkbutton({disabled:true});
	$('#76_btnCancel').linkbutton({disabled:true});
	$('#76_formDiv :input').attr('disabled',true);
	$('#76_fldProv').combobox({
		disabled:true,
		url:0
	});
	$('#76_fldCity').combobox({
		disabled:true,
		url:0
	});
	$('input.easyui-validatebox').removeClass('validatebox-invalid');
}
function fnEnableForm_76() {
	$('#76_txtActive').val(1);
	$('#76_btnSave').linkbutton({disabled:false});
	$('#76_btnCancel').linkbutton({disabled:false});
	$('#76_formDiv :input').removeAttr('disabled');
	$('#76_fldProv').combobox({
		disabled:false,
		url:0
	});
	$('#76_fldCity').combobox({
		disabled:true,
		url:0
	});
}
function fnUntogled_76() {
	$('#76_btnAdd').linkbutton({togled:false});
	$('#76_btnEdit').linkbutton({togled:false});
}
function fnAdd_76() {
	$('#76_frmCompProfile').form('clear');
	$('#76_formDiv .easyui-validatebox').removeClass('validatebox-invalid');
	fnEnableForm_76();
	fnUntogled_76();
	$('#76_btnAdd').linkbutton({togled:true});
	$('#76_fldId').focus();
	$('#76_fldProv').combobox({
		url:'<?php echo base_url(); ?>index.php/md_comp_profile/fnRemoteProvince/'
	});
	url = '<?php echo base_url(); ?>index.php/md_comp_profile/fnCompProfileCreate';
}
function fnEdit_76() {
	var vSelectedRow = $('#76_dtgCompProfile').datagrid('getSelected');
	if(vSelectedRow) {
		$('#76_frmCompProfile').form('clear');
		$('#76_formDiv .easyui-validatebox').removeClass('validatebox-invalid');
		fnEnableForm_76();
		$.ajax({
			type: "POST",
			url: '<?php echo base_url()?>index.php/md_comp_profile/fnCompProfileRow/'+vSelectedRow.compprofile_cid,
			dataType:"json",
			data: {},
			success: function(data){
				$('#76_fldId').val(data.fldId);
				$('#76_fldCode').val(data.fldCode);
				$('#76_fldName').val(data.fldName);
				$('#76_fldAddress1').val(data.fldAddress1);
				$('#76_fldAddress2').val(data.fldAddress2);
				$('#76_fldAddress3').val(data.fldAddress3);
				$('#76_fldProv').combobox({
					url:'<?php echo base_url(); ?>index.php/md_comp_profile/fnRemoteProvince/'
				});
				$('#76_fldProv').combobox('setValue',data.fldProv);
				$('#76_fldCity').combobox('setValue',data.fldCity);
				$('#76_fldPostCode').val(data.fldPost);
				$('#76_fldPhone').val(data.fldPhone);
				$('#76_fldFax').val(data.fldFax);
				$('#76_fldEom').val(data.fldEom);
			}
		});
		$('#76_fldId').focus();
		url = '<?php echo base_url(); ?>index.php/md_comp_profile/fnCompProfileUpdate/'+vSelectedRow.compprofile_cid;
		fnUntogled_76();
		$('#76_btnEdit').linkbutton({togled:true});
	} else {
		alert('Select The Company Profile Datagrid row first.');
	}
}
function fnDelete_76() {
	var vSelectedRow = $('#76_dtgCompProfile').datagrid('getSelected');
	if (vSelectedRow) {
		$.messager.confirm('Confirm','Are you sure, you want to delete this Profile data?',function(res) {
			if (res) {
				$.post('<?php echo base_url(); ?>index.php/md_comp_profile/fnCompProfileDelete/',{Id:vSelectedRow.compprofile_cid},function(result) {
					if (result.success) {
						$('#76_dtgCompProfile').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg,height:'auto'});
					}
				},'json');
			}
		});
	} else {
		alert('Select The Company Profile Datagrid row first.');
	}
}
function fnClickCompProfileRow_76() {
	if($('#76_txtActive').val() == 1) {
		$(vLastFocus).focus();
	} else {
		var vSelectedRow = $('#76_dtgCompProfile').datagrid('getSelected');
		if(vSelectedRow) {
			var vCompanyId = vSelectedRow.compprofile_cid;
			$.ajax({
				type: "POST",
				url: '<?php echo base_url()?>index.php/md_comp_profile/fnCompProfileRow/'+vCompanyId,
				dataType:"json",
				data: {},
				success: function(data){
					$('#76_fldId').val(data.fldId);
					$('#76_fldCode').val(data.fldCode);
					$('#76_fldName').val(data.fldName);
					$('#76_fldAddress1').val(data.fldAddress1);
					$('#76_fldAddress2').val(data.fldAddress2);
					$('#76_fldAddress3').val(data.fldAddress3);
					$('#76_fldProv').combobox({
						url:'<?php echo base_url(); ?>index.php/md_comp_profile/fnRemoteProvince/'
					});
					$('#76_fldProv').combobox('setValue',data.fldProv);
					$('#76_fldCity').combobox({
						disabled:true,
						url:0
					});
					$('#76_fldCity').combobox('setValue',data.fldCity);
					$('#76_fldPostCode').val(data.fldPost);
					$('#76_fldPhone').val(data.fldPhone);
					$('#76_fldFax').val(data.fldFax);
					$('#76_fldEom').val(data.fldEom);
				}
			});
			url = '<?php echo base_url(); ?>index.php/md_comp_profile/fnCompProfileUpdate/'+vCompanyId;
		}
	}
}
function fnProvChange() {
	var vProvId = $('#76_fldProv').combobox('getValue');
	if(vProvId) {
		$('#76_fldCity').combobox({
			panelWidth:175,
			panelHeight:125,
			disabled:false,
			url:'<?php echo base_url(); ?>index.php/md_comp_profile/fnRemoteCity/'+vProvId
		});
	} else {
		$('#76_fldCity').combobox({
			url:0,
			disabled:true
		});
		$('#76_fldCity').combobox('setValue','');
	}
}
function fnSave_76() {
	$('#76_frmCompProfile').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				$('#76_dtgCompProfile').datagrid('reload');
				fnCancel_76();
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel_76() {
	$(vLastFocus).blur();
	$('#76_formDiv .easyui-validatebox').removeClass('validatebox-invalid');
	fnDisableForm_76();
	fnUntogled_76();
	fnClickCompProfileRow_76();
	$('#76_frmCompProfile').form('clear');
}
</script>