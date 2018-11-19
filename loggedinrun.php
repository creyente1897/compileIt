<?php

	include("lang.php");

    session_start();

    if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
        
       	include("connection.php");

       	$query = "SELECT email FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
      	$row = mysqli_fetch_array(mysqli_query($link, $query));

      	$sql = "INSERT INTO `$row[0]` (`code`, `lang`) VALUES ('".mysqli_real_escape_string($link, $_POST['code'])."', '".mysqli_real_escape_string($link, $lan)."')";

      	$result = mysqli_query($link, $sql) or die("Error:Could not Update user code history.");
        
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
				<?php
					$langID=$_POST["lang"];
					switch($langID)
					{
							case 1:
							{
								echo "<div class=\"alert alert-info\" role=\"alert\">Language Used = C</div>\n";
								include("compilers/c.php");
								break;
							}
							case 2:
							{
								echo "<div class=\"alert alert-info\" role=\"alert\">Language Used = C++</div>\n";
								include("compilers/cpp.php");
								break;
							}
							case 3:
							{
								echo "<div class=\"alert alert-info\" role=\"alert\">Language Used = C++11</div>\n";
								include("compilers/cpp11.php");
								break;
							}
							case 4:
							{	echo "<div class=\"alert alert-info\" role=\"alert\">Language Used = JAVA</div>\n";
								include("compilers/java.php");
								break;
							}
					}
				?>
			</center>
		</div>
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Bootstrap JS -->
	    <script src="js/jquery-3.3.1.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
  </body>
</html>