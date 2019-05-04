
<?php 
$order = new OrderBackingBean();
$pmp = new PMPBackingBean();
		if(isset($_POST['updateTodo'])){
			$pmp->updateTodo($_POST['todoId']);
			//header("Refresh:0");
		}
		else if(isset($_POST['deleteTodo'])){
			$pmp->deleteTodo($_POST['todoId']);
			//header("Refresh:0");
		}
?>

				<?php 
				   
				if(isset($_GET['td'])){
					$parent=0;
					$node =0;
					$loc =0;
					$todoId = $_GET['td'];	
								  	

								  	if(isset($_POST['todoStatus'])){
								  		$pmp->updateTodo($todoId, $_POST['todoStatus']);
								  	}
								  	
				
					//SETP-V Add TO DOS for current Sprint
					$todoParent = $loc;
					$todos = $pmp->getToDoById($todoId);
					if($todos!=null){
	while($todo = mysql_fetch_object($todos)){
		$queryString = '?todoId='.$todo->todo_id.
		'&todoName='.$todo->todo_name.
		'&assignedTo='.$todo->assigned_to.
		'&startDate='.$todo->start_date.
		'&endDate='.$todo->end_date.
		'&actualStartDate='.$todo->actual_start_date.
		'&actualEndDate='.$todo->actual_end_date.
		'&developmentStatus='.$todo->development_status.
		'&issue='.$todo->issue.
		'&description='.$todo->description;
		?>
		<div class="row">
		  <div class="col-lg-12">
			<span class="PageTitle">To do Status</span>
				<div class="Title">
				 &nbsp; 
				 <input type="button" value="Edit"  title="Edit TODO" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Edit TODO','view/contents/pmp/todoForm.php<?php echo $queryString?>&operation=update')"/>
				 <input type="button" value="X"  title="Delete TODO" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Delete TODO','view/contents/pmp/todoForm.php<?php echo $queryString?>&operation=delete')"/>
				</div>
				<br>
			</div>
		 </div>
<table width="100%">		
<tr>
<td class='Label'>To Do</td>
<td class='Label'>Assigned To</td>
<td class='Label'>Start Date</td>
<td class='Label'>End Date</td>
<td class='Label'>Actual Start Date</td>
<td class='Label'>Actual End Date</td>
<td class='Label'>Status</td>
</tr>
<tr>
<td><?php echo $todo->todo_name;?></td>
<td><?php echo $todo->assigned_to;?></td>
<td><?php echo $todo->start_date;?></td>
<td><?php echo $todo->end_date;?></td>
<td><?php echo $todo->actual_start_date;?></td>
<td><?php echo $todo->actual_end_date;?></td>
<td>
<?php $progressBarValue=$todo->development_status; include("view/structure/progressBar.php"); ?>
</td>
<td>
</td>
</tr>
																			<tr>
<td colspan="6">&nbsp;</td>
																			</tr>
																			<tr>
<td class='Label' valign="top">Issue 
</td>
<td colspan="5" valign="top">
<?php echo $todo->issue;?>
</td>
																			</tr>
																			<tr>
<td colspan="6">&nbsp;</td>
																			</tr>
																			
																			<tr>
<td class='Label' valign="top">Description 
</td>
<td colspan="5">
<?php echo $todo->description;?>
</td>
																			</tr>
																			
		<?php 
	}
										
					}//if
				
			}
				?>
</table>				
		</fieldset>
		
<fieldset>
<legend class="Title">Bugs</legend>
</fieldset>
<fieldset>
<legend class="Title">Discussions</legend>
</fieldset>