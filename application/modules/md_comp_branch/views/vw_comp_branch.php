<!--
Module Id	: 77_
Module Code	: md_comp_branch
Module Name	: Company Branch
Description	: Modul ini dipergunakan untuk melakukan perubahan data company branch
Aseloleee.... Enaknya coding
-->
<div class="easyui-layout" data-options="fit:true">
	<div data-options="region:'north',border:false,split:true" style="height:200px;">
		<div id="77_tlbCompBranch" style="padding:5px;">
			<a href="javascript:void(0)" class="easyui-linkbutton" id="77_btnAdd" iconCls="icon-add" plain="true" onclick="fnAdd_77()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" id="77_btnEdit" iconCls="icon-edit" plain="true" onclick="fnEdit_77()">Edit</a>
		</div>
		<table id="77_dtgCompBranch" class="easyui-datagrid" data-options="title:'Company Branch',url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnCompBranchData/',toolbar:'#77_tlbCompBranch',border:false,singleSelect:true,fit:true,onClickRow:function(rowIndex,rowData){ fnClickRow_77(); }">
		<thead>
			<tr>
				<th data-options="field:'compbranch_bcomp',halign:'center',title:'<b>Company Name</b>',width:150"></th>
				<th data-options="field:'compbranch_bcode',halign:'center',title:'<b>Branch Code</b>',width:100"></th>
				<th data-options="field:'compbranch_bname',halign:'center',title:'<b>Branch Name</b>',width:150"></th>
				<th data-options="field:'compbranch_baddr',halign:'center',title:'<b>Address</b>',width:250"></th>
				<th data-options="field:'compbranch_bcity',halign:'center',title:'<b>City</b>',width:150"></th>
				<th data-options="field:'compbranch_bpost',halign:'center',title:'<b>Post Code</b>',width:100"></th>
				<th data-options="field:'compbranch_bphone',halign:'center',title:'<b>Phone</b>',width:150"></th>
				<th data-options="field:'compbranch_bfax',halign:'center',title:'<b>Fax</b>',width:150"></th>
				<th data-options="field:'compbranch_bact',halign:'center',title:'<b>Active</b>',width:75"></th>
			</tr>
		</thead>
		</table>
	</div>
	<div data-options="region:'center',border:false,split:true">
		<div class="easyui-layout" data-options="fit:true"style="background-color:#FFF;">
			<div data-options="region:'center',border:false"style="background-color:#F9F9F9">
				<div id="77_formDiv" style="padding:10px 20px;">
					<form name="77_frmCompBranch" id="77_frmCompBranch" method="post" novalidate>
					<input type="hidden" id="77_txtActive" value="0">
					<div class="frmTitle">Company Branch Data</div>
					<div class="frmItem">
						<label>Company Name</label>
						<input name="77_fldCompanyName" id="77_fldCompanyName" data-options="required:true,missingMessage:'Must be filled.'" style="width:202px;">
					</div>
					<div class="frmItem">
						<label>Branch Code</label>
						<input name="77_fldBranchCode" id="77_fldBranchCode" class="easyui-validatebox" data-options="required:true,missingMessage:'Must be filled.'" size="30">
					</div>
					<div class="frmItem">
						<label>Branch Name</label>
						<input name="77_fldBranchName" id="77_fldBranchName" class="easyui-validatebox" data-options="required:true,missingMessage:'Must be filled.'" size="30">
					</div>
					<div class="frmItem">
						<label>Address</label>
						<input name="77_fldBranchAddress1" id="77_fldBranchAddress1" class="easyui-validatebox" data-options="required:true,missingMessage:'Must be filled.'" size="75">
					</div>
					<div class="frmItem">
						<blank>&nbsp;</blank>
						<input name="77_fldBranchAddress2" id="77_fldBranchAddress2" size="75">
					</div>
					<div class="frmItem">
						<blank>&nbsp;</blank>
						<input name="77_fldBranchAddress3" id="77_fldBranchAddress3" size="75">
					</div>
					<div class="frmItem">
						<label>Province</label>
						<input name="77_fldBranchProv" id="77_fldBranchProv" style="width:325px;">
					</div>
					<div class="frmItem">
						<label>City</label>
						<input name="77_fldBranchCity" id="77_fldBranchCity" style="width:325px;">
					</div>
					<div class="frmItem">
						<label>Post Code</label>
						<input name="77_fldBranchPostCode" id="77_fldBranchPostCode" size="20">
					</div>
					<div class="frmItem">
						<label>Phone</label>
						<input name="77_fldBranchPhone" id="77_fldBranchPhone" size="20">
					</div>
					<div class="frmItem">
						<label>Fax</label>
						<input name="77_fldBranchFax" id="77_fldBranchFax" size="20">
					</div>
					<div class="frmItem">
						<label>Active</label>
						<input name="77_fldBranchActive" id="77_fldBranchActive" style="width:100px;">
					</div>
					</form>
				</div>
			</div>
			<div data-options="region:'south',border:false" style="height:35px; background-color:#E3E3E3;">
				<div id="77_btn" align="right" style="padding:5px;">
					<div id="77_footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;">
						<span style="background-color:#FF9; border:1px solid #666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Must be filled.
					</div>
					<div id="77_footBarRight" style="float:right; width:auto; clear:right;">
						<a href="javascript:void(0)" id="77_btnSave" name="77_btnSave" class="easyui-linkbutton" iconCls="icon-ok" onclick="fnSave_77()">Save</a>
						<a href="javascript:void(0)" id="77_btnCancel" name="77_btnCancel" class="easyui-linkbutton" iconCls="icon-cancel" onclick="fnCancel_77()">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var vLastFocus;
$(function() {
	$('#77_fldCompanyName').combobox({
		valueField:'f_comp_id',
		textField:'f_comp_name',
		mode:'remote',
		panelWidth:202,
		panelHeight:125,
		url:0
	});
	$('#77_fldBranchProv').combobox({
		valueField:'f_province_id',
		textField:'f_province_name',
		mode:'remote',
		panelWidth:325,
		panelHeight:125,
		onChange:function() {
			fnProvChange_77();
		},
		url:0
	});
	$('#77_fldBranchCity').combobox({
		valueField:'f_city_id',
		textField:'f_city_name',
		mode:'remote',
		panelWidth:325,
		panelHeight:125,
		url:0
	});
	$('#77_fldBranchActive').combobox({
		valueField:'f_active_val',
		textField:'f_active_text',
		panelWidth:100,
		panelHeight:'auto',
		url:0
	});
	$('#77_fldCompanyName_id').css({'background-color':'#FFFFBB'});
	$('#77_formDiv :input').on('focus',function(){
		vLastFocus=this;
	});
});
fnDisableForm_77();
function fnDisableForm_77() {
	$('#77_txtActive').val(0);
	$('#77_btnSave').linkbutton({disabled:true});
	$('#77_btnCancel').linkbutton({disabled:true});
	$('#77_formDiv :input').attr('disabled',true);
	$('#77_fldCompanyName').combobox({
		disabled:true,
		url:0
	});
	$('#77_fldBranchProv').combobox({
		disabled:true,
		url:0
	});
	$('#77_fldBranchCity').combobox({
		disabled:true,
		url:0
	});
	$('#77_fldBranchActive').combobox({
		disabled:true,
		url:0
	});
	$('#77_formDiv .easyui-validatebox').removeClass('validatebox-invalid');
	$('#77_formDiv .combo-text').removeClass('validatebox-invalid');
}
function fnEnableForm_77() {
	$('#77_txtActive').val(1);
	$('#77_btnSave').linkbutton({disabled:false});
	$('#77_btnCancel').linkbutton({disabled:false});
	$('#77_formDiv :input').removeAttr('disabled');
	$('#77_fldCompanyName').combobox({
		disabled:false,
		url:0
	});
	$('#77_fldBranchProv').combobox({
		disabled:false,
		url:0
	});
	$('#77_fldBranchCity').combobox({
		disabled:true,
		url:0
	});
	$('#77_fldBranchActive').combobox({
		disabled:false,
		url:0
	});
}
function fnUntogled_77() {
	$('#77_btnAdd').linkbutton({togled:false});
	$('#77_btnEdit').linkbutton({togled:false});
}
function fnAdd_77() {
	$('#77_frmCompBranch').form('clear');
	$('#77_formDiv .easyui-validatebox').removeClass('validatebox-invalid');
	$('#77_formDiv .combo-text').removeClass('validatebox-invalid');
	fnEnableForm_77();
	fnUntogled_77();
	$('#77_btnAdd').linkbutton({togled:true});
	$('#77_fldCompanyName').combobox({
		url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnRemoteCompany/'
	});
	$('#77_fldBranchProv').combobox({
		url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnRemoteProvince/'
	});
	$('#77_fldBranchActive').combobox({
		url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnRemoteActive/'
	});
	url = '<?php echo base_url(); ?>index.php/md_comp_branch/fnCompBranchCreate';
	$('#77_fldCompanyName_id').focus();
}
function fnEdit_77() {
	var vSelectedRow = $('#77_dtgCompBranch').datagrid('getSelected');
	if(vSelectedRow) {
		$('#77_frmCompBranch').form('clear');
		$('#77_formDiv .combo-text').removeClass('validatebox-invalid');
		$('#77_formDiv .easyui-validatebox').removeClass('validatebox-invalid');
		fnEnableForm_77();
		$.ajax({
			type: "POST",
			url: '<?php echo base_url()?>index.php/md_comp_branch/fnCompBranchRow/'+vSelectedRow.compbranch_bid,
			dataType:"json",
			data: {},
			success: function(data){
				$('#77_fldCompanyName').combobox({
					url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnRemoteCompany/'
				});
				$('#77_fldCompanyName').combobox('setValue',data.fldCompName);
				$('#77_fldBranchCode').val(data.fldBranchCode);
				$('#77_fldBranchName').val(data.fldBranchName);
				$('#77_fldBranchAddress1').val(data.fldBranchAddr1);
				$('#77_fldBranchAddress2').val(data.fldBranchAddr2);
				$('#77_fldBranchAddress3').val(data.fldBranchAddr3);
				$('#77_fldBranchProv').combobox({
					url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnRemoteProvince/'
				});
				$('#77_fldBranchProv').combobox('setValue',data.fldBranchProv);
				$('#77_fldBranchCity').combobox('setValue',data.fldBranchCity);
				$('#77_fldBranchPostCode').val(data.fldBranchPost);
				$('#77_fldBranchPhone').val(data.fldBranchPhone);
				$('#77_fldBranchFax').val(data.fldBranchFax);
				$('#77_fldBranchActive').combobox({
					url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnRemoteActive/'
				});
				$('#77_fldBranchActive').combobox('setValue',data.fldBranchAct);
				url = '<?php echo base_url(); ?>index.php/md_comp_branch/fnCompBranchUpdate/'+vSelectedRow.compbranch_bid;
				$('#77_fldCompanyName_id').focus();
				fnUntogled_77();
				$('#77_btnEdit').linkbutton({togled:true});
			}
		});
	} else {
		alert('Select The Company Branch Datagrid row first.');
	}
}
function fnClickRow_77() {
	if($('#77_txtActive').val() == 1) {
		$(vLastFocus).focus();
	} else {
		var vSelectedRow = $('#77_dtgCompBranch').datagrid('getSelected');
		if(vSelectedRow) {
			$.ajax({
				type: "POST",
				url: '<?php echo base_url()?>index.php/md_comp_branch/fnCompBranchRow/'+vSelectedRow.compbranch_bid,
				dataType:"json",
				data: {},
				success: function(data){
					$('#77_fldCompanyName').combobox({
						url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnRemoteCompany/'
					});
					$('#77_fldCompanyName').combobox('setValue',data.fldCompName);
					$('#77_fldBranchCode').val(data.fldBranchCode);
					$('#77_fldBranchName').val(data.fldBranchName);
					$('#77_fldBranchAddress1').val(data.fldBranchAddr1);
					$('#77_fldBranchAddress2').val(data.fldBranchAddr2);
					$('#77_fldBranchAddress3').val(data.fldBranchAddr3);
					$('#77_fldBranchProv').combobox({
						url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnRemoteProvince/'
					});
					$('#77_fldBranchProv').combobox('setValue',data.fldBranchProv);
					$('#77_fldBranchCity').combobox({
						disabled:true,
						url:0
					});
					$('#77_fldBranchCity').combobox('setValue',data.fldBranchCity);
					$('#77_fldBranchPostCode').val(data.fldBranchPost);
					$('#77_fldBranchPhone').val(data.fldBranchPhone);
					$('#77_fldBranchFax').val(data.fldBranchFax);
					$('#77_fldBranchActive').combobox({
						url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnRemoteActive/'
					});
					$('#77_fldBranchActive').combobox('setValue',data.fldBranchAct);
				}
			});
		}
	}
}
function fnProvChange_77() {
	var vProvId = $('#77_fldBranchProv').combobox('getValue');
	if(vProvId) {
		$('#77_fldBranchCity').combobox({
			panelWidth:175,
			panelHeight:125,
			disabled:false,
			url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnRemoteCity/'+vProvId
		});
	} else {
		$('#77_fldBranchCity').combobox({
			url:0,
			disabled:true
		});
		$('#77_fldBranchCity').combobox('setValue','');
	}
}
function fnSave_77() {
	$('#77_frmCompBranch').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				$('#77_dtgCompBranch').datagrid('reload');
				fnCancel_77();
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel_77() {
	$(vLastFocus).blur();
	$('#77_formDiv .combo-text').removeClass('validatebox-invalid');
	$('#77_formDiv .easyui-validatebox').removeClass('validatebox-invalid');
	fnDisableForm_77();
	fnUntogled_77();
	fnClickRow_77();
}
</script>