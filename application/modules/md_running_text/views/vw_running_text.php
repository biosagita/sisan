    <div class="easyui-layout" data-options="fit:true">
    <div data-options="region:'center',title:'Data Running Text'" style="padding-bottom:25px;background:#eee;">

				<div style="float:left;">
						<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddrunning_text_87()">Add</a>
						<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEditrunning_text_87()">Edit</a>
						<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeleterunning_text_87()">Delete</a> 
						
				</div>


			<table id="87_dtgrunning_text" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_running_text/fnrunning_textData/',toolbar:'#87_tlbrunning_text',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
			<thead>
				<tr>
					   
					   <th data-options="field:'id_running_text',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
					   
					   <th data-options="field:'text',title:'<b>Text</b>',width:300,sortable:true" halign="center"></th>
					   
					   <th data-options="field:'created_date',title:'<b>Created_text</b>',width:80,sortable:true" halign="center"></th>
					   
					   <th data-options="field:'modified_date',title:'<b>Modified_Date</b>',width:80,sortable:true" halign="center"></th>
					   
					   <th data-options="field:'start_date',title:'<b>Start_Date</b>',width:80,sortable:true" halign="center"></th>
					   
					   <th data-options="field:'expired_date',title:'<b>Expired_Date</b>',width:80,sortable:true" halign="center"></th>
					   
					   <th data-options="field:'keterangan',title:'<b>Keterangan</b>',width:300,sortable:true" halign="center"></th>
						

			   </tr>
			</thead>
			</table>
</div>			
<div id="87_dlgrunning_text" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_87(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="87_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="87_frarunning_text" id="87_frarunning_text" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_87() {
	$('#87_dtgrunning_text').datagrid('load',{
		running_textKeyword: $('#87_txtrunning_text').val()
	});
}
function fnResize_87(width,height) {
	$('#87_frarunning_text').width(width-14);
	$('#87_frarunning_text').height(height-40);
}
function fnResize_87(width,height) {
	$('#87_frarunning_text').width(width-14);
	$('#87_frarunning_text').height(height-40);
}
function fnAddrunning_text_87() {
	$('#87_dlgrunning_text').dialog({
		title: 'Input Data Running Text',
		width: 510,
		height: 460
	});
	$('#87_divWait').show();
	$('#87_frarunning_text').hide();
	$('#87_frarunning_text').attr('src','<?php echo base_url(); ?>index.php/md_running_text/fnrunning_textAdd');
	$('#87_dlgrunning_text').window('open');
}
function fnEditrunning_text_87() {
	var singleRow = $('#87_dtgrunning_text').datagrid('getSelected');
	if(singleRow) {
		$('#87_dlgrunning_text').dialog({
			title: 'Edit Data Running Text',
			width: 510,
			height: 460
		});
		$('#87_divWait').show();
		$('#87_frarunning_text').hide();
						
		$('#87_frarunning_text').attr('src','<?php echo base_url(); ?>index.php/md_running_text/fnrunning_textEdit/'+singleRow.id_running_text);
				

		$('#87_dlgrunning_text').window('open');
	} else {
		alert('Select which running_text data you want to edit.');
	}
}
function fnSelectrunning_text_87() {
	var singleRow = $('#87_dtgrunning_text').datagrid('getSelected');
	if(singleRow) {
		var vrunning_textId = singleRow.running_text_uid;
		var vrunning_textLogin = singleRow.running_text_ulogin;
		$('#87_dlgrunning_text').dialog({
			title: 'Select running_text for '+vrunning_textLogin,
			width: 365,
			height: 290
		});
		$('#87_divWait').show();
		$('#87_frarunning_text').hide();
				
		$('#87_frarunning_text').attr('src','<?php echo base_url(); ?>index.php/md_running_text/fnrunning_textChoose/'+vid_running_text);
				
		$('#87_dlgrunning_text').window('open');
	} else {
		alert('Select running_text Datagrid row first.');
	}
}
function fnDeleterunning_text_87() {
	var singleRow = $('#87_dtgrunning_text').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_running_text/fnrunning_textDelete/',{Id:singleRow.id_running_text},function(result) {
				
					if (result.success) {
						$('#87_dtgrunning_text').datagrid('reload');
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