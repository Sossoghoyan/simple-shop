<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/db.php");
$conn = db_connect("simply_task");

function curl_fnc($data){
    global $conn;
    $email = $data['email'];
    $phone = $data['phone'];
    $text = $data['text'];
    $sql = "INSERT INTO curl_form VALUES (null, '$email', '$phone', '$text', now())";
    $result = mysqli_query($conn, $sql);
    if($result) {
        return "Row successfully created";
    }
}




