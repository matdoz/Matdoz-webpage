<?php

if (isset($_POST['login-submit'])) {
    require('dbh.inc.php');

    $username = $_POST['uname'];
    $password = $_POST['pwd'];
    
    $query = "SELECT * FROM users WHERE username=?;";
    $statement = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($statement, $query)) {
        header('Location: ../index.php?error=sqlerror');
        exit();
    }
    else {
        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);

        $result = mysqli_stmt_get_result($statement);

        if ($row = mysqli_fetch_assoc($result)) {
            $passwordCheck = password_verify($password, $row['password']);
            if (!$passwordCheck) {
                header('Location: ../index.php?error=wrongpassword');
                exit();
            }

            else if ($passwordCheck) {
                session_start();
                $_SESSION['userID'] = $row['userID'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['active'] = false;
                header('Location: ../index.php?login=sucess');
                exit();
            }

            else {
                header('Location: ../index.php?error=wrongpassword');
                exit();
            }
        }

        else {
            header('Location: ../index.php?error=nouser');
            exit();
        }
    }
}

else {}
?>