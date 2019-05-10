
<?php $order = new OrderBackingBean();?>
<?php 

		if(isset($_POST['createTodo'])){
			$pmp->createTodo();
			header("Refresh:0");
		}

 	$parent=0;
	$node =0;
	$loc =0;
  
  $userStoryId = (isset($_GET['us'])?$_GET['us']:0);
  $pmp = new PMPBackingBean();
   //SETP-III Add User Stories for current Project
	$userStoryParent = $loc;
	$user_stories = $pmp->getUserStoryById($userStoryId);
	$totalUserStories = mysql_num_rows($user_stories);
	$userStoryStatus=0;
    $user_story = mysql_fetch_object($user_stories);
?>
		<div class="row">
		  <div class="col-lg-12">
			<span class="PageTitle">User Story Status</span>
				<div class="Title">
				 &nbsp; <input type="button" value="Create New"  title="Create TODO" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Add TODO','view/contents/pmp/todoForm.php?userStoryId=<?php echo (isset($_GET['us'])?$_GET['us']:0) ?>&userStory=<?php echo $user_story->user_story;?>&projectId=<?php echo $user_story->project_id;?>&operation=create')"/>
				</div>
				<br>
			</div>
		 </div>
				<?php 
											  	 if($user_story!=null){
											  	 	
													$userStoryStatus = $pmp->getUserStoryStatus($user_story->user_story_id);
													  	 		?>
													  	 		 <div class="row">
													  	 		<div class="col-lg-10" style="color:<?php echo ($user_story->priority=='LOW'?'grey':($user_story->priority=='MEDIUM'?'orange':'red'));?>">
													  	 		<?php echo $user_story->user_story;?>
																
													  	 		</div>
																
													  	 		<div class="col-lg-2">
																<?php $progressBarValue=$userStoryStatus; include("view/structure/progressBar.php"); ?>
												  	 		    </div>
													  	 		<div class="col-lg-2">&nbsp;</div>
													  	 		</div>
													  	 		<?php
											  	 		
																					  	 				
												  	 				//SETP-V Add TO DOS for current Sprint
												  	 				$todos = $pmp->getToDosList($user_story->user_story_id);
												  	 				if($todos!=null){
																	   $serialNo=0;
												  	 					while($todo = mysql_fetch_object($todos)){
												  	 						?>
																			 <div class="row">
																				<div class="col-lg-10"> 
																				<?php  echo ++$serialNo.' : '.$todo->todo_name;?>
																				</div>
																				<div class="col-lg-2">
																				<?php $progressBarValue=$todo->development_status; include("view/structure/progressBar.php"); ?>
																				</div>
																				<div class="col-lg-2">&nbsp;</div>
																			</div>
												  	 						<?php 
												  	 					}
												  	 				}//if
											  	 				
											  	 			
											  	 }//if
				?>
		
