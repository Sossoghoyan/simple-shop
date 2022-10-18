<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/models/auth.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/models/client.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/models/curl.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/input.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/upload.php");



    $action = "";

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else if (isset($_POST['action'])) {
        $action = $_POST['action'];
    }

    if($action == "register") {
        $first_name = inp($_POST['first_name']);
        $last_name = inp($_POST['last_name']);
        $email = inp($_POST['email']);
        $password = inp($_POST['password']);
        $avatar = avatar_upload($_FILES['file']);
        register([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => hashing($password),
            'avatar' =>$avatar
        ]);

    } else if($action == "login") {
        $email = inp($_POST['email']);
        $password = inp($_POST['password']);
        login([
            'email' => $email,
            'password' => hashing($password),
        ]);

    } else if($action == "addClient") {
        $first_name = inp($_POST['first_name']);
        $last_name = inp($_POST['last_name']);
        $avatar = "";
        if(!empty($_FILES['file']['name'])){
            $avatar = avatar_upload($_FILES['file']);
        }
        addClient([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'avatar' => $avatar,
        ]);
    } else if($action == "selectClients") {
        indexClient();

    } else if($action == "editClient") {
        $id = inp($_POST['id']);
        $first_name = inp($_POST['first_name']);
        $last_name = inp($_POST['last_name']);
        $avatar = file_upload($_FILES['file']);
        editClient([
            'id'=> $id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'avatar' => $avatar,
        ]);

    } else if($action == "deleteClient") {
        $id = inp($_POST['id']);
        deleteClient([
            'id'=> $id
        ]);

    } else if($action == "checkFile") {
        $client_id = inp($_POST['client_id']);
        $file_name = file_upload($_FILES['file_name']);
        checkFile([
            'file_name' => $file_name,
            'client_id' => $client_id,
        ]);

    } else if ($action == "logout"){
        logout();

    } else if ($action == "get_files"){

        echo client_files($_GET["client_id"]);

    } else if ($action == "del_file") {

        $file_dir = $_SERVER["DOCUMENT_ROOT"]."/server/assets/uploads/files/";
        if (file_exists($file_dir.$_GET["delete_file"])){
            unlink($file_dir.$_GET["delete_file"]);
        }
        delete_file($_GET["id"], $_GET['id_client']);

    } else if ($action == "ren_file") {
        $file_dir = $_SERVER["DOCUMENT_ROOT"]."/server/assets/uploads/files/";
        if (file_exists($file_dir.$_GET["old_name"])){
            rename($file_dir.$_GET["old_name"], $file_dir.$_GET["inp_val"]);
        }
            rename_file($_GET["file_id"], $_GET["inp_val"]);

    } else if($action == "curl") {
        $data = json_decode(file_get_contents('php://input'), true);
        echo curl_fnc([
            'email' => $data['email'],
            'phone' => $data['phone'],
            'text' => $data['text'],
        ]);
    }

