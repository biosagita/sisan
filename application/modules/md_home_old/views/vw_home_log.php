<html>
<head>
<title>ANTRIAN LOGIN</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/black/easyui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bens.css" />
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
if ($site_url == "")
{

}
?>
<body id="login" style="background:#E2E2E2">
<div align="center" style="margin-top:50px;">
    <br>
	<div class="easyui-panel" title="Login ANTRIAN" style="width:300px;background:#fafafa;padding:10px;">
		<form id="ff" action="<?php echo base_url(); ?>index.php/md_home/ProsesLogin/" method="post" >
			<input type="hidden" id="counter"  name="counter" value="1" >
		<table>
		
		<tr>
			<td align="right" class="fieldText">Username : </td>
			<td align="right"><input name="txtUsername" type="text"></td>
		</tr>
		<tr>
			<td align="right" class="fieldText">Password : </td>
			<td align="right"><input name="txtPassword" type="password"></td>
		</tr>
		
		<tr id="loket">
			<td align="right" class="fieldText">Loket : </td>
			<td align="right">
				<input name='id_loket' id='id_loket' class="easyui-combobox" size="20" data-options="required:true">
			
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
<script type="text/javascript">
$(function() {
    $('input[type=radio][name=counter]').change(function() {
        if (this.value == '1') {
            $('#loket').show();
        }
        else if (this.value == '0') {
            $('#loket').hide();
        }
    });
    
	$('#id_loket').combobox({
		required:true,
		valueField:'id_loket',
		textField:'nama_loket',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_loket/fnloketComboData/'
	});
});
	
</script>	