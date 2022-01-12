<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <title>Add a League</title>
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
        <label>League Year</label><br>
        <input type="text" name="l_year"><br>
        <label>MVP</label><br>
        <input type="text" name="mvp"><br>
        <label>Winner</label><br>
        <input type="text" name="winner"><br><br>
        <input type="submit" name="submit"><br><br><br><br>

        <?php
        if (isset($_POST["submit"])) {
            $l_year = (int)$_POST['l_year'];
            $mvp = $_POST['mvp'];
            $winner = $_POST['winner'];
            $sql = "INSERT INTO Champions_League(l_year, mvp, winner) VALUES('$l_year', '$mvp', '$winner');";
            
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
        <th>League Year</th>
        <th>MVP (Most Valuable Player)</th>
        <th>Winner</th>
        </tr>
        
        <!-- php section for displaying the result through connection to the server -->
        <?php
        $conn;
        if (!$conn) { // checking connection
            die("Sorry, error connecting to the server: " . mysqli_connect_error());
        }
        // echo "Connection was SUCCESSFUL!!!";
        
        $sql = "SELECT* FROM Champions_League;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["l_year"]. "</td>
                <td>". $row["mvp"]. "</td>
                <td>" . $row["winner"]. "</td></tr>";
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