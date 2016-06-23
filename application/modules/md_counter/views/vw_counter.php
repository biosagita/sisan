<div class="easyui-layout" data-options="fit:true" style="background:#efefef;">
   <div data-options="region:'north',title:'North Title',split:true" style="height:130px;padding:10px;">
		<table width=100%>
		<tr>
			<td align=center  style="padding:10px auto;width=10%; height:10px ;background-color:#0B243B;font: normal 15pt Arial,Helvetica,sans-serif;font-weight: bold;color:#FFF;">TIKET
			<td width=80%>
			<td align=center  style="padding:10px auto;width=10%; height:10px ;background-color:#0B243B;font: normal 15pt Arial,Helvetica,sans-serif;font-weight: bold;color:#FFF;">LOKET

		<tr>
			<td align=center  id="tiket" style="padding:10px auto;width:10%; height:50px ;background-color:#efefef;font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;color:red;">		
			<td> 
				<table style="padding:10px auto;width:100%; height:50px ;background-color:#efefef;font: 15px Arial,Helvetica,sans-serif;font-weight: bold;color:#08088A;" >
					<tr><td width=150px >TRANSACTION <td width=3px>: <td id="transaction">
					<tr><td>START <td width=3px>:<td id="start">
					<tr><td>LOGIN <td width=3px>:<td > <?php  echo$this->session->userdata('sEmpName'); ?> 
					
				</table>	
			<td align=center  style="padding:10px auto;width:10%; height:50px ;background-color:#efefef;font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;color:red;"><?php  echo $this->session->userdata('sIdLoket'); ?>
			
		</table>
	</div>
    <div data-options="region:'west',title:'Queue List',split:true" style="width:550px;">
			<div id="84A_tlbcounter" style="padding:15px;">
				<div style="float:left;background:#efefef;">
				</div>
			</div>
			<table id="84A_dtgcounter" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_counter/fnqueueListData/',toolbar:'#84A_tlbcounter',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
			<thead>
				<tr>           
					   <th data-options="field:'id',title:'<b>Id</b>',hidden:true,width:40,align:'center',sortable:true" halign="center"></th>          	
					   <th data-options="field:'queue_no',title:'<b>Queue No</b>',width:80,align:'center',sortable:true" halign="center"></th>          	
					   <th data-options="field:'type',title:'<b>Type</b>',width:350,sortable:true" halign="center"></th>          	
					   <th data-options="field:'time',title:'<b>Time In</b>',width:70,align:'center',sortable:true" halign="center"></th>          	
					   
			   </tr>
			</thead>
			</table>
	
	</div>
    <div data-options="region:'center',title:''" style="padding:0px;background:#efefef;">
			<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'center',title:''" style="padding:0px;background:#efefef;">
			<table id="84B_dtgcounter" class="easyui-datagrid" data-options="title:'Skip List',url:'<?php echo base_url(); ?>index.php/md_counter/fnskipListData/',toolbar:'#84B_tlbcounter',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
			<thead>
				<tr>           
					   <th data-options="field:'id',title:'<b>Id</b>',hidden:true,width:40,align:'center',sortable:true" halign="center"></th>          	
					   <th data-options="field:'queue_no',title:'<b>Queue No</b>',width:80,align:'center',sortable:true" halign="center"></th>          	
					   <th data-options="field:'type',title:'<b>Type</b>',width:350,sortable:true" halign="center"></th>          	
					   <th data-options="field:'time',title:'<b>Time In</b>',width:70,align:'center',sortable:true" halign="center"></th>          	
					   
			   </tr>
			</thead>
			</table>			
			</div>			
			<div data-options="region:'south',title:'',split:true" style="height:260px;">
			<table id="84C_dtgcounter" class="easyui-datagrid" data-options="title:'Finish List',url:'<?php echo base_url(); ?>index.php/md_counter/fnfinishListData/',toolbar:'#84C_tlbcounter',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
			<thead>
				<tr>           
					   <th data-options="field:'id',title:'<b>Id</b>',hidden:true,width:40,align:'center',sortable:true" halign="center"></th>          	
					   <th data-options="field:'queue_no',title:'<b>Queue No</b>',width:80,align:'center',sortable:true" halign="center"></th>          	
					   <th data-options="field:'type',title:'<b>Type</b>',width:350,sortable:true" halign="center"></th>          	
					   <th data-options="field:'time',title:'<b>Time In</b>',width:70,align:'center',sortable:true" halign="center"></th>          	
					   
			   </tr>
			</thead>
			</table>
			
			</div>
			
			</div>	
	</div>
</div>
	

<div id="84_dlgcounter" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true, onResize: function(width, height){if(height!='auto') fnResize_84(width, height) }" closed="true" style="background-color:#F8F8F8;">  
    <div id="84_divWait" align="left" style="padding:10px; height:200px;"><img src="http://localhost/antrian/images/loading.gif" /> &nbsp;Loading...</div>
    <iframe name="84_fracounter" id="84_fracounter" frameborder="0" style="background-color:#F8F8F8"></iframe>
</div>
<script type="text/javascript">



 
function fnNext() {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url()?>index.php/md_counter/fnNext/',
			dataType: 'json',
			data: {},
			success: function(data) {
				document.getElementById('tiket').innerHTML = data.no_tiket;					
				document.getElementById('transaction').innerHTML = data.transaction;					
				document.getElementById('start').innerHTML = data.start;					
				
			}
		});

		//$('#84_fracounter').attr('src','<?php echo base_url(); ?>index.php/md_counter/fnNext/');
		$('#84A_dtgcounter').datagrid('reload');		
		//$('#84B_dtgcounter').datagrid('reload');		
		//$('#84C_dtgcounter').datagrid('reload');		

		
}
function fnRecall() {
		$('#84_fracounter').attr('src','<?php echo base_url(); ?>index.php/md_counter/fnRecall/');
}
function fnSkip() {
		$('#84_fracounter').attr('src','<?php echo base_url(); ?>index.php/md_counter/fnSkip/');
		$('#84B_dtgcounter').datagrid('reload');				
}

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