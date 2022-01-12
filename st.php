<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <title>Add a Stadium</title>
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
        <label>Stadium Name</label><br>
        <input type="text" name="stad_name"><br>
        <label>Add a Stadium</label><br>
        <input type="text" name="cap"><br><br>
        <input type="submit" name="submit"><br><br><br><br>

        <?php
        if (isset($_POST["submit"])) {
            $stad_name = $_POST['stad_name'];
            $cap = (int)$_POST['cap'];
            $sql = "INSERT INTO Stadium(stad_name, cap) 
            VALUES('$stad_name', '$cap');";
            
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
        <th>Stadium Name</th>
        <th>Capacity</th>
        </tr>
        
        <!-- php section for displaying the result through connection to the server -->
        <?php
        $conn;
        if (!$conn) { // checking connection
            die("Sorry, error connecting to the server: " . mysqli_connect_error());
        }
        // echo "Connection was SUCCESSFUL!!!";
        
        $sql = "SELECT* FROM Stadium;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["stad_name"]. "</td><td>". $row["cap"]. "</td></tr>";
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