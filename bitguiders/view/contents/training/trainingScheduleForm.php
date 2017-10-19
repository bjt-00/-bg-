	<form method="post">

			<div id="popUpContentsDiv" style='overflow-y:scroll;height:200px;'>
					
				<table width="100%">
				<tr>
					<td class="Label" valign="top">Order Code</td>
					<td>
					<?php echo (isset($_GET['orderCode'])?$_GET['orderCode']:'') ;?> 
					<input type="hidden" name="orderCode" value="<?php echo (isset($_GET['orderCode'])?$_GET['orderCode']:'') ;?>">
					</td>
				</tr>
				<tr>
					<td class="Label" valign="top">Service</td>
					<td>
					<?php echo (isset($_GET['service'])?$_GET['service']:''); ?>
					<input type="hidden" name="trainingCode" value="<?php echo (isset($_GET['service'])?$_GET['service']:'') ;?>">
					</td>
				</tr>
				
				<tr>
					<td class="Label" valign="top">Trainer</td>
					<td>
						<select name="trainerId">
							<option value="1" <?php echo (isset($_GET['trainerId'])&&$_GET['trainerId']=='1'?'selected':'') ;?>>Abdul Kareem</option>
							<option value="2" <?php echo (isset($_GET['trainerId'])&&$_GET['trainerId']=='2'?'selected':'') ;?>>Waqas</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="Label">From Date yyyy-mm-dd</td>
					<td>
						<input type="text" name="fromDate" value="<?php echo (isset($_GET['fromDate'])?$_GET['fromDate']:'0000-00-00') ;?>" >
					</td>
				</tr>

				<tr>
					<td class="Label" valign="top">To Date yyyy-mm-dd</td>
					<td>
					<input type="text" name="toDate" value="<?php echo (isset($_GET['toDate'])?$_GET['toDate']:'0000-00-00') ;?>" >
					</td>
				</tr>
				</table>
					
			</div>
			<div class='PopupButtonsBar'>
			<input type='submit' name="<?php echo (isset($_GET['operation'])?$_GET['operation']:'');?>Schedule" value="<?php echo (isset($_GET['operation'])?$_GET['operation']:'');?>">
			<input type='button' name="Cance" value="Cancel" data-dismiss="modal"/>
			</div>
	</form>
