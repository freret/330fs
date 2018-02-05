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
  </ul></body>

  <div id="testing">
    <div id="tableview">
      <table style="width:70%; margin:auto">
        <tr>
          <th style="padding-top:5px; padding-bottom:5px">Recent Activity</th>
        </tr>
        <?php
        $currDir = '/home/rfreret/Module2/'.$_SESSION['username'];
        chdir($currDir);
        $log = fopen('changelog.csv','r');
        $lineRev = [];
        $i = 0;
        while (!feof($log)) {
          $line = fgetcsv($log);
          if (count($line)!==1) {
            $lineRev[$i] = $line[0].": file ".$line[1]." was ".$line[2]."ed by IP address ".$line[3].".<br>";
            $i++;
          }
        }
        for ($j = (count($lineRev)-1); $j >= 0; $j--) {
          echo "<tr><td style=\"padding-top:8px; padding-bottom:8px\">".$lineRev[$j]."</td></tr>";
        }
        ?>
      </table>
    </div>
  </div>

</html>
