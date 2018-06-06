<?php 

if(isset($_POST['submit'])) {
    include 'database.php';
    $first = mysqli_real_escape_string($connection, $_POST['first']);
    $last = mysqli_real_escape_string($connection, $_POST['last']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    
        if(empty($first) || empty($last) || empty($email) || empty($username) || empty($password)) {
            header("Location: ../signup.php?signup=empty");
            exit();
        } else {
            if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
                header("Location: ../signup.php?signup=invalid");
                exit();
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      header("Location: ../signup.php?signup=email");
                      exit();
                } else {
                    $sql = "SELECT * FROM users WHERE user_username='$username'";
                    $result = mysqli_query($connection, $sql);
                    $resultVerification = mysqli_num_rows($result);

                    if($resultVerification > 0) {
                      header("Location: ../signup.php?signup=usernametaken");
                      exit();
                    } else {
                        //password hash
                        $hashPwd = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO users (user_first, user_last, user_email, user_username, user_password) VALUES ('$first', '$last', '$email', '$username', '$hashPwd');";
                        mysqli_query($connection, $sql);
                        header("Location: ../signup.php?signup=success");
                        exit();
                    }
                }
            }
        }


} else {
    header("Location: ../signup.php");
    exit();
}