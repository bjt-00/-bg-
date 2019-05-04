<?php 

include '../../../src/com/bitguiders/dataaccesslayer/DataAccess.php';
include '../../../src/com/bitguiders/weblayer/model/pmp/PMPBackingBean.php';

$pmp = new PMPBackingBean(); 

 $userStoryId = (isset($_GET['userStoryId'])?$_GET['userStoryId']:'') ;
 $userStory='';
 $priority='LOW';
 $description='';
 
 if($userStoryId!=''){
     $userStoryResult = $pmp->getUserStoryById($userStoryId);
     
     while($user_story = mysql_fetch_object($userStoryResult)){
         $priority=$user_story->priority;
         $description=$user_story->description;
         $userStory=$user_story->user_story;
     }
 }
?>
	<form method="post">

			<div id="popUpContentsDiv" style='overflow-y:scroll;height:200px;'>
					
				<table width="100%">
				<tr>
					<td class="Label">Requirement Title</td>
					<td>
					    <input type="hidden" name="projectId" value="<?php echo (isset($_GET['projectId'])?$_GET['projectId']:'') ;?>">
						<input type="hidden" name="userStoryId" value="<?php echo (isset($_GET['userStoryId'])?$_GET['userStoryId']:'') ;?>">
						<input type="text" name="userStory" value="<?php echo $userStory;?>">
					</td>
				</tr>
				<tr>
					<td class="Label">Priority</td>
					<td>
						<select name="priority">
							<option value="LOW" <?php echo ($priority=='LOW'?'selected':'');?>>Low</option>
							<option value="MEDIUM" <?php echo ($priority=='MEDIUM'?'selected':'');?>>Medium</option>
							<option value="HIGH" <?php echo ($priority=='HIGH'?'selected':'');?>>High</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="Label" valign="top">Description</td>
					<td>
					<textarea name="description" rows="5" style="width:80%"><?php echo $description;?></textarea>
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

	