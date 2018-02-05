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

<?php
  $currDir = '/home/rfreret/Module2/'.$_SESSION['username'];
  chdir($currDir);
  $log = fopen('changelog.csv','r');
  while (!feof($log)) {
    $line = fgetcsv($log);
    echo var_dump($line);
  }
?>

</html>
