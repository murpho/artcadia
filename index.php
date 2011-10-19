<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="shortcut icon" href="favicon.ico" />
<title>artcadia &#124; online community art gallery</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="This website is an online art gallery intended for budding artists or any artist who wants to show their work." />
<meta name="keywords" content="online art gallery,ONLINE,on-line,art,gallery,ONLINE ART GALLERY,online community art gallery" />
<meta name="author" content="jelectronics" />
<meta name="robots" content="all" />
<meta name="revisit-after" content="7 days" />
<meta name="rating" content="general" />


<link  id="stylesheet" rel="stylesheet" type="text/css" href="css/global.css"/>
<link rel="stylesheet" type="text/css" href="css/slider-panel-styles.css" />
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/default_image.js"></script>
<link href="css/ui.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.tabs.js"></script>
<script type="text/javascript" src="js/dreamweaver.rollover.js"></script>

<link  rel="stylesheet" type="text/css" href="css/CSS3-webkit-moz-o.css"/>
<link  rel="stylesheet" type="text/css" href="css/mobile.css"/>
<!--
<link  id="stylesheet" rel="stylesheet" type="text/css" media="screen and (min-width:480px)" href="css/width-480.css"/>
-->
<!--
<script type="text/javascript" charset="utf-8">
<![CDATA[ 
var jq=jQuery.noConflict();
			jq(function(){
				jq("a[rel*='license']").attr('target','_blank');
			});

]]> 
</script>

-->

<script type="text/javascript">
function getInnerWidth() {
	return (window.innerWidth)?window.innerWidth:((document.documentElement.clientWidth)?document.documentElement.clientWidth:document.body.clientWidth);
}
	
function checkWidth () {

	if(getInnerWidth()<=480) {
	document.bodyclassName+= 'wide';
	//document.getElementById("container").style.backgroundImage = "url(images/anemones.jpg)";
    //'<link  rel="stylesheet" type="text/css" href="css/width-480.css"/>';   
	
	
	document.getElementById('stylesheet').href = 'css/width-480.css';


	
	}

}
</script>
</head>

<body>
<!--
<div id="layer-border-top"><img src="assets/artcadia-border-top.png" alt="border top"/></div>
-->
<div id="layer-border-name"><form name="form" action="searchresults.php" method="get">
  <fieldset>
  <label><input type="radio" name="logic" id="radio_or" value="OR" checked="checked"/> OR</label>
  <label><input type="radio" name="logic" id="radio_and" value="AND" /> AND</label>
  <label><input type="text" name="q" /></label>
  <label><input type="submit" name="Submit" value="Search" /></label>
  </fieldset>
</form>
	
</div>
<div id="masthead">
<?php
					
require_once("database.connection.php");

?>

</div>
<div id="top_nav">

	<div id="tabsH" style="font-family:Verdana, Arial, sans-serif">
	   <ul>
             <li><a title="home" class="menu" href="index.php"><span>Home</span></a></li>
             <li><a title="artists" class="menu other" href="artists.php"><span>Artists</span></a></li>
             <li><a title="medium"class="menu" href="medium.php"><span>Medium</span></a></li>
             <li><a title="login"class="menu" href="login.php"><span>Login</span></a></li>
             <li><a title="register"class="menu" href="signup.php"><span>Register</span></a></li>
             <li><a title="search"class="menu" href="search.php"><span>Search</span></a></li>
 			 <li><a title="contact"class="menu" href="mailto:artcadia@ymail.com"><span>Contact</span></a></li>
             <li><a title="about"class="menu" href="artcadia-online-art-gallery-about-us.php"><span>About us</span></a></li>
 
           
       </ul>         
    </div>

</div>
 

<div id="container">
	<div id="clear_floats"></div>
	<div id="left_col">
	</div>
	<div id="right_col">
	</div>
	<div id="page_content">
	  <div id="loader">
	  	<div class="spacer"></div>
	  	<img src="assets/ajax-loader (2).gif" alt="loading..please wait" />
	  </div> 
      <div id="tabs">  <!-- tabs -->  
      	<ul class="tabNavigation">    
      		<li><a href="#message">Welcome</a></li>    
      		<li><a href="#shareFile">Recent Uploads</a></li>    
      		<li><a href="#arrange">New to artcadia.org</a></li>  
      	</ul>  <!-- tab containers -->  
      	<div id="message">   	
	    	<div class="left-intro">
               <p><strong><span style="font-size:xx-large;">a</span>rtcadia.org</strong> is an online community art gallery.
               Share your artwork with family and friends or other like-minded people.</p>
               <p>Leave comments on others artwork or your own if you like.</p>
            </div>
            <div class="right-intro">
				<p><a href="login.php">Chat</a></p>
				<p>Leave instant messages on the site.</p>
				<p><a href="login.php">Review Artwork</a></p>
				<p>You can review other artists work when you login.</p>
				<p><a href="login.php">Upload Images</a></p>
				<p>You must sign up before you can upload your artwork. This service is free.</p>
				<p><a href="artists.php">View Artwork</a></p>
			</div>

	    </div>  
      	<div id="shareFile">  
      		<div class="left-intro"><p>A recent image published. Click image to view details of artwork.</p>
		    </div>
		    <div class="random-intro" style="width:120px;margin:0;">
						<?php
						
						$start=2;
						$query = "SELECT * FROM paintings";
						
						$numresults=mysql_query($query);
						$numrows=mysql_num_rows($numresults);
						
						$random = mt_rand($start, $numrows);
						
						$query = "SELECT * FROM paintings WHERE ID LIKE '$random' AND public_view = 'y'";
						//$query = "SELECT * FROM paintings WHERE ID LIKE '$random'";
						$result = mysql_query($query) or die("Couldn't execute query");
						
						while ($row= mysql_fetch_array($result)) {
						$imagename=$row['imagename'];
						$target=$row['target'];
						$thumbnail=$row['thumbnail'];
						$path=$row['folder'];
						$title=$row['title'];
					////replaces space with symbol - $imagename to $amended_name		
						include ("replace-space.php");
		
						$path= 'artists/'.$path; 
						?>
						<table class="art-piece-table" style="margin-top:10px;"> 
						<tr><td  class="art-piece" valign="middle">
						<a  class="image" href="art-piece.php?name=<?php echo $amended_name?>">
						<img src="<?php echo $path . '/'.$thumbnail ?>" alt="<?php echo $medium ?>"/></a>
						</td></tr>
						<tr><td  class="art-piece-title">
						<?php print("$title"); ?>
						
						</td>
						</tr>
	    				</table>
						<?php
										
				     	}
						   
						?>
						
		    </div><!-- randonimage -->
	   	</div><!-- end shareFile -->  
      	<div id="arrange">    
      	   <div class="left-intro">
      	   <p>If you are a budding artist or just like to paint as a hobby and you would like your paintings or other artwork to be shown on this website please register.</p>
       	   </div>
       	   <div class="left-intro">
       	      <a href="signup.php"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('sign_up','','assets/artcadia-sign-up-over.png',1)">
			  <img name="sign_up" id="sign_up" style="border:0;" src="assets/artcadia-sign-up.png" alt="link to sign up"/></a>

       	   </div>
       	</div>
     </div><!-- end tabs -->
     <div style="clear:both;"></div>
	 <div id="photo_container" >
	    <h1>Share your artwork</h1>
	    <p>&nbsp;</p>
		<?php 
		//**EDIT TO YOUR TABLE NAME, ECT. 
		
		$t = mysql_query("SELECT * FROM `paintings` WHERE public_view = 'y'"); 
		  if(!$t) die(mysql_error()); 
		    
		$a                  = mysql_fetch_object($t); 
		$total_items      = mysql_num_rows($t); 
		$limit            = $_GET['limit']; 
		$type             = $_GET['type']; 
		$page             = $_GET['page']; 
		
		//set default if: $limit is empty, non numerical, less than 10, greater than 50 
		if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) { 
		     $limit = 15; //default 
		} 
		//set default if: $page is empty, non numerical, less than zero, greater than total available 
		if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $total_items)) { 
		      $page = 1; //default 
		} 
		//ADDED: gt.220911
		if($page!=1){
		 echo $page;
		 include ('homepage.inc');
		}
		
		
		//calcuate total pages 
		$total_pages     = ceil($total_items / $limit); 
		$set_limit          = $page * $limit - ($limit); 
		
		//query: **EDIT TO YOUR TABLE NAME, ECT. 
		
		$q = mysql_query("SELECT * FROM `paintings` WHERE public_view = 'y' LIMIT $set_limit, $limit"); 
		  if(!$q) die(mysql_error()); 
		     $err = mysql_num_rows($q); 
		       if($err == 0) die("No matches met your criteria."); 
		
		//Results per page: **EDIT LINK PATH** 
		
		//show data matching query: 
		while($code = mysql_fetch_array($q)) { 

			$imagename=$code ['imagename'];
			$target=$code ['target'];
			$thumbnail=$code ['thumbnail'];
			$path=$code ['folder'];
			$title=$code ['title'];
		    ////replaces space with symbol - $imagename to $amended_name		
			include ("replace-space.php");
			
			$path= 'artists/'.$path; 
			?>
			
			<table class="art-piece-table"> 
			<tr><td  class="art-piece" valign="middle">
			<a  class="image" href="art-piece.php?name=<?php echo $amended_name?>" >
			<img src="<?php echo $path . '/'.$thumbnail ?>" alt="<?php echo $medium ?>"/></a>
			</td></tr>
			<tr><td  class="art-piece-title">
			<?php print("$title"); ?>
			
			</td>
			</tr>
			</table>
		
		
		<?php
		
		
		}
		?>
		<div style="clear:both;"></div>
		<div class="box-50px"></div>

		<?php  
		
		$cat = urlencode($cat); //makes browser friendly 
		
		//prev. page: **EDIT LINK PATH** 
		
		$prev_page = $page - 1; 
		
		if($prev_page >= 1) { 
		  echo("<b>&lt;&lt;</b> <a href=$PHP_SELF?cat=$cat&amp;limit=$limit&amp;page=$prev_page><b>Prev.</b></a>"); 
		} 
		
		//Display middle pages: **EDIT LINK PATH** 
		
		for($a = 1; $a <= $total_pages; $a++) 
		{ 
		   if($a == $page) { 
		      echo("<b> $a</b> | "); //no link 
		     } else { 
		  echo("  <a href=$PHP_SELF?cat=$cat&amp;limit=$limit&amp;page=$a> $a </a> | "); 
		     } 
		} 
		
		//next page: **EDIT THIS LINK PATH** 
		
		$next_page = $page + 1; 
		if($next_page <= $total_pages) { 
		   echo("<a href=$PHP_SELF?cat=$cat&amp;limit=$limit&amp;page=$next_page><b>Next</b></a> &gt; &gt;"); 
		} 
		
		//all done 
		if($total_items >10) {
				include("photo_container.inc.php");
		}
		?> 
		

    </div><!-- photo_container div -->
  </div><!-- page_content -->
</div><!-- container -->
<div id="footer">
	<?php
	
	$query = "SELECT * FROM footer WHERE ID LIKE '1'";
	$result = mysql_query($query) or die("Couldn't execute query");
	
	while ($row= mysql_fetch_array($result)) {
	$footercaption=$row['caption'];
	echo "$footercaption";
	}
			
	?>

<br /><br />
<!-- <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/" target="_blank"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a><br /><span xmlns:dc="http://purl.org/dc/elements/1.1/" href="http://purl.org/dc/dcmitype/StillImage" property="dc:title" rel="dc:type">artcadia creation</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">artists of artcadia.org</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/" target="_blank">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>. -->
<!--
<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a><br /><span xmlns:dc="http://purl.org/dc/elements/1.1/">artcadia creation</span> by <span xmlns:cc="http://creativecommons.org/ns#">artists of artcadia.org</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/" >Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.
-->
<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a><br /><span xmlns:dc="http://purl.org/dc/elements/1.1/">artcadia creation</span> by <span xmlns:cc="http://creativecommons.org/ns#">artists of artcadia.org</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.

</div><!-- end footer -->

</body>

</html>
