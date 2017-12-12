<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>DREW ALICE NJ</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="container"    
        <?php
        echo "<h1><u>Two Parent Two Child Statistics for ";
        $county = $_GET["county"];
        echo $county;
        echo ", New Jersey </u></h1> <br>";
        $user = 'root';
        $password = 'root';
        $db = 'drewalice';
        $host = 'localhost';
        $port = 3306;

        $conn = mysqli_connect($host, $user, $password, $db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `njdata` WHERE `US_County::County` LIKE '$county'";
        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<b><u>Population Statistics</u></b><br>";
                echo "<b>ALICE total: " . $row["ALICE total"] . "<br>";
                echo "<b>Percent of population in ALICE: " . $row["ALICE total Percent"]*100 . "%</b><br><br>";
                
                echo "<b><u>Average Costs</u></b> <br>";
                echo "<b>Two adults  two childcare food: " . $row["SurviveB_two adults_ two childcare_food"] . " $</b><br>";
                echo "<b>Two adults two childcare housing: " . $row["SurviveB_two adults_ two childcare_ housing"] . " $</b><br>";
                echo "<b>Childcare: " . $row["SurviveB_two adults_ two childcare_childcare"] . " $</b><br>";
                echo "<b>Healthcare: " . $row["SurviveB_two adults_ two childcare_ healthcare"] . " $</b><br>";
                echo "<b>Transportation: " . $row["SurviveB_two adults_ two childcare_transp"] . " $</b><br>";
                echo "<b>MISC final: " . $row["SurviveB_two adults_ two childcare_ MISC final"] . " $</b><br>";
                echo "<b>Childcare tax FINAL: " . $row["SurviveB_two adults_ two childcare_tax FINAL"] . " $</b><br>";
                echo "<b>Childcare WAGE: " . $row["SurviveB_two adults_ two childcare_WAGE"] . " $</b><br><br>";
                
                echo "<b><u>Total cost for a two parent two child family</u>: " . $row["SurviveB_two adults_ two childcare_GRAND TOTAL FINAL"] . " $</b><br>";
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
        ?>
    </div>
    </body>
</html>
