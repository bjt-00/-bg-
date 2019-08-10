 <?php 
 include 'src/com/bitguiders/dataaccesslayer/DataAccess.php';
 include 'src/com/bitguiders/util/Date.php';
 include 'src/com/bitguiders/weblayer/model/UserBackingBean.php';
 include 'src/com/bitguiders/weblayer/model/order/OrderBackingBean.php';
 include 'src/com/bitguiders/weblayer/model/pmp/PMPBackingBean.php';

 
 

 if(empty($_SESSION['DataAccess'])){
 $dataAccess = new DataAccess();
 $_SESSION["DataAccess"] = serialize($dataAccess);
 $currentAction = null;
 $date = new Date();
 $_SESSION["Date"] = serialize($date);
 $user = new UserBackingBean();
 $_SESSION["UserBackingBean"] = serialize($user);
 $order = new OrderBackingBean();
 $_SESSION["OrderBackingBean"] = serialize($order);
 //if user already logged in
 }else{
 	
	  //print_r($_SESSION['UserSettingsBackingBean']);
	  $dataAccess = unserialize($_SESSION['DataAccess']);
	  $date = unserialize($_SESSION['Date']);
	  $user = unserialize($_SESSION['UserBackingBean']);
	  $order = unserialize($_SESSION['OrderBackingBean']);
  }

   if(isset($_SESSION['userId'])){
  	$user->setUser($_SESSION['userId']);
  }
  
  
  
  if(isset($_POST['signIn'])){
     $user->signIn();
    }
 else if(isset($_GET['signOut'])){
 	$user->signOut();
    }
  
  ?>