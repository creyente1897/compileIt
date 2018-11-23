<?php
    $dbhost = getenv("MYSQL_SERVICE_HOST");
    $dbport = getenv("MYSQL_SERVICE_PORT");
    $dbuser = getenv("databaseuser");
    $dbpwd = getenv("databasepassword");
    $dbname = getenv("databasename");

    $link = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname);
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }

?>
