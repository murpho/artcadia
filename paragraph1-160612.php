<?php 
session_start(); 

require_once("../../database.connection.php");

   $webpage = $_SESSION['page'];
   $heading1 = $_POST['heading_title1'];
   $paragraph1 = $_POST['main_text1'];
   $delete = $_POST['delete_text'];
   $paragraphn = $_POST['paragraphn'];
   $paragraphn = 'paragraph1';

   $delete_image=$_POST['delete_image'];
   
   $query_f = "SELECT * FROM filename WHERE id='1'";
		$res_f = mysql_query($query_f) or die("Couldn't execute filename query");
			while ($row= mysql_fetch_array($res_f)) {
				$filename =$row['filename'];   
			}
      
   if( $paragraphn == 'paragraph1')  {	
   	   $headingn = 'heading1';
	   $section = 1;
   }
   if( $paragraphn == 'paragraph2')  {	
       $headingn = 'heading2';
	   $section = 2;
   }
   if( $paragraphn == 'paragraph3')  {	
       $headingn = 'heading3';
	   $section = 3;
   }
   
   //ADDED: 150612@gt
           //$headingn = $_SESSION['heading_number'];

           if($paragraph1 != ""){
				
				 //$paragraph1 ="";
		 $apostrophe = array('\"');
		 $backslash = array ('\\');
        //$paragraph1 = str_replace($apostrophe, '\"', $paragraph1);
         //$paragraph1 = str_replace($backslash, '\\', $paragraph1);
         $paragraph1=mysql_real_escape_string( $_POST['main_text1'] );

                  $no_heading = "";
                  $query_u = "UPDATE paragraphs SET heading1 = '$no_heading', paragraph1 ='$paragraph1' WHERE webpage LIKE '$webpage'";
                  $res_u = mysql_query($query_u) or die("Couldn't update record. Paragraphs table.");
                 //add $webpage instead

          
//ADDED: 040112@gt#1 
//ADDED NEW COLUMN section IN paragraph1 TABLE (OF WHICH VALUES ARE 1 TO 3)  				 
                 $query_i ="INSERT INTO paragraph1 (heading1, paragraph1, webpage, section) VALUES ('$heading1', '$paragraph1', '$webpage', '$section')" ;
                 $res_i = mysql_query($query_i) or die("Couldn't insert record. Paragraph1 table.");
			//*****************************************************************
			//DONE: 070312@gt already added auto_increment in paragraph1 table
			//Use id of this table to restore content to user input interface
			//END: 070312	
			//*****************************************************************
                 $query_CS ="INSERT INTO content_store (heading1, paragraph1, webpage) VALUES ('$heading1', '$paragraph1', '$webpage')" ;
                 $res_CS = mysql_query($query_CS) or die("Couldn't insert record. Content Store table.");

                 }//moved bracket to here
                 //TO DO: Remove cms from path when page in root
                 header("Location: http://www.stclaireopals.com/$webpage"); 
                 //header("Location: http://www.charlemontcommunity.com/indexCMS.php"); 


                //}//moved bracket from here

   
  
			
			
	  
	  
	  
	//***************** ERROR MESSAGE SETTINGS ***********************
	
	if($paragraph1 =='') {
	    $query_ue3= "UPDATE errors SET display='Yes',heading1='$heading1',paragraph1='$paragraph1',webpage='$webpage' WHERE id='3'";
       	$result_ue3 = mysql_query($query_ue3) or die("Couldn't execute query");
    
	}
	

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>paragraph1</title>
</head>

<body>
<?php 
	
?>

</body>

</html>
