<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
// CSCI 330 DB Author- Sanchit Sahni 
<html>
    <head>
        /* Databse File> */
        <meta charset="UTF-8">
        <title> ALICE </title>
    </head>
    
    <body>
        <?php $county = $_GET["county"];?>
        <div class="col-md-12 well">
        <div class="12 well lead text-center">
                    
        <?php echo "<h2 style='color: white'><u>" . $county;
        echo ", New Jersey </u></h2> <br>"; ?>
            
            <div class="col-md-4">
                <input type="button" onclick="location.href='usercomparison.php?county=<?php echo $county?>'" value="Back to calculate Alice" />
            </div>
            
            
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <input type="button" onclick="location.href='index.php'" value="Back to map" />
            </div>
            <br><br>
        </div>
            
        
        
        <div class="col-md-6 text-left" >
            <div class="well lead" style="background-color: #3d5afe">
            <?php echo "<h4 style='color: white'><u>Two Parent Two Child Statistics</u></h4>";?>
            
            </div>
            <div class="well" style="background-color: #8c9eff">
        <?php
        $user = 'user';
        $password = 'password';
        $db = 'drewalice';
        $host = 'localhost';
        $port = 3306;

        $conn = mysqli_connect($host, $user, $password, $db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `njdata` WHERE `US_County::County` LIKE '$county'";
        $result = mysqli_query($conn, $sql);
        ?>
        
            
            
        <?php
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
        </div>
        
        
        <?php
        $user = 'user';
        $password = 'password';
        $db = 'drewalice';
        $host = 'localhost';
        $port = 3306;

        $conn = mysqli_connect($host, $user, $password, $db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `njdata` WHERE `US_County::County` LIKE '$county'";
        $result = mysqli_query($conn, $sql);
        ?>
        
            
            
        <?php
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<b><u>Population Statistics</u></b><br>";
                echo "<b>ALICE total: " . $row["ALICE total"] . "<br>";
                echo "<b>Percent of population in ALICE: " . $row["ALICE total Percent"]*100 . "%</b><br><br>";
                
                echo "<b><u>Average Costs</u></b> <br>";
                echo "<b>Single adult food: " . $row["SurviveB_one adult _ food"] . " $</b><br>";
                echo "<b>Single adult housing: " . $row["SurviveB_one adult_housing"] . " $</b><br>";
                echo "<b>Single adult Childcare: " . $row["SurviveB_one adult_ childcare"] . " $</b><br>";
                echo "<b>Single adult Healthcare: " . $row["SurviveB_one adult_ healthcare"] . " $</b><br>";
                echo "<b>Single adult Transportation: " . $row["SurviveB_one adult_transp"] . " $</b><br>";
                echo "<b>Single adult MISC final: " . $row["SurviveB_one adult_ MISC final"] . " $</b><br>";
                echo "<b>Single adult tax FINAL: " . $row["SurviveB_one adult_tax FINAL"] . " $</b><br>";
                echo "<b>Single Adult WAGE: " . $row["SurviveB_one adult_WAGE"] . " $</b><br><br>";
                
                echo "<b><u>Total cost </u>: " . $row["SurviveB_one adult_GRAND TOTAL FINAL"] . " $</b><br>";
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
        ?>
        </div>
        </div>
        </div>
    
    </body>
</html>
