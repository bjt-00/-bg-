    <?php
    if(isset($_POST['registerNow'])){
				 		$order->registerNow();
				 		$budget = $_POST['budget'];
				 		$phone = $_POST['phone'];
				 		$orderEmail = $_POST['email'];
				 		$description = $_POST['description'];
				 		//header("Refresh:0");
				 	} 
				 	?>
	<div class="row">
		  <div class="col-lg-12">
			<span class="PageTitle">&nbsp; IT  Training</span>
			<br>
			<p>
			&nbsp;&nbsp;Develop technology expertise to expand your knowledge and drive results.
			All trainings are given by Certified Market Experts. And are 100% practicle. Each topic 
			will be delivered to you with on the spot practicle examples. Trainer will encourage you
			to setup your own development enviornment. And practice it yourself.
			</p>
		  </div>
	</div>
<?php include 'view/structure/alert.php';?>	
<div class="row">
  <div class="col-lg-12">
    <div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading"><b>Get Training</b></div>
			<div class="panel-body">
				<?php include 'javaTraining.php';?>
			</div>
		</div>
  </div>
		<div class="col-lg-4">
		<div class="panel panel-success">
			<div class="panel-heading"><b>Get Certified</b></div>
			<div class="panel-body">
				<?php include 'certificationTraining.php';?>
			</div>
		</div>
		</div>
		
		<div class="col-lg-4">
		<div class="panel panel-danger">
			<div class="panel-heading"><b>Training Material</b></div>
			<div class="panel-body">
				<?php include 'trainingMaterial.php';?>
			</div>
		</div>
		</div>
		 
	</div>
	</div>
