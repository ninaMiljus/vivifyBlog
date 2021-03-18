<?php
    include ("db.php");
?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>

    <div class="sidebar-module">
        <h4>Latest posts</h4> 
    </div>

        <?php
            $sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 5";

            $statement = $connection->prepare($sql);

            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $posts = $statement->fetchAll();
        ?>

        <?php
            foreach ($posts as $post) {
        ?>

    <div class="blog-post">
        <a href="single-post.php?id=<?php echo($post['id']) ?>"><h2 class="blog-post-title"><?php echo($post['title'])?></h2></a>
    </div>
            <?php
                }
            ?>
    <div class="sidebar-module">
        <h4>Elsewhere</h4>
            <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
            </ol>
    </div>
</aside>
       

