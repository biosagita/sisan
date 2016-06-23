<!--
Module Id			: 78
Module Code			: md_comp_segment
Module Name			: Company Segment
Description			: Modul ini dipergunakan untuk melakukan perubahan data company segment
HTML ID/Name List	: 1. _78_tlb1 = Toolbar untuk Grid 1 (Datagrid Company Segment)
					  2. _78_tlb1_btnAdd = Add button pada Toolbar Grid 1
					  3. _78_tlb1_btnEdit = Edit button pada Toolbar Grid 1
					  4. _78_grd1 = Datagrid Company Segment
					  5. 
					  6. 
					  . 
					  . 
					  N
Aseloleee.... Enaknya coding
-->
<div class="easyui-layout" data-options="fit:true">
	<div data-options="region:'center',border:false,split:true">
		<div id="_78_tlb1" style="padding:5px;">
			<a href="javascript:void(0)" class="easyui-linkbutton" id="_78_tlb1_btnAdd" iconCls="icon-add" plain="true" onclick="_78_grd1_fnAdd()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" id="_78_tlb1_btnEdit" iconCls="icon-edit" plain="true" onclick="_78_grd1_fnEdit()">Edit</a>
		</div>
		<!-- <table id="78_dtgCompSegment" class="easyui-datagrid" data-options="title:'Company Segment',url:'<?php echo base_url(); ?>index.php/md_comp_segment/fnCompSegGrid/',toolbar:'#_78_Tool1',border:false,singleSelect:true,fit:true,onClickRow:function(rowIndex,rowData){ fnClickRow_78(); }"> -->
		<table id="_78_grd1" class="easyui-datagrid" data-options="title:'Company Segment',url:'<?php echo base_url(); ?>index.php/md_comp_segment/fnCompSegGrid/',toolbar:'#_78_tlb1',border:false,singleSelect:true,striped:true,fit:true">
		<thead>
			<tr>
				<th data-options="field:'_78_grd1_id',halign:'center',align:'right',title:'<b>#ID</b>',width:35"></th>
				<th data-options="field:'_78_grd1_company',halign:'center',title:'<b>Company</b>',width:150"></th>
				<th data-options="field:'_78_grd1_code',halign:'center',title:'<b>Code</b>',width:70"></th>
				<th data-options="field:'_78_grd1_name',halign:'center',title:'<b>Segment Name</b>',width:150"></th>
				<th data-options="field:'_78_grd1_parent',halign:'center',title:'<b>Parent Segment</b>',width:150"></th>
				<th data-options="field:'_78_grd1_top',halign:'center',title:'<b>Top Segment</b>',width:150"></th>
				<th data-options="field:'_78_grd1_product',halign:'center',title:'<b>Production</b>',width:75"></th>
				<th data-options="field:'_78_grd1_active',halign:'center',title:'<b>Active</b>',width:75"></th>
			</tr>
		</thead>
		</table>
	</div>
	<div data-options="title:'&nbsp;',region:'east',border:false,split:true" style="width:350px;">
		<!-- Later son!! Later..... -->
	</div>
</div>
<div id="_78_dlg" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') _78_fnResize(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="_78_divWait" align="left" style="padding:10px; height:200px;"><img src="<?php echo base_url(); ?>images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="_78_iframe" id="_78_iframe" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function _78_fnResize(width,height) {
	$('#_78_iframe').width(width-14);
	$('#_78_iframe').height(height-40);
}
function _78_grd1_fnAdd() {
	$('#_78_dlg').dialog({
		title: 'Input Company Segment Data',
		width: 510,
		height: 440
	});
	$('#_78_divWait').show();
	$('#_78_iframe').hide();
	$('#_78_iframe').attr('src','<?php echo base_url()?>index.php/md_comp_segment/fnCompSegAdd/');
	$('#_78_dlg').window('open');
}
function _78_grd1_fnEdit() {
	var vRow = $('#_78_grd1').datagrid('getSelected');
	if (vRow) {
		$('#_78_dlg').dialog({
			title: 'Edit Company Segment Data',
			width: 510,
			height: 440
		});
		$('#_78_divWait').show();
		$('#_78_iframe').hide();
		$('#_78_iframe').attr('src','<?php echo base_url()?>index.php/md_comp_segment/fnCompSegEdit/'+vRow._78_grd1_id);
		$('#_78_dlg').window('open');
	} else {
		alert('Select The Company Segment datagrid row first.');
	}
}
</script>