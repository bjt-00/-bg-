<?php 
				 $budget = '0';
				 $phone = '';
				 $orderEmail = '';
				 $description='';
				 	 if(isset($_POST['createNewOrder'])){
				 		$order->validate();
				 		$budget = $_POST['budget'];
				 		$phone = $_POST['phone'];
				 		$orderEmail = $_POST['email'];
				 		$description = $_POST['description'];
				 	} 
				 ?>
 <fieldset class="FieldSet">
 <legend class="Title" style="color:orange;font-weight:bold"><img src="themes/default/icons/100.png" alt=" 1 of 3 " height="35"> Place your order</legend>
<form  method="post" action="index.php" >
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
      <label for="service">Service * :</label>
	   <select name="service" autofocus class="form-control">
		<option value="Software Development">Software Development</option>
		<option value="Web Development">Web Development</option>
		<option value="Software Analysis">Software Analysis</option>
		<option value="Application Designing">Application Designing</option>
		<option value="Web Template Designing">Web Template Designing</option>
		<option value="Database Designing">Database Designing</option>
		<option value="Content Writting">Content Writting</option>
		<option value="Data Entry">Data Entry</option>
		<option value="Training">Training</option>
		<option value="Consultancy">Consultancy</option>
		<option value="Other">Other</option>
		</select>
     </div>
 </div>
  <div class="col-lg-6">
    <div class="form-group">
      <label for="technology">Technology *:</label>
							<select name="technology" class="form-control">
								<option value="Java">Java</option>
								<option value="PHP">PHP</option>
								<option value="Database">Database</option>
								<option value="Multimedia/Adobe">Multimedia/Adobe</option>
								<option value="Optional">Optional</option>
								<option value="Other">Other</option>
							</select>
    </div>
  
  </div>
</div> 
<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      <label for="fromDay">From Date *:</label>
							<select name="fromDay" class="form-control" title="Project Start Date" >
								<?php 
									for($day=1;$day<=31;$day++){
								?>
								<option value="<?php echo ($day<10?'0'.$day:$day); ?>"><?php echo ($day<10?'0'.$day:$day); ?></option>
								<?php }?>
							</select>
							<select name="fromMonth">
								<?php 
									for($month=date("m")-1+1;$month<=12;$month++){
								?>
								<option value="<?php echo ($month<10?'0'.$month:$month); ?>"><?php echo ($month<10?'0'.$month:$month); ?></option>
								<?php }?>
							</select>
							
							<select name="fromYear">
								<?php 
									for($year=date("Y");$year<=date("Y")+5;$year++){
								?>
								<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
								<?php }?>
							</select>
   </div>
</div>
	<div class="col-lg-6">
	    <div class="form-group">
	      <label for="toDay">To Date *:</label>
								<select name="toDay" class="form-control">
									<?php 
										for($day=1;$day<=31;$day++){
									?>
									<option value="<?php echo ($day<10?'0'.$day:$day); ?>"><?php echo ($day<10?'0'.$day:$day); ?></option>
									<?php }?>
								</select>
								<select name="toMonth">
									<?php 
										for($month=date("m")-1+1;$month<=12;$month++){
									?>
									<option value="<?php echo ($month<10?'0'.$month:$month); ?>"><?php echo ($month<10?'0'.$month:$month); ?></option>
																	<?php }?>
								</select>
								<select name="toYear">
									<?php 
										for($year=date("Y");$year<=date("Y")+5;$year++){
									?>
									<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
									<?php }?>
								</select>
		</div>
	</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="form-group">
      <label for="budget">Budget *:</label>
      <input name="budget" type="number" value="<?php echo $budget;?>" min="10" step="10" required class="form-control">
      <select name="currency">
		<option value="USD">$</option>
	 </select>
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
      <label for="description">Description *:</label>
      <textarea name="description" rows="5" cols="50" placeholder="Write your project short description here" required class="form-control"><?php echo $description;?></textarea>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
	<input name="createNewOrder" type="submit" value="Submit" class="btn btn-default">
	</div>
</div>	
  </form>
 </fieldset>
  