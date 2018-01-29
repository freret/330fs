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
  Hello
</div>

</html>
