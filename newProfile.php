<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NUS Maids - Create Your Account</title>
<style type="text/css">
<!--
@import url("css/main.css");
-->
</style>
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
$usernameErr = $passwordErr = $addressErr = $mobileNoErr = $homeNoError = $emailErr = "";
$username = $password = $address = $mobileNo = $homeNo = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["username"])) {
			$usernameErr = "* Username is required";
		}  else {
			$username = test_input($_POST["username"]);
		}
			
		if (empty($_POST["password"])) {
			$passwordErr = "* Password is required";
		}  else {
			$password = test_input($_POST["password"]);
		}
		
		if (empty($_POST["address"])) {
			$addressErr = "* Address is required";
		}  else {
			$address = test_input($_POST["address"]);
		}
		
		if (empty($_POST["homeNo"])) {
			$homeNoErr = "* Home no. is required";
		}  else {
			$homeNo = test_input($_POST["homeNo"]);
		}
		
		if (empty($_POST["mobileNo"])) {
			$mobileNoErr = "* Mobile. No is required";
		}  else {
			$mobileNo = test_input($_POST["mobileNo"]);
		}
		
		if (empty($_POST["email"])) {
			$emailErr = "* Email is required";
		} else {
			$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "* Invalid email format"; 
			}
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
	<div id="Navi"><a href="index.php"><img src="img\homeLogo.jpg" width="70" height="70" href="index.php" alt="Navi" /></a>
	<?php if (isset($_SESSION["MM_Username"])){?>
	<a class="item" href="index.php">Home</a> | <a class="item" href="profile.php">My Profile</a> | <a class="item" href="product.php"> Task</a>
	<?php } ?>
		<div id="userbar">
			<!--only needed if session is used-->
			<?php
			if (isset($_SESSION["MM_Username"]))
			{   
				echo "Welcome " . $_SESSION["MM_Username"];
				echo '. <a href="login.php?logout=true">Sign Out</a>';
			}   
			else  
			{   
				echo '<a href="login.php">Sign In</a>';   
			}   
	?>
		</div>
	</div>
</div>
  
<div id="regHeader"><br /><br/><br/>
    <div id="regBody"><br />
    
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1>Create Your Account</h1>
		
      <input name="username" type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $username;?>" />
	  <span class="errorValidation"><?php echo $usernameErr;?></span><br />
      
	  <input name="password" type="password" class="form-control" id="password" placeholder="Password" value="<?php echo $password;?>" />
      <span class="errorValidation"><?php echo $passwordErr;?></span><br />
	  
	  <input name="address" type="text" class="form-control" id="address" placeholder="Address" value="<?php echo $address?>" />
      <span class="errorValidation"><?php echo $addressErr;?></span><br />
	  
	  <input name="mobileNo" type="text" class="form-control" id="mobileNo" placeholder="Mobile Number" value="<?php echo $mobileNo;?>" />
	  <span class="errorValidation"><?php echo $mobileNoErr;?></span><br />
	  
	  <input name="homeNo" type="text" class="form-control" id="homeNo" placeholder="Home Number" value="<?php echo $homeNo;?>" />
	  <span class="errorValidation"><?php echo $homeNoErr;?></span><br />
	  
	  <input name="email" type="text" class="form-control" id="email" placeholder="Email Address" value="<?php echo $email;?>" />
	  <span class="errorValidation"><?php echo $emailErr;?></span><br/>
	
	  <span class="alignTermsAndService">By signing up you agree to our <u>Terms of Service</u> </br></span> 
	  <span class="alignTermsAndService">and Privacy Policy.</span> 
	  
	  <input name="submit" type="submit" class="alignSignUpButton" value="Sign Up"/><br />
    </form>
    </div>
</div>
	<!-- testing -->
	<span class="errorValidation"><?php echo $username; echo $email;?> </span> 
<?php
pg_close($dbconn);
?>
</body>
	<div id="footer"><br />&copy; All rights reserved 2016. NUS Maids. </div>
</html>

