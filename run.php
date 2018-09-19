<?php
	$langID=$_POST["lang"];
	switch($langID)
	{
			case 1:
			{
				include("compilers/c.php");
				break;
			}
			case 2:
			{
				include("compilers/cpp.php");
				break;
			}
			case 3:
			{
				include("compilers/cpp11.php");
				break;
			}
			case 4:
			{	
				include("compilers/java.php");
				break;
			}
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
    <title>Compile It!-Online IDE</title>

    <link rel="icon" href="img/c.png" type="image/png">

    <style type="text/css">
	navbar-nav {
      flex-direction: row;
    }
    
    .nav-link {
      padding-right: .5rem !important;
      padding-left: .5rem !important;
    }
    
	</style>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-warning rounded">
	  <a class="navbar-brand" href="index.php">
	    <img src="img/c.png" width="30" height="30" class="d-inline-block align-top" alt="">
	    Compile It!
	  </a>
	  <ul class="navbar-nav ml-auto">
	    <li class="nav-item">
	      <a class="nav-link" href="index.php">New Code</a>
	    </li>
	    <li class="nav-item">
	      <button type="button" class="btn btn-outline-">Login</button>
	    </li>
	  </ul>
	</nav>
	</p>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
