<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <title>Add a Player</title>
</head>

<?php
        $servername = "localhost";
        $username = "group10";
        $password = "QaTqdl";
        $dbname = "group10";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
?>
   

<form method="post">
        <label>Shirt Number</label><br>
        <input type="text" name="s_num"><br>
        <label>Player Name</label><br>
        <input type="text" name="p_name"><br>
        <label>Age</label><br>
        <input type="text" name="age"><br>
        <label>Position</label><br>
        <input type="text" name="pos"><br>
        <label>Country</label><br>
        <input type="text" name="country"><br>
        <label>Goals</label><br>
        <input type="text" name="goals"><br>
        <label>Salary</label><br>
        <input type="text" name="salary"><br>
        <label>Assists</label><br>
        <input type="text" name="assists"><br><br>
        <input type="submit" name="submit"><br><br><br><br>

        <?php
        if (isset($_POST["submit"])) {
            $s_num = (int)$_POST['s_num'];
            $p_name = $_POST['p_name'];
            $age = (int)$_POST['age'];
            $pos = $_POST['pos'];
            $country = $_POST['country'];
            $goals = (int)$_POST['goals'];
            $salary = (int)$_POST['salary'];
            $assists = (int)$_POST['assists'];
            $sql = "INSERT INTO Player(s_num, p_name, age, pos, country, goals, salary, assists) 
            VALUES('$s_num', '$p_name', '$age', '$post', '$country', '$goals', '$salary', '$assists');";
            
            if (mysqli_query($conn, $sql)) {
                echo("Record addded successfully!");
            } else{
                echo("Error when inserting :" . mysqli_error($conn));
            }
        }
        
        ?><br><br><br><br>
    </form>
    <p>Current table values are</p>
    <table border="1">
        <tr>
        <th>Player Number</th>
        <th>Player Name</th>
        <th>Age</th>
        <th>Position</th>
        <th>Player Country(Country where he was born)</th>
        <th>Goals scored</th>
        <th>Salary</th>
        <th>Assists</th>
        </tr>
        
        <!-- php section for displaying the result through connection to the server -->
        <?php
        $conn;
        if (!$conn) { // checking connection
            die("Sorry, error connecting to the server: " . mysqli_connect_error());
        }
        // echo "Connection was SUCCESSFUL!!!";
        
        $sql = "SELECT* FROM Player;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Player Number"]. "</td>
                <td>". $row["p_name"]. "</td>
                <td>". $row["age"]. "</td>
                <td>". $row["pos"]. "</td>
                <td>". $row["country"]. "</td>
                <td>". $row["goals"]. "</td>
                <td>". $row["salary"]. "</td>
                <td>". $row["assists"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>

</html>