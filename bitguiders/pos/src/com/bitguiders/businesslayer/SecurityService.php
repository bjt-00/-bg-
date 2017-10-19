 <?php 
 include 'src/com/bitguiders/weblayer/model/UserBackingBean.php';
 include 'src/com/bitguiders/dataaccesslayer/DataAccess.php';
 

 $user = new UserBackingBean();
 
  if(isset($_POST['signIn'])){
     $user->signIn();
    }
 else if(isset($_GET['signOut'])){
 	$user->signOut();
    }
   else{
   	header("location:index.php");
   }
  ?>