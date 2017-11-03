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
		   	        	if($_GET['s']==' ۖۚ'){
		   	              $_SESSION["message"] = "Thank you very much your payment seems to be successful";
		   	              $order = new OrderBackingBean();
		   	              $order->paymentConfirmation($_GET['orderCode'], $_GET['a']);
		   	        	}
		   	        	else if($_GET['s']=='ةُ'){
		   	        		$_SESSION["errors"] = "You are receving this notification because you have canceled online payment.". 
		   	        			"<br>You can initiate payment again ( ".$order->getPaymentLink($_GET['orderCode'],$_GET['a'],$_GET['se'],$_GET['cu'])." ). ".
		   	        		    "<br> Or you can cancel your order after login to order status <a href=\"http://www.bitguiders.com/orderstatus.php?orderCode=<ORDER_NO>\" target=\"_new\">online</a>. Thanks";
		   	        		$order->paymentCanceliation($_GET['orderCode'],$_GET['a']);
		   	        	}
		   	        	 
		   	        }
		   	        if(($_GET['s']==' ۖۚ')||($_GET['s']=='ةُ')){
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
