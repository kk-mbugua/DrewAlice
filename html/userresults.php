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
 
        <?php
        
        $county = $_GET["county"];
        $famtype = $_GET["family"];
        $income = $_GET["income"]; 
        if ($famtype == "family") {
            $familytype = "a family with Two adults and Two childern";
        } else {
            $familytype = "a single adult";
        }
        
        ?>
        
        <div class="12 well lead text-center" style="background-color: #1a237e ">
                    
        <?php echo "<h2 style='color: white'><u>" . $county;
        echo ", New Jersey </u></h2> <br>"; ?>
           
        </div>
        
        <?php
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
        
        echo "<div class='well text-center'>";
        echo "<b>Earning <u>$" . $income . "</u> a year for " . $familytype . "</b>";
        echo "<b>In " . $county . " county you are <u>" . $bool . "</u> the ALICE minimum";
        ?>
        
        <br><br>
        <input type="button" onclick="location.href='database.php?county=<?php echo $county?>'" value="View All Statistis for <?php echo $county;?>" />
        <input type="button" onclick="location.href='usercomparison.php?county=<?php echo $county?>'" value="Calculate different income for <?php echo $county;?> county" />
        </div>
    </body>
</html>
