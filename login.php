<!DOCTYPE html>
<head><title>Fileserver</title></head>
<body>
  <?php
  $flag = false;
  $u = $_POST['username'];
  //Variables for Login Page
  $h = fopen("Module2/users.txt", "r");
  $activeuser='null';
  while (!feof($h)) {
      if (fgets($h)==$u) {
          session_start();
          $_SESSION['username'] = $u;
          $flag = true;
          header('Location: URL HERE');
      }
  }
  if ($flag == false) {
      //popup
  }
fclose($h);

?>
</body>
</html>
