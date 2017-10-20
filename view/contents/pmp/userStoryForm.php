	<form method="post">

			<div id="popUpContentsDiv" style='overflow-y:scroll;height:200px;'>
					
				<table width="100%">
				<tr>
					<td class="Label">Requirement Title</td>
					<td>
					    <input type="hidden" name="projectId" value="<?php echo (isset($_GET['projectId'])?$_GET['projectId']:'') ;?>">
						<input type="hidden" name="userStoryId" value="<?php echo (isset($_GET['userStoryId'])?$_GET['userStoryId']:'') ;?>">
						<input type="text" name="userStory" value="<?php echo (isset($_GET['userStory'])?$_GET['userStory']:'') ;?>">
					</td>
				</tr>
				<tr>
					<td class="Label">Priority</td>
					<td>
						<select name="priority">
							<option value="LOW">Low</option>
							<option value="MEDIUM">Medium</option>
							<option value="HIGH">High</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="Label" valign="top">Description</td>
					<td>
					<textarea name="description" rows="5" style="width:80%"><?php echo (isset($_GET['description'])?$_GET['description']:'') ;?></textarea>
					</td>
				</tr>
				<tr>
					<td class="Label">Attachment</td>
					<td>
					<input type="file" name="attachementPath" />
					</td>
				</tr>
				</table>
					
			</div>
			<div class='PopupButtonsBar'>
			
			<input type='submit' name="<?php echo (isset($_GET['operation'])?$_GET['operation']:'');?>UserStory" value="<?php echo (isset($_GET['operation'])?$_GET['operation']:'');?>">
			<input type='button' name="Cance" value="Cancel" data-dismiss="modal"/>
			</div>
	</form>
