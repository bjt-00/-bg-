<br>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<div class="container">

<script type="text/javascript" src="galleries/script/jquery.min.js"></script>

<style type="text/css">

/*Make sure your page contains a valid doctype at the top*/
#simplegallery1{ //CSS for Simple Gallery Example 1
position: relative; /*keep this intact*/
visibility: hidden; /*keep this intact*/
border: 2px solid #e1e1e1;
border-left-style-ltr-source: physical;
border-left-style-rtl-source: physical;
}

#simplegallery1 .gallerydesctext{ //CSS for description DIV of Example 1 (if defined)
text-align: left;
padding: 2px;
}

</style>

<script type="text/javascript" src="galleries/script/simplegallery.js">

/***********************************************
* Simple Controls Gallery- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>

<script type="text/javascript">
var simpleGallery_navpanel={
		loadinggif: 'galleries/images/ajaxload.gif', //full path or URL to loading gif image
		panel: {height:'45px', opacity:0.5, paddingTop:'5px', fontStyle:'bold 11px Verdana'}, //customize nav panel container
		images: [ 'galleries/images/left.gif', 'galleries/images/play.gif', 'galleries/images/right.gif', 'galleries/images/pause.gif'], //nav panel images (in that order)
		imageSpacing: {offsetTop:[-4, 0, -4], spacing:10}, //top offset of left, play, and right images, PLUS spacing between the 3 images
		slideduration: 500 //duration of slide up animation to reveal panel
	}

<?php 

$gallery = ($_GET['event']!=null?$_GET['event']:'home');
$totalImages =3;
$images = array("1.png");
$links = array("#","#","#");
$targets= array("_self","_self","_self");
$titles= array("Event Gallery","Event Gallery","Event Gallery");

if($gallery =='COMPPEC 2006'){
$images = array("comppec_2006_1.jpg","comppec_2006_2.jpg","comppec_2006_3.jpg");
$titles= array("2006 Gallery","2006 Gallery","2006 Gallery");
$links = array("http://archives.dailytimes.com.pk/islamabad/07-May-2006/comppec-2006-concludes","#","#");
$targets= array("_new","_new","_new");

$totalImages =3;
}

if($gallery =='NASCON 2012'){
$images = array("nascon_1.jpg","nascon_2.jpg","nascon_3.jpg");
$titles= array("bitguiders won Web Designing contest at Islamabad,Pakistan","bitguiders won web designing contest at islamabad,Pakistan","bitguiders won web designing contest at islamabad,Pakistan");
$links = array("#","#","#");
$targets= array("_self","_self","_self");
$totalImages =3;
}
if($gallery =='Visio Spark 2012'){
	$images = array("bitguiders_0.png","bitguiders_1.jpg","bitguiders_2.jpg","bitguiders_3.jpg","bitguiders_4.jpg","bitguiders_5.jpg");
	$titles= array("bitguiders scored 1st Position in Web Designing contest at COMSATS Islamabad","2012 Gallery","2012 Gallery","2012 Gallery","2012 Gallery","2012 Gallery");
	$links = array("#","#","#","#","#","#");
	$targets= array("_self","_self","_self","_self","_self","_self");
	$totalImages =6;
}

if($gallery =='ak'){
$images = array("0.jpg","1.jpg","2.jpg","3.jpg","4.jpg","5.jpg","6.jpg","7.jpg","8.jpg","9.jpg","10.jpg","11.jpg","12.jpg","13.jpg");
$titles= array("2009 at Pak Monoment","2011 in Office","2008 Telco Summit","2008 Telecom Summit at Marriott","2011 with Office Team","2011 Islamabad Hotel","April 2012 Pak Monoment Islamabad","April 2011 Islamabad","Office Cafe 2012","Teralight  Team","Jan 2012 Islamabad","April 2012 Lake view Islamabad","April 2012 Lake view Islamabad");
$links = array("#","#","#","#","#","#","#","#","#","#","#","#");
$targets= array("_self","_self","_self","_self","_self","_self","_self","_self","_self","_self","_self","_self");
$totalImages =13;
}

if($gallery =='PMP 2015'){
$images = array("bitguiders_0.png","bitguiders_1.png","bitguiders_2.png","bitguiders_3.png");
$titles= array("","","","");
$links = array("#","#","#","#");
$targets= array("_self","_self","_self","_self");

$totalImages =4;
}

if($gallery =='imtehan'){
	$images = array("bitguiders_imtehan_0.png","bitguiders_imtehan_1.png","bitguiders_imtehan_2.png","bitguiders_imtehan_3.png","bitguiders_imtehan_4.png","bitguiders_imtehan_5.png","bitguiders_imtehan_6.png");
	$titles= array("","","","","","","");
	$links = array("#","#","#","#","#","#","#");
	$targets= array("_self","_self","_self","_self","_self","_self","_self");

	$totalImages =7;
}

if($gallery =='thesuffah.org June-2014'){
$images = array("thesuffah_0.png","thesuffah_1.png","thesuffah_2.png","thesuffah_3.png","thesuffah_4.png","thesuffah_5.png","thesuffah_6.png","thesuffah_7.png","thesuffah_8.png","thesuffah_9.png","thesuffah_10.png");
$titles= array("thesuffah::: Quran,Hadith & You","","","","","","","","","","");
$links = array("http://www.thesuffah.org","#","#","#","#","#","#","#","#","#","#");
$targets= array("_new","_self","_self","_self","_self","_self","_self","_self","_self","_self","_self");
$totalImages =11;
}

?>
var mygallery=new simpleGallery({
	wrapperid: "simplegallery1", //ID of main gallery container,
	dimensions: [680, 520], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
	imagearray: [
<?php 
 for($i=0;$i<$totalImages;$i++){
  $imagePath = "galleries/".$gallery."/".$images[$i];
	
  echo "['".$imagePath."','".$links[$i]."','".$targets[$i]."','".$titles[$i]."']";

if($i!=$totalImages){ echo ",";}
}//for end
?>
],
	autoplay: [true, 2500, 2], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	oninit:function(){ //event that fires when gallery has initialized/ ready to run
		//Keyword "this": references current gallery instance (ie: try this.navigate("play/pause"))
	},
	onslide:function(curslide, i){ //event that fires after each slide is shown
		//Keyword "this": references current gallery instance
		//curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
		//i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
	}
})

</script>


	<div class="row">
		<div class="col-lg-2">			
		<span class="PageTitle">Gallery:
		 <?php echo $_GET['event'];?>
		</span>
		<?php include("view/contents/events.php"); ?>
		</div>
		<div class="col-lg-10">				
		<div id="simplegallery1"></div>
		</div>
	</div>
</div>
