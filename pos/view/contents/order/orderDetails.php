   <?php 
   if(!isset($_SESSION['ordersList'])){
   	$ordersList = array();
   	$_SESSION['ordersList']=$ordersList;
   }
   //get current order
   $currentOrder = (isset($_GET['currentOrder'])?$_GET['currentOrder']:1);
   
   //get current order items
   $itemsList = array();
   for($i=0;$i<count($_SESSION['ordersList']);$i++){
   	  $order = $_SESSION['ordersList'][$i];
   	  if($currentOrder==$order[0]){
   	  	$itemsList = $order[1];
   	  }
   }
    
   ?>
	     
	     <table width="100%">
	         <tr>
	         	<td colspan="5" align="center"> <b>Cash & Carry</b></td>
	         </tr>
	     	<tr>
	     	   <td colspan="2"><b>Current Order Code : <?php echo (isset($_GET['currentOrder'])?$_GET['currentOrder']:0)?></b></td>
	     	   <td></td>
	     	    <td colspan="2"><b>Operator : <?php echo (isset($_SESSION['userName'])?$_SESSION['userName']:0)?></b></td>
	     	  </tr>
	         <tr>
	         	<td colspan="5"> &nbsp;</td>
	         </tr>
	     	  <tr>
	     	   <th>Item</th>
	     	   <th>Qty</th>
	     	    <th>Rate</th>
	     	    <th>Amount</th>
	     	    <th>Action</th>
	     	  </tr>
	     	  <?php
	     	  $total=0;
	     	   for($i=0;$i<count($itemsList);$i++){ 
	     	   	$total = $total+$itemsList[$i][3];
	     	   ?>
	     	<tr>
	     	   <td><?php echo $itemsList[$i][0];?></td>
	     	   <td><?php echo $itemsList[$i][1];?></td>
	     	   <td><?php echo $itemsList[$i][2];?></td>
	     	   <td><?php echo $itemsList[$i][3];?></td>
	     	   <td><a href="?action=OrderService&currentOrder=<?php echo (isset($_GET['currentOrder'])?$_GET['currentOrder']:0)?>&deleteItem&itemName=<?php echo $itemsList[$i][0];?>">X</a></td>
	     	  </tr>
	     	  <?php }?>
	         <tr>
	         	<td colspan="5"> &nbsp;</td>
	         </tr>
	     	  <tr>
	     	   <td colspan="2"><b>Net Amount</b></td>
	     	   <td></td>
	     	    <td colspan="2"><b><?php echo $total;?></b></td>
	     	  </tr>
	     	  
	     	  </table>
<ul class="pagination pagination-sm">
<?php for($i=0;$i<count($_SESSION['ordersList']);$i++){ ?>
<li><a href="?action=bpos&currentOrder=<?php echo $_SESSION['ordersList'][$i][0];?>"><?php echo $i+1?></a></li>
<?php }?>
</ul>

<a href="?action=OrderService&newOrder=">Create New Order</a>
<a href="?action=OrderService&resetOrders=">Reset Orders</a>	     
