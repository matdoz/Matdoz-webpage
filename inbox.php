<?php 
require_once('inc/navbar.php');
if ($_SESSION['active']) {
  $_SESSION['active'] = false;
  $_POST['select'] = $_SESSION['selectedUser'];
}

if (isset($_SESSION['username']) && ($_SESSION['username'] !== 'matdoz' || isset($_POST['select']))) {
  require('inc/dbh.inc.php');
  $username = $_SESSION['username'];
  $selectedUser = $_POST['select'];

  if($username !== 'matdoz') {
  $query = "SELECT * FROM posts WHERE author = '$username' OR recipient = '$username'";
  }

  if($username === 'matdoz') {
    $query = "SELECT * FROM posts WHERE author = '$selectedUser' OR recipient = '$selectedUser'";
  }

  $result = mysqli_query($connection, $query);
  $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
}

if(isset($_SESSION['username']) && ($_SESSION['username'] === 'matdoz' && !isset($_POST['select']))):
?>

<?php   
  require('inc/dbh.inc.php');
  $query = "SELECT * FROM posts";
  $result = mysqli_query($connection, $query);
  $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  $query = "SELECT * FROM users WHERE username != 'matdoz'";
  $result = mysqli_query($connection, $query);
  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result); 
  ?>

<div class="container mt-3 contact">
  <h2>Clients</h2>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <ul class="list-group" id="myList">
  <?php 
    foreach($users as $user) {
    echo 
      '<li class="list-group-item">
        <form action="inbox.php" method="post">
        <button name="select" value="'.$user['username'].'" class="btn btn-link">'. $user['username'] .'</button>
        </form>
      </li>';
    }
    ?>
  </ul>  
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php endif;?>

<?php if(isset($_SESSION['username']) && ($_SESSION['username'] !== 'matdoz' || isset($_POST['select']))): ?>
<?php if ($_SESSION['username'] === 'matdoz') : ?>
  <div class="container-sm text-center contact"><a href="inbox.php" class="btn btn-secondary float-left">Back</a><h1><i>Chatting with</i> <strong><?php echo $_POST['select']; ?></strong></h1></div>
<?php endif;?>
<?php if ($_SESSION['username'] !== 'matdoz') : ?>
  <div class="container-sm text-center contact"><h1><i>Chatting with</i> <strong>Matdoz</strong></h1></div>
<?php endif;?>
<div class="container contact">
    <?php foreach($messages as $message): ?>
    <?php if ($username === $message['recipient']): ?>
    <div class="row">
    <div class="container mt-3">
      <div class="media border p-3 rounded-lg float-left messageBackground">
        <div class="media-body">
          <h4><?php echo $message['author'] .' '; ?><small><small><small><i><?php echo date("H:i", strtotime($message['date'])) . ' ' . date("d.M.Y", strtotime($message['date']));?></i></small></small></small></h4>
          <p><?php echo nl2br($message['message'],false);?></p>      
        </div>
      </div>
    </div>
    <br>
    </div>
    <?php endif;?>
    <?php if ($username === $message['author']): ?>
    <div class="row">
    <div class="container mt-3">
      <div class="media border p-3 rounded-lg float-right messageBackground">
        <div class="media-body">
        <h4><?php echo $message['author'] .' '; ?><small><small><small><i><?php echo date("H:i", strtotime($message['date'])) . ' ' . date("d.M.Y", strtotime($message['date']));?></i></small></small></small></h4>
          <p><?php echo nl2br($message['message'],false);?></p>      
        </div>
      </div>
    </div>
    <br>
    </div>
    <?php endif;?>
    <?php endforeach; ?>
</div>
<?php endif;?>

    
<?php if (isset($_SESSION['username']) && ($_SESSION['username'] !== 'matdoz' || isset($_POST['select']))) : ?>
<div class="container contact">
<form action="inc/inbox.inc.php" method="post" id="msgForm">
<div class="form-group">
  <label for="comment">Message</label>
  <textarea class="form-control" rows="5" <?php if($_SESSION['username'] === 'matdoz'){echo 'name="adminMessage"';} else{echo 'name="message"';} ?>></textarea>
  <button type="submit" <?php if($_SESSION['username'] === 'matdoz'){echo 'name="adminSend" value="'.$selectedUser.'"';} else{echo 'name="send" value="'.$_SESSION['username'].'"';} ?> class="btn btn-primary mb-2 mt-2">Send</button>
</div>
</form>
</div>
<?php endif;?>

<?php 
if (!isset($_SESSION['username'])) {    
    header('Location: index.php');
    exit();
} 
?>
<?php require_once('inc/footer.php'); ?>