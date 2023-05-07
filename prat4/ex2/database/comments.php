<?php
    function getAllComments($db) : array {
        $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
        $stmt->execute(array($_GET['id']));
        return $stmt->fetchAll();
    }
?>