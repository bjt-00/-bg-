<fieldset class="FieldSet">
	<legend class="Title">Sign In</legend>
	
<form method="post" action="?action=SecurityService">
<?php include 'view/structure/alert.php';?>
	<div class="row">
	  <div class="col-lg-12">
	  <div class="form-group">
	  	<label for="email">Sign In ID * :</label>
	  	<input name="loginId" type="text" value="<?php echo (isset($email)?$email:''); ?>"  required class="form-control">
	  </div>
	  </div>
	</div>
	<div class="row">
	  <div class="col-lg-12">
	  <div class="form-group">
	  	<label for="orderCode">Password * :</label>
	  	<input name="password" type="password" value="<?php echo (isset($orderCode)?$orderCode:''); ?>" required class="form-control">
	  </div>
	  </div>
	</div>	
	<div class="row">
	  <div class="col-lg-12">
	 	 
	 	 <br>
	  </div>
	</div>
	<input name="signIn" type="submit" value="Sign In" class="btn btn-default">	
	<input name="signUp" type="submit" value="Sign Up" class="btn">		 
</form>
</fieldset>
