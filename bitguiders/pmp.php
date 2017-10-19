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
		      <div class="col-lg-2">
		      
		      <?php 
		      if(isset($_SESSION['email'])){
			      if($user->isAdmin())
			      {
			      	include"view/contents/order/ordersStatus.php";		      	
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
		   	   <div class="col-lg-10">
		   	     <?php if(isset($_SESSION['email'])|| isset($_GET['orderCode'])){?>
			     <?php include"view/contents/pmp/pmp.php" ;?>
			     <?php }?>
			   </div>
		</div>
		
		 <!-- Footer -->
		<?php include"view/structure/footer.php" ;?>
	</body>
</html>
