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
					<td align="center">
						<span class="ServiceAgreement">Software Requirements</span>
						<fieldset>
						<legend class="Title" style="text-align:left"> Your Requirements
						<input type="button" value="-" title="Hide Panel" style="float:right" id="resizeyourRequirements" onclick="minimize('yourRequirements')">

						<?php if(!$order->aggreement_signed && !$order->work_started && !$order->order_closed){?>
						<input type="button" value="Create New"  title="Create New Requirement" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Create New Requirement','view/contents/pmp/userStoryForm.php?projectId=<?php echo $saProject->project_id; ?>&operation=create')"/>
						
						<?php } ?>
						</legend>
							<table style="float:left" width="100%" id="yourRequirements">
							<tr>
								<td>S.No</td>
								<td>Requirement</td>
								<td>Priority</td>
								<td>Operation</td>
							</tr>
						<?php 
						
				                                //Display all requirements
											  	 $user_stories = $pmp->getUserStoriesList($saProject->project_id);
											  	 
											  	 if($user_stories!=null){
												 $seraialNo=1;
											  	 	while($user_story = mysql_fetch_object($user_stories)){
													  	 		?>
													  	 		<tr>
													  	 		<td class="Label" valign="top"><?php echo $seraialNo++; ?></td>
													  	 		<td>
													  	 		<span class='Label'><?php echo $user_story->user_story;?> : </span>
																<?php echo $user_story->description;?>
													  	 		</td>
																<td><?php echo $user_story->priority;?></td>
																<td>
																<?php if(!$order->aggreement_signed && !$order->work_started && !$order->order_closed){?>
																	<input type="button" value="X"  title="Delete Requirement" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Delete Requirement','view/contents/pmp/userStoryForm.php?projectId=<?php echo $saProject->project_id; ?>&userStoryId=<?php echo $user_story->user_story_id;?>&userStory=<?php echo $user_story->user_story;?>&description=<?php echo $user_story->description;?>&operation=delete')"/>
																	<input type="button" value="Edit"  title="Edit Requirement" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Create New Requirement','view/contents/pmp/userStoryForm.php?projectId=<?php echo $saProject->project_id; ?>&userStoryId=<?php echo $user_story->user_story_id;?>&userStory=<?php echo $user_story->user_story;?>&description=<?php echo $user_story->description;?>&operation=update')"/>
																	<?php }?>
																</td>
													  	 		</tr>
													  	 	<?php }//user story while
															}//end if
															
															  ?>	
							</table>
						</fieldset>
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
									if($paymentStatus!=null){
									 while($payment = mysql_fetch_object($paymentStatus)){
									 	$totalPaid = ($payment->first_installment_amount+$payment->second_installment_amount+$payment->third_installment_amount);
									 	$percent = ($totalPaid*100)/$payment->total_amount;
							 		?>
				<?php   }//while
				      }//if end
					} ?> 	
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
		
		
