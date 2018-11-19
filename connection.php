<?php

    $link = mysqli_connect("localhost", "phpmyadmin", "ayush@1803", "phpmyadmin");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }

?>