<!DOCTYPE html>

<html>
<style type="text/css">
<!--
@import url("css/main.css");
-->
</style>
<head>
  <title>NUS Maids</title>
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
  <div id="Navi"> <a href="index.php"><img src="img\homeLogo.jpg" width="70" height="70" href="index.php" alt="Navi" /></a>
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

<!--testing-->
<?php
echo $username;
echo "<br>";
echo $password;
echo "<br>";
?>

  </div>
</div>

<br/><br/><br/><br/><br/>

<?php pg_close($dbconn); ?>
</body>
    
<div id="footer"><br />&copy; All rights reserved 2016. NUS Maids. </div>
</html>