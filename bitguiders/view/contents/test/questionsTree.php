    <?php
    include 'src/com/bitguiders/weblayer/model/training/TestBackingBean.php';
    $testBackingBean = new TestBackingBean();
    
    $questions = $testBackingBean->getTest(0);
    $trainingCode = 'BJT-01';
    $currentQuestionId=0;
    $previousQuestionId=0;
?>

 <div class="panel-group" id="accordion">
 <?php while($question = mysql_fetch_object($questions)){
    if($currentQuestionId!=$question->training_question_id){
    	$currentQuestionId =$question->training_question_id;
    	//fir first time only
    	if($previousQuestionId==0){
    		$previousQuestionId =$currentQuestionId;
    	}
    ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#question-<?php echo $question->training_question_option_id;?>">
        <?php echo $question->question;?>
        </a>
      </h4>
    </div>
    <div id="question-<?php echo $question->training_question_option_id;?>" class="panel-collapse collapse">
      <div class="panel-body">
       <ol>
      <?php }//if?>
      
            <?php echo "<li>".$question->question_option.'='.$previousQuestionId.'-'.$currentQuestionId."</li>";?>
            
      <?php 
      if($previousQuestionId!=$currentQuestionId){
      	$previousQuestionId=$currentQuestionId;
      	$currentQuestionId =$question->training_question_id;
      ?>
      </ol>
      </div>
      <div class="panel-footer">
      	<input type="button" value="More Details"  title="More Details" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Training Details','view/contents/training/details/BJCT-02.php')"/>
      	<input type="button" value="Register Now"  title="Register Now" style="float:right" data-toggle="modal" data-target="#myModal" onclick="showPopUp('Training Registration','view/contents/training/trainingRegistrationForm.php?trainingCode=BJCT-02&technology=Java EE 6 Web Component Developer Certified Expert [BJCT-02]&price=500&operation=update')"/>
        <br> 
      </div>
    </div>
  </div>
  <?php }//if?>
<?php }?>
</div> 		
    