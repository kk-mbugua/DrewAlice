<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>DREW ALICE NJ</title>
        <link rel="stylesheet" href="css/1510645746.css">
    </head>
    <body>
        <script src="css/pure-layout-side-menu/js/ui.js"></script>
        <?php
        
        $county = $_GET["county"];
        $famtype = $_GET["family"];
        $income = $_GET["income"];
        
        $user = 'root';
        $password = 'root';
        $db = 'drewalice';
        $host = 'localhost';
        $port = 3306;

        $conn = mysqli_connect($host, $user, $password, $db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if ($famtype == single){
            $column = "SurviveB_one adult_tax FINAL";
        } else if ($famtype == family) {
            $column = "SurviveB_two adults_ two childcare_tax FINAL";
        }
        $sql = "SELECT * FROM `njdata` WHERE `US_County::County` LIKE '$county'";
        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                if ($row[$column] > $income) {
                    $bool = "BELOW";
                } else {
                    $bool = "ABOVE";
                }
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
        echo "<b>In $county county you are <u>$bool</u> the ALICE minimum";
        ?>
        <br><br>
        <input type="button" onclick="location.href='database.php?county=<?php echo $county?>'" value="View Statistis for <?php echo $county;?>" />
        <input type="button" onclick="location.href='usercomparison.php?county=<?php echo $county?>'" value="Calculate different income for <?php echo $county;?> county" />
    </body>
</html>
