<?php
    session_start();

    if (!isset($_SESSION['username']))
        header('Location: index.php');

    require_once('database/connection.php');
    require_once('database/news.php');

    $id = $_GET['id'];

    $db = getDatabaseConnection();

    $article = getNewById($db, $id);
?>

<form>
    <label> Title
        <input type="text" name="title" value=<?=$article['title']?>>
    </label>
    <label> Introduction
        <textarea name="introduction"> <?=$article['introduction']?> </textarea>
    </label>
    <label> Full text
        <textarea name="fulltext"> <?=$article['fulltext']?> </textarea>
    </label>
    <input type="hidden" value=<?=$id?> name = 'id'>
    <button type="submit" formaction="action_edit_news.php" formmethod="post">Submit</button>
</form>