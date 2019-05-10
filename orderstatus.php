<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>bitguiders ::: Order Status</title>
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
		      <div class="col-lg-3">
		      
		      <?php 
		      if(isset($_SESSION['userId'])){
			      if($user->isAdmin() && !isset($_GET['ot']))
			      {
			      	include"view/contents/order/ordersStatus.php";		      	
			      }else if($user->isTrainee()|| isset($_GET['ot'])){
			      	include"view/contents/training/trainingStatus.php";
			      }else{
			      	include"view/contents/order/orderStatus.php";
			      }//end of internal if
		      }//outer if
		      else{
		      	//in case of not logged in, show login form
		      	include 'view/contents/order/orderStatusForm.php';
		      }
		      ?>
			   </div>
		   	   <div class="col-lg-9">
		   	     <?php
		   	      if(isset($_SESSION['userId'])){
		   	      	if($user->isTrainee()|| isset($_GET['ot'])){
			           include"view/contents/training/trainingAgreement.php" ;
		   	      	}else{
		   	      	   include"view/contents/order/serviceAgreement.php" ;
		   	      	}
			      }?>
			   </div>
		</div>
		
		 <!-- Footer -->
		<?php include"view/structure/footer.php" ;?>
	</body>
</html>
