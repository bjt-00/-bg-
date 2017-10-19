 
 <?php 
 
 global  $action;
   class PMPBackingBean{
   	// = "index.php?action=home";
   	  function validate(){
	   	  		$fromDate = $_POST['fromYear'].'-'.$_POST['fromMonth'].'-'.$_POST['fromDay'];
	   	  		$toDate = $_POST['toYear'].'-'.$_POST['toMonth'].'-'.$_POST['toDay'];
	   	  		global  $action;
	   	  		//validate
	   	  		$validator="<ul class='Error'>";
	   	  		$errors='';
	   	  		if($fromDate==$toDate){
	   	  			$errors =$errors."<li class='Error'>To Date ".$toDate.' can not equalent to From Date '.$fromDate.'</li>';
	   	  		}
	   	  		if($_POST['budget']==''){
	   	  			$errors =$errors."<li class='Error'>Budget is required</li>";
	   	  		}
	   	  		if($_POST['phone']==''){
	   	  			$errors =$errors."<li class='Error'>Phone is required</li>";
	   	  		}
	   	  		if($_POST['email']==''){
	   	  			$errors =$errors."<li class='Error'>Email is required</li>";
	   	  		}
	   	  		$validator =$errors.'</ul>';
	   	  		
	   	  		
	   	  	
	   	  		$values ="0,'".$_POST['service']."','".
	   	  		$_POST['technology']."','".
	   	  		$fromDate."','".
	   	  		$toDate."',".
	   	  		$_POST['budget'].",'".
	   	  		$_POST['currency']."','".
	   	  		$_POST['phone']."','".
	   	  		$_POST['email']."','".
	   	  		$_POST['description']."'";
	   	  		//printf($serviceRequest);
	   	  		//printf("<br><span style='color:green;font-weight:bold'>Service request placed successfully</span>");
	   	  		if($errors==''){
	   	  			$query ="INSERT INTO orders VALUES(".$values.",true,false,false,false,false)";
	   	  			$dataAccess = new DataAccess();
	   	  			try{
	   	  			//save order in db
	   	  			$id =$dataAccess->executeQuery($query);
	   	  			
	   	  			$query ="INSERT INTO development_status VALUES(".$id.",0,0,0,0)";
	   	  			$dataAccess->executeQuery($query);
	   	  			
	   	  			$query ="INSERT INTO payment_status VALUES(".$id.",0,0,0,".$_POST['budget'].")";
	   	  			$dataAccess->executeQuery($query);
	   	  			
	   	  			// show message
	   	  			$message = "<span style='color:green;size:15px'>Your order placed successfully.".
	 	   	  			" An email is sent to you with order details.".
	 	   	  			" With in 24 hours bitguiders representative will contact you.".
	   	  			' your order code is <b>'.$id."</b>.this code is important".
	   	  			" you can check your online order status by this code<span>";
	   	  			
	   	  			echo $message;
	   	  			
	   	  			$message = "<span style='color:green;size:15px'>Your order placed successfully.".
	   	  					" With in 24 hours bitguiders representative will contact you.".
	   	  					' your order code is <b>'.$id."</b>.this code is important".
	   	  					" you can check your online order status by this code<span>";
	   	  			
	   	  			//send order mail to bitguiders representative
	   	  			$messageBody = 	
	   	  			"Order Code: ".$id.
	   	  			"Service: ".$_POST['service'].
	   	  			"Technology: ".$_POST['technology'].
	   	  			"From Date: ".$fromDate."','".
	   	  			"To Date: ".$toDate."',".
	   	  			"Budget: ".$_POST['budget'].
	   	  			"Currency: ".$_POST['currency'].
	   	  			"Phone: ".$_POST['phone'].
	   	  			"Email: ".$_POST['email'].
	   	  			"Description: ".$_POST['description'];
	   	  			
	   	  			$emailTransmitter = new EmailTransmitter();
	   	  			$emailTransmitter->mail("",$_POST['email'].",bitguiders@gmail.com","bitguiders ::: Your order placed successfully.", $message);
	   	  			
	   	  			
	   	  			//header("Location: index.php?action=sendMail&messageBody=".$messageBody."&message=".$message);
	  	  			}catch (Exception $e){
	   	  				echo $e->getMessage();
	   	  			}
	   	  			//printf("-------------------");
	   	  		}else{
	   	  			printf($validator);
	   	  			//header("Location: index.php?action=home");
	   	  		}
   	  }
   	  function getProjectById($projectId){
   	  	$query="select * from pmp_projects where project_id=".$projectId;
   	  		$result = $this->getResult($query);
   	  		return $result;
   	  }
   	  
   	  function getProjectsList($orderId){
   	  	$query=null;
	   	  		$query="select * from pmp_projects where order_id=".$orderId;

		if ($query!=null){
   	  	$result = $this->getResult($query);
   	  	return $result;
		}
		return null;
   	  }
   	  function getProjectByOrderId($orderId){
   	  	$result = $this->getProjectsList($orderId);
		if($result!=null){
		  while($project = mysql_fetch_object($result)){ 
		     return $project;
		  }
		}         
		return null;
   	  }

	   function updateAgreement($projectId){
   	  	$query=null;
   	  	$query="update pmp_projects set project_short_name='".$_POST['projectShortName']."' ,project_name='".$_POST['projectName']."' ,product_owner='".$_POST['productOwner']."' ,agreement_date='".$_POST['agreementDate']."' where project_id=".$projectId;
   	  	$this->executeQuery($query);
   	  	$_SESSION['message'] = $_POST['projectShortName'].' is updated successfully';
			
   	  }
//ya wahido / ya ahad
   	  function deleteProject($projectId){
	  
		//delete all user stories
		$userStories = $this->getUserStoriesList($projectId);
		while($userStory = mysql_fetch_object($userStories)){
			//delete all todos
			$todosList = $this->getToDosList($userStory->user_story_id);
			while($todo = mysql_fetch_object($todosList)){
			   $query ="delete from pmp_sprits where todo_id=".$todo->todo_id;
			   $this->executeQuery($query);
			}
				    $query ="delete from pmp_todos where user_story_id=".$userStory->user_story_id;
					$this->executeQuery($query);
		}

					$query ="delete from pmp_user_stories_status where project_id=".$projectId;
					$this->executeQuery($query);
					
					$query ="delete from pmp_user_stories where project_id=".$projectId;
					$this->executeQuery($query);
						
					$query ="delete from pmp_projects where project_id=".$projectId;
					$this->executeQuery($query);
					$_SESSION['warning'] = 'selected is deleted successfully';
	  }
   	  function getUserStoriesList($projectId){
   	  	$query=null;
   	  	$query="select * from pmp_user_stories where project_id=".$projectId;
   	  	return $this->getResult($query);
   	  }
   	  function getUserStoryById($userStoryId){
   	  	$query=null;
   	  	$query="select * from pmp_user_stories where user_story_id=".$userStoryId;
   	  	return $this->getResult($query);
   	  }
   	  function getSprintById($sprintId){
   	  	$query=null;
   	  	$query="select * from pmp_sprints where sprint_id=".$sprintId;
   	  	return $this->getResult($query);
   	  }
   	  
   	  function getSprintsList($userStoryId){
   	  	$query=null;
   	  	$query="select * from pmp_sprints where todo_id=".$userStoryId;
   	  	return $this->getResult($query);
   	  }
   	  function getToDoById($todoId){
   	  	$query=null;
   	  	$query="select * from pmp_todos where todo_id=".$todoId;
   	  	return $this->getResult($query);
   	  }
 	  
   	  function getToDosList($userStoryId){
   	  	$query=null;
   	  	$query="select * from pmp_todos where user_story_id=".$userStoryId;
   	  	return $this->getResult($query);
   	  }
	   function createUserStory($projectId){
   	  	$query="insert into pmp_user_stories values(0,".$projectId.",'".$_POST['priority']."' ,'".$_POST['userStory']."','".$_POST['description']."' ,'".$_POST['attachementPath']."')";
		$this->executeQuery($query);
		$_SESSION['message']=$_POST['userStory'].' is created successfully';
   	  }
	   function updateUserStory($userStoryId){
   	  	$query="update pmp_user_stories set priority='".$_POST['priority']."' , user_story='".$_POST['userStory']."',description='".$_POST['description']."' ,attachement_path='".$_POST['attachementPath']."' where user_story_id=".$userStoryId;
		$this->executeQuery($query);
		$_SESSION['message']=$_POST['userStory'].' is updated successfully';
   	  }
	   function deleteUserStory($userStoryId){
   	  	$query="delete from pmp_user_stories where user_story_id=".$userStoryId;
		$this->executeQuery($query);
		$_SESSION['warning']=$_POST['userStory'].' is deleted successfully';
   	  }
	   function createTodo(){
   	  	$query="insert into pmp_todos values(0,".$_POST['userStoryId'].",'".$_POST['todoName']."' ,'".$_POST['startDate']."','".$_POST['endDate']."' ,'".$_POST['actualStartDate']."','".$_POST['actualEndDate']."','".$_POST['assignedTo']."','".$_POST['issue']."','".$_POST['description']."',".$_POST['developmentStatus'].")";
		$this->executeQuery($query);
		$_SESSION['message']=$_POST['todoName'].' is created successfully';
   	  }
	   function updateTodo($todoId){
   	  	$query="update pmp_todos set todo_name='".$_POST['todoName']."' ,start_date='".$_POST['startDate']."',end_date='".$_POST['endDate']."' ,actual_start_date='".$_POST['actualStartDate']."',actual_end_date='".$_POST['actualEndDate']."',assigned_to='".$_POST['assignedTo']."',issue='".$_POST['issue']."',description='".$_POST['description']."',development_status=".$_POST['developmentStatus']." where todo_id=".$todoId;
		$this->executeQuery($query);
		$_SESSION['message']=$_POST['todoName'].' is updated successfully';
   	  }
	   function deleteTodo($todoId){
   	  	$query="delete from pmp_todos where todo_id=".$todoId;
		$this->executeQuery($query);
		$_SESSION['warning']=$_POST['todoName'].' is deleted successfully';
   	  }

	  function getUserStoryStatus($userStoryId){
  	  	$query="SELECT (sum(development_status)/count(*)) as status  FROM `pmp_todos` where user_story_id=".$userStoryId;
		$result = $this->getResult($query);
		if($result!=null){
	      while($row = mysql_fetch_object($result)){
			return $row->status;
			}
		}	
			return 0;									
	  }
	  function getProjectStatus($projectId){
	  $projectStatus=0;
	  $count=0;
  	  	$query="SELECT (sum(status)/count(*)) as status  FROM pmp_user_stories_status where project_id=".$projectId;
		$result = $this->getResult($query);
		if($result!=null){
	      while($row = mysql_fetch_object($result)){
			$projectStatus = $projectStatus+$row->status;
			$count++;
			}
		}	
			return $projectStatus/$count;									
	  }

	  function executeQuery($query){
  	  		$dataAccess = new DataAccess();
   	  		$dataAccess->executeQuery($query);	  
	  }   	  
   	  function getResult($query){
    	  	if ($query!=null){
   	  		$dataAccess = new DataAccess();
   	  		$result = $dataAccess->getResult($query);
   	  		return $result;
   	  	}
		return null;
	  }   	  

   }
 ?>