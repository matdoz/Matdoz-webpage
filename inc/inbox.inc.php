<?php 
if (isset($_POST['send']) || isset($_POST['adminSend'])) {
require('dbh.inc.php');
if(isset($_POST['send'])) {
    $user = $_POST['send'];
    $message = $_POST['message'];
    $query = "INSERT INTO posts(author, recipient, message) VALUES('$user','matdoz', ?)";
    $statement = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($statement, $query)) {
        header('Location: ../inbox.php?error=messagenotsent');
        exit();
    }

    else {
        mysqli_stmt_bind_param($statement, "s", $message);
        mysqli_stmt_execute($statement);
        header('Location: ../inbox.php#msgForm');
        exit();
    }
    
}

if(isset($_POST['adminSend'])) {
    $selectedUser = $_POST['adminSend'];
    session_start();
    $_SESSION['active'] = true;
    $_SESSION['selectedUser'] = $selectedUser;
    $message = $_POST['adminMessage'];
    $query = "INSERT INTO posts(author, recipient, message) VALUES('matdoz','$selectedUser', ?)";
    $statement = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($statement, $query)) {
        header('Location: ../inbox.php?error=messagenotsent');
        exit();
    }

    else {
        mysqli_stmt_bind_param($statement, "s", $message);
        mysqli_stmt_execute($statement);
        header('Location: ../inbox.php#msgForm');
        exit();
    }
}
}

else {
    header('Location: ../inbox.php?error');
    exit();
}

?>
