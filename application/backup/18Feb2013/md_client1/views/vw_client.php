<?php
session_start();
//error_reporting(0);
include_once "bro/sqlQuery.php";


if($_POST["action"]=="Save"){
   
$result1 = singleSelect("select * from tbclient where Client ='".$_POST["Client"]."'");

							   
if(count($result1) < 1 ){											   

$insert = singleUpdate("insert into tbclient 
					   (Client,Client_Name,CAddress1,CAddress2,CAddress3,
					   CPostCode,CCity,CCountry,Client_Category,Active,DtbaseCode,CType,
					   Phone,Fax,Industry,Home,user_entry,entry_dt,LockCode) 
					   values ('".strtoupper($_POST["Client"])."',
					   		   '".$_POST["Client_Name"]."',
							   '".$_POST["CAddress1"]."',
							   '".$_POST["CAddress2"]."',
					   		   '".$_POST["CAddress3"]."',
							   '".$_POST["CPostCode"]."',
							   '".$_POST["CCity"]."',
					   		   '".$_POST["CCountry"]."',
							   '".$_POST["Client_Category"]."',
							   '".$_POST["Active"]."',
					   		   '".$_POST["DtbaseCode"]."',
							   '".$_POST["CType"]."',
							   '".$_POST["Phone"]."',
					   		   '".$_POST["Fax"]."',
							   '".$_POST["Industry"]."',
							   '".$_POST["Home"]."',
							   '".$_SESSION['userNm']."',NOW(),'1')");
					  }
					   else
					  {
if($_POST["LockCode"] == 1){					 
$update = singleUpdate("update tbclient set 
						Client          = '".strtoupper($_POST["Client"])."',
						Client_Name     = '".$_POST["Client_Name"]."',
						CAddress1       = '".$_POST["CAddress1"]."',
						CAddress2       = '".$_POST["CAddress2"]."',
						CAddress3       = '".$_POST["CAddress3"]."',
					    CPostCode       = '".$_POST["CPostCode"]."',
						CCity           = '".$_POST["CCity"]."',
						CCountry        = '".$_POST["CCountry"]."',
						Client_Category = '".$_POST["Client_Category"]."',
						Active          = '".$_POST["Active"]."',
						DtbaseCode      = '".$_POST["DtbaseCode"]."',
						CType           = '".$_POST["CType"]."',
					    Phone           = '".$_POST["Phone"]."',
						Fax             = '".$_POST["Fax"]."',
						Industry        = '".$_POST["Industry"]."',
						Home            = '".$_POST["Home"]."',
						user_entry      = '".$_SESSION['userNm']."',
						entry_dt        = NOW() 
						where Client ='".$_POST["Client"]."'");
}
else
{
$error = true;
}
											 

					 }	 
}


if($_POST["action"]=="Delete"){


$delete = singleUpdate("delete from tbclient where Id='".$_POST["Id"]."'");			 

                                 }
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Qbro - Client</title>
<?
if($error) echo "<script>alert('Code already exist. Please select data first to update record!');</script>";
?>
<script language="javascript">


function confSubmit(form, maction) {
var Client = document.form.Client.value;
var Client_Name = document.form.Client_Name.value;
var Industry = document.form.Industry.value;
var CAddress1 = document.form.CAddress1.value;
var Active = document.form.Active.value;




if(Client == "") {
alert("Input Client Code");
form.Client.focus();
return false
}

if(Client_Name == "") {
alert("Input Client Name");
form.Client_Name.focus();
return false
}
/*
if(CAddress1 == "") {
alert("Input Address 1");
form.CAddress1.focus();
return false
}



if(Active == "") {
alert("Input Active");
form.Active.focus();
return false
}	
*/
if(Industry == "") {
alert("Input Industry");
form.Industry.focus();
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
var Client = document.form.Client.value;
if(Client == "") {
alert("Click the record to delete !.");
form.Client.focus();
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
document.form.Client1.value="";
document.form.LockCode.value="";
document.form.Client_Name1.value="";
document.form.Client.readOnly='';
document.form.Client.focus();
document.form.Client.value="";
document.form.Client.value="";
document.form.Client_Name.value="";
document.form.CAddress1.value="";
document.form.CAddress2.value="";
document.form.CAddress3.value="";
document.form.CCity.value="";
document.form.Phone.value="";
document.form.Home.value="";
document.form.Fax.value="";
document.form.Industry.value="";
document.form.CPostCode.value="";
document.form.Id.value="";
document.form.Client.style.backgroundColor='#FFFFFF';
document.form.deleteGroups.disabled='';
document.form.saveGroups.disabled='';



}
</script>	
	<script language="JavaScript">
function setLayerSize() {
	var layerWidth = document.body.clientWidth;
	document.all.Layer1.style.width = layerWidth ;
	document.all.Layer2.style.width = layerWidth ;
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

	
	</script>
	
    <style type="text/css">
<!--


#Layer7 {
	position:static;
	width:930px;
	height:57px;
	z-index:2;
	left: 10px;
	top: 386px;
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
<input type="hidden" name="Id" value="">
<input type="hidden" name="action" value=""/>  
<INPUT type="hidden" id="text2" name="LockCode"> 
<table width="930">
<tr>
<td bgcolor="#B6C0D7" height="2"></td>
</tr>
<tr>
<td height="20" class="title">Client</td>
</tr>
<tr>
<td bgcolor="#B6C0D7" height="2"></td>
</tr>
</table>
<table width="930" cellpadding="2" cellspacing="2">
<Tr>
<Td height="25" align="left" colspan="4" style="padding-left:15px">
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
<tr>
<Td colspan="4" height="4"  class="title"></Td>
</tr>
<Tr>
<Td height="20" class="title" colspan="4">
Search Client</Td>
</Tr>
<tr>
<td align="center" width="19%" class="dmf" >Client</td>
<td width="100" align="left" class="emf"  >
<select name="search_by">
	<option value="Client_Code">Code</option>
	<option value="Cleint_Name">Name</option>
</select>
<input name="keyword" type="text" class="tf" value="<?=$_POST["keyword"]?>" ></td>
</tr>
<Tr>
<Td height="20" class="emf"  colspan="4"></Td>
</Tr>
<tr>
<td height="20" colspan="4" class="title">Client List
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>

<div id="Layer2" style="height:179px; width:925px; overflow-x:hidden; overflow-y:scroll; visibility:visible; position:static; z-index:1; top:195px; left: 11px;" onScroll="javascript:datos_onscroll();">
<table width="925" border="0" cellspacing="1" cellpadding="3">
<tr>
<Td class="dmfbold" width="100" align="center" >Code</Td>
<Td class="dmfbold" width="300" align="center" >Name</Td>
<Td class="dmfbold" width="300" align="center" >Address</Td>
<Td class="dmfbold" width="100" align="center" >City</Td>
<Td class="dmfbold" width="100" align="center" >Post Code</Td>
<Td class="dmfbold" width="150" align="center" >Phone</Td>
<Td class="dmfbold" width="150" align="center" >Home</Td>
<Td class="dmfbold" width="150" align="center" >Fax</Td>
</tr>
<tr>
<Td colspan="8" height="2" class="dmf"></Td>
</tr>
<?
if(isset($_POST["searchGroups"])){
if($_POST['search_by'] == "Client_Code"){
$result = singleSelect("select *,upper(Client) as Client from tbClient where Client like '%".$_POST["keyword"]."%' order by Client asc");
}else{
$result = singleSelect("select *,upper(Client) as Client from tbClient where Client_Name like '%".$_POST["keyword"]."%' order by Client asc");
}

}
else
{
$result = singleSelect("select *,upper(Client) as Client  from tbClient order by Client asc");



}
for($i=1; $i <= count($result); $i ++){
?>
<tr onMouseOver=this.style.backgroundColor="#BAD5FC" onMouseOut=this.style.backgroundColor="" style="cursor:hand" 
  onclick="docform=document.form; docform.Client.readOnly='true'; 
    docform.Client.style.backgroundColor='#CCCCCC';
	<?
	   if($result[$i][DtbaseCode]==1){
  echo "docform.deleteGroups.disabled='true';";
 // echo "docform.saveGroups.disabled='true';";    
  }
  else
  {
   echo "docform.deleteGroups.disabled='';"; 
 //  echo "docform.saveGroups.disabled='';";  
  }
  ?>
  
  docform.Id.value                  ='<?php echo $result[$i]["Id"] ?>';
  docform.Client.value              ='<?php echo addslashes($result[$i]["Client"])?>';
  docform.Client_Name.value         ='<?php echo $result[$i]["Client_Name"]?>';
  docform.CAddress1.value           ='<?php echo $result[$i]["CAddress1"] ?>';
  docform.CAddress2.value           ='<?php echo $result[$i]["CAddress2"] ?>';
  docform.LockCode.value            ='<?php echo $result[$i]["LockCode"] ?>';
  docform.CAddress3.value           ='<?php echo $result[$i]["CAddress3"] ?>';
  docform.CPostCode.value           ='<?php echo $result[$i]["CPostCode"] ?>';
  docform.CCity.value               ='<?php echo $result[$i]["CCity"] ?>';
  docform.Phone.value               ='<?php echo $result[$i]["Phone"] ?>';

  for(var a = 1; a < docform.Active.length; a++) {
	              if(docform.Active.options[a].value == '<? echo $result[$i]["Active"] ?>') 
				  {
	               docform.Active.options[a].selected = true;
	               break;
	              }
				  }
  for(var i = 1; i < docform.Industry.length; i++) {
	              if(docform.Industry.options[i].value == '<? echo trim($result[$i]["Industry"]) ?>') 
				  {
	               docform.Industry.options[i].selected = true;
	               break;
	              }
									}												


  docform.Home.value                ='<?php echo $result[$i]["Home"] ?>';
  docform.Fax.value                 ='<?php echo $result[$i]["Fax"] ?>';">
<Td class="text" width="100" align="left"  ><?=$result[$i]["Client"] ?></Td>  
<Td class="text" width="300" align="left"  ><?=$result[$i]["Client_Name"] ?></Td>
<Td class="text" width="300" align="left" ><?=$result[$i]["CAddress1"] ?></Td>
<Td class="text" width="100" align="left" ><?=$result[$i]["CCity"] ?></Td>
<Td class="text" width="100" align="left" ><?=$result[$i]["CPostCode"] ?></Td>
<Td class="text" width="150" align="left" ><?=$result[$i]["Phone"] ?></Td>
<Td class="text" width="150" align="left"  ><?=$result[$i]["Home"] ?></Td>  
<Td class="text" width="150" align="left" ><?=$result[$i]["Fax"] ?></Td>

</tr>
<tr>
<Td colspan="8" height="1"  class="dmf"></Td>
</tr>
<?
}
?>
<tr>
<Td colspan="8" height="3"  class="dmf"></Td>
</tr>
</table>
</div>	 
	 


<div id="Layer7">
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="6"  class="title" height="20" style="padding-left:20px">Client Entry </td>
    </tr>
    <tr>
    <td  style="padding-left:20px" width="13%" class="dmf">Client Code</td>
    <td width="22%" class="emf"><input name="Client" type="text" class="tf" style="text-transform:uppercase" size="15" maxlength="10" value="<?=$_POST["Client"]?>" /> &nbsp;</td>
    <td width="14%" class="dmf" style="padding-left:20px">Name</td>
    <td width="27%" class="emf"><input size="30" value="<?=$_POST["Client_Name"]?>"  class="tf" type="text" name="Client_Name" /></td>
    <td width="10%" class="emf"  style="padding-left:20px">&nbsp;</td>
    <td width="14%" class="emf">&nbsp;</td>
    </tr>
    <tr>
    <td height="58" rowspan="3"  valign="top" class="dmf" style="padding-left:20px">Address</td>
    <td colspan="3" class="emf">
	<input size="50" value="<?=$_POST["CAddress1"]?>" type="text" name="CAddress1"  class="tf"/></td>
    <td class="emf"  style="padding-left:20px">&nbsp;</td>
    <td class="emf">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3" class="emf"><input value="<?=$_POST["CAddress2"]?>" size="50" type="text" name="CAddress2"  class="tf" /></td>
    <td class="emf"  style="padding-left:20px">&nbsp;</td>
    <td class="emf">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="emf"><input value="<?=$_POST["CAddress3"]?>" size="50" type="text" name="CAddress3"  class="tf"/></td>
    <td class="emf"  style="padding-left:20px">&nbsp;</td>
    <td class="emf">&nbsp;</td>
  </tr>
     <tr>
    <td  style="padding-left:20px" width="13%" class="dmf">City</td>
    <td width="22%" class="emf"><input value="<?=$_POST["CCity"]?>" size="20" name="CCity" type="text" class="tf"/></td>
    <td width="14%" class="dmf" style="padding-left:20px">Phone</td>
    <td width="27%" class="emf"><input value="<?=$_POST["Phone"]?>" name="Phone" type="text" size="20" class="tf"/></td>
    <td width="10%" class="dmf"  style="padding-left:20px">Post Code </td>
    <td width="14%" class="emf"><input value="<?=$_POST["CPostCode"]?>" size="20" name="CPostCode" type="text" class="tf"/></td>
     </tr> 
       <tr>
    <td  style="padding-left:20px" width="13%" class="dmf">Home</td>
    <td width="22%" class="emf"><input  value="<?=$_POST["Home"]?>" name="Home" type="text" size="20" class="tf"/></td>
    <td width="14%" class="dmf" style="padding-left:20px">Fax</td>
    <td width="27%" class="emf"><input  value="<?=$_POST["Fax"]?>" name="Fax" type="text" size="20" class="tf"/></td>
    <td width="10%" class="emf"  style="padding-left:20px">&nbsp;</td>
    <td width="14%" class="emf">&nbsp;</td>
     </tr> 
  <tr>
    <td style="padding-left:20px"  class="dmf">Industry</td>
    <td class="emf">
	<select name="Industry" class="tf">
      <option  value="">Choose...</option>
<?
$ind = singleSelect("select * from tbindustry_cat order by desc1 asc");
for($a=1; $a <= count($ind); $a ++){
?>
      <option  value="<?=$ind[$a]["Id"]?>"><?=$ind[$a]["desc1"]?></option>
<?
}
?>
    </select> <input type="button"  class="tf" value="Insert" onClick="window.open('industry_cat2.php','','height=650,width=550,menubar=no,scrollbars=no,status=no,toolbar=no,top=0,left=300')"></td>
    <td class="dmf" style="padding-left:20px"  >Active</td>
    <td class="emf"><select name="Active" class="tf">
      <option value="">Choose...</option>
      <option  value="1" selected>Yes</option>
      <option  value="0">No</option>
                    </select></td>
    <td class="emf" style="padding-left:20px">&nbsp;</td>
    <td class="emf">&nbsp;</td>
  </tr>
<tr>

    <td colspan="6" height="3" class="title"></td>
  </tr>
  <tr>
    <td  class="dmf" style="padding-left:20px">Entry By </td>
    <td height="25" colspan="5" align="left" class="emf"  style="padding-left:5px"><?=$_SESSION['userNm']?> 
	( <?=date("d-m-Y")?> )</td>
    </tr>

</table>

</div>
</Form>


</body>
</html>
