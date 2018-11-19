<?php

    session_start();

    if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
        
       	include("connection.php");

       	$query = "SELECT email FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
      	$row = mysqli_fetch_array(mysqli_query($link, $query));

      	$sql ="SELECT * FROM `$row[0]`";

      	$result = mysqli_query($link, $sql) or die("Error:Could not show user code history.");

      	if (mysqli_num_rows($result) == 0) {

        	header("Location: norecentcode.php");

        }
        
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
				<?php $i=1;?>
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Language</th>
				      <th scope="col">Your Code</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php while($row = mysqli_fetch_array($result)):;?>
				  		<tr>
				      	<td><a href="viewcode.php?id=<?php echo $row[0]?>"><?php echo $row[0]?></a></td>
				      	<td><?php echo $row[2]?></td>
				      	<td><?php echo $row[1]?></td>
				    	</tr>
				  		<?php $i++; ?>
				  	<?php endwhile; ?>
				  </tbody>
				</table>
			</center>
		</div>
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Bootstrap JS -->
	    <script src="js/jquery-3.3.1.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
  </body>
</html>