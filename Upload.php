<!DOCTYPE html>
<head><title>Fileserver</title>
  <link rel="stylesheet" type="text/css" href="mainframe.css" />

</head>

<body>

  <ul>
    <li style="float:right"><a class="active" href="loginpage.php">Logout</a></li>
    <li style="float:right"><a class="Upload" href="null">Home</a></li>

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


<div id="tableview">
  <table style="width:100%">
    <tr>
    <form enctype="multipart/form-data" action="uploader.php" method="POST">
      <th>Upload Buddy </th>

    </tr>

    <tr>
      <td>
        <form enctype="multipart/form-data" action="uploader.php" method="POST">
        	<p>
        		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
        		<label for="uploadfile_input">1. Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
        	</p>
        	<p>

        	</p>

      </td>
    </tr>

    </tr>

    </tr>
  </table>
  <input type="submit" value="Upload File" id="upload" />
  </form>
</div>


</html>
