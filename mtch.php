<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <title>Add a Match</title>
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
        <label>Points Earned</label><br>
        <input type="text" name="p_earned"><br>
        <label>Result</label><br>
        <input type="text" name="result"><br>
        <label>Date Of Match</label><br>
        <input type="text" name="m_date"><br>
        <label>Team 1 Name</label><br>
        <input type="text" name="t1_name"><br>
        <label>Team 2 Name</label><br>
        <input type="text" name="t2_name"><br><br>
        <input type="submit" name="submit"><br><br><br><br>

        <?php
        if (isset($_POST["submit"])) {
            $p_earned = (int)$_POST['p_earned'];
            $result = $_POST['result'];
            $m_date = (int)$_POST['m_date'];
            $t1_name = $_POST['t1_name'];
            $t2_name = $_POST['t2_name'];
            $sql = "INSERT INTO Matches(p_eaned, result, m_date, t1_name, t2_name) 
            VALUES('$p_earned', '$result', '$m_date', '$t1_name', '$t2_name');";
            
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
        <th>Points earned</th>
        <th>Result</th>
        <th>Date Of Match</th>
        <th>Team 1</th>
        <th>Team 2</th>
        </tr>
        
        <!-- php section for displaying the result through connection to the server -->
        <?php
        $conn;
        if (!$conn) { // checking connection
            die("Sorry, error connecting to the server: " . mysqli_connect_error());
        }
        // echo "Connection was SUCCESSFUL!!!";
        
        $sql = "SELECT* FROM Matches;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["p_earned"]. "</td>
                <td>". $row["result"]. "</td>
                <td>". $row["m_date"]. "</td>
                <td>". $row["t1_name"]. "</td>
                <td>". $row["t2_name"]. "</td></tr>";
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
