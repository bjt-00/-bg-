<?php 
				 $budget = $_GET['price'];
				 $trainingCode=$_GET['trainingCode'];
				 $technology=$_GET['technology'];
				 $phone = '';
				 $orderEmail = '';
				 $description='';
				 $currency='$';	
				 ?>
<form  method="post" action="training.php" >
<div class="row">
  <div class="col-lg-12">
  <div class="form-group">
      <label for="service" >Title :</label>
      <?php echo $technology?>
      <input name="technology" type="hidden" value="<?php echo $technology?>" readonly="readonly" >
     </div>
 </div>
</div> 
<div class="row">
  <div class="col-lg-12">
  <div class="form-group">
      <label for="service" >Code :</label>
      <?php echo $trainingCode?>
       <input name="service" type="hidden" value="<?php echo $trainingCode?>" readonly="readonly" >
      <input name="technology" type="hidden" value="<?php echo $technology?>" readonly="readonly" >
     </div>
 </div>
</div> 

<div class="row">
  <div class="col-lg-12">
  <div class="form-group">
      <label for="service" >Price :</label>
      <?php echo $budget.' '.$currency?>
      <input name="budget" type="hidden" value="<?php echo $budget?>" readonly="readonly" >
      <input name="currency" type="hidden" value="<?php echo $currency?>" readonly="readonly" >
     </div>
 </div>
</div> 

<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      <label for="phone">Phone *:</label>
      <input name="phone" type="tel" value="<?php echo $phone;?>"  placeholder="000-0000-0000000" required class="form-control">
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      <label for="email">Email *:</label>
      <input name="email" type="email" value="<?php echo $orderEmail;?>" placeholder="your@email.com" required class="form-control">
    </div>
   </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="form-group">
      <label for="description">Comments *:</label>
      <textarea name="description" rows="5" cols="50" placeholder="Write your comments here" required class="form-control"><?php echo $description;?></textarea>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
	<input name="registerNow" type="submit" value="Submit" class="btn btn-default">
	</div>
</div>	
</form>
  