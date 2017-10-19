
<?php $order = new OrderBackingBean();?>

<fieldset>
<legend class="Title"> Project Status</legend>
				<?php 
				   
				if(isset($_GET['pc'])){
					$parent=0;
					$node =0;
					$loc =0;
					$projectId = $_GET['pc'];	
								  	$pmp = new PMPBackingBean();
								  //SETP-II Add Project for current Order
									  $projects = $pmp->getProjectById($projectId);
									  if($projects!=null){
									  	echo "<table border='0'>";
										  while($project = mysql_fetch_object($projects)){
												  	 ?>
												  	 <tr><td colspan="6">&nbsp;</td></tr>
												  	 <tr>
												  	 <td class='Label'>
												  	 <?php echo $project->project_name." [".$project->product_owner."]";?>
												  	 </td>
												  	 <td class="ProgressBar">
												  	 <img id="PS-<?php echo $project->project_id;?>" alt="" src="themes/default/images/progressBar1.png" width="0%" height="10">
												  	 <span id="PDS-<?php echo $project->project_id;?>"></span>
												  	 </td>
												  	 <td>&nbsp;</td>
												  	 <td>&nbsp;</td>
												  	 <td class="Medium"></td>
												  	 </tr>
												  	 <?php
										  	 
										  	     //SETP-III Add User Stories for current Project
										  	 	 $userStoryParent = $loc;
											  	 $user_stories = $pmp->getUserStoriesList($project->project_id);
											  	 $totalUserStories = mysql_num_rows($user_stories);
											  	 $userStoryStatus=0;
											  	 if($user_stories!=null){
											  	 	while($user_story = mysql_fetch_object($user_stories)){
													  	 		?>
													  	 		<tr>
													  	 		<td>&nbsp;</td>
													  	 		<td class='Label-'>
													  	 		<?php echo $user_story->user_story;?>
													  	 		</td>
													  	 		<td class="ProgressBar">
													  	 		    <img id="US-<?php echo $user_story->user_story_id;?>" alt="" src="themes/default/images/progressBar1.png" width="0%" height="10">
													  	 		    <span id="USS-<?php echo $user_story->user_story_id;?>"></span>
													  	 		    </td>
													  	 		<td>&nbsp;</td>
													  	 		<td>&nbsp;</td>
													  	 		</tr>
													  	 		<?php
											  	 		
											  	 		//SETP-IV Add Sprint for current User Story
											  	 		$sprintParent = $loc;
											  	 		$sprints = $pmp->getSprintsList($user_story->user_story_id);
											  	 		$totalSprints = mysql_num_rows($sprints);
											  	 		$sprintStatus=0;
											  	 		if($sprints!=null){
											  	 			while($sprint = mysql_fetch_object($sprints)){
													  	 				?>
													  	 				<tr>
													  	 				<td>&nbsp;</td>
													  	 				<td>&nbsp;</td>
													  	 				<td class='Label-'>Story Point
													  	 				<?php echo $sprint->sprint_name;?>
													  	 				</td>
													  	 				<td class="ProgressBar">
													  	 				<img id="SP-<?php echo $sprint->sprint_id;?>" alt="" src="themes/default/images/progressBar1.png" width="0%" height="10">
													  	 				<span id="SPS-<?php echo $sprint->sprint_id;?>"></span>
													  	 				</td>
													  	 				<td>&nbsp;</td>
													  	 				</tr>
													  	 				<?php
											  	 				
												  	 				//SETP-V Add TO DOS for current Sprint
												  	 				$todoParent = $loc;
												  	 				$todos = $pmp->getToDosList($sprint->sprint_id);
												  	 				$totalTodos = mysql_num_rows($todos);
												  	 				$todoStatus = 0;
												  	 				if($todos!=null){
												  	 					while($todo = mysql_fetch_object($todos)){
												  	 						$todoStatus = $todoStatus+$todo->development_status;
												  	 						?>
																			<tr>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td class='Label-'>TODO 
																				<?php echo $todo->todo_name;?>
																				</td>
																				<td class="ProgressBar"><img alt="" src="themes/default/images/progressBar1.png" width="<?php echo $todo->development_status;?>%" height="10">
																				<?php echo $todo->development_status;?>%
																				</td>
																			</tr>
												  	 						<?php 
												  	 					}
												  	 					if($todoStatus>0){
												  	 					$sprintStatus = $sprintStatus+($todoStatus/$totalTodos);
												  	 					}
												  	 					?>
												  	 					<script>
												  	 					document.getElementById("SP-<?php echo $sprint->sprint_id;?>").style.width="<?php echo $todoStatus/$totalTodos;?>%" ;
												  	 					document.getElementById("SPS-<?php echo $sprint->sprint_id;?>").innerHTML = "<?php echo $todoStatus/$totalTodos;?>%";

												  	 					document.getElementById("US-<?php echo $sprint->user_story_id;?>").style.width="<?php echo $sprintStatus/$totalSprints;?>%" ;
												  	 					document.getElementById("USS-<?php echo $sprint->user_story_id;?>").innerHTML = "<?php echo $sprintStatus/$totalSprints;?>%";
												  	 					</script>
												  	 					<?php
												  	 					
												  	 				}//if
											  	 				
											  	 			}
											  	 	if($sprintStatus>0){
											  	 	$userStoryStatus = $userStoryStatus+($sprintStatus/$totalSprints);
											  	 	}
											  	 	?>
											  	 	<script>
											  	 	document.getElementById("PS-<?php echo $project->project_id;?>").style.width="<?php echo $userStoryStatus/$totalUserStories;?>%" ;
											  	 	document.getElementById("PDS-<?php echo $project->project_id;?>").innerHTML = "<?php echo $userStoryStatus/$totalUserStories;?>%";
											  	 	</script>
											  	 	<?php
											  	 }//if
											  	 		
											  	 	}
											  	 	
											  	 }//if
										  	 
										  }
										  echo "</table>";
									  }//if
				  }
				
				?>
		</fieldset>
		
