<?php include 'secrets.php'; ?>

<head>
    <title>NUSMaids</title>
</head>
<body>
    <h1><?php echo 'Hello World CS2102 Project' ?></h1>
    <hr>
    <p>This is a test page. Welcome to CS2102 NUS Maids.</p>
    <p><?php echo 'Logging in to '.$DATABASE_NAME.' with '.$DB_USERNAME ?></p>
    
    <?php
        $dbconn = pg_connect('host=localhost 
                                port=5432 
                                dbname='.$DATABASE_NAME.' 
                                user='.$DB_USERNAME.' 
                                password='.$DB_PASSWORD
        ) or die('Could not connect: ' . pg_last_error());
    ?>
    
    <p>Logged in!</p>
    
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
</body>