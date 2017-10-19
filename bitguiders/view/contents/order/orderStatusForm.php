<?php 
//PayPal redirected users
	if(isset($_GET['payment']) && $_GET['payment']=='accepted'){
		$_SESSION["info"]='Please proceed next to complete your order payment';
	}
	else if(isset($_GET['payment']) && $_GET['payment']=='canceled'){
		$_SESSION["warning"]='Please proceed next to complete your order canceliation';
	}
	?>

<form method="post" action="orderstatus.php">
<input name="payment" type="hidden" value="<?php echo (isset($_GET['payment'])?$_GET['payment']:''); ?>">
<?php include 'view/structure/alert.php';?>
	<div class="row">
	  <div class="col-lg-12">
	  <div class="form-group">
	  	<label for="email">Email * :</label>
	  	<input name="email" type="email" value="<?php echo (isset($email)?$email:''); ?>" placeholder="your@email.com" required class="form-control">
	  </div>
	  </div>
	</div>
	<div class="row">
	  <div class="col-lg-12">
	  <div class="form-group">
	  	<label for="orderCode">Order Code * :</label>
	  	<input name="orderCode" type="password" value="<?php echo (isset($orderCode)?$orderCode:''); ?>" required class="form-control">
	  </div>
	  </div>
	</div>	
	<?php if(isset($_GET['payment']) && $_GET['payment']=='accepted'){?>
	<div class="row">
	  <div class="col-lg-12">
	  <div class="form-group">
	  	<label for="orderCode">Amount Paid * :</label>
	  	<input name="amountPaid" type="text" value="0" required class="form-control">
	  </div>
	  </div>
	</div>	
	<?php }?>
	<div class="row">
	  <div class="col-lg-12">
	  <span class="Title">By Login you can</span>
	  <p>
	 	 <ul>
			<li> Track your order online</li>
			<li> Add/change you'r requirements</li>
			<li> Track your development.</li>
			<li> Track your payments</li>
		</ul>
	  </div>
	</div>
	<input name="signIn" type="submit" value="Show Status" class="btn btn-default">			 
</form>
