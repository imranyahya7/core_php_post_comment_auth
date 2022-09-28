
<?php
  include '../Partials/header.php';
  ?>
  <form action="../Controller/createPost.php" method="post">
      <div class="form-group">
        <label for="title">Post Title:</label>
        <input type="text" class="form-control" id="title"
          placeholder="Enter post title" name="title">
      </div>
    <div class="form-group">
      <label for="post">Post Body:</label>
      <textarea class="form-control" name="post" id="post" placeholder="write post" cols="30" rows="10">
      </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add post</button>
  </form>
  <br>
  <a href="../index.php" class="btn btn-info">Home</a>
  <?php
    include '../Partials/footer.php';
    ?>