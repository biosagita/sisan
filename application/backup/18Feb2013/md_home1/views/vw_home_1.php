<?php
$containerTimeStamp=date('j')."-".date('n')."-".date('Y')."axleasia";
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>QBro 2.0 System</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/gray/easyui-modified.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bro.css" />
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
<body class="easyui-layout" style="text-align:left">
