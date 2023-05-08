<?php
    require_once('database/connection.php');
    require_once('database/news.php');
    require_once('database/comments.php');
    require_once('utils/time.php');
    require_once('templates/common.php');
    require_once('templates/news.php');

    session_start();

    $db = getDatabaseConnection();

    $article = getNewById($db, $_GET['id']);

    $comments = getAllComments($db);
?>

<!DOCTYPE html>
<html lang="en-US">
  <?= output_head(); ?>
  <body>
    <?= output_header(); ?>
    <?= output_nav(); ?>
    <?= output_aside(); ?>
    <?= output_articles([$article], true, $comments) ?>
    <?= output_footer(); ?>
    <?php if (array_key_exists('username', $_SESSION)) { ?>
        <a href=<?= "edit_article.php?id=" . $_GET['id'] ?>><h4> Edit the article! </h4></a>
    <?php } ?>
  </body>
</html>
