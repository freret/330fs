<!DOCTYPE html>
<head><title>Fileserver</title>
  <link rel="stylesheet" type="text/css" href="login.css" />
</head>

<div id="Header"
<h1>330 File Server</h1> <br>
<img src="WULogo.png" alt="MEME" width="100">
</div>
<div id="Portal">

  <?php
    //clear session on logout and page load
   session_start(); session_destroy(); ?>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
    <p>
      <label for="firstnameinput">Username:</label>
      <input type="text" name="username" id="username"/>
    </p>
    <p>
      <input type="submit" value="Login" />
    </p>
  </form>
  <?php
  if (isset($_POST['username'])) {
      $flag = false;
      $nonewline = (String)$_POST['username']);//filter in 
      $u = $_POST['username']."\n";
      //Variables for Login Page
      chdir('/home/rfreret/Module2');
      $activeuser = 'null';
      $h = fopen('users.txt', 'r');
      while (!feof($h)) {
          $account = fgets($h);
          if (0 == strcmp($account, $u)) {
              session_start();
              $_SESSION['username'] = $nonewline;
              $flag = true;
              header('Location: 330FileServer');
        }
      }
      if (false == $flag) {
          $wronguser = 'Unrecognized username; please try again';
          echo "<script type='text/javascript'>alert('$wronguser');</script>";
          //echo "<script> $( function() { $( $wronguser ).dialog(); } ); </script>";
      }
      fclose($h);
  }
  ?>
</div>

<body>

</body>

</html>
