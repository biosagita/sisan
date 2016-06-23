<div id="16_tlbcity" style="padding:5px;">
	<div style="float:left;" id="crud_16">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddcity_16()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditcity_16()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletecity_16()">Delete</a> 
			<a href="javascript:void(0)" class="easyui-linkbutton"  data-options="iconCls:'icon-up',plain:'true'" onclick="fnImportcity_16()">Import Excel</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="16_txtcity" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_16()">Find</a>
	</div>
</div>
<table id="16_dtgcity" class="easyui-datagrid" data-options="title:'Data City',url:'<?php echo base_url(); ?>index.php/md_city/fncityData/',toolbar:'#16_tlbcity',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'f_city_id',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_city_name',title:'<b>Name</b>',width:200,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_province_id',title:'<b>Province</b>',width:200,sortable:true" halign="center"></th>
           	
   </tr>
</thead>
</table>
<div id="16_dlgcity" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_16(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="16_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/etnisys/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="16_fracity" id="16_fracity" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
$(function() {
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url()?>index.php/md_role_access/fnRoleAccessCrud/16/',
		dataType: 'json',
		data: {},
		success: function(data) {
			if(data.crud_16 != 1){
			$('#crud_16').hide();
			
			}	
		}
	});
});

function fnSearch_16() {
	$('#16_dtgcity').datagrid('load',{
		cityKeyword: $('#16_txtcity').val()
	});
}
function fnResize_16(width,height) {
	$('#16_fracity').width(width-14);
	$('#16_fracity').height(height-40);
}
function fnResize_16(width,height) {
	$('#16_fracity').width(width-14);
	$('#16_fracity').height(height-40);
}
function fnAddcity_16() {
	$('#16_dlgcity').dialog({
		title: 'Input Data City',
		width: 510,
		height: 250
	});
	$('#16_divWait').show();
	$('#16_fracity').hide();
	$('#16_fracity').attr('src','<?php echo base_url(); ?>index.php/md_city/fncityAdd');
	$('#16_dlgcity').window('open');
}
function fnEditcity_16() {
	var singleRow = $('#16_dtgcity').datagrid('getSelected');
	if(singleRow) {
		$('#16_dlgcity').dialog({
			title: 'Edit Data City',
			width: 510,
			height: 250
		});
		$('#16_divWait').show();
		$('#16_fracity').hide();
						
		$('#16_fracity').attr('src','<?php echo base_url(); ?>index.php/md_city/fncityEdit/'+singleRow.f_city_id);
				

		$('#16_dlgcity').window('open');
	} else {
		alert('Select which city data you want to edit.');
	}
}
function fnSelectcity_16() {
	var singleRow = $('#16_dtgcity').datagrid('getSelected');
	if(singleRow) {
		var vcityId = singleRow.city_uid;
		var vcityLogin = singleRow.city_ulogin;
		$('#16_dlgcity').dialog({
			title: 'Select city for '+vcityLogin,
			width: 365,
			height: 290
		});
		$('#16_divWait').show();
		$('#16_fracity').hide();
				
		$('#16_fracity').attr('src','<?php echo base_url(); ?>index.php/md_city/fncityChoose/'+vf_city_id);
				
		$('#16_dlgcity').window('open');
	} else {
		alert('Select city Datagrid row first.');
	}
}
function fnDeletecity_16() {
	var singleRow = $('#16_dtgcity').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_city/fncityDelete/',{Id:singleRow.f_city_id},function(result) {
				
					if (result.success) {
						$('#16_dtgcity').datagrid('reload');
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Select the data that you want to Delete');
	}
}
function fnImportcity_16() {
	$('#16_dlgcity').dialog({
		title: 'Import Data city',
		width: 470,
		height: 180
	});
	$('#16_divWait').show();
	$('#16_fracity').hide();
	$('#16_fracity').attr('src','<?php echo base_url(); ?>index.php/md_city/fncityImport');	
	$('#16_dlgcity').window('open');
}

</script>