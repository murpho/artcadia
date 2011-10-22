<?php
/**
 * @author Marijan &#65533;uflaj <msufflaj32@gmail.com>
 * @link http://www.php4every1.com
 */

sleep(3);
$firstname= false;
$email = false;

require_once("database.connection.php");
$query_f2 = "SELECT * FROM filename WHERE id = 1";
$res_f2 = mysql_query($query_f2) or die("Couldn't execute query. Filename table.");
	while ($row= mysql_fetch_array($res_f2)) {
		$filename =$row['filename'];   
	}
//$_POST['filename'] = $filename;	

if (empty($_POST['filename']) || $filename=='' ) {
	$return['error_filename'] = true;
	$return['msg_filename'] = 'You did not upload file. Click filename area.';
	
}
elseif (!empty($_POST['filename'])){
	$return['error_filename'] = false;
	$return['msg_filename'] =  $filename.' file uploaded.';
	$filename_accepted = true;	
	//TO DO: Change this last line to show tick symbol.
}



if (empty($_POST['title'])) {
	$return['error_title'] = true;
	$return['msg_title'] = 'You did not enter title.';
	
}
elseif (!empty($_POST['title'])){
	$return['error_title'] = false;
	$return['msg_title'] = '';// Pass empty string. Showing green tick on success instead.
	$title= true;
	//TO DO: Change this last line to show tick symbol.
}

if($_POST["medium"]!="oils" && $_POST["medium"]!="acrylics"
		    && $_POST["medium"]!="watercolors" && $_POST["medium"]!="pastels"
		    && $_POST["medium"]!="gouache" && $_POST["medium"]!="mixed media"
		    && $_POST["medium"]!="drawing" && $_POST["medium"]!="ceramics"
		    && $_POST["medium"]!="sculpture" && $_POST["medium"]!="blacksmith"

		    ) {
    $return['error_medium'] = true;
	$return['msg_medium'] = 'You did not select medium.';
	
}
else {
	$return['error_medium'] = false;
	$return['msg_medium'] = '';// Pass empty string. Showing green tick on success instead.
	$medium= true;
}







if ( ($filename_accepted) &&  ($title) && ($medium)     ) {
	$return['error'] = false;
	$return['msg'] = 'Your details have been accepted.';
}
else {
	$return['error'] = true;
	$return['msg'] = 'Check details below.';


}




echo json_encode($return);
//added
// echo $_POST['email'];



?>