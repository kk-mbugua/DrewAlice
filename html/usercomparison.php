<!DOCTYPE html>

<html>
<body>
<?php
$county = $_GET["county"];  
?>
    <form action="/userresults.php" method="get">
      <select name="family">
        <option value="single">Single Adult</option>
        <option value="family">Two children two adults</option>
      </select>
      <br><br>
      <input type="text" name="income" value=""><br>
      <input type="submit">
    </form>
    
    <input type="button" onclick="location.href='database.php?county=<?php echo $county?>'" value="View Statistis for <?php echo $county;?>" />

</body>
</html>


