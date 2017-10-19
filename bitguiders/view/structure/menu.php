<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

<img id="Logo" src="themes/default/images/bitguiders.png" alt="bitguiders ::: reforming bits" title="bitguiders ::: reforming bits" />
   
<div class="Menu">        
        <!-- Brand and toggle get grouped for better mobile display -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"></button>
                <div class="navbar-header Menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                 </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

<div class="collapse navbar-collapse Menu" id="bs-example-navbar-collapse-1">
				<!-- left menu -->
                <ul class="nav navbar-nav">
                    <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'index.php')?'active':''); ?>">
                        <a href="index.php">HOME</a>
                    </li>
                    <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'itservices.php')?'active':''); ?>">
                       <a  href="itservices.php">IT Services</a>
                    </li>
                    <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'products.php')?'active':''); ?>">
                       <a  href="products.php">Products</a>
                    </li>
                    <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'training.php') || strpos($_SERVER['REQUEST_URI'],'test.php' )|| strpos($_SERVER['REQUEST_URI'],'how-to.php')?'active':''); ?>">
                    	<a  href="training.php">Training</a>
                    </li>
                    <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'orderstatus.php') || strpos($_SERVER['REQUEST_URI'],'pmp.php')?'active':''); ?>">
                    	<a  href="orderstatus.php">Order Status</a>
                    </li>
                  </ul>
      <!-- right menu  -->     
      <ul class="nav navbar-nav navbar-right">
      
					<?php 
					if (isset($_SESSION['email'])){
						?>
						<li>
						<a href="#" title="<?php echo $_SESSION['email']?>"><span class="glyphicon"></span>
						<?php echo $user->getUserName();?>
						</a>
						</li>
						<li>
						<a name="signOut" href="orderstatus.php?signOut" ><span class="glyphicon glyphicon-log-out"></span>Log out</a>
						</li>
		<?php }else{?>
        <!-- a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li-->
        <li><a href="orderstatus.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		<?php }?>
      </ul>
                
                
            </div>
             <!-- /.navbar-collapse -->
  </div>
        <!-- /.container -->
</nav>