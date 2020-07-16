<?php 
require_once('inc/navbar.php');
if (isset($_GET['signup']) && htmlspecialchars($_GET["signup"]) === 'success') :
?>
<div class="container contact">
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Successful signup!</strong>
</div>
</div>
<?php 
endif;
if (isset($_GET['error']) && htmlspecialchars($_GET['error']) === 'invalidusername') : ?>
<div class="container contact">
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Invalid username!</strong>
</div>
</div>
<?php 
endif;
if (isset($_GET['error']) && htmlspecialchars($_GET['error']) === 'passwordcheck') : ?>
<div class="container contact">
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Password not matching!</strong>
</div>
</div>
<?php 
endif;
if (isset($_GET['error']) && htmlspecialchars($_GET['error']) === 'passwordwhitespace') : ?>
<div class="container contact">
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Password contains whitespace!</strong>
</div>
</div>
<?php 
endif;
if (isset($_GET['error']) && htmlspecialchars($_GET['error']) === 'sqlerror') : ?>
<div class="container contact">
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Database error!</strong>
</div>
</div>
<?php 
endif;
if (isset($_GET['error']) && htmlspecialchars($_GET['error']) === 'usernamealreadyexist') : ?>
<div class="container contact">
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>User already exists!</strong>
</div>
</div>
<?php endif;?>

<div class="container" id="signup">
<h1 class="text-center">Signup</h1>
<form action="inc/signup.inc.php" method="POST" class="">
          <div class="form-group">
            <label for="uname">Username</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter a username" name="uname" value="<?php if (isset($_GET['uname'])) echo htmlspecialchars($_GET['uname']); ?>" required>
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter a password" name="pwd" required>
          </div>
          <div class="form-group">
            <label for="pwd-repeat">Reapeat password</label>
            <input type="password" class="form-control" id="pwd-repeat" placeholder="Repeat the password" name="pwd-repeat" required>
          </div>
          <input type="submit" name="signup-submit" value="Register" class="btn btn-outline-info btn-block">
        </form>
        </div>

<?php 
if (isset($_SESSION['username'])) {    
    header('Location: index.php');
    exit();
} 
?>
<?php require_once('inc/footer.php'); ?>