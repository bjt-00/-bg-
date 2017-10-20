<?php 
//$order = new OrderBackingBean();
$pmp = new PMPBackingBean();

if(isset($_POST['UpdateOrderPayment'])){
	$order->updatePayment($_POST['orderCode']);
	header("Refresh:0");
}

if($user->isAdmin() && !isset($_GET['orderCode'])){
	$result = $order->getOrdersList();
}else if(isset($_GET['orderCode'])){
	$result = $order->getOrderStatus();
}else if (!$user->isAdmin()) {
	$result = $order->getOrderStatus();
}

		if(isset($_POST['delete'])){
			$pmp->deleteProject($_POST['projectId']);
			$order->delete();
			$user->deleteUser();
			$order = new OrderBackingBean();
			$result = $order->getOrdersList();
				
		}

?>
				<?php 		
				
				  if($result!=null){	

					while($row = mysql_fetch_object($result)){
						$orderId = $row->order_id;
						$totalDone = $row->order_received+$row->order_reviewed+$row->aggreement_signed+$row->work_started+$row->order_closed;
						$percent =($totalDone*100)/5;
						
				  		$project = $pmp->getProjectByOrderId($orderId);
				  		if($project!=null){
						$projectStatus = $pmp->getProjectStatus($project->project_id);
				  		}

				?>
		<div class="row">
		  <div class="col-lg-12">

		  
				<div class="panel panel-default">
				 <div class="panel-heading" title="<?php echo $project->project_name;?>" ><a href="orderstatus.php?orderCode=<?php echo $orderId.($project->description=='Training'?'&ot':'');?> "><?php echo $project->project_short_name.' [Order Code:'.$orderId.']';?></a> <?php $progressBarValue=$projectStatus; include("view/structure/progressBar.php"); ?>
				 <input type="button" value="<?php echo (isset($_GET['orderCode']) && $_GET['orderCode']==$orderId?'-':'+') ?>" title="Hide Panel" style="float:right" id="resize<?php echo $orderId;?>Panel" onclick="<?php echo (isset($_GET['orderCode']) && $_GET['orderCode']==$orderId?'minimize':'maximize') ?>('<?php echo $orderId;?>Panel')">
				 </div>

				 <div class="panel-body" id="<?php echo $orderId;?>Panel" style="<?php echo (isset($_GET['orderCode']) && $_GET['orderCode']==$orderId?'':'display:none') ?>"> 
		  		<?php 
			  if($user->isAdmin()){
			  	$_GET['orderCode'] = $orderId;
			  	include 'view/contents/pmp/pmpTree.php';
			  }
		  ?>
				 
				 <div class="row">
		 					 <div class="col-lg-12">
				 
							<div class="panel panel-default" >
							 <div class="panel-heading">Overall Status <?php $progressBarValue=$percent; include("view/structure/progressBar.php"); ?></div>
							  <div class="panel-body">
							 	<table width="100%">
							 		<tr>
							 			<td>Oreder Received</td>
										<td><img alt="<?php echo ($row!=null && $row->order_received?'Yes':'Pending');?>" src="themes/default/icons/<?php echo ($row!=null?$row->order_received:'');?>.png"></td>
									</tr>
									<tr>
							 			<td>Order Reviewed</td>
							 			<td><img alt="<?php echo ($row!=null && $row->order_reviewed?'Yes':'Pending');?>" src="themes/default/icons/<?php echo ($row!=null?$row->order_reviewed:'');?>.png"></td>
									</tr>
									<tr>
							 			<td>Aggreement Signed</td>
							 			<td><img alt="<?php echo ($row!=null && $row->aggreement_signed?'Yes':'Pending');?>" src="themes/default/icons/<?php echo ($row!=null?$row->aggreement_signed:'');?>.png"></td>
									</tr>
									<tr>
							 			<td>Work Started</td>
							 			<td><img alt="<?php echo ($row!=null && $row->work_started?'Yes':'Pending');?>" src="themes/default/icons/<?php echo ($row!=null?$row->work_started:'');?>.png"></td>
									</tr>
							 		<tr>
							 			<td>Order Closed</td>
							 			<td><img alt="<?php echo ($row!=null && $row->order_closed?'Yes':'Pending');?>" src="themes/default/icons/<?php echo ($row!=null?$row->order_closed:'');?>.png"></td>
							 		</tr>
							 		
							 		</table>
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
								 	
							<div class="panel panel-default">
							 <div class="panel-heading">Development Status <?php $progressBarValue=$devStatus/4; include("view/structure/progressBar.php"); ?></div>
							 	<div class="panel-body">
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
							 	</div>
								</div>
							  </div>
							</div>  
							  <div class="row">
								<div class="col-lg-12">
							<?php 
								 }//while end
							  	  }//if end
							 	if($row->aggreement_signed==1){
									 $paymentStatus = $dataAccess->getResult("select * from payment_status where order_id=".$orderId);
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
							 		</div>
							 		<?php if($user->isAdmin()){?>
							 		<div class="panel-footer">
							 		<input type="button" value="Update"  title="Order Payment" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Order Payment','view/contents/order/paymentForm.php?orderCode=<?php echo $row->order_id?>&service=<?php echo $row->service?>&totalAmount=<?php echo $payment->total_amount?>&1st=<?php echo $payment->first_installment_amount?>&2nd=<?php echo $payment->second_installment_amount?>&3rd=<?php echo $payment->third_installment_amount?>&operation=Update')"/>
							 		<br>
							 		</div>
							 		<?php }?>
							 		</div>
				              <?php }} ?> 	
				              
				              
				</div>	
				</div>
				<div class="row">			              
				<div class="col-lg-12">
					<form method="POST">
						<input type="hidden" name="orderCode" value="<?php echo $orderId?>">
						<input type="hidden" name="projectId" value="<?php echo $project->project_id;?>">
						<input type="submit" name="delete" value="Delete">
					</form>
				</div>
				</div>
			</div>	
		</div>
    	</div>
	</div>    		
		<?php 
		
				}//while end
				
				  }//if end
		?>				
		
		
