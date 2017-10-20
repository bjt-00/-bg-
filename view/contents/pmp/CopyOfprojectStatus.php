
<?php $order = new OrderBackingBean();?>

<fieldset>
<legend class="Title"> Project Status</legend>
				<?php 
				   
				if(isset($_GET['oc'])){
					$parent=0;
					$node =0;
					$loc =0;
					$orderId = $_GET['oc'];					
								  	$pmp = new PMPBackingBean();
								  //SETP-II Add Project for current Order
									  $projects = $pmp->getProjectsList($orderId);
									  if($projects!=null){
									  	echo "<table border='0'>";
										  while($project = mysql_fetch_object($projects)){
												  	 ?>
												  	 <tr><td colspan="6">&nbsp;</td></tr>
												  	 <tr>
												  	 <td class='Label'>
												  	 <?php echo $project->project_name." [".$project->product_owner."]";?>
												  	 </td>
												  	 <td class="ProgressBar"><img alt="" src="themes/default/images/progressBar1.png" width="<?php echo 55;?>%" height="10"></td>
												  	 <td>&nbsp;</td>
												  	 <td>&nbsp;</td>
												  	 <td class="Medium"></td>
												  	 </tr>
												  	 <?php
										  	 
										  	     //SETP-III Add User Stories for current Project
										  	 	 $userStoryParent = $loc;
											  	 $user_stories = $pmp->getUserStoriesList($project->project_id);
											  	 if($user_stories!=null){
											  	 	while($user_story = mysql_fetch_object($user_stories)){
													  	 		?>
													  	 		<tr>
													  	 		<td>&nbsp;</td>
													  	 		<td class='Label-'>
													  	 		<?php echo $user_story->user_story;?>
													  	 		</td>
													  	 		<td class="ProgressBar"><img alt="" src="themes/default/images/progressBar1.png" width="<?php echo 55;?>%" height="10"></td>
													  	 		<td>&nbsp;</td>
													  	 		<td>&nbsp;</td>
													  	 		</tr>
													  	 		<?php
											  	 		
											  	 		//SETP-IV Add Sprint for current User Story
											  	 		$sprintParent = $loc;
											  	 		$sprints = $pmp->getSprintsList($user_story->user_story_id);
											  	 		if($sprints!=null){
											  	 			while($sprint = mysql_fetch_object($sprints)){
													  	 				?>
													  	 				<tr>
													  	 				<td>&nbsp;</td>
													  	 				<td>&nbsp;</td>
													  	 				<td class='Label-'>Story Point
													  	 				<?php echo $sprint->sprint_name;?>
													  	 				</td>
													  	 				<td class="ProgressBar"><img alt="" src="themes/default/images/progressBar1.png" width="<?php echo 46;?>%" height="10"></td>
													  	 				<td>&nbsp;</td>
													  	 				</tr>
													  	 				<?php
											  	 				
												  	 				//SETP-V Add TO DOS for current Sprint
												  	 				$todoParent = $loc;
												  	 				$todos = $pmp->getToDosList($sprint->sprint_id);
												  	 				if($todos!=null){
												  	 					while($todo = mysql_fetch_object($todos)){
												  	 						?>
																			<tr>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td class='Label-'>TODO 
																				<?php echo $todo->todo_name;?>
																				</td>
																				<td class="ProgressBar"><img alt="" src="themes/default/images/progressBar1.png" width="<?php echo $todo->development_status;?>%" height="10"></td>
																			</tr>
												  	 						<?php 
												  	 					}
												  	 				}//if
											  	 				
											  	 			}
											  	 		}//if
											  	 		
											  	 	}
											  	 }//if
										  	 
										  }
										  echo "</table>";
									  }//if
				  }
				
				?>
		</fieldset>
		
