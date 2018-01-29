<!DOCTYPE html>
<head><title>Fileserver</title>
  <link rel="stylesheet" type="text/css" href="mainframe.css" />

</head>

<body>

  <ul>
    <li style="float:right"><a class="active" href="loginpage.php">Logout</a></li>
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
    $filepath = "/home/rfreret/Module2/" . $_SESSION['username'];
    chdir($filepath);
    $filenames = scandir("./");
    $differenced = array_values(array_diff($filenames, array("..",".")));
    for ($i = 0; $i < sizeof($differenced); $i++) {
      $specpath = $filepath . "/" . $differenced[$i];
      echo "<a href=$specpath>$differenced[$i]</a><br>";
    }
  ?>
</div>

</html>
