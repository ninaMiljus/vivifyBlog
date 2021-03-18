<?php
    include ("db.php");
?>

<?php
    include ("header.php");
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
    integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link href="styles/blog.css" rel="stylesheet">
<link href="styles/styles.css" rel="stylesheet">


<main role="main" class="container">
    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
                $sql = "SELECT * FROM posts ORDER BY created_at DESC";
                $statement = $connection->prepare($sql);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $posts = $statement->fetchAll();
            ?>

            <?php
                foreach ($posts as $post) {
            ?>

            <div class="blog-post">
                <a href="single-post.php?id=<?php echo($post["id"]) ?>">
                    <h2 class="blog-post-title"><?php echo($post["title"])?></h2>
                </a>
                <p class="blog-post-meta"><?php echo($post["created_at"]) ?> by <a
                        href="#"><?php echo($post["author"]) ?></a></p>
                <div>
                    <p><?php echo($post["body"]); ?></p>
                </div>

            </div>

            <?php
                }
            ?>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div>

<?php
    include ("sidebar.php"); 
    include ("footer.php");
?>