<?php 
if (isset($_POST['sendMail'])) {
    require('dbh.inc.php');
    $author = $_POST['name'];
    $authorMail = $_POST['email'];
    $message = $_POST['message'];
    $query = "INSERT INTO emails(author, authorMail, message) VALUES(?, ?, ?)";
    $statement = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($statement, $query)) {
        header('Location: ../inbox.php?error=messagenotsent');
        exit();
    }

    else {
        mysqli_stmt_bind_param($statement, "sss", $author, $authorMail, $message);
        mysqli_stmt_execute($statement);
        header('Location: ../contact.php?success');
        exit();
    }

}
else {
    header('Location ../contact.php?error');
    exit();
}
?>