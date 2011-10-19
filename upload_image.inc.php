<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>upload image</title>
<style type="text/css">
.style1 {
	text-align: center;
}
</style>
</head>

<body>
   <div style="margin:0 auto 0 40px;" class="style1" >
	
			
		<?php 
		    
		function error_bool($error, $field) { 
		         if($error[$field]) { 
		             print("<td style=color:red>"); 
		         } 
		        else { 
		            print("<td style=text-align:right>"); 
		        } 
		    } 
		
		function show_form() { 
		global $HTTP_POST_VARS, $print_again, $error; 
		?> 
		
		<p>&nbsp;</p>
		
		<div style="background-image:url('images/name_footer.jpg');border:1px black solid;margin:20px;">
		<br />
		<a href="member.php"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('members_home_button','','images/members-home-button-over.png',1)"><img name="members_home_button" id="members_home_button" style="border:0" src="images/members-home-button.png" alt="member's home"/></a>
		
		
		 <form action="" method="post" enctype="multipart/form-data">       
		   	<table id="upload-table" width="90%" cellspacing="4" cellpadding="4">
		      <tr class="title"><td class="benefits rounded {top 10px no-webkit}"><h1>Upload Image</h1></td></tr>
		      <tr><td>
		      		<div id="message_ajax" style="display: none;">
        			</div>
            		<div id="waiting_ajax" style="display: none;">
                		Please wait<br />
                		<img src="images/ajax-loader.gif" title="Loader" alt="Loader" />
            		</div>
		      <?php
				 
				 $query_m = "SELECT * FROM visitor_messages WHERE id = 1";
				 $res_m = mysql_query($query_m) or die("Couldn't execute query. Filename table.");
					while ($row= mysql_fetch_array($res_m)) {
						$message =$row['message'];   
						$u_check =$row['ucheck'];   
		
					}
				 echo ">>".$u_check."!!";	
				 if($u_check=='Yes') {
				    echo $message;	
				    //$query_m1 = "UPDATE visitor_messages SET ucheck = 'No' WHERE id = 1";
					//$res_m1 = mysql_query($query_m1) or die("Couldn't execute query. Folder table.");
				 }
				 
				?>
		      
		      </td></tr>
		      <tr><td style="text-align:right;padding-right:100px;border:1px black solid;background:#ffe;">Filename: 
		      		<div id="message_filename" style="display: none;">
		      		 <script type="text/javascript">
		      		 	if(filename != '' || data.msg_filename !='' || msg_filename !='') {
		      		 		alert('ok');
		      		 	}
		      		 
		      		 </script>
		      		
		      		
		      		
		      		</div>
					
					<div style="clear:both;"></div>
		      		<?
		      			//if (isset($_COOKIE["filename"])){
				  		// 	echo "<h2>".$_COOKIE["filename"]." file is uploaded.</h2>";
						//}
						$query_f = "SELECT * FROM filename WHERE id = 1";
						$res_f = mysql_query($query_f) or die("Couldn't execute query. Filename table.");
							while ($row= mysql_fetch_array($res_f)) {
								$filename =$row['filename'];   
							}
						if( $filename!= '') {
							 echo "<h2>".$filename." file is uploaded.</h2>";						
						}
						else {
							?>
							<div id="inaflash">
								<?php
								//in_a_flash script	
								require_once 'uploader/class.FlashUploader.php';
								IFU_display_js();
								$uploader = new FlashUploader('uploader', 'uploader/uploader', 'http://www.artcadia.org/uploader/upload.php');
								$uploader->display();
								?>
							</div>
							<?php
						}				
					?>
 					<input name="filename" type="text" id="filename" size="30" value="<?php echo "FILENAME"; ?>"/>
			  </td></tr>		   			
			  <tr><td style="text-align:right;padding-right:100px;border:1px black solid;"> 
			  		<div id="message_title" style="display: none;"></div>
			  		<div style="clear:both"></div>
			  		Title:<input name="title" type="text" id="title" size="30" value="<?php echo $_POST["title"]; ?>"/><img class="ok-check" src="assets/artcadia-ok-checkbox-20.png" alt="validated ok" width="20" /></td></tr>
		      <tr><td style="text-align:right;padding-right:100px;border:1px black solid;">Medium (Oils,ceramics etc): 
		      <select name="medium" id="medium">
				<option value="medium" selected="selected" id="medium">--Select--</option>
				<option value="oils">oils</option>
				<option value="acrylics">acrylics</option>
				<option value="watercolors">watercolors</option>
				<option value="pastels">pastels</option>
				<option value="gouache">gouache</option>
				<option value="mixed media">mixed media</option>
				<option value="drawing">drawing</option>
				<option value="ceramics">ceramics</option>
				<option value="sculpture">sculpture</option>
				<option value="blacksmith">blacksmith</option><!-- 16.10.11.gt value was sculpture in error -->

			 </select></td></tr> 
			 <tr><td style="text-align:right;padding-right:100px;border:1px black solid;">(Maximum 20 words)<br />Description: <input name="description" type="text" id="description" size="30" value="<?php echo $_POST["description"]; ?>"/></td></tr>
			 <tr><td style="text-align:right;padding-right:100px;border:1px black solid;">Keywords: <input name="keywords" type="text" id="keywords" size="30" value="<?php echo $_POST["keywords"]; ?>"/></td></tr>
		     <tr><td style="text-align:right;padding-right:100px;border:1px black solid;"><img src="captchav1/captcha/captcha.php" id="img" title="captcha v1 phpform.net" alt="captcha" /></td></tr>
     		 <tr><td style="text-align:right;padding-right:100px;border:1px black solid;">Security Text: <input name="check" type="text" id="check" size="30" value="<?php echo $_POST["check"]; ?>"/></td></tr>


		  
		  </table> 
		  
		  <script type="text/javascript">
		  		//Hack to check if JavaScript is enabled.
		  		var $valid = "JavaScriptIsValid";
		  		if($valid == "JavaScriptIsValid") {
		  				document.write('<table id="upload-table-button" summary="upload" width="80%" cellspacing="0" cellpadding="0"><tr><td style="text-align:right;padding-right:100px;border:1px black solid;;background:orange;"><input type="submit" id="submit" name="submit" value="Upload"/>  </td></tr></table>');
		 		}
		 		
		 </script>		
		 
		  
		</form> 
		 <!-- ADDED: 15.10.11.gt 
		  	   To enable visitor to use the site without Ajax/JavaScript	
		  -->
			  <noscript>
			     <div>
	 			    <input type="submit" name="Submit" value="Upload"/>  
			  	 </div>
			  </noscript>
		  <!-- END: 15.10.11.gt -->
			 
		</div><!-- form end div -->
		<?php 
		
		} 
		if(isset($_POST["Submit"])) { 
		    check_form(); 
		    
		} else { 
		    show_form(); 
		} 
		
		function check_email_address($email) { 
		  // First, we check that there's one @ symbol, and that the lengths are right 
		  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) { 
		    // Email invalid because wrong number of characters in one section, or wrong number of @ symbols. 
		    return false; 
		  } 
		  // Split it into sections to make life easier 
		  $email_array = explode("@", $email); 
		  $local_array = explode(".", $email_array[0]); 
		  for ($i = 0; $i < sizeof($local_array); $i++) { 
		     if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) { 
		      return false; 
		    } 
		  } 
		  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name 
		    $domain_array = explode(".", $email_array[1]); 
		    if (sizeof($domain_array) < 2) { 
		        return false; // Not enough parts to domain 
		    } 
		    for ($i = 0; $i < sizeof($domain_array); $i++) { 
		      if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) { 
		        return false; 
		      } 
		    } 
		  } 
		  return true; 
		} 
		
		
		function check_form() 
		{ 
		
		global $HTTP_POST_VARS, $error, $print_again, $ucheck; 
		$error['name'] = false; 
		
		$query = "SELECT * FROM admin"; //CHANGED from paintings
		$result = mysql_query($query) or die("Couldn't execute query");
		
		$path = 'images/'; 
		
		while ($row= mysql_fetch_array($result)) {
		    $username =$row['username']; 
			$ucheck = true; 
		
		       
		    
		    
		    }
		    
////ADDED 070610 
					$username = $_SESSION['views'];
					$query_admin = "SELECT * FROM admin WHERE username LIKE '$username'";
					$res_admin = mysql_query($query_admin) or die("Couldn't execute query");
					
					
					while ($row= mysql_fetch_array($res_admin)) {
					
						$folder =$row['folder'];   
					    //ADDED: 08.10.11.gt
						    $query_f = "UPDATE folder SET folder_name = '$folder' WHERE id = 1";
							$res_f = mysql_query($query_f) or die("Couldn't execute query. Folder table.");
				    	//END: 08.10.11.gt
					}

					    
		     //ADDED: 04.10.11.gt
		     //Integrating in-a-flash uploader into script.
		     $query_f2 = "SELECT * FROM filename WHERE id = 1";
			 $res_f2 = mysql_query($query_f2) or die("Couldn't execute query. Filename table.");
					while ($row= mysql_fetch_array($res_f2)) {
						$filename =$row['filename'];   
					}
     		 if($filename== '') {
		       	   $error['file'] = true; 
			       $print_again = true; 
			       $message_file="You need to browse for image file."; 
			        
			 }
			 //END: 04.10.11.gt


			if($_POST["title"]=="") { 
		        $error['title'] = true; 
		         $print_again = true; 
		        $message_title ="You need to enter a title of piece."; 
		        include ("input-tag-styles/input-title-style.php");
		
		    }
		    
		   		    
		    if($_POST["medium"]!="oils" && $_POST["medium"]!="acrylics"
		    && $_POST["medium"]!="watercolors" && $_POST["medium"]!="pastels"
		    && $_POST["medium"]!="gouache" && $_POST["medium"]!="mixed media"
		    && $_POST["medium"]!="drawing" && $_POST["medium"]!="ceramics"
		    && $_POST["medium"]!="sculpture" && $_POST["medium"]!="blacksmith"

		    ) { 
		        $error['medium'] = true; 
		         $print_again = true; 
		        $message_medium ="You need to enter a medium."; 
		        include ("input-tag-styles/input-medium-style.php");
		
		    }
		
		    if($_POST["description"]=="") { 
		        $error['description'] = true; 
		         $print_again = true; 
		        $message_description ="You need to enter a description."; 
		        include ("input-tag-styles/input-description-style.php");
		
		    }
		
		    if($_POST["keywords"]=="") { 
		        $error['keywords'] = true; 
		         $print_again = true; 
		        $message_keywords ="You need to enter keywords.";
		        include ("input-tag-styles/input-keywords-style.php");
		 
		    }
		
		    if(($_POST['check']) == $_SESSION['check']) { 
				;//do nothing
			}
			else{
				$error['check'] = true; 
		        $print_again = true; 
		        $message_security ="You entered the incorrect security text."; 
		        include ("input-tag-styles/input-check-style.php");
		
			}

		
				 
		    
		     if($print_again) { 
		     
		     	show_form(); 
		
		             
		       } else {
		 
		      
		        show_form(); 
		            /*Here we are going to declare the variables*/
		
		     if($ucheck==true) {
				//ADDED:-------------- post here 04.10.11.gt 
				
					//ADDED: 10.10.11.gt
					
					    $query_vm = "UPDATE visitor_messages SET ucheck = 'Yes' WHERE id = 1";
					    $res_vm = mysql_query($query_vm) or die("Couldn't execute query. Visitor_messages table.");
		
					    //Reset database
						$folder = "";//Reset    
					    $query_foRS = "UPDATE folder SET folder_name = '$folder' WHERE id = 1";
					    $res_foRS = mysql_query($query_foRS) or die("Couldn't execute query. Folder table.");
					//END: 10.10.11.gt
   	
				    $username = $_SESSION['views'];//CHANGED from $_POST['username']
				    //table changed from uname below 070810
					$query = "SELECT * FROM admin WHERE username LIKE '$username'";//CHANGED from '$username'
					$res2 = mysql_query($query) or die("Couldn't execute query");
					
					while ($row= mysql_fetch_array($res2)) {
							$email =$row['email'];   
					}
					
					$title = $_POST['title'];
					$typefilename =$filename;//Integrating with in_a_flash 
					$source_file=$filename;//Adapted from earlier version
					$medium = $_POST['medium'];
					$description = $_POST['description'];
					$keywords = $_POST['keywords'];
					$usrnm=$_SESSION['views'];
				//ADDED: 09.10.11.gt
				//Integrating in_a_flash script
				//No target_file in in_a_flash. There was in previous script.
				    $target_file = "th_".$filename;
				//END: 09.10.11.gt
					
					//////////ADDED THESE TWO LINES 19 JAN 09
					$query2 = "INSERT INTO viewnew (username, imagename, medium, title, description, keywords) VALUES ('$usrnm','$typefilename','$medium', '$title', '$description','$keywords')";
					$res2 = mysql_query($query2) or die("Couldn't execute query. Username already exists.");
					
					   $queryid = "select * from count_artwork";
					   $numresultsid=mysql_query($queryid);
					   $numrowsid=mysql_num_rows($numresultsid);
					   $id=$numrowsid+1;
					
					
					//ADDED 070610
				  	$table_name= "zimage".substr($source_file,0,1).$id;
			   		//Insert into main database 'paintings'
			   		$query_p = "INSERT INTO paintings (ID, imagename, folder, title, thumbnail, medium, username, description, keywords, tablename) VALUES ('$id','$source_file','$folder','$title','$target_file','$medium','$username','$description','$keywords','$table_name')";
					$res_p = mysql_query($query_p) or die("Couldn't execute query. Username already exists.");
				    $query_c = "INSERT INTO count_artwork (number, imagename) VALUES ('$id','$imagename')";
				    $res_c = mysql_query($query_c) or die("Couldn't execute query. Username already exists.");
			
					$query_create= "CREATE TABLE `$table_name` ( `message_id` INT(11) NOT NULL AUTO_INCREMENT,  `chat_id` INT(11) NOT NULL DEFAULT '0',  `user_id` INT(11) NOT NULL DEFAULT '0',  `user_name` VARCHAR(64) DEFAULT NULL,  `message` TEXT,  `post_time` DATETIME DEFAULT NULL,  PRIMARY KEY  (`message_id`)) ENGINE=INNODB DEFAULT CHARSET=latin1;";
			   		$result_create= mysql_query($query_create) or die("Couldn't create tables");
	       			//ADDED 070610

		
					////////////////////////////////////////////////////////////////
					
					
					$usrnm=$_SESSION['views'];
					
					//Save visitor name and entered message into one variable:
					$formcontent="USERNAME: $usrnm\n\nTITLE: $title\n\nFILENAME: $typefilename\n\nMEDIUM: $medium\n\nDESCRIPTION: $description\n\nKEYWORDS: $keywords";
					$recipient = "artcadia@ymail.com";
					$subject = "new artcadia upload";
					$mailheader = "From: $email\r\n";
					$mailheader .= "Reply-To: $email\r\n";
					$mailheader .= "MIME-Version: 1.0\r\n";
					mail($recipient, $subject, $formcontent, $mailheader) or die("Unable to upload file. Try again another time!");
			
					//ADDED: 10.10.11.gt
					//Reset database
					    $filename = "";//Reset    
					    $query_fiRS = "UPDATE filename SET filename = '$filename' WHERE id = 1";
					    $res_fiRS = mysql_query($query_fiRS) or die("Couldn't execute query. Folder table.");
					
					
					
					//Refresh Page to show success text
					//TO DO: See about using JSON or AJAX instead
					?>
				<!--
						<script type="text/javascript">  -->
						<!--
							window.location = "memberu.php";
						//-->
				<!--		</script>
				 -->					
					<?php
					//END: 10.10.11.gt
					
					
					
					
			 
		        //END post ---------------------------------
		
				
		      
		    ?> 
			<?php
		       }   
		       } 
			    echo "<p class='message-standard'>$message_file </p>";
			    echo "<p class='message-standard'>$message_file_info </p>";
				echo "<p class='message-standard'>$message_title </p>";
				echo "<p class='message-standard'>$message_medium </p>";
				echo "<p class='message-standard'>$message_description </p>";
				echo "<p class='message-standard'>$message_keywords </p>";   
				echo "<p class='message-white'>$message_security </p>";
			 		
			 		
								   
					
			} 
		
		
		
		
			?> 
		
		
		


</div>


</body>

</html>
