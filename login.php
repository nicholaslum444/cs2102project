<!DOCTYPE html>

<html>
<style type="text/css">
<!--
@import url("main.css");
-->
</style>
<head>
  <title>NUS Maids</title>

</head>

<body>
<!--
  <?php
        $dbconn = pg_connect('host=localhost 
                                port=5432 
                                dbname='.$DATABASE_NAME.' 
                                user='.$DB_USERNAME.' 
                                password='.$DB_PASSWORD
        ) or die('Could not connect: ' . pg_last_error());
    ?>
-->

<?php
// define variables and set to empty values
$username = $password = "";
$usernameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "*Username is required";
  } else {
     $username = test_input($_POST["username"]);
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "*Password is required";
  } else {
    $password = test_input($_POST["password"]);
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
  <div id="Navi"> <a href="index.php"><img src="homeLogo.jpg" width="70" height="70" href="index.php" alt="Navi" /></a>
  </div>
</div>

<div id="regHeader"><br /><br/><br/>
    <div id="regBody"><br />
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

    <h1>Good Day! </h1>
    <input name="username" type="text" class="form-control" id="username" placeholder="Username">
    <span class="errorValidation"><?php echo $usernameErr;?></span></br>
    
    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
    <span class="errorValidation"><?php echo $passwordErr;?></span><br/>

    
    <input name="signIn" type="submit" class="alignSignInButton" value="Sign In"/>
</form>

<?php
echo $username;
echo "<br>";
echo $password;
echo "<br>";
?>


<!--
  <?php    
        $query = 'SELECT * FROM task';
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
        echo '<b>SQL: </b>'.$query.'<br>';
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            foreach ($line as $col_value) {
                echo '| '.$col_value.' ';
            }
            echo '|';
            echo '<br>';
        }
        pg_free_result($result);
    ?>
    
    <p>Done!</p>
    
    <?php pg_close($dbconn); ?>
-->
  </div>
</div>

<br/><br/><br/><br/><br/>
</body>
    
<div id="footer"><br />&copy; All rights reserved 2016. NUS Maids. </div>
</html>