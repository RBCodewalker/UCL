<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <title>Add a Group</title>
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
        <label>Group ID</label><br>
        <input type="text" name="g_id"><br>
        <label>Top Scorer</label><br>
        <input type="text" name="t_scorer"><br>
        <label>Group Of Death</label><br>
        <input type="text" name="god"><br><br>
        <input type="submit" name="submit"><br><br><br><br>

        <?php
        if (isset($_POST["submit"])) {
            $g_id = $_POST['g_id'];
            $t_scorer = $_POST['t_scorer'];
            $god = $_POST['god'];
            $sql = "INSERT INTO Groups(g_id, t_scorer, god) 
            VALUES('$g_id', '$t_scorer', '$god');";
            
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
        <th>Group ID (I.E A, B etc.)</th>
        <th>Top Scorer</th>
        <th>Group Of Death</th>
        </tr>
        
        <!-- php section for displaying the result through connection to the server -->
        <?php
        $conn;
        if (!$conn) { // checking connection
            die("Sorry, error connecting to the server: " . mysqli_connect_error());
        }
        // echo "Connection was SUCCESSFUL!!!";

        $sql = "SELECT* FROM Groups;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["g_id"]. "</td>
                <td>". $row["t_scorer"]. "</td>
                <td>". $row["god"]. "</td></tr>";
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