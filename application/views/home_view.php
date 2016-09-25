<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>NUSMaids</title>
</head>

<body>

<div id="container">
    <h1><?php echo $title ?></h1>
    <hr>
    <p>This is a test page. Welcome to CS2102 NUS Maids, Mr. <strong><?php echo $username ?></strong>.</p>

	<div id="body">
        <?php foreach ($tasks as $task) { ?>
            <p><?php echo json_encode($task) ?></p>
        <?php } ?>
	</div>
    
    <a href="home/logout">LOGOUT</a>
</div>

</body>
</html>