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
		<div class="container">
			<form action="run.php" method="post">
				<center>
						<i class="fas fa-code"> Enter your Code here</i>
						</p>
						<textarea class="lined" id="codeArea" name="code" rows="20" cols="100"></textarea>
						</p>
						<select class="btn btn-outline-info" name="lang" onchange="setLanguage(this);">
							<option value="1">C </option>
							<option value="2">C++ </option>
							<option value="3">C++ 11 </option>
							<option value="4">Java </option>
						</select>
						</p>
						<i class="fas fa-file"> Or upload your code file (only .txt format)</i>
						<td><input type="file" id="codeFile"></td>
						</p>
						<button type="button" class="btn btn-outline-warning" onclick="loadCodeFileAsText()">Upload Code File <i class="fas fa-file-upload"></i> </button>
						</p>
						<i class="far fa-keyboard"> Input: </i>
						</p>
						<textarea rows="4" id="inputArea" name="input" cols="100"></textarea>
						</p>
						<i class="fas fa-file"> Or upload your input file (only .txt format)</i>
						<td><input type="file" id="inputFile"></td>
						</p>
						<button type="button" class="btn btn-outline-warning" onclick="loadInputFileAsText()">Upload Input File <i class="fas fa-file-upload"></i> </button>
						</p>
						<button type="submit" class="btn btn-outline-success" name="compile">Compile & Run <i class="fas fa-cogs"></i> </button>
						</p>
				</center>
			</form>
		</div>	
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Bootstrap JS -->
	    <script src="js/jquery-3.3.1.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <!-- Now Lined Text Area JS -->
	    <script src="js/jquery-linedtextarea.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
  </body>
</html>