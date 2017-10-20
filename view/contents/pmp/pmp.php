				 						 <?php
				 						 if(isset($_SESSION['email'])){
				 						 	$order = new OrderBackingBean();
				 						 	if($user->isAdmin()){
				 						 		
				 						 		$result = $order->getOrdersList();
				 						 		$orders = ($result!=null?$order->getOrdersList():null);
				 						 	}else{
		  									$result= $order->getOrderStatus();
		  									$orders= ($result!=null?$order->getOrderStatus():null);
				 						 	}
				 						 }
				 						 
							  ?>

<?php include 'view/structure/alert.php';?>
							  
		<div class="row">
		<div class="col-lg-12">
						<?php 
						if(isset($_SESSION['email'])){
								if(isset($_GET['cos'])){
									$targetPage = 'view/contents/order/serviceAgreement.php';
								}if(isset($_GET['os'])){
									$targetPage = 'view/contents/order/orderStatus.php';
								}else if(isset($_GET['pc'])){
									$targetPage = 'view/contents/pmp/projectStatus.php';
								}else if(isset($_GET['us'])){
									$targetPage = 'view/contents/pmp/userStoryStatus.php';
								}else if(isset($_GET['sp'])){
									$targetPage = 'view/contents/pmp/sprintStatus.php';
								}else if(isset($_GET['td'])){
									$targetPage = 'view/contents/pmp/todoStatus.php';
								}
								
								include $targetPage;
										
						}
						?>
		</div>
	</div>			 						 
				<div id="contentsDiv">
				</div>
		<script>
	    function ahah(url, target) {
	        document.getElementById(target).innerHTML = ' Fetching data...';
	        if (window.XMLHttpRequest) {
	        req = new XMLHttpRequest();
	        } else if (window.ActiveXObject) {
	        req = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        if (req != undefined) {
	        req.onreadystatechange = function() {ahahDone(url, target);};
	        req.open("GET", url, true);
	        req.send("");
	        }
	        }
	        function ahahDone(url, target) {
	        if (req.readyState == 4) { // only if req is "loaded"
	        if (req.status == 200) { // only if "OK"
	        document.getElementById(target).innerHTML = req.responseText;
	        } else {
	        document.getElementById(target).innerHTML=" Loading Error:\n"+ req.status + "\n" +req.statusText;
	        }
	        }
	        }
	        function load(name, div) {
	        ahah(name,div);
	        return false;
	        }
		//load('http://www.bitguiders.com','contentsDiv');
		</script>
		    <area shape="rect" coords="255,519,399,558" href="http://www.google.com.pk/" onclick="load('http://www.google.com.pk/','contentsDiv');return false;">
