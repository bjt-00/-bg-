 <?php include 'src/com/bitguiders/weblayer/model/mail/EmailTransmitter.php';?>

 
 <?php 
 
 global  $action;
   class OrderBackingBean{

   	function resetOrders(){
   		unset($_SESSION['ordersList']);
   		$_SESSION['message'] ="Order Reset completed successfully";
   		header("location:?action=bpos");
   	}
   	function createNewOrder(){
        if(!isset($_SESSION['orderCounter'])){
        	$_SESSION['orderCounter'] = 0;
        }
        //create new order
        $_SESSION['orderCounter'] =$_SESSION['orderCounter']+1;
   		$newOrder = array();
   		$itemsList = array();
   		$newOrder[0] = $_SESSION['orderCounter'];
   		$newOrder[1] = $itemsList;
   		
   		//add order in orders list
   		$ordersList = $_SESSION['ordersList'];
   		$ordersList[] = $newOrder;
   		$_SESSION['ordersList']=$ordersList;
   		
   		$_SESSION['message'] ="New Order created successfully";
   		header("location:?action=bpos&currentOrder=".$_SESSION['orderCounter']);
   	}
   	
   	function addNewItem(){
   		if($_GET['currentOrder']==0){
   			$this->createNewOrder();
   			$_GET['currentOrder']=$_SESSION['orderCounter'];
   		}
   		 
   		$order  = array();
   		$order[0]=$_GET['itemName'];
   		$order[1]='1';
   		$order[2]='50';
   		$order[3]=$order[1]*$order[2];
   		
   		
   		for($i=0;$i<count($_SESSION['ordersList']);$i++){
   			if($_GET['currentOrder']==$_SESSION['ordersList'][$i][0]){
   				$itemsList = $_SESSION['ordersList'][$i][1];
   				$isItemFound=false;
   				//search if order already exists
   				for($j=0;$j<count($itemsList);$j++){
   					if($itemsList[$j][0]==$_GET['itemName']){
   						$itemsList[$j][1]=$itemsList[$j][1]+1;
   						$itemsList[$j][3]=$itemsList[$j][1]*$itemsList[$j][2];
   						$isItemFound=true;
   					}
   					
   				}
   				//if item not already exists then add new one
   				if(!$isItemFound){
   				$itemsList[] = $order;
   				}
   				$_SESSION['ordersList'][$i][1]=$itemsList;
   			}
   		}
   		$_SESSION['message'] ="New Item added successfully";
   		header("location:?action=bpos&currentOrder=".$_GET['currentOrder']);
   	}
   	function deleteItem(){
   		
   		for($i=0;$i<count($_SESSION['ordersList']);$i++){
   			if($_GET['currentOrder']==$_SESSION['ordersList'][$i][0]){
   				$itemsList = $_SESSION['ordersList'][$i][1];

   				//search if order already exists
   				$newItemsList = array();
   				for($j=0;$j<count($itemsList);$j++){
   					if($itemsList[$j][0]!=$_GET['itemName']){
   						$newItemsList[] = $itemsList[$j];
   					}
   	
   				}
   				$_SESSION['ordersList'][$i][1]=$newItemsList;
   			}
   		}
   		$_SESSION['message'] ="Selected Item deleted successfully";
   		header("location:?action=bpos&currentOrder=".$_GET['currentOrder']);
   	}
   	
   	// = "index.php?action=home";
   	  function validate(){
	   	  		$fromDate = $_POST['fromYear'].'-'.$_POST['fromMonth'].'-'.$_POST['fromDay'];
	   	  		$toDate = $_POST['toYear'].'-'.$_POST['toMonth'].'-'.$_POST['toDay'];
	   	  		global  $action;
	   	  		//validate
	   	  		$validator="<ul>";
	   	  		$errors='';
	   	  		if($fromDate==$toDate){
	   	  			$errors =$errors."<li class='Error'>To Date ".$toDate.' can not equalent to From Date '.$fromDate.'</li>';
	   	  		}
	   	  		if($_POST['budget']==''){
	   	  			$errors =$errors."<li class='Error'>Budget is required</li>";
	   	  		}else{
	   	  			
	   	  			  	$options = array(
	   	  				'options' => array(
	   	  						'min_range' => 0
	   	  				)
	   	  		);
	   	  		
	   	  		if (!filter_var($_POST['budget'], FILTER_VALIDATE_INT, $options)) {
	   	  			$errors =$errors."<li class='Error'>Invalid Budget ".$_POST['budget']." </li>";
	   	  		}
	   	  		}
	   	  		if($_POST['phone']==''){
	   	  			$errors =$errors."<li class='Error'>Phone is required</li>";
	   	  		}else{
	   	  			
					if(!preg_match('/^\(?[0-9]{3}\)?|[0-9]{3}[-. ]? [0-9]{3}[-. ]?[0-9]{4}$/', $_POST['phone'])) {
	   	  			$errors =$errors."<li class='Error'>Invalid Phone ".$_POST['phone']." </li>";
	   	  		}
	   	  		}
	   	  		 if($_POST['email']==''){
	   	  			$errors =$errors."<li class='Error'>Email is required</li>";
	   	  		}else{ 
	   	  			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	   	  				$errors =$errors."<li class='Error'>Invalid Email ".$_POST['email']."</li>";
	   	  			}
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

	   	  			$query ="INSERT INTO pmp_projects VALUES(0,".$id.",'Your Project Name','Project Short Name','Your Name','','".$_POST['description']."')";
	   	  			$dataAccess->executeQuery($query);
	   	  			
	   	  			$query ="INSERT INTO development_status VALUES(".$id.",0,0,0,0)";
	   	  			$dataAccess->executeQuery($query);
	   	  			
	   	  			$query ="INSERT INTO payment_status VALUES(".$id.",0,0,0,".$_POST['budget'].")";
	   	  			$dataAccess->executeQuery($query);

	   	  			$query ="INSERT INTO user VALUES('0','".$_POST['email']."','".$id."','Product Owner','".$id."','1')";
	   	  			$dataAccess->executeQuery($query);
	   	  			
	   	  			// show message
	   	  			$message = "Your order placed successfully.".
	 	   	  			" You will receive an order confirmation email with details of your order".
	 	   	  			"  and order code to track its progress.";
	   	  			$_SESSION['message'] = $message;
	   	  			
	   	  			$message = "<span style='color:green;size:15px'>Your order placed successfully.".
	   	  					" With in 24 hours bitguiders representative will contact you.".
	   	  					' your order code is <b>'.$id."</b>.this code is important".
	   	  					" you can check your online order status by this code<span>";
	   	  			
	   	  			
	   	  			
	   	  			//send order mail to bitguiders representative

	   	  			$messageBody ="<table width='100%'>
				 		<tr>
				 			<td style='font-weight:bold;'>Order Code</td>
				 			<td>".$id."</td>
				 			<td style='font-weight:bold;'>Budget</td>
				 			<td>".$_POST['budget'].$_POST['currency']."</td>
				 		</tr>
				 		<tr>
				 			<td style='font-weight:bold;'>Service</td>
				 			<td>".$_POST['service']."</td>
				 			<td style='font-weight:bold;'>Technology</td>
				 			<td>".$_POST['technology']."</td>
				 		</tr>
				 		<tr>
				 			<td style='font-weight:bold;'>From Date</td>
				 			<td>".$fromDate."</td>
				 			<td style='font-weight:bold;'>To Date</td>
				 			<td>".$toDate."</td>
				 		</tr>
				 		<tr>
				 			<td style='font-weight:bold;'>Phone</td>
				 			<td>".$_POST['phone']."</td>
				 			<td style='font-weight:bold;'>Email</td>
				 			<td>".$_POST['email']."</td>
				 		</tr>
				 		<tr>
				 			<td style='font-weight:bold;' valign='top'>Description</td>
				 			<td valign='top' colspan='3'>".$_POST['description']."</td>
				 		</tr>
				 	</table>
	   	  			";
	   	  			
	   	  			$emailTransmitter = new EmailTransmitter();
	   	  			$messageTemplate = $emailTransmitter->getTemplate('orderConfirmationTemplate');
	   	  			$messageTemplate = str_replace("<ORDER_NO>", $id, $messageTemplate);
	   	  			$messageTemplate = str_replace("<ORDER_DETAILS>", $messageBody, $messageTemplate);
	   	  			
	   	  			//echo $messageTemplate;
	   	  			$emailTransmitter->mail("info@bitguiders.com",$_POST['email'].",bitguiders@gmail.com","bitguiders ::: Your order [ Code '".$id."'] placed successfully.", $messageTemplate);
	   	  			//$emailTransmitter->mail($_POST['email'],"bitguiders@bitguiders.com","bitguiders ::: Your order [ Code '".$id."'] placed successfully.", $messageTemplate);
	   	  			
	   	  			
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
   	  	$paymentLink = 'https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=DNB4QB9XHGYJ2&lc=AE&item_name='.$_POST['technology'].'&item_number='.$_POST['service'].'&amount='.$_POST['budget'].'%2e00&currency_code=USD&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fwww%2ebitguiders%2ecom%2forderstatus%2ephp%3fpayment%3daccepted&cancel_return=https%3a%2f%2fwww%2ebitguiders%2ecom%2forderstatus%2ephp%3fpayment%3dcanceled&bn=PP%2dBuyNowBF%3apayNow%2epng%3aNonHosted';
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
   	  
   	  function getOrdersList(){
   	  	
   	  		$query="select * from orders as o join pmp_projects as pp on pp.order_id = o.order_id order by o.order_id desc";
   	  		$dataAccess = new DataAccess();
   	  		$result = $dataAccess->getResult($query);
   	  		return $result;
   	  }
   	  function delete(){
   	  	if(isset($_POST['delete'])){
   	  		
   	  		$dataAccess = new DataAccess();
 

   	  		//delete project
   	  		$projectId = "(select project_id pmp_projects where order_id=".$_POST['orderCode'].")";
   	  		
   	  		$query="delete from pmp_user_stories where project_id=".$projectId;
   	  		$dataAccess->executeQuery($query);
   	  		
   	  		$query="delete from pmp_user_stories_status where project_id=".$projectId;
   	  		$dataAccess->executeQuery($query);
   	  		
   	  		$query="delete from pmp_projects where order_id=".$_POST['orderCode'];
   	  		$dataAccess->executeQuery($query);

   	  		$query="delete from orders where order_id=".$_POST['orderCode'];
   	  		$dataAccess->executeQuery($query);
   	  		
   	  	}}
   	  
   	  function agreementReviewed($orderId){
   	  		$query="update orders set order_reviewed=1 where order_id=".$orderId;
   	  		$this->executeQuery($query);	
   	  		$_SESSION['message'] = 'Agreement is updated successfully';  
	  }   	  
  	  function agreementSigned($orderId){
   	  		$query="update orders set aggreement_signed=1 where order_id=".$orderId;
   	  		$this->executeQuery($query);	  
   	  		$_SESSION['message'] = 'Thanks for signing Agreement';
	  }   	  
     function agreementReopen($orderId){
   	  		$query="update orders set order_closed=0 where order_id=".$orderId;
   	  		$this->executeQuery($query);	
   	  		$_SESSION['message'] = 'Agreement is updated successfully';
	  }   	  
	  function workStarted($orderId){
   	  		$query="update orders set work_started=1 where order_id=".$orderId;
   	  		$this->executeQuery($query);	 
   	  		$_SESSION['message'] = 'Agreement is updated successfully';
	  }   	  
  	  function orderClosed($orderId){
   	  		$query="update orders set order_closed=1 where order_id=".$orderId;
   	  		$this->executeQuery($query);	
   	  		$_SESSION['warning'] = 'Agreement is canceled/closed';
	  }   	  
	  function updatePayment($orderId){
	  	$query='update payment_status set first_installment_amount='.$_POST['firstInstallment'].',second_installment_amount='.$_POST['secondInstallment'].',third_installment_amount='.$_POST['thirdInstallment'].'  where order_id='.$orderId;
	  	$this->executeQuery($query);
	  	$_SESSION['message'] = 'Payment is updated successfully';
	  }
	  function updatePayPalPayment($orderId,$amountPaid){
	  	$query='insert into payment_history values(0,'.$orderId.','.$amountPaid.',current_timestamp)';
	  	$this->executeQuery($query);
	  	
	  	$query='update payment_status set third_installment_amount= third_installment_amount+'.$amountPaid.' where order_id='.$orderId;
	  	$this->executeQuery($query);
	  	$_SESSION['message'] = 'Payment is updated successfully';
	  }
	   
   	  function executeQuery($query){
  	  		$dataAccess = new DataAccess();
   	  		$dataAccess->executeQuery($query);	  
	  }   	  

  }
 ?>