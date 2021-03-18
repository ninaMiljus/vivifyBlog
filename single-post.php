<?php
    include ("db.php");
?>

<?php
    include "header.php";
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link href="styles/blog.css" rel="stylesheet">
<link href="styles/styles.css" rel="stylesheet">

<main role="main" class="container">
    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
                $sql = "SELECT * FROM posts WHERE posts.id = {$_GET['id']}";
                $sql_comments = "SELECT * FROM comments WHERE comments.post_id = {$_GET['id']}";
                
                $statement = $connection->prepare($sql);
                $statement_comments = $connection->prepare($sql_comments);
                
                $statement->execute();
                $statement_comments->execute();
                
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $statement_comments->setFetchMode(PDO::FETCH_ASSOC);
                
                $single_post = $statement->fetch();
                $comments = $statement_comments->fetchAll();
            ?>

        <div class="blog-post">
            <a href="single-post.php?id=<?php echo($single_post["id"]) ?>"><h2 class="blog-post-title"><?php echo($single_post["title"])?></h2></a>
            <p class="blog-post-meta"><?php echo($single_post["created_at"]) ?> by <a href="#"><?php echo($single_post["author"]) ?></a></p>
            <div><p><?php echo($single_post["body"]); ?></p></div>
        </div>
        
            <?php 
                foreach($comments as $comment) {     
            ?>
                        
                <ul>
                    <li>Author: <br/> <?php echo($comment["author"]) ?></li><br/>
                    <li>Comment: <br/> <?php echo($comment["text"]) ?></li><br/>
                    <hr>
                </ul>             
                
            <?php
            
                }
            ?>    
    </div>
    
<?php
    include "sidebar.php"; 
    include "footer.php"
?>