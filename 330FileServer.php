<!DOCTYPE html>
<head><title>Fileserver</title>
  <link rel="stylesheet" type="text/css" href="mainframe.php" />
  <meta name="google" content="notranslate" />
</head>

<body>

  <ul>
    <li style="float:right"><a class="active" href="loginpage.php">Logout</a></li>
    <li style="float:right"><a class="Upload" href="Upload.php">Upload File</a></li>

    <li><a><?php
    session_start();
    //check to make sure there is an active user and if not redirect to login page
    if (isset($_SESSION['username'])) {
      echo htmlentities($_SESSION['username']);
    } else {
      header('Location: loginpage.php');
    }
    ?></a></li>
  </ul>
</body>

<div id="testing">
  <?php
  //generate file path and change directory. Then populate a table using the file names.
  $filepath = htmlentities('/home/rfreret/Module2/'.$_SESSION['username']);
  chdir($filepath);
  $filenames = scandir('./');
  $differenced = array_values(array_diff($filenames, array('..', '.')));
  echo "<div id=\"tableview\">";
  echo "<table style=\"width:100%\">";
  echo "<tr>";
  echo "<th>Type</th>";
  echo "<th>File Name</th>";
  echo "<th>Size</th>";
  echo "<th>Actions</th>";
  echo "</tr>";
  $totalsize = 0;
  for ($i = 0; $i < sizeof($differenced); ++$i) {
    $specpath = $filepath.'/'.$differenced[$i];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($specpath);
    // The following filesize conversion is taken from https://stackoverflow.com/questions/2510434/format-bytes-to-kilobytes-megabytes-gigabytes
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
    $bytes = filesize($specpath);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    $bytes /= pow(1024, $pow);
    $filesize = round($bytes, 1) . ' ' . $units[$pow];
    $totalsize += filesize($specpath);
    // End quoted work
    echo "<tr>";
    printf("<td>%s</td>", htmlentities($mime));
    printf("<td>%s</td>", htmlentities($differenced[$i]));
    printf("<td>%s</td>", htmlentities($filesize));
    echo "<td><form action=\"download.php\" method=\"post\" class=\"sides\">";
    echo "<input type=\"submit\" name=\"filename\" value=\"Download\" class=\"register\"/>";
    printf("<input type=\"hidden\" name=\"filename\" value=\"%s\">", htmlentities($differenced[$i]));
    echo "</form>";
    printf("<form action=\"delete.php\" method=\"post\" onsubmit=\"return confirm('Are you sure you want to delete %s?')\" class=\"sides\">", htmlentities($differenced[$i]));
    echo "<input type=\"submit\" name=\"filename\" value=\"Delete\" class=\"register\"/>";
    printf("<input type=\"hidden\" name=\"filename\" value=\"%s\">", htmlentities($differenced[$i]));
    echo "</form>";
    echo "</td>";
  }
  echo "</tr>";
  echo "</table>";
  echo "</div>";
  //if there are no files then print out the message
  if (sizeof($differenced)==0) {
    echo "\n";
    echo "<br>";
    echo "<div class=\"uploadmessage\">Please Upload A File</div>";
  }
  $totalBytes = $totalsize;
  $tpow = floor(($totalsize ? log($totalsize) : 0) / log(1024));
  $tpow = min($tpow, count($units) - 1);
  $totalsize /= pow(1024, $tpow);
  $totalsize = round($totalsize, 1) . ' ' . $units[$tpow];
  echo $totalsize;
  ?>
</div>


</html>
