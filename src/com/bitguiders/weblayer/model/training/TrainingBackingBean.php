 
 <?php 
 
 global  $action;
   class TrainingBackingBean{
    	  function registerNow(){
   	  	$fromDate ='0000-00-00';
   	  	$toDate   ='0000-00-00';
   	  	$values ="0,'".$_POST['service']."','".
   	  			$_POST['technology']."','".
   	  			$fromDate."','".
   	  			$toDate."',".
   	  			$_POST['budget'].",'".
   	  			$_POST['currency']."','".
   	  			$_POST['phone']."','".
   	  			$_POST['email']."','".
   	  			$_POST['description']."'";
   	  	
   	  	try{
   	  	$query ="INSERT INTO orders VALUES(".$values.",true,false,false,false,false)";
   	  	$dataAccess = new DataAccess();
   	  	
   	  	$id =$dataAccess->executeQuery($query);
	   	  			$query ="INSERT INTO pmp_projects VALUES(0,".$id.",'".$_POST['technology']."','".$_POST['service']."','Your Name','','Training')";
	   	  			$dataAccess->executeQuery($query);
	   	  			
	   	  			$query ="INSERT INTO development_status VALUES(".$id.",0,0,0,0)";
	   	  			$dataAccess->executeQuery($query);
	   	  			
	   	  			$query ="INSERT INTO payment_status VALUES(".$id.",0,0,0,".$_POST['budget'].")";
	   	  			$dataAccess->executeQuery($query);

	   	  			$query ="INSERT INTO user VALUES('0','".$_POST['email']."','".$id."','Trainee','".$id."','1')";
	   	  			$dataAccess->executeQuery($query);
   	  	   	  	// show message
   	  	$message = "Your Training course is registered successfully.".
   	  			" You will receive registration confirmation email with details of your training".
   	  			"  and password to track its Training.";
   	  	$_SESSION['message'] = $message;
   	  	
   	  	$message = "<span style='color:green;size:15px'>Your training is placed successfully.".
   	  			" With in 24 hours bitguiders representative will contact you.".
   	  			' your order code is <b>'.$id."</b>.this code is important".
   	  			" you can check your online order status by this code<span>";
   	  	
   	  	
   	  	
   	  	//send order mail to bitguiders representative
   	  	
   	  	$messageBody ="<table width='100%'>
				 		<tr>
				 			<td style='font-weight:bold;'>Order Code</td>
				 			<td>".$id."</td>
				 			<td style='font-weight:bold;'>Price</td>
				 			<td>".$_POST['budget'].$_POST['currency']."</td>
				 		</tr>
				 		<tr>
				 			<td style='font-weight:bold;'>Training Code</td>
				 			<td>".$_POST['service']."</td>
				 			<td style='font-weight:bold;'>Technology</td>
				 			<td>".$_POST['technology']."</td>
				 		</tr>
				 		<tr>
				 			<td style='font-weight:bold;'>Phone</td>
				 			<td>".$_POST['phone']."</td>
				 			<td style='font-weight:bold;'>Email</td>
				 			<td>".$_POST['email']."</td>
				 		</tr>
				 		<tr>
				 			<td style='font-weight:bold;' valign='top'>Comments</td>
				 			<td valign='top' colspan='3'>".$_POST['description']."</td>
				 		</tr>
				 	</table>
	   	  			";
   	  	//https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=DNB4QB9XHGYJ2&lc=AE&item_name=JEE&item_number=BJT-01&amount=200&currency_code=USD&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fwww%2ebitguiders%2ecom%2ftraining%2ephp%3fpayment%3daccepted&cancel_return=https%3a%2f%2fwww%2ebitguiders%2ecom%2ftraining%2ephp%3fpayment%3dcanceled&bn=PP%2dBuyNowBF%3apayNow%2epng%3aNonHosted
   	  	$paymentLink = 'https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=DNB4QB9XHGYJ2&lc=AE&item_name='.$_POST['technology'].'&item_number='.$_POST['service'].'&amount='.$_POST['budget'].'%2e00&currency_code=USD&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fwww%2ebitguiders%2ecom%2ftraining%2ephp%3fpayment%3daccepted&cancel_return=https%3a%2f%2fwww%2ebitguiders%2ecom%2ftraining%2ephp%3fpayment%3dcanceled&bn=PP%2dBuyNowBF%3apayNow%2epng%3aNonHosted';
   	  	$emailTransmitter = new EmailTransmitter();
   	  	$messageTemplate = $emailTransmitter->getTemplate('registrationConfirmationTemplate');
   	  	$messageTemplate = str_replace("<ORDER_NO>", $id, $messageTemplate);
   	  	$messageTemplate = str_replace("<ORDER_DETAILS>", $messageBody, $messageTemplate);
   	  	$messageTemplate = str_replace("<PAYMENT_LINK>", $paymentLink, $messageTemplate);
   	  	//echo $messageTemplate;
   	  	$emailTransmitter->mail("info@bitguiders.com",$_POST['email'].",bitguiders@gmail.com","bitguiders ::: Your order [ Code '".$id."'] placed successfully.", $messageTemplate);
   	  	//$emailTransmitter->mail($_POST['email'],"bitguiders@bitguiders.com","bitguiders ::: Your order [ Code '".$id."'] placed successfully.", $messageTemplate);
   	  	
   	  	
   	  	//header("Location: index.php?action=sendMail&messageBody=".$messageBody."&message=".$message);
   	  	}catch (Exception $e){
   	  		echo $e->getMessage();
   	  	}
   	  		
   	  		
   	  }
   	  function getOrderStatus(){
   	  	$query=null;
   	  	$errors='';
   	  	$orderCode=null;
   	  	
		 if(isset($_SESSION['userId'])){
		 	
		 	 if(isset($_GET['orderCode'])){
		 		$orderCode =$_GET['orderCode'];
		 	}else if(isset($_SESSION["orderCode"])){
		 		$orderCode =$_SESSION['orderCode'];
		 	}
		 	
	   	  	//validate
	   	  	$validator="<ul>";
	   	  	
	   	  	if($_SESSION['orderCode']==''){
	   	  		$errors =$errors."<li class='Error'>Order code is required</li>";
	   	  	}
	   	  	if($_SESSION['userId']==''){
	   	  		$errors =$errors."<li class='Error'>Please Log in again, Session expired</li>";
	   	  	}
	   	  	$validator =$errors.'</ul>';
   	  	}
   	  	
 			
   	  	if($errors==''){
   	  		
		    if(isset($_SESSION['email']) && $_SESSION['email']=='info@bitguiders.com'){
   	  		$query="select * from orders where order_id=".$orderCode."";
			}else{
			$query="select * from orders  where order_id=".$orderCode." and email='".$_SESSION['email']."'";
			}
   	  	}else{
   	  		printf($validator);
   	  		//header("Location: index.php?action=home");
   	  	}
   	  	//echo $query;
		if ($query!=null){
   	  	$dataAccess = new DataAccess();
   	  	$result = $dataAccess->getResult($query);
   	  	$rows = ($result != null?mysql_num_rows($result):0); 
   	  	if($rows==0){
   	  		$_SESSION['errors']= "No Service Agreement found ";
   	  		return null;
   	  	}
   	  	return $result;
		}
		return null;
   	  }
   	  
   	  function getTrainingDetailsByOrderId($orderId){
   	  	
   	  		$query="SELECT * FROM training_schedule ts JOIN training tg on tg.training_code=ts.training_code JOIN trainer  tr on tr.trainer_id=ts.trainer_id JOIN orders o on o.order_id=ts.order_id  where ts.order_id=".$orderId;
   	  		
   	  		$dataAccess = new DataAccess();
   	  		$result = $dataAccess->getResult($query);
   	  		$training = mysql_fetch_object($result);
   	  		return $training;
   	  }
   	  	function assignTrainer(){
   	  		//delete existing schedule for same order code
   	  		$query="delete from training_schedule where training_code='".$_POST['trainingCode']."' and order_id=".$_POST['orderCode'];
   	  		$this->executeQuery($query);
   	  		//update schedule dates
   	  		$query="update orders set from_date='".$_POST['fromDate']."',to_date='".$_POST['toDate']."' where order_id=".$_POST['orderCode'];
   	  		$this->executeQuery($query);
   	  		
   	  		$query="insert into training_schedule values('".$_POST['trainingCode']."','".$_POST['trainerId']."','".$_POST['orderCode']."')";
   	  		$this->executeQuery($query);
   	  		$_SESSION['message'] = 'Trainner is assigned successfully';
   	  	}
   	  		
  	  function orderClosed($orderId){
   	  		$query="update orders set order_closed=1 where order_id=".$orderId;
   	  		$this->executeQuery($query);	
   	  		$_SESSION['warning'] = 'Agreement is canceled/closed';
	  }   	  

   	  function executeQuery($query){
  	  		$dataAccess = new DataAccess();
   	  		$dataAccess->executeQuery($query);	  
	  }   	  

  }
 ?>