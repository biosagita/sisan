<?
session_start();
include_once "bro/sqlQuery.php";
if($_POST["action"]=="Save"){
   
				
						
$result = singleSelect("select * from tbexchgrate 
			   where DateApplied ='".$_POST["Mouth"]."".$_POST["Year"]."'
			   and Curr_From ='".$_POST["Curr_From"]."'
			   and Curr_To   ='".$_POST["Curr_To"]."'");
									   
if(count($result) < 1 ){											   

$insert = singleUpdate("insert into tbexchgrate (PK_xchgrate,DateApplied,Curr_From,
  												 Curr_To,Default_Value,
  												 user_entry,entry_dt,LockCode) 
						values ('".$_POST["Code"]."','".$_POST["Mouth"]."".$_POST["Year"]."',
						'".$_POST["Curr_From"]."','".$_POST["Curr_To"]."','".$_POST["Default_Value"]."',
						'".$_SESSION['userNm']."',NOW(),'1')");




					 }
					 else
					 {

if($_POST["LockCode"] == 1){					 
$update = singleUpdate("update tbexchgrate set  	
						Default_Value   ='".$_POST["Default_Value"]."',
						user_entry      ='".$_SESSION['userNm']."',
						entry_dt = NOW()
						where DateApplied ='".$_POST["Mouth"]."".$_POST["Year"]."'
				   		and Curr_From   ='".$_POST["Curr_From"]."'
                    	and Curr_To     ='".$_POST["Curr_To"]."'");	
}
else
{
$error = true;
}			 
					 }
}
if($_POST["action"]=="Delete"){
$update = singleUpdate("delete from tbexchgrate 
						where Id ='".$_POST["Id"]."'");			 

	 

   }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Qbro - Exchange Rate</title>
<?
if($error) echo "<script>alert('Code already exist. Please select data first to update record!');</script>";
?>
<script language="javascript">


function confSubmit(form, maction) {

	var Mouth           = document.form.Mouth.value;
	var Year            = document.form.Year.value;
	var Curr_From       = document.form.Curr_From.value;
	var Curr_To         = document.form.Curr_To.value;
	var Default_Value   = document.form.Default_Value.value;
	
	if(Mouth == "") {
		alert("Input Month");
		form.Mouth.focus ();
			return false
		}

	if(Year == "") {
		alert("Input Year");
		form.Year.focus ();
			return false
		}
				
	if(Curr_From == "") {
		alert("Input Curr_From");
		form.Curr_From.focus ();
			return false
		}	
	if(Curr_To == "") {
		alert("Input Curr_To");
		form.Curr_To.focus ();
			return false
		}		
    if(Default_Value == "") {
		alert("Input Default_Value");
		form.Default_Value.focus ();
			return false
		}


if (confirm("Are you sure you want to "+ maction +"  ?")) {
form.action.value = maction;
form.submit();
}
else 
{
alert("You decided not to  "+ maction +" !");
}


}
function confSubmitdelete(form, maction) {
//alert('delete');
var Id = document.form.Id.value;
if(Id == "") {
alert("Click the record to delete !.");
form.Id.focus();
return false
}


if (confirm("Are you sure you want to "+ maction +"  ?")) {
form.action.value = maction;
form.submit();
}
else 
{
alert("You decided not to  "+ maction +" !");
}

}

</script>	

<script language="javascript">
	function reset1(){
//alert('te4st');
form.reset();
document.form.Code1.value="";



}
</script>	
	<script language="JavaScript">
function setLayerSize() {
	var layerWidth = document.body.clientWidth;
	document.all.Layer1.style.width = layerWidth - 0;
	document.all.Layer2.style.width = layerWidth - 30;
}
function datos_onscroll() {
	if (Layer2.scrollLeft != form.text1.value) {
		form.text1.value = Layer2.scrollLeft;
		Layer1.scrollLeft = Layer2.scrollLeft;
		return;
	}
	if (Layer2.scrollHeight != form.text2.value) {
	    form.text2.value = Layer2.scrollTop;
		return;
	} 
}     
</script>	
	<link rel="stylesheet" href="<?php echo base_url();?>bro/css/tab-view.css" type="text/css" media="screen">

	<script type="text/javascript" src="<?php echo base_url();?>bro/js/ajax.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>bro/js/tab-view.js">
	
	</script>
	
    <style type="text/css">
<!--


#Layer3 {
	position:static;
	width:637px;
	height:57px;
	z-index:2;
	left: 14px;
	top: 478px;
}
-->
    </style>
<script src="<?php echo base_url();?>bro/js/window_open.js" language="javascript" type="text/javascript"></script>
    <link href="<?php echo base_url();?>bro/css/css.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="javascript:setLayerSize();" >

<form name="form" method="post" enctype="multipart/form-data">
<INPUT type="hidden" id="text1" name="text1">
<INPUT type="hidden" id="text2" name="text2"> 
<input type="hidden" name="Id" size="20">
<input type="hidden" name="action" value=""/>  
<INPUT type="hidden" id="text2" name="LockCode"> 
<table width="760">
<tr>
<td bgcolor="#B6C0D7" height="2"></td>
</tr>
<tr>
<td height="18" class="title">Exchange Rate</td>
</tr>
<tr>
<td bgcolor="#B6C0D7" height="2"></td>
</tr>
</table>
<p></p>

<div id="dhtmlgoodies_tabView">
<!--Groups Entry -->
<div  class="dhtmlgoodies_aTab">


<table width="100%" cellpadding="2" cellspacing="2">
<Tr>
<Td height="25" colspan="4" align="right" style="padding-right:15px">
<input type="button" style="font-size:9px" onClick="reset1();"  value="Reset" >
<input type="submit" style="font-size:9px" name="searchGroups"  value="Search" >
<?
$save = singleSelect("select * from tbuserids a
inner join tbgroupsrights b on a.Group_Code = b.Group_Code where a.Name ='".$_SESSION["userNm"]."' and Right_Key in  ('save')");
?>

<input type="button" onClick="confSubmit(this.form, 'Save');" style="font-size:9px" name="Save" value="Save" 
<?
if(count($save) == 0){

echo "disabled";
}
?>
>
<?
$delete = singleSelect("select * from tbuserids a
inner join tbgroupsrights b on a.Group_Code = b.Group_Code where a.Name ='".$_SESSION["userNm"]."' and Right_Key in  ('delete')");
?>
<input type="button" style="font-size:9px" name="deleteGroups"  onClick="confSubmitdelete(this.form, 'Delete');"  value="Delete"
<?
if(count($delete) == 0){

echo "disabled";
}
?>
>

</Td>
</Tr>
<Tr>
<Td height="20" colspan="4"  class="title">
Search</Td>
</Tr>
<tr>
<td width="21%" height="23" align="center" class="nmf" >Period Month </td>
<td width="12%" align="left" class="emf" ><select name="Mount1">
  <option value="">Month </option>
  <option value="01">01</option>
  <option value="02">02</option>
  <option value="03">03</option>
  <option value="04">04</option>
  <option value="05">05</option>
  <option value="06">06</option>
  <option value="07">07</option>
  <option value="08">08</option>
  <option value="09">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
</select></td>
<td width="16%" align="center" class="nmf" >Period Year </td>
<td width="51%" align="left" class="emf" ><select name="Year2">
  <option value="">Year</option>
  <?
for($i=2000; $i<=2020; $i++){
?>
  <option value="<?=$i?>">
  <?=$i?>
  </option>
  <?
}
?>
</select></td>
</tr>
<Tr>
<Td colspan="4" class="emf">&nbsp;</Td>
</Tr>
<Tr>
<Td height="20" colspan="4"  class="title">
Exchange Rate List</Td>
</Tr>
</table>

<Br>




<div id="Layer1" style="height:33px; width:725px; overflow-x:hidden; overflow-y:hidden; visibility:visible; position:static; z-index:1; left: 16px; top: 225px;">
<table width="725" border="0" cellspacing="1" cellpadding="3">
<tr>


<Td class="dmfbold" width="120" align="center" >Years</Td>
<Td class="dmfbold" width="120" align="center" >Month</Td>
<Td class="dmfbold" width="120" align="center" >Curr. From</Td>
<Td class="dmfbold" width="120" align="center" >Curr. To</Td>
<Td class="dmfbold" width="120" align="center" >Value</Td>
</tr>
<tr>
<Td colspan="5" height="2" class="dmf"></Td>
</tr>
</table>
</div>
<div id="Layer2" style="height:235px; width:745px; overflow-x:hidden; overflow-y:scroll; visibility:visible; position:static; z-index:1; top:248px; left: 15px;" onScroll="javascript:datos_onscroll();">
<table width="725" border="0" cellspacing="1" cellpadding="3">
<?

if(isset($_POST["searchGroups"])){
$result = singleSelect("select * from tbexchgrate where DateApplied like '%".$_POST["Mount1"].$_POST["Year2"]."%'");

}
else
{
$result = singleSelect("select * from tbexchgrate");



}
for($i=1; $i <= count($result); $i ++){
?>
<tr onMouseOver=this.style.backgroundColor="#BAD5FC" onMouseOut=this.style.backgroundColor="" style="cursor:hand"  onclick="docform=document.form; 

    docform.Curr_From.value               ='<?php echo $result[$i]["Curr_From"] ?>';
	docform.Curr_To.value                 ='<?php echo $result[$i]["Curr_To"] ?>';
	  docform.LockCode.value             ='<?php echo $result[$i]["LockCode"] ?>';
	   docform.Id.value             ='<?php echo $result[$i]["Id"] ?>';
	docform.Default_Value.value           ='<?php echo $result[$i]["Default_Value"] ?>';
	  for(var i = 1; i < docform.Mouth.length; i++) {
	  if(docform.Mouth.options[i].value == '<?php echo substr($result[$i]["DateApplied"],0,2) ?>') 
		{
	     docform.Mouth.options[i].selected = true;
	      break;
	    }
		}
		 for(var i = 1; i < docform.Year.length; i++) {
	  if(docform.Year.options[i].value == '<?php echo substr($result[$i]["DateApplied"],2,4) ?>') 
		{
	     docform.Year.options[i].selected = true;
	      break;
	    }
		}
		<?
			   if($result[$i][DtbaseCode]==1){
  echo "docform.deleteGroups.disabled='true';";
  echo "docform.saveGroups.disabled='true';"; 
  echo "docform.Mouth.disabled='true';"; 
echo "docform.Year.disabled='true';"; 
//echo "docform.Default_Value.disabled='true';"; 
echo "docform.Curr_From.disabled='true';"; 
echo "docform.Curr_To.disabled='true';";     
  }
  else
  {
echo "docform.deleteGroups.disabled='';"; 
echo "docform.saveGroups.disabled='';"; 
echo "docform.Mouth.disabled='';"; 
echo "docform.Year.disabled='';"; 
//echo "docform.Default_Value.disabled='';"; 
echo "docform.Curr_From.disabled='';"; 
echo "docform.Curr_To.disabled='';";  
  }
	
	?>
		
	
    docform.Id.value                 ='<?php echo $result[$i]["Id"] ?>';">

<Td class="text" width="120" align="center" >
<?php echo substr($result[$i]["DateApplied"],2,4) ?>
</Td>
<Td class="text" width="120" align="center" ><?php echo substr($result[$i]["DateApplied"],0,2) ?></Td>
<Td class="text" width="120" align="center" ><?php echo $result[$i]["Curr_From"] ?></Td>
<Td class="text" width="120" align="center" ><?php echo $result[$i]["Curr_To"] ?></Td>
<Td class="text" width="120" align="right" >


<?=number_format($result[$i]['Default_Value'], 2, ',', '.');?>

</Td>


</tr>
<tr>
<Td colspan="5" height="1"  class="dmf"></Td>
</tr>
<?
}
?>
<tr>
<Td colspan="5" height="2"  class="dmf"></Td>
</tr>
</table>
</div>	 


<div id="Layer3">
<table width="745" cellpadding="2" cellspacing="2">
<Tr >
<Td height="20"  class="title" colspan="6">
Exchange Rate Entry</Td>
</Tr>

<tr>
<td width="17%" align="center" class="nmf">Period Month </td>
<td width="15%" class="emf"  ><select name="Mouth">
  <option value="">Month </option>
  <option value="01">01</option>
  <option value="02">02</option>
  <option value="03">03</option>
  <option value="04">04</option>
  <option value="05">05</option>
  <option value="06">06</option>
  <option value="07">07</option>
  <option value="08">08</option>
  <option value="09">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
</select></td>
<Td width="17%" height="20" align="center" class="nmf">Period Year </Td>
<Td width="15%" height="20" class="emf"  ><select name="Year">
  <option value="">Year</option>
  <?
for($i=2000; $i<=2020; $i++){
?>
  <option value="<?=$i?>">
  <?=$i?>
  </option>
  <?
}
?>
</select></Td>
<Td width="18%" align="center" class="dmf">&nbsp;</Td>
<Td width="18%" class="emf" >&nbsp;</Td>
</tr>
<Tr>
<td align="center" class="dmf" >Curr. From </td>
<td height="20"  class="emf" >
<select name="Curr_From">
<option value="">Choose...</option>
<?
$kdcurr = singleSelect("select * from tbmata_uang order by kodemata_uang asc");
for($i=1; $i <=count($kdcurr); $i++){
?>
<option value="<?=$kdcurr[$i]["kodemata_uang"]?>"><?=$kdcurr[$i]["kodemata_uang"]?></option>
<?
}
?>
</select>
<!--<input name="Curr_Froms" type="text" size="15">--></td>
<td align="center" height="20"  class="dmf" >Curr. To</td>
<td height="20"  class="emf" >
<select name="Curr_To">
<option value="">Choose...</option>
<?
$kdcurr = singleSelect("select * from tbmata_uang order by kodemata_uang asc");
for($i=1; $i <=count($kdcurr); $i++){
?>
<option value="<?=$kdcurr[$i]["kodemata_uang"]?>"><?=$kdcurr[$i]["kodemata_uang"]?></option>
<?
}
?>
</select>
<!--<input name="Curr_To" type="text" size="15">--></td>
<td height="20" align="center"  class="dmf" >Value</td>
<td height="20" align="left"  class="emf" ><input name="Default_Value" type="text" value="0" size="15" style="text-align:right"></td>
</Tr>
<Tr>
<Td height="20" colspan="6" class="dmf"></Td>
</Tr>
</table>


</div>
</div>
<!--Groups Entry -->

</div>
</Form>
<script type="text/javascript">
initTabs(Array('&nbsp;&nbsp;&nbsp;Exchange Rate&nbsp;&nbsp;&nbsp;'),0,760,530);
</script>	

</body>
</html>
