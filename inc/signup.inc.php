<?php

if(isset($_POST['signup-submit'])) {
    require('dbh.inc.php');
    $username = mysqli_real_escape_string($connection, $_POST['uname']);
    $password = mysqli_real_escape_string($connection, $_POST['pwd']);
    $repeatedPass = mysqli_real_escape_string($connection, $_POST['pwd-repeat']);
    $trimmedPassword = preg_replace('/\s+/', '', $password);

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header('Location: ../signup.php?error=invalidusername');
        exit();
    }

    else if($password !== $repeatedPass) {
        header('Location: ../signup.php?error=passwordcheck&uname=' . $username);
        exit();
    }

    else if($password !== $trimmedPassword) {
        header('Location: ../signup.php?error=passwordwhitespace&uname=' . $username);
        exit();
    }

    else {
        $query = "SELECT username FROM users WHERE username=?";
        $statement = mysqli_stmt_init($connection);

        if(!mysqli_stmt_prepare($statement, $query)) {
            header('Location: ../signup.php?error=sqlerror');
            exit();
        }

        else {
            mysqli_stmt_bind_param($statement, "s", $username);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            $resultCheck = mysqli_stmt_num_rows($statement);

            if($resultCheck > 0) {
                header('Location: ../signup.php?error=usernamealreadyexist');
                exit();
            }

            else {
                $query = "INSERT INTO users(username, password) VALUES(?, ?)";
                $statement = mysqli_stmt_init($connection);

                if(!mysqli_stmt_prepare($statement, $query)) {
                    header('Location: ../signup.php?error=sqlerror');
                    exit();
                }

                else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($statement, "ss", $username, $hashedPassword);
                    mysqli_stmt_execute($statement);
                    header('Location: ../signup.php?signup=success');
                    exit();
                }
            }
        mysqli_stmt_close($statement);
        mysqli_close($connection);
        }
    }
}

else {
    header('Location: ../signup.php');
    exit();
}
    
?>