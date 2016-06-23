<div id="tlbRegQuot" style="padding:5px;">
	<div style="float:left;">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnRegQuotAdd()">Add Quotation</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnRegQuotEdit()">Edit Quotation</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="fnRegQuotPrint()">Print Template</a>
	</div>
	<div style="float:right;clear:right;">
		<span>Insured:</span>
		<input id="txtRegQuotInsured" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnRegQuotSearch()">Cari</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnRegQuotReset()">Reset</a>
	</div>
</div>
<table id="dtgRegQuot" class="easyui-datagrid" data-options="title:'Datagrid Register Quotation',url:'<?php echo base_url(); ?>index.php/md_reg_quot/fnRegQuotData/',toolbar:'#tlbRegQuot',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
		<th data-options="field:'quotation_regslip_id',title:'<b>ID#</b>',width:80,sortable:true" halign="center"></th>
        <th data-options="field:'quotation_regslip_insured',title:'<b>Insured</b>',width:380,sortable:true" halign="center"></th>
		<th data-options="field:'quotation_regslip_date',title:'<b>Date</b>',width:120,sortable:true" halign="center"></th>
		<th data-options="field:'quotation_segment',title:'<b>Segment</b>',width:100,sortable:true" halign="center"></th>
		<th data-options="field:'quotation_regslip_classrisk',title:'<b>Risk</b>',width:100" halign="center"></th>
		<th data-options="field:'quotation_regslip_desc',title:'<b>Description</b>',width:300" halign="center"></th>
	</tr>
</thead>
</table>
<div id="dlgRegQuot" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnRegQuotResize(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="divRegQuotWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="fraRegQuot" id="fraRegQuot" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnRegQuotSearch() {
	$('#dtgRegQuot').datagrid('load',{
		InsuredKeyword: $('#txtRegQuotInsured').val()
	});
}
function fnRegQuotReset() {
	$('#txtRegQuotInsured').val('');
	$('#dtgRegQuot').datagrid('load',{
		InsuredKeyword: $('#txtRegQuotInsured').val()
	});
}
function fnRegQuotResize(width, height) {
	$('#fraRegQuot').width(width-14);
	$('#fraRegQuot').height(height-40);
}
function fnRegQuotAdd() {
	$('#dlgRegQuot').dialog({
		title: 'Input Data Quotation',
		width: 480,
		height: 390
	});
	$('#divRegQuotWait').show();
	$('#fraRegQuot').hide();
	$('#fraRegQuot').attr('src','<?php echo base_url()?>index.php/md_reg_quot/fnRegQuotAdd');
	$('#dlgRegQuot').window('open');
}
function fnRegQuotEdit() {
	var singleRow = $('#dtgRegQuot').datagrid('getSelected');
	if (singleRow) {
		$('#dlgRegQuot').dialog({
			title: 'Edit Data Quotation',
			width: 480,
			height: 390
		});
		$('#divRegQuotWait').show();
		$('#fraRegQuot').hide();
		$('#fraRegQuot').attr('src','<?php echo base_url()?>index.php/md_reg_quot/fnRegQuotEdit/'+singleRow.quotation_regslip_id);
		$('#dlgRegQuot').window('open');
	} else {
		alert('Pilih Quotation yang ingin di Edit.');
	}
}
function fnRegQuotPrint() {
	var singlePrintRow = $('#dtgRegQuot').datagrid('getSelected');
	if(!singlePrintRow) {
		alert('Silahkan pilih dahulu Quotation yang diinginkan.');
	} else {
		if(!singlePrintRow.quotation_segment) {
			var segment = 'kosong';
		} else {
			var segment = singlePrintRow.quotation_segment;
		}
		if(!singlePrintRow.quotation_regslip_classrisk) {
			var risk = 'kosong';
		} else {
			var risk = singlePrintRow.quotation_regslip_classrisk;
		}
		if(!singlePrintRow.quotation_regslip_id) {
			var id = 'kosong';
		} else {
			var id = singlePrintRow.quotation_regslip_id;
		}
		if(!singlePrintRow.quotation_regslip_date) {
			var date = 'kosong';
		} else {
			var date = singlePrintRow.quotation_regslip_date;
		}
		if(!singlePrintRow.quotation_approve_by) {
			var approve = 'kosong';
		} else {
			var approve = singlePrintRow.quotation_approve_by;
		}
		window.location.href = '<?php echo base_url(); ?>index.php/md_reg_quot/fnRegQuotPrint/'+segment+'/'+risk+'/'+id+'/'+date+'/'+approve;
	}
}
</script>