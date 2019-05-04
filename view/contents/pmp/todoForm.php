	<form method="post">

			<div id="popUpContentsDiv" style='overflow-y:scroll;height:200px;'>
					
				<table width="100%">
				<tr>
					<td class="Label">TODO Item</td>
					<td colspan="3">
						<input type="hidden" name="projectId" value="<?php echo (isset($_GET['projectId'])?$_GET['projectId']:'') ;?>">
						<input type="hidden" name="userStoryId" value="<?php echo (isset($_GET['userStoryId'])?$_GET['userStoryId']:'') ;?>">
						<input type="hidden" name="todoId" value="<?php echo (isset($_GET['todoId'])?$_GET['todoId']:'') ;?>">
						<input type="text" name="todoName" value="<?php echo (isset($_GET["todoName"])?$_GET["todoName"]:'') ;?>" style="width:80%">
					</td>
				</tr>

				<tr>
					<td class="Label">Assigned To</td>
					<td>
						<select name="assignedTo">
							<option value="ak" <?php echo (isset($_GET['assignedTo'])&&$_GET['assignedTo']=='ak'?'selected':'') ;?>>Abdul Kareem</option>
							<option value="waqas" <?php echo (isset($_GET['assignedTo'])&&$_GET['assignedTo']=='waqas'?'selected':'') ;?>>Waqas</option>
						</select>
					</td>
					<td class="Label">Development Status</td>
					<td>
						<select name="developmentStatus">
							<?php for($i=5;$i<=100;$i+=5){?>
							<option value="<?php echo $i?>"  <?php echo (isset($_GET['developmentStatus'])&&$_GET['developmentStatus']==$i?'selected':'') ;?> ><?php echo $i?>%</option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="Label">Start Date</td>
					<td>
						<input type="text" name="startDate" value="<?php echo (isset($_GET['startDate'])?$_GET['startDate']:'') ;?>">
					</td>
					<td class="Label">End Date</td>
					<td>
						<input type="text" name="endDate" value="<?php echo (isset($_GET['endDate'])?$_GET['endDate']:'') ;?>">
					</td>
				</tr>
				<tr>
					<td class="Label">Actual Start Date</td>
					<td>
						<input type="text" name="actualStartDate" value="<?php echo (isset($_GET['actualStartDate'])?$_GET['actualStartDate']:'') ;?>">
					</td>
					<td class="Label"Actual >Actual End Date</td>
					<td>
						<input type="text" name="actualEndDate" value="<?php echo (isset($_GET['actualEndDate'])?$_GET['actualEndDate']:'') ;?>">
					</td>
				</tr>
				<tr>
					<td class="Label" valign="top">Description</td>
					<td colspan="3">
					<textarea name="description" rows="1" style="width:80%"><?php echo (isset($_GET['description'])?$_GET['description']:'') ;?></textarea>
					</td>
				</tr>
				<tr>
					<td class="Label" valign="top">Issue</td>
					<td colspan="3">
					<textarea name="issue" rows="1" style="width:80%"><?php echo (isset($_GET['issue'])?$_GET['issue']:'') ;?></textarea>
					</td>
				</tr>
				</table>
					
			</div>
			<div class='PopupButtonsBar'>
			<input type='submit' name="<?php echo (isset($_GET['operation'])?$_GET['operation']:'');?>Todo" value="<?php echo (isset($_GET['operation'])?$_GET['operation']:'');?>">
			<input type='button' name="Cance" value="Cancel" data-dismiss="modal"/>
			</div>
	</form>
