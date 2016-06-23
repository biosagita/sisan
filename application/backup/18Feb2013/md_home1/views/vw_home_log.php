<html>
<head>
<title>QBRO 2.0 SYSTEM'S LOGIN</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/gray/easyui-modified.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bro.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/icon.css">
<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.easyui.min.js"></script>

<style>
	.fieldText {
		font-family:Arial, Helvetica, sans-serif; 
		font-size:12px;
	}
</style>
</head>
<?php
//
//$site_uri = parse_url($base_url, PHP_URL_PATH);
$site_url = $_SERVER['HTTP_HOST'];
$site_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
if ($site_url == "27.111.33.131/bro/")
{
	redirect('http://27.111.33.131/brolama','refresh'); 
}
?>
<body id="login" style="background:#E2E2E2">
<div align="center" style="margin-top:50px;">
	<img src="<?php echo base_url();?>images/QBro.bmp" />
    <br>
	<div class="easyui-panel" title="Login Qbro 2.0" style="width:300px;background:#fafafa;padding:10px;">
		<form id="ff" action="<?php echo base_url(); ?>index.php/md_home/ProsesLogin/" method="post">
		<table>
		<tr>
			<td align="right" class="fieldText">Username : </td>
			<td align="right"><input name="txtUsername" type="text"></td>
		</tr>
		<tr>
			<td align="right" class="fieldText">Password : </td>
			<td align="right"><input name="txtPassword" type="password"></td>
		</tr>
        <tr>
        	<td height="10px;"></td>
        </tr>
		<tr>
			<td align="right" colspan="2"><input type="submit" value="Login" style="width:75px; font-weight:bold" class="fieldText">&nbsp;<input type="reset" value="Reset" style="width:75px; font-weight:bold" class="fieldText"></td>
		</tr>
		</table>
		</form>
	</div>
</div>
</body>
</html>