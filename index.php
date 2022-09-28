<?php
include 'Partials/header.php';
?>
    <div class="container-fluid" >
<?php
    include 'Config/database.php';
    $conn = mysqli_connect("$host", "$username", "$passwrd");
    $conn->select_db($db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user_id = !empty($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $sql = "SELECT 
    users.id as userId, posts.user_id as postUserID, 
    posts.id as postId, posts.post_title as post_title, post as post, fName, lName    FROM `posts` 
    join `users` on posts.user_id = users.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {?>
        <h1><?php echo "" . $row["post_title"] . "" ?></h1>
        <p><?php echo "" . $row["post"] . "" ?></p>
        <p><u><?php echo "created by: " . $row["fName"]." ".$row["lName"] . "" ?></u></p>
        <?php if(!empty($_SESSION['user_id']) && $_SESSION['user_id'] == $row['postUserID']){?>
        <a href='Post/editPost.php?postId=<?php echo $row["postId"]; ?>' class="btn btn-info">Edit</a>
        <a href='Controller/deletePost.php?postId=<?php echo $row["postId"]; ?>' class="btn btn-info">Delete</a>
        <?php } 
        
        if(!empty($_SESSION['user_id'])){
        ?>

        <div class="container mt-2">
            <form action="Controller/createComment.php" method="post">
                <div class="form-group">
                    <input type="hidden" name= "post_id" value="<?php echo $row["postId"]; ?>">
                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Add comment">
                    <button class="btn btn-sm btn-success mt-1" style="float: right;" type="submit">Add comment</button>
                </div>
            </form>
        </div>
        <?php
        }
        ?>
        <br>

        <?php
        $post_id = $row["postId"];
        $sql2 = "SELECT * from comments where post_id = $post_id";
        $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        ?>
        <h4>Previous Comments</h4>
        <?php
        while ($row2 = $result2->fetch_assoc()) {?>
        <p><?php echo "" . $row2["commnt"] . "" ?></p>
        <?php } }
        else{?>
        <h4>No Comments yet</h4>
        <?php } ?>
        <br>
        <hr>
    <?php
}}
else{
    ?>
    <h3 class="text-center">No Posts to show</h3>
    <?php
}
    ?>
</div>
<?php
$conn->close();
?>

<?php
include 'Partials/footer.php';
?>