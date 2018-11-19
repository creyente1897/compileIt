<?php

    $link = mysqli_connect("mysql://mysql:3306/", "phpmyadmin", "ayush@1803", "phpmyadmin");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }

?>
