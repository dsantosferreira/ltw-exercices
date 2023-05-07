<?php
    require_once('database/connection.php');
    require_once('database/news.php');
    require_once('database/comments.php');
    require_once('utils/time.php');
    require_once('templates/common.php');
    require_once('templates/news.php');

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
  </body>
</html>
