<div id="77_tlbcom" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddcom_77()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditcom_77()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletecom_77()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="77_txtcom" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_77()">Find</a>
	</div>
</div>
<table id="77_dtgcom" class="easyui-datagrid" data-options="title:'Data com',url:'<?php echo base_url(); ?>index.php/md_com/fncomData/',toolbar:'#77_tlbcom',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'f_com_id',title:'<b>Id</b>',width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_com',title:'<b>Com</b>',width:50,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_baudrate',title:'<b>Baudrate</b>',width:80,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_com_status',title:'<b>Com_Status</b>',width:100,sortable:true" halign="center"></th>
           
		   <th data-options="field:'f_remark',title:'<b>Remark</b>',width:400,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="77_dlgcom" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_77(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="77_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/bbc/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="77_fracom" id="77_fracom" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_77() {
	$('#77_dtgcom').datagrid('load',{
		comKeyword: $('#77_txtcom').val()
	});
}
function fnResize_77(width,height) {
	$('#77_fracom').width(width-14);
	$('#77_fracom').height(height-40);
}
function fnResize_77(width,height) {
	$('#77_fracom').width(width-14);
	$('#77_fracom').height(height-40);
}
function fnAddcom_77() {
	$('#77_dlgcom').dialog({
		title: 'Input Data com',
		width: 510,
		height: 390
	});
	$('#77_divWait').show();
	$('#77_fracom').hide();
	$('#77_fracom').attr('src','<?php echo base_url(); ?>index.php/md_com/fncomAdd');
	$('#77_dlgcom').window('open');
}
function fnEditcom_77() {
	var singleRow = $('#77_dtgcom').datagrid('getSelected');
	if(singleRow) {
		$('#77_dlgcom').dialog({
			title: 'Edit Data Com',
			width: 510,
			height: 390
		});
		$('#77_divWait').show();
		$('#77_fracom').hide();
						
		$('#77_fracom').attr('src','<?php echo base_url(); ?>index.php/md_com/fncomEdit/'+singleRow.f_com_id);
				

		$('#77_dlgcom').window('open');
	} else {
		alert('Select which com data you want to edit.');
	}
}
function fnSelectcom_77() {
	var singleRow = $('#77_dtgcom').datagrid('getSelected');
	if(singleRow) {
		var vcomId = singleRow.com_uid;
		var vcomLogin = singleRow.com_ulogin;
		$('#77_dlgcom').dialog({
			title: 'Select com for '+vcomLogin,
			width: 365,
			height: 290
		});
		$('#77_divWait').show();
		$('#77_fracom').hide();
				
		$('#77_fracom').attr('src','<?php echo base_url(); ?>index.php/md_com/fncomChoose/'+vf_com_id);
				
		$('#77_dlgcom').window('open');
	} else {
		alert('Select com Datagrid row first.');
	}
}
function fnDeletecom_77() {
	var singleRow = $('#77_dtgcom').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_com/fncomDelete/',{Id:singleRow.f_com_id},function(result) {
				
					if (result.success) {
						$('#77_dtgcom').datagrid('reload');
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