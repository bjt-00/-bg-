<?php 

$orderBakingBean = new OrderBackingBean();
$pmp = new PMPBackingBean(); 
		if(isset($_POST['updateAgreement'])){
			$pmp->updateAgreement($_POST['projectId']);
			header("Refresh:0");
		}
		else if(isset($_POST['agreementReviewed'])){
			$orderBakingBean->agreementReviewed($_POST['orderId']);
			header("Refresh:0");
		}
		else if(isset($_POST['agreementSigned'])){
			$orderBakingBean->agreementSigned($_POST['orderId']);
			header("Refresh:0");
		}
		else if(isset($_POST['agreementReopen'])){
			$orderBakingBean->agreementReopen($_POST['orderId']);
			header("Refresh:0");
		}
		else if(isset($_POST['cancelAgreement'])){
			$orderBakingBean->orderClosed($_POST['orderId']);
			header("Refresh:0");
		}
		else if(isset($_POST['workStarted'])){
			$orderBakingBean->workStarted($_POST['orderId']);
			header("Refresh:0");
		}
		else if(isset($_POST['orderClosed'])){
			$orderBakingBean->orderClosed($_POST['orderId']);
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
				  $result= $orderBakingBean->getOrderStatus();				  
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
						<input name="projectShortName" type="text" value="<?php echo $saProject->project_short_name; ?>" class="ProjectAlias" title="Project Short Name like PEMS" <?php echo($order->aggreement_signed?'style="border:0px;" readonly=true':'')?>>
					</td>
				</tr>
				<tr>
					<td align="center" class="ProjectName">
						<input name="projectName" value="<?php echo $saProject->project_name; ?>" class="ProjectName" title="Project Complete Name" <?php echo($order->aggreement_signed?'style="border:0px;" readonly=true':'')?>>
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
				 </legend>
				 
					 	<table width="100%" id="orderDetails">
				 		<tr>
				 			<td class="Label">Order Code</td>
				 			<td><?php echo ($order!=null?$order->order_id:''); ?></td>
				 			<td class="Label">Budget</td>
				 			<td><?php echo ($order!=null?$order->budget:''); ?>
				 			<?php echo ($order!=null?$order->currency:''); ?>
				 			</td>
				 		</tr>
				 		<tr>
				 			<td class="Label">Service</td>
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
				 			<td class="Label" style="vertical-align:top">Description</td>
				 			<td valign="top" colspan="3">
				 			<textarea rows="8" readonly=true class="form-control" style="border:0px;background: transparent;width:100%">
				 			  <?php echo ($order!=null?$order->description:''); ?>
				 			</textarea>
				 			</td>
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
								 if($developmentStatus!=null){
								  while($development = mysql_fetch_object($developmentStatus)){
							 ?>
								 	
							 	<?php 
								     }//while end
								    }//internal if
							  	  }//if end
							 	if($order->aggreement_signed==1){
									 $paymentStatus = $dataAccess->getResult("select * from payment_status where order_id=".$orderId);
									 if($paymentStatus!=null){
									   while($payment = mysql_fetch_object($paymentStatus)){
									 	$totalPaid = ($payment->first_installment_amount+$payment->second_installment_amount+$payment->third_installment_amount);
									 	$percent = ($totalPaid*100)/$payment->total_amount;
							 		?>
				<?php     }//while end
				      }//internal if end			 
					}//if end ?> 	
			 </fieldset>	
			
				</td>
				</tr>
				<tr>
					<td align="center">
					 
						<span class="ServiceAgreement">Software Requirements</span>
						 <!-- User Stories -->
						<fieldset>
						<legend class="Title" style="text-align:left"> Your Requirements
						<input type="button" value="-" title="Hide Panel" style="float:right" id="resizeyourRequirements" onclick="minimize('yourRequirements')">

						<?php if(!$order->aggreement_signed && !$order->work_started && !$order->order_closed){?>
						<input type="button" value="Create New"  title="Create New Requirement" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Create New Requirement','view/contents/pmp/userStoryForm.php?projectId=<?php echo $saProject->project_id; ?>&operation=create')"/>
						
						<?php } ?>
						</legend>
						
						
							 <div class="panel-group" id="accordion">
							<?php 
						
				                                //Display all requirements
											  	 $user_stories = $pmp->getUserStoriesList($saProject->project_id);
											  	 
											  	 if($user_stories!=null){
												 $seraialNo=0;
											  	 	while($user_story = mysql_fetch_object($user_stories)){
											  	 	    $seraialNo++;
							?>
                                  <div class="panel panel-default" >
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#javaCollapse-<?php echo $seraialNo; ?>" class="pull-left" style="color:<?php echo ($user_story->priority=='LOW'?'grey':($user_story->priority=='MEDIUM'?'orange':'red'));?>">
                                        <?php echo $seraialNo; ?>: 
                                        <?php echo $user_story->user_story;?>
                                         [<?php echo $user_story->priority;?>]
                                        </a><br>
                                      </h4>
                                    </div>
                                    <div id="javaCollapse-<?php echo $seraialNo; ?>" class="panel-collapse collapse">
                                      <div class="panel-body ">
                                				<textarea rows="8" readonly=true class="form-control" style="border:0px;background: transparent;width:80%"><?php echo $user_story->description;?></textarea>
                                				<br>
                                				<a href="/attachements/<?php echo $user_story->attachement_path;?>" target="new"><?php echo $user_story->attachement_path;?></a>
                                      </div>
                                      <div class="panel-footer">
 											<?php if(!$order->aggreement_signed && !$order->work_started && !$order->order_closed){?>
													<input type="button" value="Delete"  title="Delete Requirement" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Delete Requirement','view/contents/pmp/userStoryForm.php?projectId=<?php echo $saProject->project_id; ?>&userStoryId=<?php echo $user_story->user_story_id;?>&operation=delete')"/>
													<input type="button" value="Edit"  title="Edit Requirement" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Create New Requirement','view/contents/pmp/userStoryForm.php?projectId=<?php echo $saProject->project_id; ?>&userStoryId=<?php echo $user_story->user_story_id;?>&operation=update')"/>
											<?php }?>
                                      	<br>
                                      </div>
                                    </div>
                                  </div>
							<?php }//user story while
									}//end if
							 ?>	
							 </div> 
						</fieldset>
					</td>
				</tr>
				<tr>
					<td align="center" class="ServiceAgreement">
						
					</td>
				</tr>
				<tr>
					<td align="center" class="ServiceAgreement">
						Payment Terms
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
							-  bitguiders will provide 15-days free service within the scope of this agreement after final deployment.<br>
							-  After 15-days service, in case of any issue bitguiders will not be responsible. And services will be charged 
							separately.<br>
							-  Payment will be made in three installments, with respect of following percentage.<br>
							<?php 
							$paymentStatus = $dataAccess->getResult("select * from payment_status where order_id=".$order->order_id);
							while($payment = mysql_fetch_object($paymentStatus)){
							  $totalPaid = ($payment->first_installment_amount+$payment->second_installment_amount+$payment->third_installment_amount);
							  $percent = ($totalPaid*100)/$payment->total_amount;
							  $orderCode = $order->order_id;
							?>
							<table>
							<tr>
							<td>- 1st payment (25%) At the time of Agreement  = </td><td>
								<?php 
								$amountPayable = (($order->budget*25)/100)-$payment->first_installment_amount;
								echo (($order->budget*25)/100);
								if($amountPayable>0){
									echo $orderBakingBean->getPaymentLink($orderCode,$amountPayable);
								}else{
									echo " <b style='color:green'>Received</b> ";
								}
								?>
							</td>
							</tr>
							<tr>
							<td>- 2nd payment (25%) On Analysis Completion  = </td>
							<td>
								<?php 
								$amountPayable = (($order->budget*25)/100)-$payment->second_installment_amount;
								echo (($order->budget*25)/100);
								if($amountPayable>0){
									echo $orderBakingBean->getPaymentLink($orderCode,$amountPayable);
								}else{
									echo " <b style='color:green'>Received</b> ";
								}
								?>
							</td>
							</tr>
							<tr>
							<td>- 3rd payment (50%) On Implementation Completion  = </td><td>
								<?php 
								$amountPayable = (($order->budget*50)/100)-$payment->third_installment_amount;
								echo (($order->budget*50)/100);
								if($amountPayable>0){
									echo $orderBakingBean->getPaymentLink($orderCode,$amountPayable,$order->service,$order->currency);
								}else{
									echo " <b style='color:green'>Received</b> ";
								}
								?>
							</td>
							</table>
							<?php }//payment status while end?>
							<br>
							- In case of no payment, Next phase will not start, and project end date will also extend, to no of late payment days.<br>
							I <b><u><i><?php echo $saProject->product_owner; ?></i></u></b> read above document carefully. I agree all of above service requirements, 
							payment terms and Note.<br>
							
							<table width="100%">
							<tr>
							<td> 
							<b>Product Owner:<input name="productOwner" value="<?php echo $saProject->product_owner; ?>"  <?php echo($order->aggreement_signed?'style="border:0px;" readonly=true':'')?>>
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
							<?php if(!$order->order_reviewed && !$order->order_closed && $user->isAdmin()){?>
							<input type="submit" name="agreementReviewed" value="Agreement Reviewed">
							<?php } ?>
							
							<?php if($order->order_reviewed && !$order->order_closed && !$order->aggreement_signed && !$user->isAdmin()){?>
							<input type="submit" name="agreementSigned" value="Accept Agreement">
							<?php } ?>
							<?php if($order->aggreement_signed && !$order->work_started && $user->isAdmin()){?>
							<input type="submit" name="workStarted" value="Work Started">
							<?php }?>
							<?php if($order->work_started && !$order->order_closed && $user->isAdmin()){?>
							<input type="submit" name="orderClosed" value="Close Order">
							<?php }?>
							<?php if(!$order->aggreement_signed && !$order->order_closed && !$user->isAdmin()){?>
							<input type="submit" name="cancelAgreement" value="Cancel Agreement">
						<?php } ?>
							<?php if($order->order_closed && $user->isAdmin()){?>
							<input type="submit" name="agreementReopen" value="Agreement Re-open">
							<?php } ?>
						
					</td>
				</tr>
				
			</table>
			
		<?php 
				}//while end
				  }//if end
		?>				
	</form>	
<!-- div ng-app="myApp" ng-controller="customersCtrl"> 
<ol>
<li ng-repeat="x in myData">

	{{x.CASESNO}} - {{x.LOCATION}}
</li>
</ol>
</div>	
	<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {

  $scope.searchText = 'Allah';
  //var url = "http://localhost/oc65/rest/case/index.php?s=case&search="+$scope.searchText;
  var url = "http://localhost/oc65/rest/case/index.php?s=case";
  //var url = "https://www.thesuffah.org/rest/quran/index.php?s=quran&search="+$scope.searchText;
  $http.get(url).then(function (response) {
      $scope.myData = response.data;
  });
 
});
</script-->
		
