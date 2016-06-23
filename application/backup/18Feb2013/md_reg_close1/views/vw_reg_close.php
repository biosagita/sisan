<div id="tlbRegClose" style="padding:5px;">
	<div style="float:left;">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnRegCloseAdd()">Add Closing</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnRegCloseEdit()">Edit Closing</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="fnRegClosePrint()">Print Template</a>
	</div>
	<div style="float:right;clear:right;">
		<span>Insured:</span>
		<input id="txtRegCloseInsured" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnRegCloseSearch()">Cari</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnRegCloseReset()">Reset</a>
	</div>
</div>
<table id="dtgRegClose" class="easyui-datagrid" data-options="title:'Datagrid Register Closing',url:'<?php echo base_url(); ?>index.php/md_reg_close/fnRegCloseData/',toolbar:'#tlbRegClose',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,striped:true,pageList:[20,50,100,500]">
<thead>
	<tr>
		<th data-options="field:'closing_regslip_id',title:'<b>ID#</b>',width:80,sortable:true" halign="center"></th>
        <th data-options="field:'closing_regslip_insured',title:'<b>Insured</b>',width:380,sortable:true" halign="center"></th>
		<th data-options="field:'closing_regslip_date',title:'<b>Date</b>',width:120,sortable:true" align="center" halign="center"></th>
		<th data-options="field:'closing_segment',title:'<b>Segment</b>',width:100,sortable:true" halign="center"></th>
		<th data-options="field:'closing_regslip_classrisk',title:'<b>Risk</b>',width:100" halign="center"></th>
		<th data-options="field:'closing_regslip_desc',title:'<b>Description</b>',width:300" halign="center"></th>
	</tr>
</thead>
</table>
<div id="dlgRegClose" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnRegCloseResize(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="divRegCloseWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="fraRegClose" id="fraRegClose" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnRegCloseSearch() {
	$('#dtgRegClose').datagrid('load',{
		InsuredKeyword: $('#txtRegCloseInsured').val()
	});
}
function fnRegCloseReset() {
	$('#txtRegCloseInsured').val('');
	$('#dtgRegClose').datagrid('load',{
		InsuredKeyword: $('#txtRegCloseInsured').val()
	});
}
function fnRegCloseResize(width, height) {
	$('#fraRegClose').width(width-14);
	$('#fraRegClose').height(height-40);
}
function fnRegCloseAdd() {
	$('#dlgRegClose').dialog({
		title: 'Input Data Closing',
		width: 480,
		height: 390
	});
	$('#divRegCloseWait').show();
	$('#fraRegClose').hide();
	$('#fraRegClose').attr('src','<?php echo base_url()?>index.php/md_reg_close/fnRegCloseAdd');
	$('#dlgRegClose').window('open');
}
function fnRegCloseEdit() {
	var singleRow = $('#dtgRegClose').datagrid('getSelected');
	if (singleRow) {
		$('#dlgRegClose').dialog({
			title: 'Edit Data Closing',
			width: 480,
			height: 390
		});
		$('#divRegCloseWait').show();
		$('#fraRegClose').hide();
		$('#fraRegClose').attr('src','<?php echo base_url()?>index.php/md_reg_close/fnRegCloseEdit/'+singleRow.closing_regslip_id);
		$('#dlgRegClose').window('open');
	} else {
		alert('Pilih Closing yang ingin di Edit.');
	}
}
function fnRegClosePrint() {
	var singlePrintRow = $('#dtgRegClose').datagrid('getSelected');
	if(!singlePrintRow) {
		alert('Silahkan pilih dahulu Closing yang diinginkan.');
	} else {
		if(!singlePrintRow.closing_segment) {
			var segment = 'kosong';
		} else {
			var segment = singlePrintRow.closing_segment;
		}
		if(!singlePrintRow.closing_regslip_classrisk) {
			var risk = 'kosong';
		} else {
			var risk = singlePrintRow.closing_regslip_classrisk;
		}
		if(!singlePrintRow.closing_regslip_id) {
			var id = 'kosong';
		} else {
			var id = singlePrintRow.closing_regslip_id;
		}
		if(!singlePrintRow.closing_regslip_date) {
			var date = 'kosong';
		} else {
			var date = singlePrintRow.closing_regslip_date;
		}
		if(!singlePrintRow.closing_approve_by) {
			var approve = 'kosong';
		} else {
			var approve = singlePrintRow.closing_approve_by;
		}
		window.location.href = '<?php echo base_url(); ?>index.php/md_reg_close/fnRegClosePrint/'+segment+'/'+risk+'/'+id+'/'+date+'/'+approve;
	}
}
</script>