<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/input.php");

$curl = curl_init();

$email = inp($_POST['email']);
$phone = inp($_POST['phone']);
$text = inp($_POST['text']);

$data_curl = "{\"email\":\"$email\", \"phone\":\"$phone\", \"text\":\"$text\"}";

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://task.loc/server/routes/web.php?action=curl",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $data_curl,
    CURLOPT_HTTPHEADER => array(
        "content-type: application/json"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$_SESSION['msg'] = "$email $phone $text";

header('location:http://task.loc/views/dashboard/clients/curlForm.php');

