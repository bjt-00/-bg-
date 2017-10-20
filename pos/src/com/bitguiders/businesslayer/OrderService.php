 <?php 
 include 'src/com/bitguiders/weblayer/model/order/OrderBackingBean.php';
 include 'src/com/bitguiders/dataaccesslayer/DataAccess.php';
 

 $order = new OrderBackingBean();
 
  if(isset($_GET['newOrder'])){
     $order->createNewOrder();
    }
  else if(isset($_GET['newItem'])){
     $order->addNewItem();
    }
  else if(isset($_GET['deleteItem'])){
     $order->deleteItem();
    }
    else if(isset($_GET['resetOrders'])){
     $order->resetOrders();
    }
    else{
   	header("location:index.php");
   }
  ?>