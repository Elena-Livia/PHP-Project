<?php

session_start();

if (isset($_POST['submit'])) {
    include 'database.php';
    $username = mysqli_real_escape_string($connection , $_POST['user'] );
    $password = mysqli_real_escape_string( $connection , $_POST['password'] );
    
    if (empty($username) || empty ($password)) {
        header("Location: ../registration.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_username='$username'";
        $result = mysqli_query($connection, $sql);
        $resultVerification = mysqli_num_rows($result);
        if ($resultVerification < 1) {
            header("Location: ../registration.php?login=error");
             exit();
        } else {
            if ($cat = mysqli_fetch_assoc($result)) {
                //de-hashing 
                $hashedPwdVerf = password_verify($password, $cat['user_password']);
                if ($hashedPwdVerf == false) {
                    header("Location: ../registration.php?login=error");
                    exit();
                } elseif ($hashedPwdVerf == true) {
                    //login
                    $_SESSION['usr_id'] = $cat['user_id'];
                    $_SESSION['usr_first'] = $cat['user_first'];
                    $_SESSION['usr_last'] = $cat['user_last'];
                    $_SESSION['usr_email'] = $cat['user_email'];
                    $_SESSION['usr_username'] = $cat['user_username'];
                    header("Location: ../registration.php?login=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../registration.php?login=error");
    exit();
  }