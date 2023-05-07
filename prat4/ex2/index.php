<?php
    require_once('database/connection.php');
    require_once('database/news.php');
    require_once('utils/time.php');
    require_once('templates/common.php');
    require_once('templates/news.php');

    $db = getDatabaseConnection();
    $news = getAllNews($db);
?>

<!DOCTYPE html>
<html lang="en-US">
  <?= output_head() ?>
  <body>
    <?php 
        output_header();
        output_nav();
        output_aside();
        output_articles($news, false, null);
        output_footer();
    ?>
  </body>
</html>
