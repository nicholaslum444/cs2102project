<!DOCTYPE html>

<html>
<style type="text/css">
<!--
@import url("css/main.css");
-->
</style>
<head>
	<title>NUS Maids - Task</title>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
 $(document).ready(function () {
    $("#dt1").datepicker({
        dateFormat: "dd-M-yy",
        minDate: 0,
        onSelect: function () {
            var dt2 = $('#dt2');
            var startDate = $(this).datepicker('getDate');
            //add 30 days to selected date
            startDate.setDate(startDate.getDate() + 30);
            var minDate = $(this).datepicker('getDate');
            //minDate of dt2 datepicker = dt1 selected day
            dt2.datepicker('setDate', minDate);
            //sets dt2 maxDate to the last day of 30 days window
            dt2.datepicker('option', 'maxDate', startDate);
            //first day which can be selected in dt2 is selected date in dt1
            dt2.datepicker('option', 'minDate', minDate);
            //same for dt1
            $(this).datepicker('option', 'minDate', minDate);
        }
    });
    $('#dt2').datepicker({
        dateFormat: "dd-M-yy"
    });
});
  </script>
</head>

<body>
  <?php
        $dbconn = pg_connect('host=localhost 
                                port=5432 
                                dbname='.$DATABASE_NAME.' 
                                user='.$DB_USERNAME.' 
                                password='.$DB_PASSWORD
        ) or die('Could not connect: ' . pg_last_error());
    ?>

<?php
// define variables and set to empty values
$description = $startDate = $endDate = $price = "";
$descriptionErr = $startDateErr = $endDateErr = $priceErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["description"])) {
    $descriptionErr = "*Name is required";
  } else {
     $description = test_input($_POST["description"]);
  }
  
  if (empty($_POST["startDate"])) {
    $startDateErr = "*Start Date is required";
  } else {
      $startDate = test_input($_POST["startDate"]);
  }
    
  if (empty($_POST["endDate"])) {
    $endDateErr = "*End Date is required";
  } else {
     $endDate = test_input($_POST["endDate"]);
  }

  if (empty($_POST["price"])) {
    $priceErr = "*Price is required";
  } else {
    $price = test_input($_POST["price"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div id="wrapper">
	<div id="Navi"> <a href="index.php"><img src="img\homeLogo.jpg" width="70" height="70" href="index.php" alt="Navi" /></a>
	</div>
</div>

<div id="regHeader"><br /><br/><br/>
    <div id="regBody"><br />
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

    <h1>Good Day! </h1>
    <input name="description" type="text" class="form-control" id="description" placeholder="What job will you like to offer?">
    <span class="errorValidation"><?php echo $descriptionErr;?></span></br>
    
    <input name="startDate" type="text" class="form-control" id="dt1" placeholder="Start Date">
    <span class="errorValidation"><?php echo $startDateErr;?></span><br/>
	
    <input name="endDate" type="text" class="form-control" id="dt2" placeholder="End Date">
    <span class="errorValidation"> <?php echo $endDateErr;?></span><br/>
	
    <input name="price" type="text" class="form-control" id="price" placeholder="What price will you accept the job offer?">
    <span class="errorValidation"><?php echo $priceErr;?></span><br/>
    
    <input name="create" type="submit" class="alignSignInButton" value="Create"/>
</form>

<!--testing-->
<?php
echo $description;
echo "<br>";
echo $startDate;
echo "<br>";
echo $endDate;
echo "<br>";
echo $price;
echo "<br>";
?>

	</div>
</div>

<br/><br/><br/><br/><br/>

<?php pg_close($dbconn); ?>
</body>
    
<div id="footer"><br />&copy; All rights reserved 2016. NUS Maids. </div>
</html>