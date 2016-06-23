<?php
$containerTimeStamp=date('j')."-".date('n')."-".date('Y')."axleasia";
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ANTRIAN </title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/black/easyui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bens.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/icon.css">
<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript">
	function loadModule(pModuleName,pModuleTitle) {
		if ($('#tt').tabs('exists',pModuleTitle)) {
			$('#tt').tabs('select',pModuleTitle);
		} else {
			$('#tt').tabs('add',{
				title:pModuleTitle,
				href:'<?php echo base_url(); ?>index.php/'+pModuleName+'/index/',
				closable:true,
				extractor:function(pData){
					var vTmp = $('<div><iframe scrolling="yes" frameborder="0"  src="<?php echo base_url(); ?>index.php/'+pModuleName+'/index/<?php echo md5($containerTimeStamp); ?>" style="width:100%;height:100%;"></iframe></div>');
					vData = vTmp;
					vTmp.remove();
					return vData;
				}
			});
		}
	}
	
	function loadNewModule(pModuleName,pModuleTitle) {
		if ($('#tt').tabs('exists',pModuleTitle)) {
			$('#tt').tabs('select',pModuleTitle);
		} else {
			$('#tt').tabs('add',{
				title:pModuleTitle,
				href:'<?php echo base_url(); ?>index.php/'+pModuleName+'/index/',
				closable:true
			});
		}
	}	
	function specialFeature() {
		window.location="<?php echo base_url(); ?>index.php/md_home/ProsesLogout/";
	}
</script>
</head>
<body>
<div class="easyui-panel" style="padding:10px 10px 20px 10px; background-image: url(<?php echo base_url();?>images/backg.jpg); background-repeat:repeat;" data-options="fit:true,border:false">
<div class="easyui-layout" style="text-align:left;box-shadow: 1px 2px 7px #666;" data-options="fit:true,border:true">

