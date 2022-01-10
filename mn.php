<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <title>Add a Manager</title>
    <link rel = "stylesheet" href = "ucl.css"> 
    <link rel="stylesheet" href="style.php" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family
    =Noto+Sans+Mono:wght@100;300;500;700;900&display=swap" rel="stylesheet">
</head>

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
            <li><a href = "imprint.html"> IMPRINT </a></li>
            </ul>
      </nav>
    
    
    <?php
            $servername = "localhost";
            $username = "group10";
            $password = "QaTqdl";
            $dbname = "group10";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
    ?>
    
    <section class="inps" align="right">
    <form method="post" class="form">
        <label>Manager Name</label><br>
        <input type="text" name="m_name"><br>
        <label>Career Trophies</label><br>
        <input type="text" name="c_trophies"><br><br>
        <input type="submit" name="submit"><br><br><br><br>

        <?php
        if (isset($_POST["submit"])) {
            $m_name = $_POST['m_name'];
            $c_trophies = (int)$_POST['c_trophies'];
            $sql = "INSERT INTO Manager(m_name, c_trophies) VALUES('$m_name', '$c_trophies');";
            
            if (mysqli_query($conn, $sql)) {
                echo("Record addded successfully!");
            } else{
                echo("Error when inserting :" . mysqli_error($conn));
            }
        }
        
        ?><br><br><br><br>
    </form>
    <p>Current table values are</p>
    <table border="5" radius="8" cellspacing="1">
        <tr>
        <th>Manager Name(Name of the Manager)</th>
        <th>Career Trophies</th>
        </tr>
        
        <!-- php section for displaying the result through connection to the server -->
        <?php
        $conn;
        if (!$conn) { // checking connection
            die("Sorry, error connecting to the server: " . mysqli_connect_error());
        }
        // echo "Connection was SUCCESSFUL!!!";
        
        $sql = "SELECT* FROM Manager;";
        $result = $conn->query($sql);   
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["m_name"]. "</td><td>". $row["c_trophies"]. "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        mysqli_close($conn);
        ?>

    </table>
    </section> 
</body>

</html>