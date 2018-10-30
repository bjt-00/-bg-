<div class="container">
		<div class="row">
		  <div class="col-lg-12">
			<span class="PageTitle">About bitguiders</span>
			<div>
				<p>
				<div class="Separator"></div>
				<div class="EventDescription">
					We are providing IT related services and solutions from 2006.
					Committed to provide quality Services.
					Time & Quality work is our identity.Dedicated & internationaly certified IT professionals are
					ready to serve you all the time.
					For Available Services,You can start from here.
			   </div>
			</div>
			</div>
		</div>											
		<div class="row">
		  <div class="col-lg-5">
			  <?php  include("view/contents/order/orderForm.php"); ?>
		  </div>
		  <div class="col-lg-3">
			<fieldset class="FieldSet">
			<legend class="Title">
			<img id="or" alt="" src="themes/default/icons/or.png" alt="OR" height="35" <?php echo (strpos($_SERVER['REQUEST_URI'],'orderstatus.php')?"style='display:none'":''); ?> >
			<img src="themes/default/icons/110.png" alt=" 2 of 3 " height="35"> Order Status 
			</legend>
		  		  
		  <?php if(!isset($_SESSION['userId'])){ 
			    include 'view/contents/order/orderStatusForm.php';
		    }else if($user->isAdmin()){
		   	include 'view/contents/order/ordersStatus.php';
		   }else{
		   	include 'view/contents/order/orderStatus.php';
		   }?>
		     </fieldset>
		   </div>
		</div>											
		<div class="row">
		  <div class="col-lg-12">
			<span class="Title"></span>
			<div>
				<p>
				<div class="Separator"></div>
				<div class="EventDescription">
				 We have entered the age of digital technology. Computer exists everywhere from a small kiosk to giant corporate house. Amongst all the sectors, information technology is following and will pave a path for faster growth. Infact e-business is becoming the most favored word with corporate as it took over from traditional business practices.
				A clear perception of the growing requirement of the corporate world in the area of IT has enabled bitguiders to develop programs of specific relevance for the present and the future.
				</div>
			</div>
			</div>
		</div>											
		<div class="row">
		  <div class="col-lg-12">
			<span class="Title">OUR MISSION</span>
			<div>
				<p>
				<div class="Separator"></div>
				<div class="EventDescription">
					Our mission is to give to the high-qualified programmers possibility to build advanced software.
				Our vision is to provide the highest quality of software development process. We are dedicated to building a long-term relationship with each customer - a partnership founded on commitment to quality and trust. We believe that we must provide innovative, competitive and top-quality services to our customers. Our first responsibility is to meet our customers&amp;rsquo; requirements, to finish the project on time and within budget.
				</div>
			</div>
			</div>
		</div>											
		<div class="row">
		  <div class="col-lg-12">
			<span class="Title">PHILOSOPHY</span>
			<div>
				<p>
				<div class="Separator"></div>
				<div class="EventDescription">
				   The business philosophy of the company is to lay emphasis on Human Values and Personal Relations. 'At bitguiders - Technology meets emotions and limits are higher than the sky.' Great stress is laid on proper communication, transparency and human relations, which forms an integral part of the corporate culture. At bitguiders, we not only develop products but we develop relationships.
				We at bitguiders believe in teamwork. With every new day the quest for acquiring new competencies continues. Forever searching, experimenting, innovating, learning, moving ahead with our sincere efforts and dedication, shaping the future, and challenging our competencies to create new opportunities, is a never-ending process in the company.
				</div>
			</div>
			</div>
		</div>											
</div>