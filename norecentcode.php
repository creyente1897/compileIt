<?php

    session_start();

    if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
        
       	include("connection.php");
        
    } else {
        
        header("Location: login.php");
        
    }


?>
<!doctype html>
<html lang="en">
  <head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!-- Font-Awesome CSS -->
	    <link rel="stylesheet" href="css/fontawesome-all.min.css">
	    <!-- Lined Text Area CSS -->
	    <link href="css/jquery-linedtextarea.css" type="text/css" rel="stylesheet" />
	    <!-- Title -->
	    <title>Compile It!-Online IDE</title>
	    <!-- Title Image-->
	    <link rel="icon" href="img/c.png" type="image/png">
	    <!-- CSS of Nav-Bar & TextArea-->
	    <link href="css/index.css" type="text/css" rel="stylesheet" />

  </head>
  <body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-warning rounded">
		  <a class="navbar-brand" href="loggedinpage.php">
		    <img src="img/c.png" width="30" height="30" class="d-inline-block align-top" alt="">
		    Compile It!
		  </a>
		  <ul class="navbar-nav ml-auto">
		    <li class="nav-item">
		      <a class="nav-link" href="loggedinpage.php">New Code</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="recent.php">Recent Code</a>
		    </li>
		    <li class="nav-item">
		    	<a class="nav-link" href="login.php?logout=1">Logout</a>
		    </li>
		  </ul>
		</nav>
		</p>
		<div class="container">
			<center>
				<br>
				</p>
				<i class="far fa-file-code fa-7x"></i>
				</p>
				<h3>OHHH ! Seems like you have not compiled any code yet.</h3>
				</p>
				<h4><a href="loggedinpage.php">Compile Now!</a></h4>
			</center>
		</div>
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Bootstrap JS -->
	    <script src="js/jquery-3.3.1.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
  </body>
</html>