<?php 
$order = new OrderBackingBean();
$pmp = new PMPBackingBean(); 
		if(isset($_POST['updateAgreement'])){
			$pmp->updateAgreement($_POST['projectId']);
			header("Refresh:0");
		}
		else if(isset($_POST['agreementReviewed'])){
			$order->agreementReviewed($_POST['orderId']);
			header("Refresh:0");
		}
		else if(isset($_POST['agreementReopen'])){
			$order->agreementReopen($_POST['orderId']);
			header("Refresh:0");
		}
		else if(isset($_POST['cancelAgreement'])){
			$order->orderClosed($_POST['orderId']);
			header("Refresh:0");
		}
		else if(isset($_POST['workStarted'])){
			$order->workStarted($_POST['orderId']);
			header("Refresh:0");
		}
		else if(isset($_POST['orderClosed'])){
			$order->orderClosed($_POST['orderId']);
			header("Refresh:0");
		}
		else if(isset($_POST['createUserStory'])){
			$pmp->createUserStory($_POST['projectId']);
			header("Refresh:0");
		}
		else if(isset($_POST['updateUserStory'])){
			$pmp->updateUserStory($_POST['userStoryId']);
			header("Refresh:0");
		}
		else if(isset($_POST['deleteUserStory'])){
			$pmp->deleteUserStory($_POST['userStoryId']);
			header("Refresh:0");
		}

?>
				<?php 	
                  $orderId=0;	
				  $result= $order->getOrderStatus();				  
				  if($result!=null){	
					while($order = mysql_fetch_object($result)){
						$orderId = $order->order_id;
						
					     $saProjects = $pmp->getProjectsList($orderId);
						if($saProjects!=null){
						$saProject = mysql_fetch_object($saProjects);
						}

				?>
<form method="post">
<?php include 'view/structure/alert.php';?>
			<table  cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td align="center" class="ProjectAlias">
					    <input name="orderId"        type="hidden"  value="<?php echo $order->order_id; ?>" >
						<input name="projectId"        type="hidden"  value="<?php echo $saProject->project_id; ?>" >
						<input name="projectShortName" type="hidden" value="<?php echo $saProject->project_short_name; ?>" class="ProjectAlias" title="Project Short Name like PEMS" <?php echo($order->aggreement_signed?'style="border:0px;" readonly=true':'')?>>
						<?php echo $saProject->project_short_name; ?>
					</td>
				</tr>
				<tr>
					<td align="center" class="ProjectName">
						<input name="projectName" type="hidden" value="<?php echo $saProject->project_name; ?>" class="ProjectName" title="Project Complete Name" <?php echo($order->aggreement_signed?'style="border:0px;" readonly=true':'')?>>
						<?php echo $saProject->project_name; ?>
					</td>
				</tr>
				<tr>
					<td align="center" class="ServiceAgreement">
						Service Agreement
						
					</td>
				</tr>
				<tr>
				<td  valign="top" style="border-right:0px solid #e1e1e1;width:60%;padding:5px;">
				<fieldset>
				 <legend class="Title" >Order Details
				 <input type="button" value="-" title="Hide Panel" style="float:right" id="resizeorderDetails" onclick="minimize('orderDetails')">
				 <input type="button" value="More Details"  title="More Details" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Training Details','view/contents/training/details/<?php echo $saProject->project_short_name;?>.php')"/>
				 </legend>
				 
					 	<table width="100%" id="orderDetails">
				 		<tr>
				 			<td class="Label">Order Code</td>
				 			<td><?php echo ($order!=null?$order->order_id:''); ?></td>
				 			<td class="Label">Price</td>
				 			<td><?php echo ($order!=null?$order->budget:''); ?>
				 			<?php echo ($order!=null?$order->currency:''); ?>
				 			</td>
				 		</tr>
				 		<tr>
				 			<td class="Label">Training Code</td>
				 			<td><?php echo ($order!=null?$order->service:''); ?></td>
				 			<td class="Label">Technology</td>
				 			<td><?php echo ($order!=null?$order->technology:''); ?></td>
				 		</tr>
				 		<tr>
				 			<td class="Label">From Date</td>
				 			<td><?php echo ($order!=null?$order->from_date:''); ?></td>
				 			<td class="Label">To Date</td>
				 			<td><?php echo ($order!=null?$order->to_date:''); ?></td>
				 		</tr>
				 		<tr>
				 			<td class="Label">Phone</td>
				 			<td><?php echo ($order!=null?$order->phone:''); ?></td>
				 			<td class="Label">Email</td>
				 			<td><?php echo ($order!=null?$order->email:''); ?></td>
				 		</tr>
				 		<tr>
				 			<td class="Label">Description</td>
				 			<td valign="top" colspan="3"><?php echo ($order!=null?$order->description:''); ?></td>
				 		</tr>
				 		<?php if($user->isAdmin()){?>
				 		<tr>
				 			<td colspan="4" class="SimpleButtonsBar">
				 			<form method='post'>
				 			<input type='submit' name='delete' value='Delete'>
				 			<input name='orderCode' type='hidden' value='<?php echo ($order!=null?$order->order_id:''); ?>'>
				 			</form>
				 			</td>
				 		</tr>
				 		<?php }?>
				 		</table>
	
							 <?php $budget = $order->budget;
							 $currency =$order->currency;
							  if($order->work_started==1){
								 $developmentStatus = $dataAccess->getResult("select * from development_status where order_id=".$orderId);
								 while($development = mysql_fetch_object($developmentStatus)){
							 ?>
								 	
							 	<?php 
								 }//while end
							  	  }//if end
							 	if($order->aggreement_signed==1){
									 $paymentStatus = $dataAccess->getResult("select * from payment_status where order_id=".$orderId);
									 while($payment = mysql_fetch_object($paymentStatus)){
									 	$totalPaid = ($payment->first_installment_amount+$payment->second_installment_amount+$payment->third_installment_amount);
									 	$percent = ($totalPaid*100)/$payment->total_amount;
							 		?>
				<?php }} ?> 	
			 </fieldset>	
			
				</td>
				</tr>
						<tr>
					<td align="center" class="ServiceAgreement">
						
					</td>
				</tr>
				<tr>
					<td align="center" class="ServiceAgreement">
						Training Terms
					</td>
				</tr>
				<tr>
					<td align="center" class="ServiceAgreement">
						
					</td>
				</tr>
				<tr>
					<td>
						<b>Note:</b><br>
						-  Any requirement which is not mentioned in this agreement will be considered a new requirement. A new 
agreement will be signed for all such changes and additions. New changes & additions will be charged 
according to new agreement. <br>
							-  Payment should be made before training startup.<br>
							<br>
							- In case of no payment, Training will not start, and training end date will also extend, to no of late payment days.<br>
							I <b><u><i><?php echo $saProject->product_owner; ?></i></u></b> read above document carefully. I agree all of above service requirements, 
							payment terms and Note.<br>
							
							<table width="100%">
							<tr>
							<td> 
							<b>Trainee Name:<input name="productOwner" value="<?php echo $saProject->product_owner; ?>"  <?php echo($order->aggreement_signed?'style="border:0px;" readonly=true':'')?>>
							</td>
							<td></td>
							<td style="text-align:right;">
							<b>Signature:</b><?php echo $saProject->product_owner; ?>
							</td>
							</tr>
							<tr>
							<td></td>
							<td></td>
							<td style="text-align:right;">
							<b>Date:</b><input name="agreementDate" value="<?php echo $date->getCurrentDate(); ?>"  <?php echo($order->aggreement_signed?'style="border:0px;" readonly=true':'')?> >
							</td>
							</tr>
							</table>

					</td>
				</tr>
				<tr>
					<td>
							<?php if(!$order->aggreement_signed && !$order->order_closed ){?>
							<input type="submit" name="updateAgreement" value="Update Agreement">
							<?php } ?> 
					</td>
				</tr>
				
			</table>
			</form>
		<?php 
				}//while end
				  }//if end
		?>				
		
		
