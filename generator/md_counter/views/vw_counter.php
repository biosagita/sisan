<div id="84_tlbcounter" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddcounter_84()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditcounter_84()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletecounter_84()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="84_txtcounter" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_84()">Find</a>
	</div>
</div>
<table id="84_dtgcounter" class="easyui-datagrid" data-options="title:'Data counter',url:'<?php echo base_url(); ?>index.php/md_counter/fncounterData/',toolbar:'#84_tlbcounter',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id',title:'<b>Id</b>',width:40,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="84_dlgcounter" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_84(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="84_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="84_fracounter" id="84_fracounter" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_84() {
	$('#84_dtgcounter').datagrid('load',{
		counterKeyword: $('#84_txtcounter').val()
	});
}
function fnResize_84(width,height) {
	$('#84_fracounter').width(width-14);
	$('#84_fracounter').height(height-40);
}
function fnResize_84(width,height) {
	$('#84_fracounter').width(width-14);
	$('#84_fracounter').height(height-40);
}
function fnAddcounter_84() {
	$('#84_dlgcounter').dialog({
		title: 'Input Data counter',
		width: 510,
		height: 390
	});
	$('#84_divWait').show();
	$('#84_fracounter').hide();
	$('#84_fracounter').attr('src','<?php echo base_url(); ?>index.php/md_counter/fncounterAdd');
	$('#84_dlgcounter').window('open');
}
function fnEditcounter_84() {
	var singleRow = $('#84_dtgcounter').datagrid('getSelected');
	if(singleRow) {
		$('#84_dlgcounter').dialog({
			title: 'Edit Data Counter',
			width: 510,
			height: 390
		});
		$('#84_divWait').show();
		$('#84_fracounter').hide();
						
		$('#84_fracounter').attr('src','<?php echo base_url(); ?>index.php/md_counter/fncounterEdit/'+singleRow.id);
				

		$('#84_dlgcounter').window('open');
	} else {
		alert('Select which counter data you want to edit.');
	}
}
function fnSelectcounter_84() {
	var singleRow = $('#84_dtgcounter').datagrid('getSelected');
	if(singleRow) {
		var vcounterId = singleRow.counter_uid;
		var vcounterLogin = singleRow.counter_ulogin;
		$('#84_dlgcounter').dialog({
			title: 'Select counter for '+vcounterLogin,
			width: 365,
			height: 290
		});
		$('#84_divWait').show();
		$('#84_fracounter').hide();
				
		$('#84_fracounter').attr('src','<?php echo base_url(); ?>index.php/md_counter/fncounterChoose/'+vid);
				
		$('#84_dlgcounter').window('open');
	} else {
		alert('Select counter Datagrid row first.');
	}
}
function fnDeletecounter_84() {
	var singleRow = $('#84_dtgcounter').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_counter/fncounterDelete/',{Id:singleRow.id},function(result) {
				
					if (result.success) {
						$('#84_dtgcounter').datagrid('reload');
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
</script>