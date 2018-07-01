<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>bitguiders ::: Payment Status</title>
		<?php 
		include 'view/structure/imports.php' ;
		?>
	</head>
	<body>
		<!-- Header -->
		<?php include"view/structure/header.php" ;?>
		
		<!-- Page Content -->
		<div class="Body">
		
		<br>
		      
		   	   <div class="col-lg-12">
		   	   
		   	     <?php 
		   	        if(isset($_GET['s'])){
		   	        	
		   	        	$security = new Security();
		   	        	$decryptedValue = $security->decrypt($_GET['s']);
		   	        	$decryptedValues = explode('-',$decryptedValue);
		   	        	
		   	        	//echo $decryptedValue;
		   	        	$order = new OrderBackingBean();
		   	        	if($decryptedValues[0]==' ۖۚ'){
		   	              $_SESSION["message"] = "Thank you very much your payment seems to be successful";
		   	             
		   	              $order->paymentConfirmation($decryptedValues[1], $decryptedValues[2]);
		   	        	}
		   	        	else if($decryptedValues[0]=='ةُ'){
		   	        		
		   	        		$_SESSION["errors"] = "You are receving this notification because you have canceled online payment.". 
		   	        			"<br>You can initiate payment again ( ".$order->getPaymentLink($decryptedValues[1],$decryptedValues[2])." ). ".
		   	        		    "<br> Or you can cancel your order after login to order status <a href=\"http://www.bitguiders.com/orderstatus.php?orderCode=<ORDER_NO>\" target=\"_new\">online</a>. Thanks";
		   	        		$order->paymentCanceliation($decryptedValues[1], $decryptedValues[2]);
		   	        	}
		   	        	 
		   	        }
		   	        if(($decryptedValues[0]==' ۖۚ')||($decryptedValues[0]=='ةُ')){
		   	         include 'view/structure/alert.php';
		   	         include"view/contents/order/orderDetails.php";	
		   	        }else{
		   	        	?>
		   	        	<script type="text/javascript">window.location='index.php';</script>
		   	        	<?php 
		   	        }
			      ?>
			   </div>
		</div>
		
		 <!-- Footer -->
		<?php include"view/structure/footer.php" ;?>
	</body>
</html>
