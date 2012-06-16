<?php 
session_start();
$username=$_SESSION['views'];
//!Imp Declaration of $_SESSION['page'] here
$_SESSION['page'] = basename($_SERVER['PHP_SELF']) ;
$webpage= $_SESSION['page'];

require_once("../../database.connection.php");
?>  
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 

<title>About Us &#124; St Claire Opals</title>

<meta name="author" content="jelectronics" /> 
<meta name="description" content="St Claire Opals has opals for sale which are mainly from Australia.." />
<meta name="keywords" content="about us,opals from australia" />
<meta name="robots" content="index,follow" /> 
<meta name="robots" content="noodp" />

<link rel="author" href="../g5/humans.txt" />
<link rel="shortcut icon" href="../g5/assets/favicon.ico" />
<link rel="apple-touch-icon" href="../g5/assets/favicon.png" />
<!--
<link rel="stylesheet" media="screen" href="g5/css/base.css?v=2" /> 
-->
<!--Load CSS-->

<link rel="stylesheet" href="../blueprint/screen.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="../blueprint/print.css" type="text/css" media="print" /> 
  <!--[if lt IE 8]>
    <link rel="stylesheet" href="../blueprint/ie.css" type="text/css" media="screen, projection"/>
  <![endif]-->

<link rel="stylesheet" href="../menu/css/style.css" type="text/css" media="all">
<script type='text/javascript' src='../menu/js/jquery.js'></script>
<script type='text/javascript' src='../menu/js/script.js'></script>

<link rel="stylesheet" media="screen" href="../css/global.css" /> <!--Load CSS-->
<link  id="stylesheet" rel="stylesheet" type="text/css" href="../css/images.css"/>
<link rel="stylesheet" href="../css/html5.css" type="text/css" media="screen, projection"/>

<link rel="stylesheet" media="handheld" href="../g5/css/handheld.css?v=2" /> <!-- Mobile -->
<style type="text/css">
	#wrapper {
		height: 1500px;
	}
</style>
<script src="../g5/js/libs/modernizr-1.6.min.js"></script> <!-- Modernizr -->
<!--[if gt IE 8]>
	<link rel="stylesheet" href="../css/ie9.css" type="text/css" media="screen, projection"/>
<![endif]-->
 <!--[if !IE]><!-->  
    <link rel="stylesheet" href="../css/not-ie.css" type="text/css" media="screen, projection"/>
<!--<![endif]--> 

</head>
<body onload="check_radio()">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
    <section id="layer-border-name">
			<form name="form" action="../searchresults.php" method="get">
			  <fieldset>
		 		<label></label><input type="text" name="q" id="q" value="<?php echo @$_GET['q']?>" />
			  	<label></label><input type="submit" name="Submit" id="sSubmit" value="Search"  />
		  	  </fieldset>
			</form>
	</section>
    <section id="wrapper">

        <header id="masthead" class="top">
        	
        </header><!--end #top changed to class .top -->
        <nav id="nav-container" style="float:left;">
		   <ul  class="nav" id="1" style="float:left;margin-right:0;">
             <li><a title="home" class="menu" href="../"><span>Home</span></a></li>
             <li><a title="opals" class="menu other" href="../"><span>Products</span></a>
	 			 <ul class="sub" style="text-align:left;">
	                    <li><a href="../opals-for-sale.php">Opals</a></li>
	                    <li><a href="../jewellery-for-sale.php">Jewellery</a></li>
	             </ul>
	         </li>
 			 <li><a title="search" class="menu" href="../search.php"><span>Search</span></a></li>

 			 <li><a title="contact" class="menu" href="../contact-us.php">Contact Us</a></li>
             <li><a title="about" class="menu" href="../about-us.php"><span>About Us</span></a></li>
             <li>
			 <a title="how to care for" class="menu" href="../how-to-care-for-opals.php"><span>How to care for Opals</span></a></li>
	       </ul> 
		</nav>
		<section class="australian-opals-section">
			<article class="span-16 prepend-4 append-4">
				<!-- CMS start -->
				<?php
					include('editable_region.php');
				?>	
		 	    <!-- CMS end -->		
			
		</article>
		</section>	
	  

	</section>  <!--end #wrapper-->
	 	
		<footer id="footer" class="australian-opals-section span-24">
	         <br />
			<p>Email: <a href="mailto:peter@stclaireopals.com">Peter</a> or <a href="mailto:inger@stclaireopals.com">Inger</a></p>
			<p>Tel:<a href="../contact-us.php">+44 (0)2392468254</a></p>
	    </footer><!--end #bottom-->
<script type="text/javascript" src="../js/jquery-1.7.min.js"></script><!--Load jQuery-->
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<script type="text/javascript">
	function check_radio()
	{
	 	document.getElementById("radio_or").checked=true;
	}
</script>


</body>
</html>