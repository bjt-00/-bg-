	<?php 
	$totalAmount = (isset($_GET["totalAmount"])?$_GET["totalAmount"]:'0');
	$first = (isset($_GET["1st"])?$_GET["1st"]:'0');
	$second = (isset($_GET["2nd"])?$_GET["2nd"]:'0');
	$third = (isset($_GET["3rd"])?$_GET["3rd"]:'0');
	?>
	<form method="post">

			<div id="popUpContentsDiv" style='overflow-y:scroll;height:200px;'>
					
				<table width="100%">
				<tr>
					<td class="Label" valign="top">Order Code</td>
					<td>
					<?php echo (isset($_GET['orderCode'])?$_GET['orderCode']:'') ;?> 
					</td>
				</tr>
				<tr>
					<td class="Label" valign="top">Service</td>
					<td>
					<?php echo (isset($_GET['service'])?$_GET['service']:''); ?>
					</td>
				</tr>
				
				<tr>
					<td class="Label" valign="top">Total Payable</td>
					<td>
					<?php echo $totalAmount; ?>
					</td>
				</tr>
				<tr>
					<td class="Label">First Installment</td>
					<td>
						<input type="hidden" name="orderCode" value="<?php echo (isset($_GET['orderCode'])?$_GET['orderCode']:'') ;?>">
						<input type="text" name="firstInstallment" value="<?php echo $first;?>" >
						25% [<?php echo ($totalAmount*25)/100;?>]
					</td>
				</tr>

				<tr>
					<td class="Label" valign="top">Second Installment</td>
					<td>
					<input type="text" name="secondInstallment" value="<?php echo $second;?>" >
					25% [<?php echo ($totalAmount*25)/100;?>]
					</td>
				</tr>
				<tr>
					<td class="Label" valign="top">Third Installment</td>
					<td>
					<input type="text" name="thirdInstallment" value="<?php echo $third;?>" >
					50% [<?php echo ($totalAmount*50)/100;?>]
					</td>
				</tr>
				</table>
					
			</div>
			<div class='PopupButtonsBar'>
			<input type='submit' name="<?php echo (isset($_GET['operation'])?$_GET['operation']:'');?>OrderPayment" value="<?php echo (isset($_GET['operation'])?$_GET['operation']:'');?>">
			<input type='button' name="Cance" value="Cancel" data-dismiss="modal"/>
			</div>
	</form>
