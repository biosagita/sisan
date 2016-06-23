<div id="tlbRegLetter" style="padding:5px;">
	<div style="float:left;">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnRegLetterAdd()">Add Letter</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnRegLetterEdit()">Edit Letter</a>
	</div>
	<div style="float:right;clear:right;">
		<span>Insured:</span>
		<input id="txtRegLetterInsured" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnRegLetterSearch()">Cari</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnRegLetterReset()">Reset</a>
	</div>
</div>
<table id="dtgRegLetter" class="easyui-datagrid" data-options="title:'Datagrid Register Letter',url:'<?php echo base_url(); ?>index.php/md_reg_letter/fnRegLetterData/',toolbar:'#tlbRegLetter',rownumbers:false,border:false,singleSelect:true,fit:true,pagination:true,pageSize:20,striped:true,pageList:[20,50,100,500]">
<thead>
	<tr>
		<th data-options="field:'letter_regletter_id',title:'<b>ID#</b>',width:80,sortable:true" halign="center"></th>
        <th data-options="field:'letter_regletter_insured',title:'<b>Insured</b>',width:380,sortable:true" halign="center"></th>
		<th data-options="field:'letter_regletter_date',title:'<b>Date</b>',width:120,sortable:true" align="center" halign="center"></th>
		<th data-options="field:'letter_segment',title:'<b>Segment</b>',width:100,sortable:true" halign="center"></th>
		<th data-options="field:'letter_regletter_classrisk',title:'<b>Risk</b>',width:100" halign="center"></th>
		<th data-options="field:'letter_regletter_description',title:'<b>Description</b>',width:300" halign="center"></th>
	</tr>
</thead>
</table>
<div id="dlgRegLetter" class="easyui-dialog" data-options="cache:false,resizable:false,closable:true,modal:true,onResize:function(width,height){if(height!='auto')fnRegLetterResize(width,height)}" closed="true" style="background-color:#F8F8F8;">  
    <div id="divRegLetterWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="fraRegLetter" id="fraRegLetter" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnRegLetterSearch() {
	$('#dtgRegLetter').datagrid('load',{
		InsuredKeyword: $('#txtRegLetterInsured').val()
	});
}
function fnRegLetterReset() {
	$('#txtRegLetterInsured').val('');
	$('#dtgRegLetter').datagrid('load',{
		InsuredKeyword: $('#txtRegLetterInsured').val()
	});
}
function fnRegLetterResize(width,height) {
	$('#fraRegLetter').width(width-14);
	$('#fraRegLetter').height(height-40);
}
function fnRegLetterAdd() {
	$('#dlgRegLetter').dialog({
		title: 'Input Data Letter',
		width: 480,
		height: 390
	});
	$('#divRegLetterWait').show();
	$('#fraRegLetter').hide();
	$('#fraRegLetter').attr('src','<?php echo base_url()?>index.php/md_reg_letter/fnRegLetterAdd');
	$('#dlgRegLetter').window('open');
}
function fnRegLetterEdit() {
	var singleRow = $('#dtgRegLetter').datagrid('getSelected');
	if (singleRow) {
		$('#dlgRegLetter').dialog({
			title: 'Edit Data Letter',
			width: 480,
			height: 390
		});
		$('#divRegLetterWait').show();
		$('#fraRegLetter').hide();
		$('#fraRegLetter').attr('src','<?php echo base_url()?>index.php/md_reg_letter/fnRegLetterEdit/'+singleRow.letter_regletter_id);
		$('#dlgRegLetter').window('open');
	} else {
		alert('Pilih Letter yang ingin di Edit.');
	}
}
</script>