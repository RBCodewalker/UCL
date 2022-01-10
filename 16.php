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
        // Create connection
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
      </nav>
  <p> Results </p>
  <table border="1">
  <tr>
      <th> Player Number </th>
      <th> Player Name< </th>
      <th> Age </th>
      <th> Player Country</th>
      <th> Salary </th>
      <th> Team </th>
</tr>
<?php
$conn;
$sql = "SELECT * FROM Player WHERE pid=16";
$result = $conn->query($sql);
if($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
    echo "<tr><td>" . $row["s_num"]. " </td>
    <td>". $row["p_name"]. " </td>
    <td>". $row["age"]. "</td>
    <td>". $row["country"]. "</td>
    <td>". $row["salary"]. "</td>"
    ;
  }
}
?>
  </section>
</body>
</html> 