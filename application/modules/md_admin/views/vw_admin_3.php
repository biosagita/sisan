<link href="css/dropdown/dropdown.vertical.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/dropdown/themes/default/default.ultimate.css" media="all" rel="stylesheet" type="text/css" />

	<div data-options="region:'west',split:true,border:true,title:'Modules'" style="width:210px;padding:5px; font-size:24px;">


<p>&nbsp;</p>

<div id="tree" style="float:left;" >
	
		<ul id="treeMenu" class="easyui-tree"><?php
		$vCounter=1;
		$vKodeParent='';
		$vNamaParent='';
		foreach($cHasil as $barisRecord) :
			if ($barisRecord->f_grpmod_code!=$vKodeParent) {
				if($vCounter!=1) {
					?>

			</ul><?php
					if ($barisRecord->f_grpmod_code!=$vKodeParent) {
						?>

			</li><?php
					}
				}
				$vKodeParent=$barisRecord->f_grpmod_code;
				$vNamaParent=$barisRecord->f_grpmod_name;
				?>

			<li data-options="state:'closed'"><span><?php echo "<span style='font-weight:bold;font-size:12px;'>".$vNamaParent."</span>"; ?></span>
			<ul><?php
			}
			?>

				<li data-options="attributes:'<?php echo $barisRecord->f_mod_code; ?>||<?php echo $barisRecord->f_mod_name; ?>'"><a class='tripunkmenu' href="javascript:void(0)" style="font-size:12px; color:#fff; display:block;" onclick=""><?php echo $barisRecord->f_mod_name; ?></a></li><?php
			$vCounter++;
		endforeach;
		?>

			</ul>
			<li iconCls="icon-gears"><span><a href="javascript:void(0)" style="font-size:12px; font-family:Arial, Helvetica, sans-serif;" onclick="specialFeature()"><strong>Logout</strong></a></span>
			</li>
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