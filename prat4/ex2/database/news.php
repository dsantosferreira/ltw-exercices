<?php
    function getAllNews($db) : array {
        $stmt = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
                            FROM news JOIN
                                users USING (username) LEFT JOIN
                                comments ON comments.news_id = news.id
                            GROUP BY news.id, users.username
                            ORDER BY published DESC'
                        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getNewById($db, $id) : array {
        $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function updateArticle(PDO $db, int $id, string $title, string $introduction, string $fulltext) {
        $stmt = $db->prepare('UPDATE news
                            SET title = :title, introduction = :introduction, fulltext = :fulltext
                            WHERE id = :id'
                        );
        
        print_r($id);
        print_r($title);
        print_r($introduction);
        print_r($fulltext);
                        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':introduction', $introduction);
        $stmt->bindParam(':fulltext', $fulltext);
        
        $stmt->execute();
    }
?>