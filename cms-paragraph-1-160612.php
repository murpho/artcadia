<?php 
	session_start(); 
  	$webpage = $_SESSION['page'];
?>
<script type="text/javascript">
function hint_0()
{
document.getElementById("hint").innerHTML= "Click on question mark above item to get a hint.";
}

function hint_1()
{
document.getElementById("hint").innerHTML= "These are three different sections. Purple, Yellow, and Green. The coloured borders don't show when you log out.";
}
function hint_2()
{
document.getElementById("hint").innerHTML= "This is the Text Editor Toolbar. h1 = Large font (heading for start of new article); B = Makes font <bold>bold</bold>; i = Makes font italics; p = Breaks text into paragraphs; Globe icon = Creates internet link. You must highlight the text that you want formatted and then click on the required option h1,p,etc.";
}
function hint_3()
{
document.getElementById("hint").innerHTML= "Add a title to the article in this text box.";

}
function hint_4()
{
document.getElementById("hint").innerHTML= "Add the text you want to appear on the page here. You can use the Toolbar h1, B, i, p, globe icon, for formatting text.";
}
function hint_5()
{
document.getElementById("hint").innerHTML= "You can upload an image like 'Beckett' above, by clicking here and selecting image file.";
}
function hint_6()
{
document.getElementById("hint").innerHTML= "If you want to delete text from sections above . Tick checkbox.";
}
function hint_7()
{
document.getElementById("hint").innerHTML= "You must select section/paragraph (purple,yellow, or green) if you have entered title and text.";
}
function hint_8()
{
document.getElementById("hint").innerHTML= "You must click on 'Save Changes' to affect changes.";
}
function hint_9()
{
document.getElementById("hint").innerHTML= "<h2>Bullets</h2>The ul and li must be used together to make bullets. First type out text normally.<br /> Highlight first line that has to be bulleted.<br /> Click 'li' button.<br /> Highlight or Select Text for the second line where there's to be a bullet.<br /> Click 'li' button.<br /> Do this for all lines that require a bullet.<br /><br />The last step then is to highlight all the text starting at the first '<'li'>' and ending at the last '<'/li'>'.<br />Finally Click on 'ul'.<br /><br /> And that's it.";
}

function center(object,j)
 {
 	//object.style.position = "absolute";
  //object.style.marginLeft = "-" + parseInt(object.offsetWidth / 2) + "px";
  //object.style.marginTop = "-" + parseInt(object.offsetHeight / 2) + "px";
  //object.style.marginLeft = parseInt(object.offsetWidth / 2) + "px";
  //object.style.marginTop = parseInt(object.offsetHeight / 2) + "px";
  //	object.style.marginTop = 50 + "%";
  
  jQh = jQuery.noConflict();
 jQh('#hint').show();
  
jQh('#hint').css({     position:'absolute',     left: (jQh(window).width() - jQh('#hint').outerWidth())/2,     top: 0  }); 
 }
function hide_div (){
 jQhi = jQuery.noConflict();
 	//jQhi('#hint').click(function() {
	 jQhi('#hint').hide();
	//});
 }
</script>
<?php		
/***** TESTING ************/	
	//TO DO:
	//Remove force true statement
	//$username = 'admin1';
	//$_GET['nouser'] == "";
/****************/	
			if($username == 'admin1'&& $_GET['nouser'] == "") {
				include('admin.php');
				$admin_yes = TRUE;
    			
				
	?>
	<div style="position:relative"><button type="button" onclick="hint_1();center(hint,200);" style="float:right;">?</button></div>
    <script>window.onload=hint_0;</script>
			  <div style="position:relative;z-index:1000">
			  <div id="hint" onclick="hide_div()" style="background:#ffd;width:400px;color:black;border:2px black solid;font-weight:bold;padding:5px;"></div>
			  </div>
	<p>&nbsp;</p>
			  		  
<div style="background:#85C2FF;border:1px black solid;padding:3px;width:100%;position:relative;"><!-- fede22 #D6EBFF #3399FF-->



<div class="paragraph1">
	<?php
		
			$queryp = "SELECT * FROM admin WHERE username LIKE '$username'";
			$resultp = mysql_query($queryp) or die("Couldn't execute query1");
			
			while ($row= mysql_fetch_array($resultp)) {
			$paragraph1=$row['paragraph1'];
			echo $paragraph1;
			}
	?>
	</div><!-- end paragraph1 -->
	<!-- REMOVED: if $username == 'admin' etc from here to up before main div -->
	
	
	<div style="position: absolute;top:20px;right:160px; width: 200px; height: 100px; z-index: 1" id="layer1">
			   <?php
			   echo "<a href='$webpage?showHtml=OK'>";
				?>
			   <img src="cms/images/cms-html.png" style="float:left;" alt="view html"/></div>
              <?php
               echo "</a>";
               ?>
			  
			  
		  	   <!-- form here  TO DO: CHANGE BACK    action changed from cms/paragraph1.php to paragraph1.php     -->
		   <form id="my_form" name="my_form" action="cms/paragraph1.php" method="post" enctype="multipart/form-data" style="text-align:left;">       
				<div style="position:relative"><button type="button" onclick="hint_2();center(hint,200);" style="float:right;">?</button></div>
				<div id="toolbar" style="width:250px;float:left;">
			  <img class="button" onclick="format_sel('h1');" src="CMS/images/header.png" 		
			   alt="click to make your selection a header title"/>
              <img class="button" onclick="format_sel('b');" src="CMS/images/bold.png" 
			   alt="click to make your selection bold"/>
              <img class="button" onclick="format_sel('i');" src="CMS/images/italic.png" 
			   alt="click to make your selection italic"/>
              <img class="button" onclick="format_sel('p');" src="CMS/images/paragraph.png" 
			   alt="click to make your selection a paragraph"/>
              <img class="button" onclick="insert_link();" src="CMS/images/hyperlink.png" 
			   alt="click to add a link"/>
			   
              </div>
			  <?php
			  	$eh=$_GET['eh'];
				$ep=$_GET['ep'];
			  ?> 	
				
				<table id="upload-table" cellspacing="4" cellpadding="4" style="text-align:left;clear:both;">
			    <!--  
				 <tr><td><button type="button" onclick="hint_3();center(hint,300);" style="float:right;">?</button><b>Heading title:</b><br /> <input name="heading_title1" type="text" id="heading_title1" size="50" value="<?php
		
$eh=$_GET['eh'];
$ep=$_GET['ep'];

//////////////////////////////////////////////////////
// $_GET has * and % in name and has to be removed
// This is to enable to pass variables with spaces in the imagename
     $symbol = array ("*");
	 $apostrophe = array("^");
	 $quote = array ("~");
     $h1 = str_replace($symbol, " ", $eh);
     $p1 = str_replace($symbol, " ", $ep);
     $p1 = str_replace($apostrophe, "'", $p1);
	 $p1 = str_replace($quote,"\"", $p1);

//NB: This is all unnecessary as using id instead  for $_GET

//////////////////////////////////////////////
	//ADDED: 040112@gt
		//echo $h1;
	//END:	
//ADDED: 070312@gt
$id=$_GET['id'];

$query_s = "SELECT * FROM paragraph1 WHERE ID LIKE '$id'";
                        $result_s = mysql_query($query_s) or die("Couldn't execute query2");
    			
  while ($row= mysql_fetch_array($result_s)) {	
  $eh=$row['heading1'];
  $ep=$row['paragraph1'];
  }
//END: 070312	
	 
						//ADDED: 060312@gt
						if( $eh != '') {
							$show = "Restore_Yup";
						}
						//END: 060312@gt
	
                        $query_s = "SELECT * FROM errors WHERE webpage LIKE '$webpage'";
                        $result_s = mysql_query($query_s) or die("Couldn't execute query3");
    			
    			while ($row= mysql_fetch_array($result_s)) {
    				//ADDED: 011211@gt#1 --- added if statement $eh != ""
					if($eh !="") {
								$heading1=$eh;
					}
					else {						
								$heading1=$row['heading1'];//only part that was originally there.
                    }
					//END: 011211@gt#1             
								$display=$row['display'];
                                if($display == "Yes"|| $eh !=""){
                                    $show = "Yup";
							   		$h1 = $heading1; 
								}	
             	}
				if($show =='Yup') {
					echo $heading1; 
				}
				if($show== "Restore_Yup") {
					echo $eh;
				}
				
	;//*$_POST["heading_title1"];*/ ?>"/>				
</td></tr>
-->
				 <tr><td></td></tr>

	<tr><td><span style="float:left;"><b>Main text:</b></span><div style="position:relative"><button type="button" onclick="hint_4();center(hint,400);" style="float:right;">?</button></div><br /><textarea name="main_text1" id="main_text1" rows="10" style="width:380px;"><?php 
//ADDED: 040112@gt
//REMOVED: 080212@gt comments
	//echo $p1; 
//END: 				
             		//ADDED: 060312@gt
						if ($_GET['showHtml'] == 'OK'){
						    $show = 'OK';
						    //echo $show;
						$query_html = "SELECT * FROM paragraphs WHERE webpage LIKE '$webpage'";
                        $result_html = mysql_query($query_html) or die("Couldn't execute query4");
    						while ($row= mysql_fetch_array($result_html)) {
    							$paragraph1=$row['paragraph1'];
							}
							echo $paragraph1;				
						}
						if( $ep != '') {
							$show = "RESTORE";
						}
						
						//END: 060312@gt

                        $query_s2 = "SELECT * FROM errors WHERE webpage LIKE '$webpage' AND id = '1'";
                        $result_s2 = mysql_query($query_s2) or die("Couldn't execute query4");
    			
    			while ($row= mysql_fetch_array($result_s2)) {
    				if($ep !="") {
								$paragraph1=$ep;
					}
					else {	
							$paragraph1=$row['paragraph1'];
					}
                            $display=$row['display'];
                                //REMOVED:250112@gt
								//removed comments from the next 3 lines
								//if($display == "Yes"){
                                //    echo $paragraph1;
                                //}    
    						
							
							if($display=="Yes" || $ep !=""){
									
								 $show = "OK";
							     $pg = $paragraph1;
							}
    			}
				$query_s22 = "SELECT * FROM errors WHERE webpage LIKE '$webpage' AND id = '2'";
                        $result_s22 = mysql_query($query_s22) or die("Couldn't execute query5");
    			
    			while ($row= mysql_fetch_array($result_s22)) {
    				$paragraph1=$row['paragraph1'];
                                $display=$row['display'];
                              //  if($display == "Yes"){
                              //      echo $paragraph1;
                              //  }    
    						if($display=="Yes"){
								 $show = "OK";
							     $pg = $paragraph1;
							}
    			}



//ADDED:gt.230811
				$query_s23 = "SELECT * FROM errors WHERE webpage LIKE '$webpage' AND id = '3'";
                        $result_s23 = mysql_query($query_s23) or die("Couldn't execute query6");
    			
    			while ($row= mysql_fetch_array($result_s23)) {
    				$paragraph1=$row['paragraph1'];
                                $display=$row['display'];
                              //  if($display == "Yes"){
                              //      echo $paragraph1;
                              //  }    
    						if($display=="Yes"){
								 $show = "OK";
							     $pg = $paragraph1;
							}
    			}
				//TEST: gt.230911
				//echo ">>>".$display;
				//echo "!!!".$show;			
				if($show =='OK') {
								 echo $pg; 
				}
				//ADDED: 060312@gt from $pg
				if($show =='RESTORE') {
					  echo $ep;
				}
				//END:
				
				
	 ?></textarea>	
</td></tr>
	<tr><td style="width:500px;">
	<div style="width:250px;float:left;margin:0px;text-align:left;">
			  <img class="button" onclick="format_sel('li');" src="CMS/images/li.png"  
			   alt="click to make bullet - first step"/>
			  <img class="button" onclick="format_sel('ul');" src="CMS/images/ul.png" 
			  alt="click to make bullet - second step"/>
              
             </div>
<span style="float:left;font-size:small;">You need bullets. Click on question mark and look up in pale yellow square above:		</span><div style="position:relative"><button type="button" onclick="hint_9();center(hint,400);">?</button></div> 
	
	</td></tr>

	<!-- ADDED: gt160911 -->
<!--	
	<tr><td class="filename"><b>Want to upload an image?Click on arrow to choose file.</b><br />
<span style="float:left;">Filename:</span> <button type="button" onclick="hint_5();center(hint,700);" style="float:right;">?</button>
	<br />
	<?
	//ADDED: 03.11.11.gt
	//New Uploader
	require_once 'uploader/class.FlashUploader.php';
	IFU_display_js();
	$uploader = new FlashUploader('uploader', 'uploader/uploader', 'http://www.charlemontcommunity.com/CMS/uploader/upload.php');
	$uploader->display();
	
	
	
	//END: 03.11.11.gt
	
	?>




</td></tr>
-->
<!--
<tr><td><span style="float:left;"><b>Delete text from section. Tick the checkbox.</b></span><button type="button" onclick="hint_6();center(hint,700);" style="float:right;">?</button><br />
<input type="checkbox" name="delete_text" value="delete_purple" />Delete text in purple section.<br />
<input type="checkbox" name="delete_text" value="delete_yellow" />Delete text in yellow section.<br />
<input type="checkbox" name="delete_text" value="delete_green" />Delete text in green section.<br />
</td></tr>
-->
	
	
	<!-- END gt160911 -->
<!-- ADDED: gt200911 -->
<!--
<tr><td><b>Delete image. Tick the checkbox.</b><br />
<input type="checkbox" name="delete_image" value="yes" />Delete Image</td></tr>
-->
<!-- END gt200911 -->						
</table> 
<!--		
<hr/>
 <div style="margin-left:60px;">
 <b>Remember to select paragraph/section!</b><br /><span style="float:left;color:orange;"><b>Choose section to update:</b></span><button type="button" onclick="hint_7();center(hint,900);" style="float:right;">?</button><br />
<div style="clear:both;"></div>
		      <select name="paragraphn" id="paragraphn">
				<option value="not_selected"  id="paragraphn" selected="selected">--Select--</option>
				<option value="paragraph1">paragraph 1 (purple)</option>
				<option value="paragraph2">paragraph 2 (yellow)</option>
				<option value="paragraph3">paragraph 3 (green)</option>


			 </select>
			 


</div>
-->                   
<div style="clear:both;"></div>
<br />
<div style="float:left;margin-left:20px;"><input type="submit" name="Submit" value="Save Changes"/>  </div><div style="position:relative;"><button type="button" onclick="hint_8();center(hint,900);" style="float:right;">?</button></div>

</form> 
	
<p>&nbsp;</p>
</div><!-- background main panel -->		   
<div style="clear:both;"></div>

		   
	<?php
		$a= "NO_USER";
		//$_GET['nouser']= $a;
	    echo "<a href='$webpage?nouser=$a'>View Page with updates</a><br />";
	    echo "<br /><a href='CMS/restore-p1.php'>Restore Previous Text</a>";
	    echo "<h2><a href='cms/cms-index.php'>Return to CMS Menu</a></h2>";
	    echo "<h2><a href='CMS/logout.php'>Log out</a></h2>";
	
		    }
		
		else {
		  include('reset.php');
		}
		
		//----------- ERROR STYLE ---------gt.260911
//TO DO:
//Remove comments below
		
		$query_e1 = "SELECT * FROM errors WHERE webpage LIKE '$webpage' AND id = '1'";
       	$result_e1 = mysql_query($query_e1) or die("Couldn't execute query_e1");
    	while ($row= mysql_fetch_array($result_e1)) {
				$display1 =$row['display'];
				//echo $display1;
			}
		if($display1 == 'Yes') {
	    	include('error-style-1.inc');
		}		
		
		$query_e2 = "SELECT * FROM errors WHERE webpage LIKE '$webpage' AND id = '2'";
       	$result_e2 = mysql_query($query_e2) or die("Couldn't execute query_e2");
    	while ($row= mysql_fetch_array($result_e2)) {
				$display2 =$row['display'];
				//echo $display2;
			}

		if($display2 == 'Yes') {
	    	include('error-style-2.inc');
		}
		
		$query_e3 = "SELECT * FROM errors WHERE webpage LIKE '$webpage' AND id = '3'";
       	$result_e3 = mysql_query($query_e3) or die("Couldn't execute query_e3");
    	while ($row= mysql_fetch_array($result_e3)) {
				$display3 =$row['display'];
				//echo $display3;
			}

		if($display3 == 'Yes') {
	    	include('error-style-3.inc');
		}
		
		//--------- END ERROR STYLE ------- gt.260911
		
	?>	    

