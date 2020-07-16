<?php include('header.php'); ?>

<nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top" id="main-navbar">
  <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Logo" id ="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item form-inline">
        <a class="nav-link btn btn-light mb-2" href="index.php">Home</a>
      </li>
      <li class="nav-item form-inline">
        <a class="nav-link btn btn-light mb-2" href="about.php">About</a>
      </li>
      <li class="nav-item form-inline">
        <a class="nav-link btn btn-light mb-2" href="services.php">Services</a>
      </li>
      <?php if (!isset($_SESSION['username'])) : ?>
      <li class="nav-item form-inline">
        <a class="nav-link btn btn-light mb-2" href="contact.php">Contact</a>
      </li>
      <?php endif; ?>
    </ul>
    <?php if (!isset($_SESSION['username'])) : ?>
    <form class="form-inline my-2 my-xl-0" action="inc/login.inc.php" method="post">
    <input class="form-control mr-sm-2" type="text" name="uname" id="uname" placeholder="Username" required>
    <input class="form-control mr-sm-2" type="password" name="pwd" id="pwd" placeholder="Password" required>
    <button type="submit" name="login-submit" class="btn btn-light mb-2 mr-sm-2">Login</button>
    </form>
    <a class="btn btn-light mb-2" href="signup.php">Signup</a>
    <?php endif; ?>
    <?php if (isset($_SESSION['username'])) : ?>
    <form action="inbox.php" method="post">
    <?php if ($_SESSION['username'] === 'matdoz') : ?>
    <button type="submit" name="inbox-submit" class="btn btn-primary my-2 my-sm-0">Clients</button>
    <?php else: ?>
    <button type="submit" name="inbox-submit" class="btn btn-primary my-2 my-sm-0">Chat</button>
    <?php endif; ?>
    </form>
    <form class="form-inline" action="inc/logout.inc.php" method="post">
    <button type="submit" name="logout-submit" class="btn btn-light my-2 my-sm-0">Logout</button>
    </form>
    <?php endif; ?>
  </div>
</nav>
