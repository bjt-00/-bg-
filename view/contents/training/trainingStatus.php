<?php


     include 'src/com/bitguiders/weblayer/model/training/TrainingBackingBean.php';
		$trainingBackingBean = new TrainingBackingBean();
		$order = new OrderBackingBean();

		if(isset($_POST['UpdateOrderPayment'])){
			$order->updatePayment($_POST['orderCode']);
			header("Refresh:0");
		}
		else if(isset($_POST['AddSchedule'])){
			$order->agreementSigned($_POST['orderCode']);
			$trainingBackingBean->assignTrainer();
			//header("Refresh:0");
		}
		
		
		
		if(isset($_GET['orderCode'])){
			$orderCode =$_GET['orderCode'];
		}else if(isset($_SESSION["orderCode"])){
			$orderCode =$_SESSION['orderCode'];
		}		
		$training = $trainingBackingBean->getTrainingDetailsByOrderId($orderCode);
		
					$result = $order->getOrderStatus();
					while($row = mysql_fetch_object($result)){
						$orderId = $row->order_id;
						$totalDone = $row->order_received+$row->order_reviewed+$row->aggreement_signed+$row->work_started+$row->order_closed;
						$percent =($totalDone*100)/5;
						
						if($user->isAdmin()){
				  			$_GET['orderCode'] = $orderId;
				  			include 'view/contents/pmp/pmpTree.php';
				  		}
												
					?>
				 
				<div class="row">
				  <div class="col-lg-12">
						<div class="panel panel-default">
							 <div class="panel-heading">Overall Status <?php $progressBarValue=$percent; include("view/structure/progressBar.php"); ?></div>
							 <div class="panel-body">
							 <form method="post">
			                     <input name="orderId" type="hidden"  value="<?php echo $row->order_id; ?>" >
							 
							 	<table width="100%">
							 		<tr>
							 			<td>Oreder Received</td>
										<td><img alt="<?php echo ($row!=null && $row->order_received?'Yes':'Pending');?>" src="themes/default/icons/<?php echo ($row!=null?$row->order_received:'');?>.png"></td>
									</tr>
									<tr>
							 			<td>Payment Received</td>
							 			<td>
							 			<img alt="<?php echo ($row!=null && $row->order_reviewed?'Yes':'Pending');?>" src="themes/default/icons/<?php echo ($row!=null?$row->order_reviewed:'');?>.png">
							 			<?php if(!$row->order_reviewed && !$row->order_closed && $user->isAdmin()){?>
							<input type="submit" name="agreementReviewed" value="Y" title="Mark Received">
							<?php } ?>
							 			</td>
									</tr>
									<tr>
							 			<td>Trainer Assigned</td>
							 			<td><img alt="<?php echo ($row!=null && $row->aggreement_signed?'Yes':'Pending');?>" src="themes/default/icons/<?php echo ($row!=null?$row->aggreement_signed:'');?>.png">
							 			<?php if(!$row->order_closed  && $user->isAdmin()){?>
							<input type="button" name="assignTrainer" value="Y"  title="Assign Trainer" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Assign Trainer','view/contents/training/trainingScheduleForm.php?orderCode=<?php echo $row->order_id?>&trainerId=<?php echo ($training!=null?$training->trainer_id:0)?>&service=<?php echo $row->service?>&fromDate=<?php echo $row->from_date?>&toDate=<?php echo $row->to_date?>&operation=Add')"/>
							<?php } ?>
							 			</td>
									</tr>
									<tr>
							 			<td>Training Started</td>
							 			<td><img alt="<?php echo ($row!=null && $row->work_started?'Yes':'Pending');?>" src="themes/default/icons/<?php echo ($row!=null?$row->work_started:'');?>.png">
							 			<?php if($row->aggreement_signed && !$row->work_started && $user->isAdmin()){?>
							<input type="submit" name="workStarted" value="Y" title="Mark Started">
							<?php }?>
							 			</td>
									</tr>
							 		<tr>
							 			<td>Training Completed</td>
							 			<td>
							 			<img alt="<?php echo ($row!=null && $row->order_closed?'Yes':'Pending');?>" src="themes/default/icons/<?php echo ($row!=null?$row->order_closed:'');?>.png">
							 			<?php if($row->work_started && !$row->order_closed && $user->isAdmin()){?>
											<input type="submit" name="orderClosed" value="Y" title="Mark Complete">
										<?php }?>
										<?php if(!$row->aggreement_signed && !$row->order_closed && $user->isAdmin()){?>
							<input type="submit" name="cancelAgreement" value="Y" title="Cancel Training">
						<?php } ?>
							<?php if($row->order_closed && $user->isAdmin()){?>
							<input type="submit" name="agreementReopen" value="Y" title="Re-open">
							<?php } ?>
							 			</td>
							 		</tr>
							 		</table>
							 		</form>
							 		</div>
							 	</div>
						</div>
						</div>
						<div class="row">
						<div class="col-lg-12">
							 <?php $budget = $row->budget;
							 $currency =$row->currency;
							  if($row->work_started==1){
								 $developmentStatus = $dataAccess->getResult("select * from development_status where order_id=".$orderId);
								 while($development = mysql_fetch_object($developmentStatus)){
								 $devStatus = $development->analysis_percent+$development->design_percent+$development->implementation_percent+$development->deployment_percent;
							 ?>
								 	
								</div>
								</div>
								<div class="row">
								<div class="col-lg-12">
							<?php 
								 }//while end
							  	  }//if end
							 	
									 $paymentStatus = $dataAccess->getResult("select * from payment_status where order_id=".$orderId);
									if($paymentStatus!=null){
									 while($payment = mysql_fetch_object($paymentStatus)){
									 	$totalPaid = ($payment->first_installment_amount+$payment->second_installment_amount+$payment->third_installment_amount);
									 	$percent = ($totalPaid*100)/$payment->total_amount;
							 		?>
							<div class="panel panel-default">
							 <div class="panel-heading">Payment Status 
							<?php $progressBarValue=$percent; include("view/structure/progressBar.php"); ?>
							 </div>
							 <div class="panel-body">
							 	<table width="100%">
								    <tr>
									<td></td>
									<td>Receiveable</td>
									<td>Paid</td>
									<td>Balance</td>
									</tr>
									
							 		<tr>
									<td class="Label">Total </td>
									<td>
									<?php echo $budget ?>
									</td>
									<td style="<?php echo ((($budget*100)/100)>$totalPaid?'color:orange':'color:green');?>"><?php echo $totalPaid; ?></td>
									<td><?php echo $budget-$totalPaid; ?></td>
									</tr>
							 		
							 		</table>
							 		</div>
							 		<?php if($user->isAdmin()){?>
							 		<div class="panel-footer">
							 		<input type="button" value="Update"  title="Order Payment" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Order Payment','view/contents/order/paymentForm.php?orderCode=<?php echo $row->order_id?>&service=<?php echo $row->service?>&totalAmount=<?php echo $payment->total_amount?>&1st=<?php echo $payment->first_installment_amount?>&2nd=<?php echo $payment->second_installment_amount?>&3rd=<?php echo $payment->third_installment_amount?>&operation=Update')"/>
							 		<br>
							 		</div>
							 		<?php }?>
							 	</div>
				              <?php }//while
								}//if end	
							 	?> 	
</div>
</div>
<?php if($row->aggreement_signed){ ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				 <div class="panel-heading"><?php echo $training->training_code?> Schedule Details</div>
							 <div class="panel-body">
							 	<table width="100%">
							 		<tr>
							 			<td colspan="2">
							 			<b>From :</b> <?php echo $training->from_date?> <b>to</b> <?php echo $training->to_date?><br>
							 			<b>Duration:</b><?php echo $training->duration?>
							 			</td>
							 		</tr>
								    <tr>
									<td>
									<img id="Logo" src="galleries/users/trainers/<?php echo $training->trainer_id?>.png" alt="<?php echo $training->trainer_name?>" title="<?php echo $training->trainer_name?>" style="width:100px;height: 100px;" />
									
									</td>
									<td>
										<p>
										<b>Trainer:</b> <br><?php echo $training->trainer_name?><br>
										<b>Experience:</b><br> <?php echo $training->experience?>-Years<br>
										<b>Skills:</b><br><?php echo $training->skill?><br>
										</p>
									</td>
									</tr>
							 		<tr>
							 			<td colspan="2">
							 			<b>Certifications:</b><?php echo $training->certification1?>,<?php echo $training->certification2?>,<?php echo $training->certification3?>
							 			</td>
							 		</tr>
							 		<tr>
							 			<td colspan="2">
							 			<b>About Trainer:</b><?php echo $training->about_trainer?>
							 			</td>
							 		</tr>
							 		</table>
							 </div>
			 </div>
</div>
</div>
<?php }?>
<?php 
					}
		if(isset($_POST['delete'])){
			$order->delete();
		}
		?>				
		
		
