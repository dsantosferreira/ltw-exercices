<?php

    function userExists(PDO $db, string $username, string $password) : array {
        $stmt = $db->prepare('SELECT username, password
                            FROM users
                            WHERE username = :username AND password = :password'
                            );
        $stmt->bindParam('username', $username);
        $stmt->bindParam('password', $password);
        $stmt->execute();
        return $stmt->fetch();
    }

?>