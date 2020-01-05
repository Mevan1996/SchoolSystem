<?php
include_once 'header.php';
?>
<?php
require('config/config.php');
require('config/db.php');

// Check For Submit
if(isset($_POST['submit'])){
    // Get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $author = $_SESSION['u_uid'];

    $query = "INSERT INTO posts(title, author,body) VALUES('$title', '$author', '$body')";

    if(mysqli_query($conn, $query)){
        header('Location: '.ROOT_URL.'');
    } else {
        echo 'ERROR: '. mysqli_error($conn);
    }
}
?>


    <div class="container">

        <div class="addPost">
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Body</label>
                    <textarea name="body" class="form-control"></textarea>
                </div>
                <div class="submit-button">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary" style = "font-size:20px">
                </div>
        </div>
        </form>
    </div>
