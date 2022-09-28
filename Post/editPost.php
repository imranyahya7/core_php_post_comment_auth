
<?php
  include '../Partials/header.php';
  ?>

<?php
    include '../Config/database.php';

    $conn = mysqli_connect("$host", "$username", "$passwrd");
    $conn->select_db($db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $post_id = $_GET['postId'];

    $sql = "SELECT users.id as userId, posts.user_id as postUserID, posts.post_title as post_title, posts.id as postId, post as post, fName, lName FROM `posts` join `users` on posts.user_id = users.id where posts.id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc()
?>
  <form action="../Controller/updatePost.php" method="post">
      <div class="form-group">
        <label for="title">Post Title:</label>
        <input type="hidden" name="postId" value="<?php echo $post_id;?>">
        <input type="text" class="form-control" id="title"
          placeholder="Enter post title" name="title" value="<?php echo $row['post_title']?>">
      </div>
    <div class="form-group">
      <label for="post">Post Body:</label>
      <textarea class="form-control" name="post" id="post" placeholder="write post" cols="30" rows="10"><?php echo $row['post']?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update post</button>
  </form>
  <br>
  <a href="../index.php" class="btn btn-info">Home</a>
  <?php
    }
    include '../Partials/footer.php';
    ?>