<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/db.php");
    $conn = db_connect("simply_task");

    function register($data){
        global $conn;
       $first_name = $data['first_name'];
       $last_name = $data['last_name'];
       $email = $data['email'];
       $password = $data['password'];
       $avatar = $data['avatar'];
            $sql = "INSERT INTO users VALUES (null, '$first_name', '$last_name', '$avatar', '$email', '$password', now())";
       $result = mysqli_query($conn, $sql);
       if($result) {
           $_SESSION['msg'] = 'registred';
           header('location:http://task.loc/views/login.php');
       }
    }

function login($data){
    global $conn;
    $email = $data['email'];
    $password = $data['password'];

    $sql = "SELECT * FROM users WHERE `email` = '$email' AND `password` = '$password' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['user'] = mysqli_fetch_assoc($result);
        header('location:http://task.loc/views/dashboard/home.php');
    }
}

function logout(){
        session_start();
        session_destroy();
        header('location:http://task.loc/views/login.php');
}





