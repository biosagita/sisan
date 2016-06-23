<div id="89_tlbhead" style="padding:5px;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddhead_89()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="fnEdithead_89()">Edit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletehead_89()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="89_txthead" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_89()">Find</a>
	</div>
</div>
<table id="89_dtghead" class="easyui-datagrid" data-options="title:'Data head',url:'<?php echo base_url(); ?>index.php/md_head/fnheadData/',toolbar:'#89_tlbhead',rownumbers:false,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id_header',title:'<b>Id</b>',width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'text_header',title:'<b>Text</b>',width:50,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
<div id="89_dlghead" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_89(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="89_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="89_frahead" id="89_frahead" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_89() {
	$('#89_dtghead').datagrid('load',{
		headKeyword: $('#89_txthead').val()
	});
}
function fnResize_89(width,height) {
	$('#89_frahead').width(width-14);
	$('#89_frahead').height(height-40);
}
function fnResize_89(width,height) {
	$('#89_frahead').width(width-14);
	$('#89_frahead').height(height-40);
}
function fnAddhead_89() {
	$('#89_dlghead').dialog({
		title: 'Input Data head',
		width: 510,
		height: 390
	});
	$('#89_divWait').show();
	$('#89_frahead').hide();
	$('#89_frahead').attr('src','<?php echo base_url(); ?>index.php/md_head/fnheadAdd');
	$('#89_dlghead').window('open');
}
function fnEdithead_89() {
	var singleRow = $('#89_dtghead').datagrid('getSelected');
	if(singleRow) {
		$('#89_dlghead').dialog({
			title: 'Edit Data Head',
			width: 510,
			height: 390
		});
		$('#89_divWait').show();
		$('#89_frahead').hide();
				

		$('#89_dlghead').window('open');
	} else {
		alert('Select which head data you want to edit.');
	}
}
function fnSelecthead_89() {
	var singleRow = $('#89_dtghead').datagrid('getSelected');
	if(singleRow) {
		var vheadId = singleRow.head_uid;
		var vheadLogin = singleRow.head_ulogin;
		$('#89_dlghead').dialog({
			title: 'Select head for '+vheadLogin,
			width: 365,
			height: 290
		});
		$('#89_divWait').show();
		$('#89_frahead').hide();
				
		$('#89_dlghead').window('open');
	} else {
		alert('Select head Datagrid row first.');
	}
}
function fnDeletehead_89() {
	var singleRow = $('#89_dtghead').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
					if (result.success) {
						$('#89_dtghead').datagrid('reload');
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