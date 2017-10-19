<?php 

$order = new OrderBackingBean();


if($user->isAdmin() && !(isset($_GET['orderCode']))&& !(isset($_GET['orderCode']))){
$orders = $order->getOrdersList(); 
}else{
	$orders = $order->getOrderStatus();
}
  if($orders!=null){	
 	$pmp = new PMPBackingBean();

	
  	//STEP-I  Add Order
	while($order = mysql_fetch_object($orders)){
	$parent=0;
	$node =0;
	$loc =0;

    	$orderId = $order->order_id;
		//SETP-II Add Project for current Order
		$project = $pmp->getProjectByOrderId($orderId);
		$projectStatus = $pmp->getProjectStatus($project->project_id);
		
?>

				<div class="panel panel-default">
				  <div class="panel-heading" title="<?php echo $project->project_name;?>">
				 <a href="orderstatus.php?cos=<?php echo $orderId; ?>"><?php echo $project->project_short_name;?> Heirarchy</a> 
		 		 <input type="button" value="<?php echo (isset($_GET['orderCode'])&&$_GET['orderCode']!=$orderId?'+':'-')?>" title="Hide Panel" style="float:right;" id="resize<?php echo 'order'.$orderId?>" onclick="<?php echo (isset($_GET['orderCode'])&&$_GET['orderCode']!=$orderId?'maximize':'minimize')?>('<?php echo 'order'.$orderId?>')">
				 <?php $progressBarValue=$projectStatus; include("view/structure/progressBar.php"); ?>
				  				  
				  </div>
				  <div class="panel-body" id="<?php echo 'order'.$orderId?>" style="<?php echo (isset($_GET['orderCode'])&&$_GET['orderCode']!=$orderId?'display:none':'') ?>">

							<script type="text/javascript">
								<!--
								//var Tree = new Array;
								<?php echo 'var Tree'.$orderId.' = new Array'; ?>
								// nodeId | parentNodeId | nodeName | nodeUrl
								
					<?php 
								 // echo "Tree[".$loc++."] = \"".(($node++)+1)."|0| Your Order Status|index.php?action=pmp/pmp&os=".$orderId."\";";
								  //echo "Tree[".$loc++."] = \"".(($node++)+1)."|0| Your Agreement|index.php?action=pmp/pmp&sn=2\";";
								  
								  $parent = $loc;
									  
									  if($project!=null){
										 
										  	 echo "Tree".$orderId."[".$loc++."] = \"".(($node++)+1)."|".$parent."| Your Rrquirements|pmp.php?&orderCode=".$project->order_id."&pc=".$project->project_id."&sn=".$loc."\";";
													
										  	     //SETP-III Add User Stories for current Project
										  	 	 $userStoryParent = $loc;
											  	 $user_stories = $pmp->getUserStoriesList($project->project_id);
											  	 if($user_stories!=null){
											  	 	while($user_story = mysql_fetch_object($user_stories)){
											  	 		echo "Tree".$orderId."[".$loc++."] = \"".(($node++)+1)."|".$userStoryParent."|".substr($user_story->user_story,0,25)."..|pmp.php?&orderCode=".$project->order_id."&us=".$user_story->user_story_id."&sn=".$loc."\";";
											  	 		
											  	 		//SETP-IV Add TO DOS for current Sprint
											  	 		$todoParent = $loc;
											  	 		$todos = $pmp->getToDosList($user_story->user_story_id);
											  	 		if($todos!=null){
											  	 			while($todo = mysql_fetch_object($todos)){
											  	 				echo "Tree".$orderId."[".$loc++."] = \"".(($node++)+1)."|".$todoParent."|".substr($todo->todo_name,0,23).".. |pmp.php?&orderCode=".$project->order_id."&td=".$todo->todo_id."&sn=".$loc."\";";
											  	 			}
											  	 		}//if
											  	 		
											  	 	}
											  	 }//if
										  	 
										  
									  }//if
				?>
								//-->
							</script>
							
						<div class="tree"  >
						<script type="text/javascript">
						<!--
							//createTree(Tree+"<?php echo $orderId; ?>",1,"<?php echo(isset($_GET['sn'])?$_GET['sn']:0)?>");
							<?php echo 'createTree(Tree'.$orderId.',1,'.(isset($_GET['sn'])?$_GET['sn']:0).');'?>
							//Tree.openTo(4, true);
							
						//-->
						</script>
						</div> 
					</div>
				</div>		
				
<?php 					}
				  }
?>

