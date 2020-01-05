<?php
include_once 'header.php';
?>
<?php
require('config/config.php');
require('config/db.php');

// Check For Submit
if(isset($_POST['delete'])){
    // Get form data
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM posts WHERE id = {$delete_id}";

    if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'');
    } else {
        echo 'ERROR: '. mysqli_error($conn);
    }
}

// get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Create Query
$query = 'SELECT * FROM posts WHERE id = '.$id;

// Get Result
$result = mysqli_query($conn, $query);

// Fetch Data
$post = mysqli_fetch_assoc($result);
//var_dump($posts);

// Free Result
mysqli_free_result($result);

// Close Connection
mysqli_close($conn);
?>


    <div class="container">

        <a href="posts.php" class="btn btn-default"><div class="back">Back</div></a>
        <div class = "title">
            <h1><?php echo $post['title']; ?></h1>  </div>
        <div class="bodyo">
            <small id="smallT">Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
            <br>
            <p><?php echo $post['body']; ?></p> </div>
        <hr>

        <?php
       if($post['author']==$_SESSION['u_uid']){
           echo'<div class = "delPost">
            <form class="pull-right" method="POST" action="';
           echo $_SERVER['PHP_SELF'];
           echo'"><input type="hidden" name="delete_id" value="';
           echo $post['id'];
           echo '"><button class="btnn" style = "font-size:20px   type="submit"   name="delete" value="Delete" >Delete</button></form>
        </div>';
           echo ' <a href="editPost.php?id=';echo $post['id'];
           echo '" id="editPost" class="btn btn-default"><div class="editPost">Edit</div></a>';
       }

      ?>
      </div>
