<?php echo $_POST['filename'] ?>



<?php

session_start();
$filepath = '/home/rfreret/Module2/'.$_SESSION['username'];
chdir($filepath);


function download($filename){

    session_start();

    $filename = $_GET['file'];

    if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	  echo "Invalid filename";
	  exit;
    }

    $username = $_SESSION['username'];
    if( !preg_match('/^[\w_\-]+$/', $username) ){
      	  echo "Invalid username";
	      exit;
}

$full_path = sprintf("/home/rfreret/Module2/%s/%s", $username, $filename);

// Now we need to get the MIME type (e.g., image/jpeg).  PHP provides a neat little interface to do this called finfo.
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($full_path);

// Finally, set the Content-Type header to the MIME type of the file, and display the file.
header("Content-Type: ".$mime);
readfile($full_path);
}
?>
