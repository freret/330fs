<!DOCTYPE html>
<head><title>Fileserver</title>
  <link rel="stylesheet" type="text/css" href="mainframe.css" />

</head>

<body>

  <ul>
    <li style="float:right"><a class="active" href="loginpage.php">Logout</a></li>
    <li style="float:right"><a class="Upload" href="330FileServer.php">Home</a></li>

    <li><a><?php
    session_start();
    if (isset($_SESSION['username'])) {
      echo $_SESSION['username'];
    } else {
      header('Location: loginpage.php');
    }
    ?></a></li>
  </ul>
</body>





<div id="testing">
</div>

<form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
  <div id=upload>
    <div id="tableview">
      <table style="width:100%">
        <tr>
          <th>Upload Buddy </th>
        </tr>
        <tr>
          <td>
            <p>
              <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
              <label for="uploadfile_input">1. Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
            </p>
          </td>
        </tr>
      </table>
    </div>
    <input type="submit" value="Upload File" id="upload" />
  </form>
</div>

<?php
error_reporting(0);
$username=$_SESSION['username'];



// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
  //echo "Invalid filename";
  exit;
}

// Get the username and make sure it is valid
if( !preg_match('/^[\w_\-]+$/', $username) ){
  //echo "Invalid username";
  exit;
}
//upload the file
$full_path = sprintf('/home/rfreret/Module2/%s/%s', $username, $filename);
if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
  header('Location: 330FileServer');
  exit;
}else{
  header("Location: Upload.php");
  exit;
}

?>


</html>
