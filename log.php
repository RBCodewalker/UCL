<?php
        $data = $_POST;
        if (empty($data['username']) || empty($data['password'])){
            die('Username or password are required!');
        }

        $username = $data['username'];
        $password = $data['password'];

        
        $host = 'localhost';
        $dbuser = 'group10';
        $pass = 'QaTqdl';
        $db = 'group10';
        $dsn = "mysql:host=$host; dbname=$db";

        try{
            $pdo = new PDO($dsn, $dbuser, $pass);
        } catch (PDOException $exception){
            die('Connection failed: ' . $exception->getMessage());
        }
    
        $stment = $pdo->prepare('SELECT * FROM Users WHERE username = :username');
        $stment->execute([':username' => $username]);
        $res = $stment->fetchAll(PDO::FETCH_ASSOC);

        if (empty($res)){
            die('User not found!');
        }

        $user = array_shift($res);
        
        if ($user['username'] === $username && $user['password'] === $password) {
            echo 'You have successfully logged in!';
            header('Location: inp.html');
        } else {
            die('Incorrect username or password');
        }
    ?> 