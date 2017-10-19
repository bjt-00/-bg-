<!-- span class="ProgressBar" style="float:right" title="<?php echo (isset($progressBarValue)?floor($progressBarValue):0)?>%">
	<img  alt="" src="themes/default/images/progressBar1.png" width="<?php echo (isset($progressBarValue)?$progressBarValue:0)?>%" height="6">
</span -->
<?php 
  $progressBarType='success';
  $progressBarType = (isset($progressBarValue) && $progressBarValue<=25 ?'danger':$progressBarType);
  $progressBarType = (isset($progressBarValue) && $progressBarValue>25 && $progressBarValue<=45 ?'warning':$progressBarType);
  $progressBarType = (isset($progressBarValue) && $progressBarValue>45 && $progressBarValue<=50 ?'info':$progressBarType);
?>
<div class="progress">
  <div class="progress-bar progress-bar-<?php echo $progressBarType;?>" role="progressbar" aria-valuenow="<?php echo (isset($progressBarValue)?$progressBarValue:0)?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (isset($progressBarValue)?$progressBarValue:0)?>%">
    <?php echo round((isset($progressBarValue)?$progressBarValue:0))?>%
  </div>
</div>