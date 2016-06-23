<div id="tlbRegPlace" style="padding:5px;">
	<div style="float:left;">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnRegPlaceAdd()">Add Placing</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnRegPlaceEdit()">Edit Placing</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="fnRegPlacePrint()">Print Template</a>
	</div>
	<div style="float:right;clear:right;">
		<span>Insured:</span>
		<input id="txtRegPlaceInsured" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnRegPlaceSearch()">Cari</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnRegPlaceReset()">Reset</a>
	</div>
</div>
<table id="dtgRegPlace" class="easyui-datagrid" data-options="title:'Datagrid Register Placing',url:'<?php echo base_url(); ?>index.php/md_reg_place/fnRegPlaceData/',toolbar:'#tlbRegPlace',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
		<th data-options="field:'placing_regslip_id',title:'<b>ID#</b>',width:80,sortable:true" halign="center"></th>
        <th data-options="field:'placing_regslip_insured',title:'<b>Insured</b>',width:385,sortable:true" halign="center"></th>
		<th data-options="field:'placing_regslip_date',title:'<b>Date</b>',width:120,sortable:true" align="center" halign="center"></th>
		<th data-options="field:'placing_segment',title:'<b>Segment</b>',width:100,sortable:true" halign="center"></th>
		<th data-options="field:'placing_regslip_classrisk',title:'<b>Risk</b>',width:100" halign="center"></th>
		<th data-options="field:'placing_regslip_desc',title:'<b>Description</b>',width:300" halign="center"></th>
	</tr>
</thead>
</table>
<div id="dlgRegPlace" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnRegPlaceResize(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="divRegPlaceWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="fraRegPlace" id="fraRegPlace" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnRegPlaceSearch() {
	$('#dtgRegPlace').datagrid('load',{
		InsuredKeyword: $('#txtRegPlaceInsured').val()
	});
}
function fnRegPlaceReset() {
	$('#txtRegPlaceInsured').val('');
	$('#dtgRegPlace').datagrid('load',{
		InsuredKeyword: $('#txtRegPlaceInsured').val()
	});
}
function fnRegPlaceResize(width, height) {
	$('#fraRegPlace').width(width-14);
	$('#fraRegPlace').height(height-40);
}
function fnRegPlaceAdd() {
	$('#dlgRegPlace').dialog({
		title: 'Input Data Placing',
		width: 480,
		height: 390
	});
	$('#divRegPlaceWait').show();
	$('#fraRegPlace').hide();
	$('#fraRegPlace').attr('src','<?php echo base_url()?>index.php/md_reg_place/fnRegPlaceAdd');
	$('#dlgRegPlace').window('open');
}
function fnRegPlaceEdit() {
	var singleRow = $('#dtgRegPlace').datagrid('getSelected');
	if (singleRow) {
		$('#dlgRegPlace').dialog({
			title: 'Edit Data Placing',
			width: 480,
			height: 390
		});
		$('#divRegPlaceWait').show();
		$('#fraRegPlace').hide();
		$('#fraRegPlace').attr('src','<?php echo base_url()?>index.php/md_reg_place/fnRegPlaceEdit/'+singleRow.placing_regslip_id);
		$('#dlgRegPlace').window('open');
	} else {
		alert('Pilih Placing yang ingin di Edit.');
	}
}
function fnRegPlacePrint() {
	var singlePrintRow = $('#dtgRegPlace').datagrid('getSelected');
	if(!singlePrintRow) {
		alert('Silahkan pilih dahulu Placing yang diinginkan.');
	} else {
		if(!singlePrintRow.placing_segment) {
			var segment = 'kosong';
		} else {
			var segment = singlePrintRow.placing_segment;
		}
		if(!singlePrintRow.placing_regslip_classrisk) {
			var risk = 'kosong';
		} else {
			var risk = singlePrintRow.placing_regslip_classrisk;
		}
		if(!singlePrintRow.placing_regslip_id) {
			var id = 'kosong';
		} else {
			var id = singlePrintRow.placing_regslip_id;
		}
		if(!singlePrintRow.placing_regslip_date) {
			var date = 'kosong';
		} else {
			var date = singlePrintRow.placing_regslip_date;
		}
		if(!singlePrintRow.placing_approve_by) {
			var approve = 'kosong';
		} else {
			var approve = singlePrintRow.placing_approve_by;
		}
		window.location.href = '<?php echo base_url(); ?>index.php/md_reg_place/fnRegPlacePrint/'+segment+'/'+risk+'/'+id+'/'+date+'/'+approve;
	}
}
</script>