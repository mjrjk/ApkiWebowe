
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>
  <p><?php
  session_start();
  if(isset($_SESSION['done'])) {
    echo("Pracownik dodany!");
    unset($_SESSION['done']);
  }
  ?></p>

<?php
 $link = mysqli_connect("localhost", "scott", "tiger", "instytut");

 if (!$link) {
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
 }

 $sql = "SELECT * FROM pracownicy";
 $result = $link->query($sql);

 foreach ($result as $v) {
   echo $v["ID_PRAC"]." ".$v["NAZWISKO"]."<br/>";
 };

 echo "<a href='form06_post.php'>Nowy pracownik";
 $result->free();
 $link->close();
?>
</body>
</html>
