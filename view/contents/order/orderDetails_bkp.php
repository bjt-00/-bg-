<?php $order = new OrderBackingBean();?>

			<table class="Body" cellpadding="0" cellspacing="0">
				<tr>
				<td valign="top" style="border-right:0px solid #e1e1e1;width:60%;padding:5px;">
				<?php 
				$result=null;
				if(isset($_GET['orderCode'])){
					$result = $order->getOrderDetails($_GET['orderCode']);
				}
				  if($result!=null){	
					while($row = mysql_fetch_object($result)){
						$orderId = $row->order_id;
						$totalDone = $row->order_received+$row->order_reviewed+$row->aggreement_signed+$row->work_started+$row->order_closed;
						$percent =($totalDone*100)/5;
				?>
				<fieldset>
				 <legend class="Title">Order Code <b><?php echo ($row!=null?$row->order_id:''); ?>'s</b> Current Status</legend>
				 
					 	<table width="100%">
				 		<tr>
				 			<td class="Label">Order Code</td>
				 			<td><?php echo ($row!=null?$row->order_id:''); ?></td>
				 			<td class="Label">Budget</td>
				 			<td><?php echo ($row!=null?$row->budget:''); ?>
				 			<?php echo ($row!=null?$row->currency:''); ?>
				 			</td>
				 		</tr>
				 		<tr>
				 			<td class="Label">Service</td>
				 			<td><?php echo ($row!=null?$row->service:''); ?></td>
				 			<td class="Label">Technology</td>
				 			<td><?php echo ($row!=null?$row->technology:''); ?></td>
				 		</tr>
				 		<tr>
				 			<td class="Label">From Date</td>
				 			<td><?php echo ($row!=null?$row->from_date:''); ?></td>
				 			<td class="Label">To Date</td>
				 			<td><?php echo ($row!=null?$row->to_date:''); ?></td>
				 		</tr>
				 		<tr>
				 			<td class="Label">Phone</td>
				 			<td><?php echo ($row!=null?$row->phone:''); ?></td>
				 			<td class="Label">Email</td>
				 			<td><?php echo ($row!=null?$row->email:''); ?></td>
				 		</tr>
				 		<tr>
				 			<td class="Label">Description</td>
				 			<td valign="top" colspan="3"><?php echo ($row!=null?$row->description:''); ?></td>
				 		</tr>
				 		<?php if($user->isAdmin()){?>
				 		<tr>
				 			<td colspan="4" class="SimpleButtonsBar">
				 			<form method='post'>
				 			<input type='submit' name='delete' value='Delete'>
				 			<input name='orderCode' type='hidden' value='<?php echo ($row!=null?$row->order_id:''); ?>'>
				 			</form>
				 			</td>
				 		</tr>
				 		<?php }?>
				 		</table>
						<table>
						<tr>
						<td>
							<fieldset >
							 <legend class="Title">Overall Status <?php $progressBarValue=$percent; include("view/structure/progressBar.php"); ?></legend>
							 
							 	<table width="100%">
							 		<tr>
							 			<td>Oreder Received</td>
										<td><img alt="" src="themes/default/icons/<?php echo ($row!=null?$row->order_received:'');?>.png"></td>
									</tr>
									<tr>
							 			<td>Order Reviewed</td>
							 			<td><img alt="" src="themes/default/icons/<?php echo ($row!=null?$row->order_reviewed:'');?>.png"></td>
									</tr>
									<tr>
							 			<td>Aggreement Signed</td>
							 			<td><img alt="" src="themes/default/icons/<?php echo ($row!=null?$row->aggreement_signed:'');?>.png"></td>
									</tr>
									<tr>
							 			<td>Work Started</td>
							 			<td><img alt="" src="themes/default/icons/<?php echo ($row!=null?$row->work_started:'');?>.png"></td>
									</tr>
							 		<tr>
							 			<td>Order Closed</td>
							 			<td><img alt="" src="themes/default/icons/<?php echo ($row!=null?$row->order_closed:'');?>.png"></td>
							 		</tr>
							 		
							 		</table>
							 	</fieldset>
						</td>
						</tr>
						<tr>
						<td>
							 <?php $budget = $row->budget;
							 $currency =$row->currency;
							  if($row->work_started==1){
								 $developmentStatus = $dataAccess->getResult("select * from development_status where order_id=".$orderId);
								 while($development = mysql_fetch_object($developmentStatus)){
								 $devStatus = $development->analysis_percent+$development->design_percent+$development->implementation_percent+$development->deployment_percent;
							 ?>
								 	
							<fieldset>
							 <legend class="Title">Development Status <?php $progressBarValue=$devStatus/4; include("view/structure/progressBar.php"); ?></legend>
							 	<table width="100%">
							 		<tr>
									<td class="Label" style="<?php echo ($development->analysis_percent<=0?'color:#e1e1e1':'color:green');?>">Analysis</td>
									<td>
									<?php $progressBarValue=$development->analysis_percent; include("view/structure/progressBar.php"); ?>
									</td>
									</tr>
							 		<tr>
									<td class="Label" style="<?php echo ($development->design_percent<=0?'color:#e1e1e1':'color:green');?>">Design</td>
									<td>
									<?php $progressBarValue=$development->design_percent; include("view/structure/progressBar.php"); ?>
									</td>
									</tr>
							 		<tr>
									<td class="Label" style="<?php echo ($development->implementation_percent<=0?'color:#e1e1e1':'color:green');?>">Implementation</td>
									<td>
									<?php $progressBarValue=$development->implementation_percent; include("view/structure/progressBar.php"); ?>
									</td>
									</tr>
							 		<tr>
									<td class="Label" style="<?php echo ($development->deployment_percent<=0?'color:#e1e1e1':'color:green');?>">Deployment</td>
									<td>
									<?php $progressBarValue=$development->deployment_percent; include("view/structure/progressBar.php"); ?>
									</td>
									</tr>
							 		
							 		</table>
							 	</fieldset>
								</td>
								</tr>
								<tr>
								<td>
							<?php 
								 }//while end
							  	  }//if end
							 	if($row->aggreement_signed==1){
									 $paymentStatus = $dataAccess->getResult("select * from payment_status where order_id=".$orderId);
									 while($payment = mysql_fetch_object($paymentStatus)){
									 	$totalPaid = ($payment->first_installment_amount+$payment->second_installment_amount+$payment->third_installment_amount);
									 	$percent = ($totalPaid*100)/$payment->total_amount;
							 		?>
							<fieldset>
							 <legend class="Title">Payment Status <?php $progressBarValue=$percent; include("view/structure/progressBar.php"); ?></legend>
							 	<table width="100%">
								    <tr>
									<td>Installments</td>
									<td>Receiveable</td>
									<td>Paid</td>
									<td>Balance</td>
									</tr>
							 		<tr>
									<td class="Label">1st  25% </td>
									<td>
									<?php echo ($budget*25)/100; ?>
									</td>
									<td style="<?php echo ((($budget*25)/100)>$totalPaid?'color:orange':'color:green');?>"><?php echo $payment->first_installment_amount; ?></td>
									<td><?php echo (($budget*25)/100)-$payment->first_installment_amount; ?></td>
									</tr>
							 		<tr>
									<td class="Label">2nd  25% </td>
									<td>
									<?php echo ($budget*25)/100; ?>
									</td>
									<td style="<?php echo ((($budget*25)/100)>$totalPaid?'color:orange':'color:green');?>"><?php echo $payment->second_installment_amount; ?></td>
									<td><?php echo (($budget*25)/100)-$payment->second_installment_amount; ?></td>
									</tr>
							 		<tr>
									<td class="Label">3rd  50% </td>
									<td>
									<?php echo ($budget*50)/100; ?>
									</td>
									<td style="<?php echo ((($budget*50)/100)>$totalPaid?'color:orange':'color:green');?>"><?php echo $payment->third_installment_amount; ?></td>
									<td><?php echo (($budget*50)/100)-$payment->third_installment_amount; ?></td>
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
							 
							 	</fieldset>
				<?php }} ?> 	
				</td>
				</tr>
				</table>
			 </fieldset>	
<p>
		<?php 
				}//while end
				  }//if end
		if(isset($_POST['delete'])){
			$order->delete();
		}
		?>				
				</td>
				</tr>
		</table>
		
		
