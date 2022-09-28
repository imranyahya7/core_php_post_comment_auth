
<?php
  include '../Partials/header.php';
  ?>
  <form action="../Controller/loginUser.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter
        email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password"
        placeholder="Enter password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Sign In</button>
  </form>
  <br>
  <a href="../index.php" class="btn btn-info">Home</a>
  <a href="signUp.php" class="btn btn-info">Don't have an account? Sign Up</a>
  <?php
    include '../Partials/footer.php';
    ?>