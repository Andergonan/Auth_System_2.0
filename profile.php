<?php
    session_start();

    if (!isset($_SESSION['loggedin'])) {
	    header('Location: index.html');
	    exit;
    }
    require('db_conn.php');
    $mysql = $conn->prepare('SELECT password, level_id FROM users WHERE id = ?');
    $mysql->bind_param('i', $_SESSION['id']);
    $mysql->execute();
    $mysql->bind_result($password, $level_id);
    $mysql->fetch();
    $mysql->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Váš profil</title>
	</head>
	<body class="loggedin">
		<nav>
			<div>
				<h1><a href="home.php">Auth system 2</a></h1>
				<a href="profile.php">Profil</a>
				<a href="logout.php">Odhlásit</a>
			</div>
		</nav>
		<div>
			<h2>Váš profil</h2>
			<div>
				<p>Informace o Vašem účtu:</p>
				<table>
					<tr>
						<td>Uživatelské jméno:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Heslo:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Úroveň:</td>
						<td><?=$level_id?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>