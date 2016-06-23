	<div data-options="region:'center',split:true,border:false">
		<div  class="easyui-tabs" fit="true" border="true">
			<div title="Counter" style="padding-left:10px;">

<div class="easyui-layout" data-options="fit:true" style="background:#efefef;">
   <div data-options="region:'north',title:'',split:true" style="height:130px;padding:10px;">
		<table width=100%>
		<tr>
			<td align=center  style="padding:10px auto;width=10%; height:10px ;background-color:#0B243B;font: normal 15pt Arial,Helvetica,sans-serif;font-weight: bold;color:#FFF;">TIKET
			<td width=40%>
			<td align=center  style="padding:10px auto;width=10%; height:10px ;background-color:#0B243B;font: normal 15pt Arial,Helvetica,sans-serif;font-weight: bold;color:#FFF;">SERVICE TIME
			<td align=center  style="padding:10px auto;width=10%; height:10px ;background-color:#0B243B;font: normal 15pt Arial,Helvetica,sans-serif;font-weight: bold;color:#FFF;">IDLE TIME
			<td align=center  style="padding:10px auto;width=10%; height:10px ;background-color:#0B243B;font: normal 15pt Arial,Helvetica,sans-serif;font-weight: bold;color:#FFF;">LOKET
		<tr>
			<td align=center  id="tiket" style="padding:10px auto;width:10%; height:50px ;background-color:#efefef;font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;color:red;">		
			<td> 
				<table style="padding:10px auto;width:100%; height:50px ;background-color:#efefef;font: 15px Arial,Helvetica,sans-serif;font-weight: bold;color:#08088A;" >
					<tr><td width=150px >TRANSACTION <td width=3px>: <td id="transaction">
					<tr><td>START <td width=3px>:<td id="start">
					<tr><td>FORWARD LAYANAN <td width=3px>:<td id="forward_layanan">
					<tr><td>LOGIN <td width=3px>:<td > <?php  echo$this->session->userdata('sEmpName'); ?> 
				</table>	
			<td align=center  style="padding:10px auto;width:10%; height:50px ;background-color:#efefef;font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;color:red;">
				<div class="timer" style="font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;">
		            <span class="hour" style="font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;">00</span>:<span class="minute" style="font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;">00</span>:<span class="second" style="font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;">00</span>
		        </div>
			<td align=center  style="padding:10px auto;width:10%; height:50px ;background-color:#efefef;font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;color:red;">
				<div id="timer_2" style="font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;">
		            <span class="hour" style="font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;">00</span>:<span class="minute" style="font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;">00</span>:<span class="second" style="font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;">00</span>
		        </div>
			<td align=center  style="padding:10px auto;width:10%; height:50px ;background-color:#efefef;font: normal 25pt Arial,Helvetica,sans-serif;font-weight: bold;color:red;"><?php echo $this->session->userdata('sNamaLoket'); ?>
			
		</table>
	</div>
    <div data-options="region:'west',title:'Queue List',split:true" style="width:650px;">
			
			<table id="84A_dtgcounter" class="easyui-datagrid" data-options="title:'',url:'<?php echo base_url(); ?>index.php/md_counter/fnqueueListData/',toolbar:'#84A_tlbcounter',rownumbers:true,border:false,singleSelect:true,striped:true,fit:true,pagination:true,pageSize:20,pageList:[20,50,100,500]">
			<thead>
				<tr>           
					   <th data-options="field:'id',title:'<b>Id</b>',hidden:true,width:40,align:'center',sortable:true" halign="center"></th>          	
					   <th data-options="field:'queue_no',title:'<b>Queue No</b>',width:80,align:'center',sortable:true" halign="center"></th>          	
					   <th data-options="field:'type',title:'<b>Type</b>',width:350,sortable:true" halign="center"></th>          	
					   <th data-options="field:'time',title:'<b>Time In</b>',width:70,align:'center',sortable:true" halign="center"></th>          	
					   <th data-options="field:'btn_next',title:'<b>Action</b>',width:70,align:'center',sortable:true" halign="center"></th>
					   
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
					   <th data-options="field:'type',title:'<b>Type</b>',width:150,sortable:true" halign="center"></th>          	
					   <th data-options="field:'time',title:'<b>Time In</b>',width:70,align:'center',sortable:true" halign="center"></th>
					   <th data-options="field:'btn_undo',title:'<b>Undo</b>',width:70,align:'center',sortable:true" halign="center"></th>
					   
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
					   <th data-options="field:'type',title:'<b>Type</b>',width:150,sortable:true" halign="center"></th>          	
					   <th data-options="field:'time',title:'<b>Time Call</b>',width:70,align:'center',sortable:true" halign="center"></th>          	
					   
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

<div id="owngotonext" class="easyui-dialog" data-options="cache: false, resizable: false, closable: true, modal: true" closed="true" style="background-color:#F8F8F8;">
	<div style="margin:5px;">
    	<form id="ownform">
    		<input style="width: 100%;height: 90px;font-size: 60px;" name="own_ticket_number" id="own_ticket_number" placeholder="Ticket Number" />
    		<br /><br />
    		<button style="width: 100%;height: 50px;font-size: 30px;" name="ownbtnprocess" id="ownbtnprocess">Process</button>
    	</form>
    </div>
</div>

            </div>
		</div>
	</div>
<script type="text/javascript">

var timer;

var timer_2;


$(document).ready(function() { 	
   
   setInterval(function() {
		$('#84A_dtgcounter').datagrid('reload');
		$('#84B_dtgcounter').datagrid('reload');		
		$('#84C_dtgcounter').datagrid('reload');		
   }, 10000);

   $.ajaxSetup({ cache: false });

});

function fnGotonext() {
	$('#owngotonext').dialog({
		title: 'Go To Next',
		width: 510,
		height: 200
	});
	$('#owngotonext').window('open');
}

$('#ownbtnprocess').click(function(e){
	e.preventDefault();
	var ticket_number = $('#own_ticket_number').val();

	$.ajax({
		type: 'POST',
		url: '<?php echo base_url()?>index.php/md_counter/fnGoToNext/',
		dataType: 'json',
		data: {'ticket_number':ticket_number},
		success: function(data) {
			data.nama_file = data.nama_file || '';
			load_image_transaksi(data.nama_file);
			
			data.no_tiket = data.no_tiket || '';

			document.getElementById('tiket').innerHTML = data.no_tiket;					
			document.getElementById('transaction').innerHTML = data.transaction;					
			document.getElementById('start').innerHTML = data.start;
			document.getElementById('forward_layanan').innerHTML = data.layanan_forward;					
			
			if (data.sRegVisitor > 0 ){	
			$('#84_dlgcounter').dialog({
				title: 'Input Data counter',
				width: 510,
				height: 390
			});
			$('#84_divWait').show();
			$('#84_fracounter').hide();
			$('#84_fracounter').attr('src','<?php echo base_url(); ?>index.php/md_counter/fnRegVisitor/'+data.id_transaksi);
			$('#84_dlgcounter').window('open');					
			}

			$('#84A_dtgcounter').datagrid('reload');		
			$('#84B_dtgcounter').datagrid('reload');		
			$('#84C_dtgcounter').datagrid('reload');

			$('#own_ticket_number').val('');
			$('a.panel-tool-close').trigger('click');

			timer_2.stop();
			timer_2.reset(0);

			timer.stop();
			timer.reset(0);

			if(data.no_tiket != '') {
				timer.start(1000);
			} else {
				timer_2.start(1000);
			}
		}		
	});

})

function fnFinish() {
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url()?>index.php/md_counter/fnFinish',
		dataType: 'json',
		data: {},
		success: function(data) {
			load_image_transaksi();
			
			$('#84A_dtgcounter').datagrid('reload');
			$('#84B_dtgcounter').datagrid('reload');		
			$('#84C_dtgcounter').datagrid('reload');
			$('#tiket, #transaction, #start, #forward_layanan').text('');

			timer_2.stop();
			timer_2.reset(0);
			timer_2.start(1000);

			timer.stop();
			timer.reset(0);
			
		}		
	});
}

function fnForward(id_layanan, id_group_layanan) {
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url()?>index.php/md_counter/fnForward',
		dataType: 'json',
		data: {'id_layanan':id_layanan, 'id_group_layanan':id_group_layanan},
		success: function(data) {
			$('#84A_dtgcounter').datagrid('reload');
			$('#84B_dtgcounter').datagrid('reload');		
			$('#84C_dtgcounter').datagrid('reload');
			$('#tiket, #transaction, #start, #forward_layanan').text('');

			timer_2.stop();
			timer_2.reset(0);

			timer.stop();
			timer.reset(0);
			timer.start(1000);
		}		
	});
}

function load_image_transaksi(nama_file) {
	nama_file = nama_file || '';

	var img_src = 'http://localhost/sisan/assets/blank_user.jpg';

	if(nama_file != '') {
		img_src = 'http://localhost/sisan/index.php/md_counter/show_image/' + nama_file;
	}
	
	$('#transaksi_image').attr('src', img_src);
}

function fnNext(id) {
		var id = id || '';
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url()?>index.php/md_counter/fnNext/',
			dataType: 'json',
			data: {Id:id},
			success: function(data) {
				data.nama_file = data.nama_file || '';
				load_image_transaksi(data.nama_file);
				
				data.no_tiket = data.no_tiket || '';

				document.getElementById('tiket').innerHTML = data.no_tiket;					
				document.getElementById('transaction').innerHTML = data.transaction;					
				document.getElementById('start').innerHTML = data.start;
				document.getElementById('forward_layanan').innerHTML = data.layanan_forward;					
				
				if (data.sRegVisitor > 0 ){	
				$('#84_dlgcounter').dialog({
					title: 'Input Data counter',
					width: 510,
					height: 390
				});
				$('#84_divWait').show();
				$('#84_fracounter').hide();
				$('#84_fracounter').attr('src','<?php echo base_url(); ?>index.php/md_counter/fnRegVisitor/'+data.id_transaksi);
				$('#84_dlgcounter').window('open');					
				}

				$('#84A_dtgcounter').datagrid('reload');		
				$('#84B_dtgcounter').datagrid('reload');		
				$('#84C_dtgcounter').datagrid('reload');

				timer_2.stop();
				timer_2.reset(0);

				timer.stop();
				timer.reset(0);

				if(data.no_tiket != '') {
					timer.start(1000);
				} else {
					timer_2.start(1000);
				}
				
			}
		});

}
function fnRecall() {
		$('#84_fracounter').attr('src','<?php echo base_url(); ?>index.php/md_counter/fnRecall/');
}
function fnSkip() {
		$.post('<?php echo base_url(); ?>index.php/md_counter/fnSkip/',{},function(result) {
			if (result.success) {
				load_image_transaksi();
				
				$('#84B_dtgcounter').datagrid('reload');
				$('#tiket, #transaction, #start, #forward_layanan').text('');

				timer_2.stop();
				timer_2.reset(0);
				timer_2.start(1000);

				timer.stop();
				timer.reset(0);
			} else {
				$.messager.show({title:'Error',msg:result.msg});
			}
		},'json');		
}
function fnUndo(id) {
	if (id) {
		$.messager.confirm('Confirm','Are you sure you want to Undo this data?',function(res) {
			if (res) {
				
				$.post('<?php echo base_url(); ?>index.php/md_counter/fnUndo/',{Id:id},function(result) {
				
					if (result.success) {
						$('#84A_dtgcounter').datagrid('reload');
						$('#84B_dtgcounter').datagrid('reload');
						
					} else {
						$.messager.show({title:'Error',msg:result.msg});
					}
				},'json');
			}
		});
	} else {
		alert('Select the data that you want to Undo.');
	}
}

/*
function fnForward() {
	$('#84_dlgcounter').dialog({
		title: 'Forward',
		width: 510,
		height: 250
	});
	
		$('#84_divWait').show();
		$('#84_fracounter').hide();
						
		$('#84_fracounter').attr('src','<?php echo base_url(); ?>index.php/md_counter/fnForward/');
				

		$('#84_dlgcounter').window('open');

}
*/
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

(function($) {
	$(document).ready(function(e) 
	{
	    timer = new _timer
		(
			function(time)
			{
				if(time == 0)
				{
					timer.stop();
					alert('time out');
				}
			}
		);
		timer.mode(1);

		timer_2 = new _timer
		(
			function(time)
			{
				if(time == 0)
				{
					timer_2.stop();
					alert('time out');
				}
			}
		);
		timer_2.place('#timer_2');
		timer_2.start(1000);
		timer_2.mode(1);
	});
})(jQuery);

</script>