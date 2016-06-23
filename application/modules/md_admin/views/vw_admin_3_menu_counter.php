<link href="css/dropdown/dropdown.vertical.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/dropdown/themes/default/default.ultimate.css" media="all" rel="stylesheet" type="text/css" />

	<div data-options="region:'west',split:true,border:true,title:'Modules'" style="width:210px;padding:5px; font-size:24px;">


<p>&nbsp;</p>
<div id="menu" style="float:left;" >
<ul id="nav" class="dropdown dropdown-vertical">
	<li><?php echo"<a href='javascript:void(0)'  id='btnnext' onclick='fnNext()'><img src='images/next.png' width=20 height=20 >&nbsp;&nbsp;Next</a>"; ?> 
	<li><?php echo"<a href='javascript:void(0)' id='btnrecall' onclick='fnRecall()' ><img src='images/undo.png' width=20 height=20 >&nbsp;&nbsp;Recall</a>"; ?>
	<li><?php echo"<a href='javascript:void(0)'  id='btnskip' onclick='fnSkip()' ><img src='images/skip.png' width=20 height=20 >&nbsp;&nbsp;Skip</a>";  ?> 

	<li><?php echo"<a href='javascript:void(0)' onclick='specialFeature()' ><img src='images/logout.png' width=20 height=20 >&nbsp;&nbsp;Logout</a>"; ?> 

</ul>
</div>
		
	</div>

	
<script>



	$('#treeMenu').tree({
		onClick: function(node){
			if(node.attributes)
			{
				var vStr = node.attributes.split("||");
				loadNewModule(vStr[0],vStr[1]);
			}
			
			if (node.state == 'closed')
				$('#treeMenu').tree('expand', node.target);
			else
				$('#treeMenu').tree('collapse', node.target);
		}
	});
	
</script>