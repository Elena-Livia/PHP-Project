<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		<div class="main">
			<ul>
				 <li><a href="home.php">Home</a></li>
				 <li id="signup"><a href="signup.php">Sign Up</a></li>
			</ul>
			<div class="nav-login">
				<?php
					if (isset($_SESSION['usr_id'])) {
						echo '
						<form action="BackEnd/logout.php" method="POST">
							<button type="submit" name="submit">Logout</button>
						</form>
						';
					} else{
						echo '
						<form action="BackEnd/login.php" method="POST">
							<input type="text" name="user" placeholder="username/email">
							<input type="password" name="password" placeholder="password">
							<button type="submit" name="submit">LOGIN</button>
						</form>
						<a href="signup.php">SIGN UP</a>
						';
					}
				
				?>
			</div>
		</div>
	</nav>
</header>
