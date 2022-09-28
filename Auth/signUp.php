
<?php
include '../Partials/header.php';
?>
<form action="../Controller/createUser.php" method="post">
<div class="form-group">
      <label for="email">First Name:</label>
      <input type="name" class="form-control" id="fName" placeholder="Enter first name" name="fName">
    </div>
    <div class="form-group">
      <label for="email">Last Name:</label>
      <input type="name" class="form-control" id="lName" placeholder="Enter last name" name="lName">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
  <a href="../index.php" class="btn btn-info">Home</a>
  <a href="signIn.php" class="btn btn-info">Aleardy have account? Sign in</a>
  <?php
include '../Partials/footer.php';
?>