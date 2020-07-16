<?php 
require_once('inc/navbar.php'); 
if (isset($_GET['success'])) :
?>
<div class="container contact">
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Email sent!</strong>
</div>
</div>
<?php 
endif;
if (isset($_GET['error'])) : ?>
<div class="container contact">
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error try again!</strong>
</div>
</div>
<?php endif; ?>
  <div class="container contact">
    <h3>Contact me today about your desired service</h3> 
  <form action="inc/contact.inc.php" method="post">
    <div class="form-group">
      <label for="usr">Name</label>
      <input type="text" class="form-control" id="usr" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
  <textarea class="form-control" rows="5" id="comment" placeholder="Dear Mathias, I am interested in.." name="message"></textarea>
  <button type="submit" name="sendMail" class="btn btn-primary mb-2 mt-2">Send</button>
  </div>    
  </div>
  </form>
<?php 
if (isset($_SESSION['username'])) {    
    header('Location: inbox.php');
    exit();
} 
?>
<?php require_once('inc/footer.php'); ?>