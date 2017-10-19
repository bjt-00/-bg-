
<?php $order = new OrderBackingBean();?>

<fieldset>
<legend class="Title">Sprint Status</legend>
				<?php 
				   
				if(isset($_GET['sp'])){
					$parent=0;
					$node =0;
					$loc =0;
					$sprintId = $_GET['sp'];	
								  	$pmp = new PMPBackingBean();
									 
									  	echo "<table border='0'>";
											  	 		//SETP-IV Add Sprint for current User Story
											  	 		$sprintParent = $loc;
											  	 		$sprints = $pmp->getSprintById($sprintId);
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
														  	 }//if
											  	 		
											  	 	}
											  	 	
										  	 
										  echo "</table>";
									  					
				?>
		</fieldset>
		
