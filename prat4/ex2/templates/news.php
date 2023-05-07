<?php
    function output_articles(array $articles, bool $full, ?array $comments) : void { ?>
    <section id="news">
        <?php foreach($articles as $article) output_article($article, $full, $comments); ?>
    </section>
<?php } ?>

<?php
    function output_comments_section(array $comments) { ?>
        <section id="comments">
            <h2><?= count($comments) . ' comments'?></h2>
            <?php foreach($comments as $comment) { ?>
                <article class="comment">
                    <span class="user"><?= $comment['username'] ?></span>
                    <span class="date"><?= getTimeInterval($comment['published']) ?></span>
                    <p><?= $comment['text'] ?></p>
                </article>
            <?php } ?>
            <form>
                <h2>Add your voice...</h2>
                <label>Username 
                <input type="text" name="username">
                </label>
                <label>E-mail
                <input type="email" name="email">
                </label>
                <label>Comment
                <textarea name="comment"></textarea>            
                </label>
                <button formaction="#" formmethod="post">Reply</button>
            </form>
        </section>
<?php
    }
?>

<?php
    function output_article($article, bool $full, $comments) : void { ?>
        <article>
            <header>
                <h1><a href="article.php?id=<?=$article['id']?>"><?= $article['title'] ?></a></h1>
            </header>
            <img src="https://picsum.photos/600/300" alt="">
            <p><?= $article['introduction'] ?></p>
        <?php 
            if ($full) { ?>
                <p> <?= $article['fulltext'] ?> </p>
                <?= output_comments_section($comments) ?>
        <?php
            }
        ?>
            <?= output_article_footer($article); ?>
        </article>
<?php } ?>

<?php
    function output_article_footer($article) : void {
        $tags = explode(',', $article['tags']); ?>

        <footer>
            <span class="author"><?= $article['username'] ?></span>
            <span class="tags">
                <?php foreach($tags as $tag) { ?>
                    <a href="index.html">#<?= $tag ?></a>
                <?php } ?>
            </span>
            <span class="date"><?= getTimeInterval($article['published']) ?></span>
            <a class="comments" href="article.php?id=<?=$article['id']?>#comments"><?= $article['comments'] ?></a>
        </footer>
<?php
    } 
?>
