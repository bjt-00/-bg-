<div class="container-fluid">
	<form method="post">

				<div class="row">
					<div class="col-sm-2">
						<label for="todoName" >TODO Item</label>
					</div>
					<div class="col-sm-10">
						<input type="hidden" name="projectId" value="<?php echo (isset($_GET['projectId'])?$_GET['projectId']:'') ;?>">
						<input type="hidden" name="userStoryId" value="<?php echo (isset($_GET['userStoryId'])?$_GET['userStoryId']:'') ;?>">
						<input type="hidden" name="todoId" value="<?php echo (isset($_GET['todoId'])?$_GET['todoId']:'') ;?>">
						<input type="text" name="todoName" class="form-control" value="<?php echo (isset($_GET["todoName"])?$_GET["todoName"]:'') ;?>">
					</div>
				</div>	
				<div class="row">
					<div class="col-sm-2">
						<label for="assignedTo">Assigned To</label>
					</div>
					<div class="col-sm-4">
						<select name="assignedTo" class="form-control" >
							<option value="ak" <?php echo (isset($_GET['assignedTo'])&&$_GET['assignedTo']=='ak'?'selected':'') ;?>>Abdul Kareem</option>
							<option value="waqas" <?php echo (isset($_GET['assignedTo'])&&$_GET['assignedTo']=='waqas'?'selected':'') ;?>>Waqas</option>
						</select>
					</div>
					<div class="col-sm-2">
						<label for="developmentStatus">Development Status</label>
					</div>
					<div class="col-sm-4">
						<select name="developmentStatus" class="form-control" >
							<?php for($i=5;$i<=100;$i+=5){?>
							<option value="<?php echo $i?>"  <?php echo (isset($_GET['developmentStatus'])&&$_GET['developmentStatus']==$i?'selected':'') ;?> ><?php echo $i?>%</option>
							<?php } ?>
						</select>
					</div>
				</div>	
				<div class="row">
					<div class="col-sm-2">
						<label for="startDate">Start Date</label>
					</div>
					<div class="col-sm-4">
						<input type="date" name="startDate" class="form-control"  value="<?php echo (isset($_GET['startDate'])?$_GET['startDate']:'') ;?>">
					</div>
					<div class="col-sm-2">
						<label for="endDate">End Date</label>
					</div>
					<div class="col-sm-4">
						<input type="date" name="endDate" class="form-control"  value="<?php echo (isset($_GET['endDate'])?$_GET['endDate']:'') ;?>">
					</div>
			   </div>	
				<div class="row">
					<div class="col-sm-2">
						<label for="actualStartDate">Actual Start Date</label>
					</div>
					<div class="col-sm-4">
						<input type="date" name="actualStartDate" class="form-control" value="<?php echo (isset($_GET['actualStartDate'])?$_GET['actualStartDate']:'') ;?>">
					</div>
					<div class="col-sm-2">
						<label for="actualEndDate">Actual End Date</label>
					</div>
					<div class="col-sm-4">
						<input type="date" name="actualEndDate" class="form-control"  value="<?php echo (isset($_GET['actualEndDate'])?$_GET['actualEndDate']:'') ;?>">
					</div>
			   </div>	
				<div class="row">
					<div class="col-sm-2">
						<label for="description">Description</label>
					</div>
					<div class="col-sm-10">
					<textarea name="description" rows="2" class="form-control" ><?php echo (isset($_GET['description'])?$_GET['description']:'') ;?></textarea>
					</div>
			   </div>	
				<div class="row">
					<div class="col-sm-2">
						<label for="issue">Issue</label>
					</div>
					<div class="col-sm-10">
					<textarea name="issue" rows="2" class="form-control"><?php echo (isset($_GET['issue'])?$_GET['issue']:'') ;?></textarea>
					</div>
			   </div>	
					
			<div class='PopupButtonsBar'>
			<input type='submit' class="btn btn-default"  name="<?php echo (isset($_GET['operation'])?$_GET['operation']:'');?>Todo" value="<?php echo (isset($_GET['operation'])?$_GET['operation']:'');?>">
			<input type='button' class="btn btn-default" name="Cance" value="Cancel" data-dismiss="modal"/>
			</div>
	</form>
</div>