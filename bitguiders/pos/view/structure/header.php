<?php
session_start();
include"view/structure/menu.php" ;
 ?>
 <br>
 <br>
 <br>
 <br>
<!-- Half Page Image Background Carousel Header -->
<?php if(!isset($_SERVER['Yes']) && !strpos($_SERVER['REQUEST_URI'],'action=bpos') && !strpos($_SERVER['REQUEST_URI'],'slideshow.php')&&!strpos($_SERVER['REQUEST_URI'],'pmp.php')&&!strpos($_SERVER['REQUEST_URI'],'training.php')){?>         
<header id="mainSlider" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#mainSlider" data-slide-to="0" class="active"></li>
            <li data-target="#mainSlider" data-slide-to="1"></li>
            <li data-target="#mainSlider" data-slide-to="2"></li>
            <li data-target="#mainSlider" data-slide-to="3"></li>
         </ol>

         <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('galleries/home/4.png');"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
 
             <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('galleries/home/1.png');"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('galleries/home/2.png');"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('galleries/home/3.png');"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
            
         </div>

        <!-- Controls -->
        <!--a class="left carousel-control" href="#mainSlider" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#mainSlider" data-slide="next">
            <span class="icon-next"></span>
        </a-->
    </header>
<?php }?>