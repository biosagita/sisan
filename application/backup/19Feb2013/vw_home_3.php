	<div data-options="region:'west',split:true,border:true,title:'Modules'" style="width:250px;padding:5px; font-size:24px;">
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

				<li><a class='tripunkmenu' href="javascript:void(0)" style="font-size:12px; display:block;" onclick="<?php
$vNew=$barisRecord->f_mod_new;
if($vNew==1) {
	?>loadNewModule('<?php echo $barisRecord->f_mod_code; ?>','<?php echo $barisRecord->f_mod_name; ?>')<?php
} else {
	?>loadModule('<?php echo $barisRecord->f_mod_code; ?>','<?php echo $barisRecord->f_mod_name; ?>')<?php
}?>"><?php echo $barisRecord->f_mod_name; ?></a></li><?php
			$vCounter++;
		endforeach;
		?>

			</ul>
			<li iconCls="icon-gears"><span><a href="javascript:void(0)" style="font-size:12px; font-family:Arial, Helvetica, sans-serif;" onclick="specialFeature()"><strong>Logout</strong></a></span>
			</li>
		</ul>
	</div>
<script>
	$('#treeMenu').tree({
		onClick: function(node){
			if (node.state == 'closed')
				$('#treeMenu').tree('expand', node.target);
			else
				$('#treeMenu').tree('collapse', node.target);
		}
	});
</script>