<?php
    require('db_conn.php');

    if (!isset($_POST['username'], $_POST['password']))  {
        
        exit('Prosím vyplňte všechna pole!');
    
    } else if ((empty($_POST['username']) || empty($_POST['password']))) {
        
        exit('Prosím vyplňte všechna pole!');
    }

    if ($mysql = $conn->prepare('SELECT id, password FROM users WHERE username = ?')) {
        
        $mysql->bind_param('s', $_POST['username']);
        $mysql->execute();
        $mysql->store_result();
        
        if ($mysql->num_rows > 0) {
            
            echo 'Uživatelské jméno již existuje!';
        
        } else if ($mysql = $conn->prepare('INSERT INTO users (username, password) VALUES (?, ?)')) {
            
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $mysql->bind_param('ss', $_POST['username'], $password);
            $mysql->execute();
            echo 'Registrace probělhla úspěšně! Nyní se můžete <a href="index.html">přihlásit<a/>!';
        }
        $mysql->close();
    } else {
        
        echo 'Něco se pokazilo :/.';
    }
    
    $conn->close();
?>