<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/gray/easyui-modified.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bens.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/icon.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div class="easyui-layout" style="width:495px; height:375px; background-color:#FFF;">
    <div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmModules" id="frmModules" method="post" novalidate>
			<div class="frmTitle">Data Module</div>
			<div class="frmItem">
				<label>Code</label>
				<input name="fldCode" id="fldCode" class="easyui-validatebox" required="true" size="15" missingMessage="Harus Diisi.">
			</div>
			<div class="frmItem">
				<label>Name</label>
				<input name="fldName" id="fldName" class="easyui-validatebox" required="true" size="38" missingMessage="Harus Diisi.">
			</div>
			<div class="frmItem">
				<label>Description</label>
				<input name="fldDesc" id="fldDesc" size="38" missingMessage="Harus Diisi.">
			</div>
			<div class="frmItem">
				<label>Application</label>
				<input name="fldAppl" id="fldAppl" missingMessage="Harus Diisi." style="width:175px;">
			</div>
			<div class="frmItem">
				<label>Group Module</label>
				<input name="fldGrpMod" id="fldGrpMod" missingMessage="Harus Diisi." style="width:200px;">
			</div>

			<div class="frmItem">
				<label>Active</label>
				<input name="fldActive" id="fldActive" missingMessage="Harus Diisi." style="width:125px;">
			</div>
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnAppl" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;">
				<span style="background-color:#FF9; border:1px solid #666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Harus Diisi.
			</div>
			<div id="footBarRight" style="float:right; width:auto; clear:right;">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="fnSave()">Save</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="fnCancel()">Cancel</a>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function() {
	window.parent.$('#1_divWait').hide();
	window.parent.$('#1_fraAppMod').show();
});
<?php if(isset($vModules)) { ?>
$('#frmModules').form('clear');
$.ajax({
	type: "POST",
	url: '<?php echo base_url()?>index.php/md_app_mod/fnModulesRow/<?php echo $vModules; ?>',
	dataType:"json",
	data: {},
	success: function(data){
		var vFldCode = data.fldCode;
		var vFldName = data.fldName;
		var vFldDesc = data.fldDesc;
		var vFldAppl = data.fldAppl;
		var vFldGrpMod = data.fldGrpMod;
		var vFldActive = data.fldActive;
		// memasangkan nilai dari ajax satu-persatu ke isian form, jika combobox, maka load dulu data, kemudian pasang nilai dari ajax
		$('#fldCode').val(vFldCode);
		$('#fldName').val(vFldName);
		$('#fldDesc').val(vFldDesc);
		$('#fldAppl').combobox({
			url:'<?php echo base_url(); ?>index.php/md_app_mod/fnModsApplData/'
		});
		$('#fldAppl').combobox('setValue',vFldAppl);
		$('#fldGrpMod').combobox('setValue',vFldGrpMod);
		$('#fldModType').combobox('setValue',vFldModType);
		$('#fldActive').combobox({
			url:'<?php echo base_url(); ?>index.php/md_app_mod/fnModsActvData/'
		});
		$('#fldActive').combobox('setValue',vFldActive);
	}
});
// $('#frmModules').form('load','<?php echo base_url(); ?>index.php/md_app_mod/fnModulesRow/<?php echo $vModules; ?>');
url = '<?php echo base_url(); ?>index.php/md_app_mod/fnModulesUpdate/<?php echo $vModules; ?>';
<?php } else { ?>
$('#frmModules').form('clear');
url = '<?php echo base_url(); ?>index.php/md_app_mod/fnModulesCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Harus diisi.';
$.fn.combogrid.defaults.missingMessage = 'Harus diisi.';
$(function() {
	$('#fldAppl').combobox({
		valueField:'f_app_id',
		textField:'f_app_name',
		mode:'remote',
		panelWidth:175,
		panelHeight:'auto',
		onChange:function() {
			fnAppChange();
		},
		<?php if(isset($vModules)) { ?>
		url:0
		<?php } else { ?>
		url:'<?php echo base_url(); ?>index.php/md_app_mod/fnModsApplData/'
		<?php } ?>
	});
	$('#fldGrpMod').combobox({
		valueField:'f_grpmod_id',
		textField:'f_grpmod_name',
		panelWidth:200,
		panelHeight:100,
		<?php if(isset($vModules)) { ?>
		disabled:false,
		<?php } else { ?>
		disabled:true,
		<?php } ?>
		url:0
	});
	$('#fldActive').combobox({
		valueField:'f_active_val',
		textField:'f_active_text',
		panelWidth:100,
		panelHeight:'auto',
		<?php if(isset($vModules)) { ?>
		url:0
		<?php } else { ?>
		url:'<?php echo base_url(); ?>index.php/md_app_mod/fnModsActvData/'
		<?php } ?>
	});
	<?php if(isset($vModules)) { ?>
	$('#fldCode').attr('disabled','disabled');
	<?php } ?>
}); function fnTest() {
	var vApp = $('#fldAppl').combobox('getValue');
	alert(vApp);
}
function fnAppChange() {
	var vAppId = $('#fldAppl').combobox('getValue');
	if(vAppId) {
		$('#fldGrpMod').combobox({
			valueField:'f_grpmod_id',
			textField:'f_grpmod_name',
			panelWidth:200,
			panelHeight:100,
			disabled:false,
			url:'<?php echo base_url(); ?>index.php/md_app_mod/fnModsGroupData/'+vAppId
		});
	} else {
		$('#fldGrpMod').combobox({
			url:0,
			disabled:true
		});
		$('#fldGrpMod').combobox('setValue','');
	}
}
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmModules').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#1_trgAppMod').treegrid('reload');
				window.parent.$('#1_dlgAppMod').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#1_dlgAppMod').dialog('close');
}
</script>