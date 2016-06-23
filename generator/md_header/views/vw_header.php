<div id="86_tlbheader" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddheader_86()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditheader_86()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeleteheader_86()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="86_txtheader" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_86()">Find</a>
	</div>
</div>
<table id="86_dtgheader" class="easyui-datagrid" data-options="title:'Data header',url:'<?php echo base_url(); ?>index.php/md_header/fnheaderData/',toolbar:'#86_tlbheader',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id_header',title:'<b>Id</b>',width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'text_header',title:'<b>Text</b>',width:500,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="86_dlgheader" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_86(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="86_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="86_fraheader" id="86_fraheader" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_86() {
	$('#86_dtgheader').datagrid('load',{
		headerKeyword: $('#86_txtheader').val()
	});
}
function fnResize_86(width,height) {
	$('#86_fraheader').width(width-14);
	$('#86_fraheader').height(height-40);
}
function fnResize_86(width,height) {
	$('#86_fraheader').width(width-14);
	$('#86_fraheader').height(height-40);
}
function fnAddheader_86() {
	$('#86_dlgheader').dialog({
		title: 'Input Data header',
		width: 510,
		height: 390
	});
	$('#86_divWait').show();
	$('#86_fraheader').hide();
	$('#86_fraheader').attr('src','<?php echo base_url(); ?>index.php/md_header/fnheaderAdd');
	$('#86_dlgheader').window('open');
}
function fnEditheader_86() {
	var singleRow = $('#86_dtgheader').datagrid('getSelected');
	if(singleRow) {
		$('#86_dlgheader').dialog({
			title: 'Edit Data Header',
			width: 510,
			height: 390
		});
		$('#86_divWait').show();
		$('#86_fraheader').hide();
						
		$('#86_fraheader').attr('src','<?php echo base_url(); ?>index.php/md_header/fnheaderEdit/'+singleRow.id_header);
				

		$('#86_dlgheader').window('open');
	} else {
		alert('Select which header data you want to edit.');
	}
}
function fnSelectheader_86() {
	var singleRow = $('#86_dtgheader').datagrid('getSelected');
	if(singleRow) {
		var vheaderId = singleRow.header_uid;
		var vheaderLogin = singleRow.header_ulogin;
		$('#86_dlgheader').dialog({
			title: 'Select header for '+vheaderLogin,
			width: 365,
			height: 290
		});
		$('#86_divWait').show();
		$('#86_fraheader').hide();
				
		$('#86_fraheader').attr('src','<?php echo base_url(); ?>index.php/md_header/fnheaderChoose/'+vid_header);
				
		$('#86_dlgheader').window('open');
	} else {
		alert('Select header Datagrid row first.');
	}
}
function fnDeleteheader_86() {
	var singleRow = $('#86_dtgheader').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_header/fnheaderDelete/',{Id:singleRow.id_header},function(result) {
				
					if (result.success) {
						$('#86_dtgheader').datagrid('reload');
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