    <div class="easyui-layout" data-options="fit:true">
    <div data-options="region:'center',title:'Data Video'" style="padding-bottom:25px;background:#eee;">
	<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="fnAddvideo_88()">Add</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="fnDeletevideo_88()">Delete</a> 
			
	</div>
	<div style="float:right;clear:right;">
		<span>Search:</span>
		<input id="88_txtvideo" style="width:175px;line-height:26px;border:1px solid #CCCCCC; padding:3px">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="fnSearch_88()">Find</a>
	</div>

<table id="88_dtgvideo" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_video/fnvideoData/',toolbar:'#88_tlbvideo',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
<thead>
	<tr>
           
		   <th data-options="field:'id_video',title:'<b>Id</b>',hidden:true,width:40,sortable:true" halign="center"></th>
           
		   <th data-options="field:'nama_video',title:'<b>File</b>',width:500,sortable:true" halign="center"></th>
           	

   </tr>
</thead>
</table>
</div>
<div id="88_dlgvideo" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_88(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="88_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="88_fravideo" id="88_fravideo" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">
function fnSearch_88() {
	$('#88_dtgvideo').datagrid('load',{
		videoKeyword: $('#88_txtvideo').val()
	});
}
function fnResize_88(width,height) {
	$('#88_fravideo').width(width-14);
	$('#88_fravideo').height(height-40);
}
function fnResize_88(width,height) {
	$('#88_fravideo').width(width-14);
	$('#88_fravideo').height(height-40);
}
function fnAddvideo_88() {
	$('#88_dlgvideo').dialog({
		title: 'Input Data Video',
		width: 510,
		height: 390
	});
	$('#88_divWait').show();
	$('#88_fravideo').hide();
	$('#88_fravideo').attr('src','<?php echo base_url(); ?>index.php/md_video/fnvideoAdd');
	$('#88_dlgvideo').window('open');
}
function fnEditvideo_88() {
	var singleRow = $('#88_dtgvideo').datagrid('getSelected');
	if(singleRow) {
		$('#88_dlgvideo').dialog({
			title: 'Edit Data Video',
			width: 510,
			height: 390
		});
		$('#88_divWait').show();
		$('#88_fravideo').hide();
						
		$('#88_fravideo').attr('src','<?php echo base_url(); ?>index.php/md_video/fnvideoEdit/'+singleRow.id_video);
				

		$('#88_dlgvideo').window('open');
	} else {
		alert('Select which video data you want to edit.');
	}
}
function fnSelectvideo_88() {
	var singleRow = $('#88_dtgvideo').datagrid('getSelected');
	if(singleRow) {
		var vvideoId = singleRow.video_uid;
		var vvideoLogin = singleRow.video_ulogin;
		$('#88_dlgvideo').dialog({
			title: 'Select video for '+vvideoLogin,
			width: 365,
			height: 290
		});
		$('#88_divWait').show();
		$('#88_fravideo').hide();
				
		$('#88_fravideo').attr('src','<?php echo base_url(); ?>index.php/md_video/fnvideoChoose/'+vid_video);
				
		$('#88_dlgvideo').window('open');
	} else {
		alert('Select video Datagrid row first.');
	}
}
function fnDeletevideo_88() {
	var singleRow = $('#88_dtgvideo').datagrid('getSelected');
	if (singleRow) {
		$.messager.confirm('Confirm','Are you sure you want to delete this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_video/fnvideoDelete/',{Id:singleRow.id_video},function(result) {
				
					if (result.success) {
						$('#88_dtgvideo').datagrid('reload');
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