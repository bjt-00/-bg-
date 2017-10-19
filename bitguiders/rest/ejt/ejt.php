<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>EJT ::: ETL Job Tracker</title>

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
 
		<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>
	</head>
	<body>
		<div class="container">
		<img alt="EJT ::: ETL Job Tracker" src="images/ejt-logo.png">
<p>
<a class="btn btn-default btn-sm" href="index.php?p=ejt&s=el&a=add&user_id=abdul&domain=mapreduce&etl_job=pair&operation=add">Start Pair Job <span class="glyphicon glyphicon-play-circle"></span></a>
| <a class="btn btn-default btn-sm" href="index.php?p=ejt&s=el&a=add&user_id=abdul&domain=mapreduce&etl_job=stripes&operation=add">Start Stripes Job <span class="glyphicon glyphicon-play-circle"></span></a>
| <a class="btn btn-default btn-sm" href="index.php?p=ejt&s=el&a=add&user_id=abdul&domain=mapreduce&etl_job=hybrid&operation=add">Start Hybrid Job <span class="glyphicon glyphicon-play-circle"></span></a>
|  <a href="ejtm.php" class="btn btn-info btn-sm">
          <span class="glyphicon glyphicon-phone"></span> Mobile View 
</a>
</p>
<?php 
    header( "refresh:10;" );
	include "dataaccess/LogDAO.php";
 	$dao = new LogDAO();
    $result = $dao->getList();
?>
<table id="example" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>User Id</th>
<th>Domain</th>
<th>ETL Job</th>
<th>Operation</th>
<th>Start Time</th>
<th>End Time</th>
<th>Status</th>
</tr>
</thead>
<tbody>

<?php 
while($log = mysql_fetch_object($result)){
?>
<tr>
<td><?php echo $log->user_id;?></td>
<td><?php echo $log->domain;?></td>
<td><?php echo ' ['.$log->job_id.'] '.$log->etl_job;?></td>
<td><?php echo $log->operation;?></td>
<td><?php echo $log->start_time;?></td>
<td><?php echo $log->end_time;?></td>
<td style="color:<?php echo ($log->status=='new'?'red':($log->status=='started'?'orange':'green'));?>">
<span class="glyphicon glyphicon-<?php echo ($log->status=='new'?'time':($log->status=='started'?'refresh':'ok'));?>"></span> <?php echo $log->status;?> 
</td>
</tr>
<?php 
}
?>

</tbody>
</table>
			
		</div>

<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#example')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
</script>
	</body>
</html>