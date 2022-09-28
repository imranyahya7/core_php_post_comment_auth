<?php
  session_start();
  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <title>Posts</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <!-- <a class="navbar-brand" href="../index.php">Home</a> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <?php
                if (empty($_SESSION['user'])) {
                ?>
                <li class="nav-item">
                  <a href="http://localhost/core_php_user_post/auth/signUp.php" class="nav-link">Sign up</a>
                </li>
                <li></li>
                <li class="nav-item">
                  <a href="http://localhost/core_php_user_post/auth/signIn.php" class="nav-link">Sign In</a>
                </li>
                <?php
              } else {
                ?>
                        <li class="nav-item">
                          <a class="nav-link"><?php echo !empty($_SESSION['user']) ? $_SESSION['user'] :null;?></a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo $_SESSION['base_url'];?>Post/createPostPage.php" class="nav-link">Create post</a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo $_SESSION['base_url'];?>Controller/logout.php" class="nav-link">Logout</a>
                        </li>
                        <?php
            }?>
          </ul>
                          </div>
            </nav>
          </header>
          <h1 style="text-align:center;">Blog Posts</h1>

          <div class="container jumbotron mt-5">
            <?php if (!empty($_SESSION['message'])) {?>
              <div class="alert <?php echo $_SESSION['class'] ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>
                  <?php
                    echo $_SESSION['message'];
                    $_SESSION['message']= null; ?>
                  </strong>
                </div>
                <?php }?>
