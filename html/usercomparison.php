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
?>
        <div class="12 well lead text-center" style="background-color: #1a237e ">
                    
        <?php echo "<h2 style='color: white'><u>" . $county;
        echo ", New Jersey </u></h2> <br>"; ?>
           
        </div>

    <form action="userresults.php" method="get" align="center">
        <div class="form-group container well text-center">
            <h4 class='text-primary'>Family type (single adult or Family of four)</h4>
            <select name="family">
              <option value="single">Single Adult</option>
              <option value="family">Two children two adults</option>
            </select>
            <br><br>
            <h4 class='text-primary'>What is your family's annual income?</h4>
            <input type="number" name="income" value="" required="true" placeholder="50000">
            <br>
            <br>
            Generate results for <input type="submit" value="<?php echo $county?>" name="county"> county
        </div>
    </form>
    <div class="text-center well">
    <input align='center' type="button" onclick="location.href='database.php?county=<?php echo $county?>'" value="View All Statistis for <?php echo $county;?>" />
    </div>
     
    
</body>
</html>


