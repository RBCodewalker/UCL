<!DOCTYPE html>
<html>
<head>
  <meta name = "viewport", content="width = device-width, initial-scale=1">
  <title> UCL </title>
  <!-- <p style = "font-family:georgia,garamond,serif;font-size:70px;">
  <b> WELCOME TO THE UEFA CHAMPIONS LEAGUE INFO PAGE!</b> </p> -->
  <link rel = "stylesheet" href = "ucl.css"> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family
  =Noto+Sans+Mono:wght@100;300;500;700;900&display=swap" rel="stylesheet">
</head>
<?php
        $servername = "localhost";
        $username = "group10";
        $password = "QaTqdl";
        $dbname = "group10";
        if($_GET['q'] !== '')
        $conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<body>
  <section class="background">
      <nav>
        <a href = "https://www.uefa.com/uefachampionsleague/"> 
        <img src = "img/u.png" alt = "logo"></a>
        <div class = "links">
          <ul>
            <li><a href ="ucl.html"> HOME </a></li>
            <li><a href ="login.php"> MAINTENANCE </a></li>
            <li><a href =""> MATCHES </a></li>
            <li><a href =""> PLAYERS </a></li>
            <li><a href =""> TEAMS </a></li>
            <li><a href =""> GROUPS </a></li>
            <li><a href ="geo.php"> LOCATION </a></li>
            <li><a href = "in.php">SEARCH</a></li>
            <li><a href = "imprint.html"> IMPRINT </a></li>
            </ul>
            <form action= "in.php" method="post">
              <input type = "text" name="term" placeholder="player by name"/><br />
              <input type ="submit" value="Submit">
              <br />
              <!-- <input type = "text" name="term2" placeholder="player by position"/><br />
              <input type ="submit" value="Submit">
              <br /> -->
            </form>
          </div>
      </nav>
  <p> Results </p>
  <table border="1">
  <tr>
      <th> Player Name </th>
</tr>
<?php
$conn;
$term = $_POST["term"];
// $term2 = $_POST["term2"];
$sql = "SELECT p_name, pid FROM Player WHERE pos LIKE '%$term%' OR p_name LIKE '%$term%'";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
  while ($row = $result->fetch_assoc())
  {
    echo "<td><a href =". $row["pid"].".php>".$row["p_name"]. '</td></a>';
  }
}
?>
  </section>
</body>
</html> 