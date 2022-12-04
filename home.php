<?php
    session_start();
    
    if (!isset($_SESSION['loggedin'])) {
	    header('Location: index.html');
	    exit;
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Domovská stránka</title>
	</head>
	<body class="loggedin">
		<nav>
			<div>
				<h1>Auth system 2</h1>
				<a href="profile.php">Profil</a>
				<a href="logout.php">Odhlásit</a>
			</div>
		</nav>
		<div>
			<h2>Domovská stránka</h2>
			<p>Vítejte zpět, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>