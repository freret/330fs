<!DOCTYPE html>
<head><title>Fileserver</title>
  <link rel="stylesheet" type="text/css" href="mainframe.css" />

</head>

<body>

  <ul>
    <li style="float:right"><a class="active" href="loginpage.php">Logout</a></li>
    <li style="float:right"><a class="Upload" href="null">Upload File</a></li>

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
  <?php
  $filepath = '/home/rfreret/Module2/'.$_SESSION['username'];
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
    // End quoted work
    echo "<tr>";
    echo "<td>$mime</td>";
    echo "<td>$differenced[$i]</td>";
    echo "<td>$filesize</td>";
    echo "<td><form action=\"download.php\" method=\"post\">";
    echo "<input type=\"submit\" name=\"filename\" value=\"Download\" class=\"register\"/>";
    echo "<input type=\"hidden\" name=\"filename\" value=\"$differenced[$i]\">";
    echo "</form>";
    echo "<form action=\"delete.php\" method=\"post\">";
    echo "<input type=\"submit\" name=\"filename\" value=\"Delete\" class=\"register\"/>";
    echo "<input type=\"hidden\" name=\"filename\" value=\"$differenced[$i]\">";
    echo "</form>";
    echo "</td>";
  }
  echo "</tr>";
  echo "</table>";
  echo "</div>";
  ?>
</div>


</html>
