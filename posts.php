<?php
include_once 'header.php';
?>
<?php
require('config/config.php');
require('config/db.php');

// Create Query
$query = 'SELECT * FROM posts ORDER BY created_at DESC';

// Get Result
$result = mysqli_query($conn, $query);

// Fetch Data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($posts);

// Free Result
mysqli_free_result($result);

// Close Connection
mysqli_close($conn);
?>

<?php include('navbar.php');?>
    <div class="container">
        <div class="post"><h1>Posts</h1> </div>
        <?php foreach($posts as $post) : ?>
            <div class="well">
                <h3 class="wellHeader"><?php echo $post['title']; ?></h3>
                <small class="created">Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
                <p class="wellPara"><?php echo $post['body']; ?></p>
                <a class="btn btn-default" href="<?php echo ROOT_URL; ?>index2.php?id=<?php echo $post['id']; ?>">Read More</a>
            </div>
        <?php endforeach; ?>
    </div>
