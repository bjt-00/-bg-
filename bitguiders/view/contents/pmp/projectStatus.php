		<div class="row">
		  <div class="col-lg-12">
			<span class="PageTitle">Project Status</span>
				<div class="Title"></div>
				<br>
			</div>
		 </div>

<?php $order = new OrderBackingBean();?>

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
										  while($project = mysql_fetch_object($projects)){
										  
												  	 ?>
												  	 
												  	 <div class="row">
												  	    <div class="col-lg-10">
												  	        <?php echo $project->project_name;?>
												  	     </div>
													   <div class="col-lg-2">													  	 
													 <?php 
													 $projectStatus = $pmp->getProjectStatus($projectId);
													 $progressBarValue=$projectStatus; 
													 include("view/structure/progressBar.php"); ?>
												  	 </div>
												  	 </div>
												  	 <?php
										  	 
										  	     //SETP-III Add User Stories for current Project
											  	 $user_stories = $pmp->getUserStoriesList($project->project_id);
											  	 if($user_stories!=null){
												 $serialNo=0;
											  	 	while($user_story = mysql_fetch_object($user_stories)){
													       $userStoryStatus = $pmp->getUserStoryStatus($user_story->user_story_id);
														   $userStoryStatus =($userStoryStatus!=null?$userStoryStatus:0);
													  	 		?>
													  	 		<div class="row">
													  	 		<div class="col-lg-10">
													  	 		<?php echo ++$serialNo.' : '.$user_story->user_story;?>
													  	 		</div>
													  	 		<div class="col-lg-2">
																<?php $progressBarValue=$userStoryStatus; include("view/structure/progressBar.php"); ?>
													  	 		 </div>
													  	 		</div>
						  	 					<?php
													}}//user stories
										  }
									  }//if
				  }
				
				?>
		
