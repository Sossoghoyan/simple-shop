<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/db.php");
    $conn = db_connect("simply_task");

    function addClient($data){
        global $conn;
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $avatar = $data['avatar'];
        $sql = "INSERT INTO clients VALUES (null, '$first_name', '$last_name', '$avatar', 0, now())";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $_SESSION['msg'] = 'client successfully created';
            header('location:http://task.loc/views/dashboard/clients/index.php');
        }
    }

    function indexClient(){
        global $conn;
        $sql = "SELECT * FROM clients";
        $result = mysqli_query($conn, $sql);
        $clients = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return json_encode($clients);
    }

    function search_by_name($name){
        global $conn;
        $sql = "SELECT * FROM clients WHERE first_name LIKE '%$name%' OR last_name LIKE '%$name%'";
        $result = mysqli_query($conn, $sql);
        $clients = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return json_encode($clients);
    }

    function editClient($data){
        global $conn;
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $avatar = $data['avatar'];
        $id = $data['id'];
        $sql = "UPDATE clients SET last_name = '$last_name', first_name='$first_name', avatar='$avatar' WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $_SESSION['msg'] = 'client successfully edited';
            header('location:http://task.loc/views/dashboard/clients/index.php');
        }
    }

    function deleteClient($data){
        global $conn;
        $id = $data['id'];
        $sql = "DELETE FROM clients WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $_SESSION['msg'] = 'client successfully edited';
            header('location:http://task.loc/views/dashboard/clients/index.php');
        }
    }

    function checkFile($data){
        global $conn;
        $file_name = $data['file_name'];
        $client_id = $data['client_id'];
        mysqli_query($conn, "UPDATE clients SET file_isset = 1 WHERE id = $client_id");
        $sql = "INSERT INTO client_files VALUES (null, '$file_name', '$client_id')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $_SESSION['msg'] = 'client successfully created';
            header('location:http://task.loc/views/dashboard/clients/index.php');
        }
    }

    function client_files($client_id){
        global $conn;
        $sql = "SELECT * FROM `client_files` WHERE client_id = $client_id";
        $result = mysqli_query($conn, $sql);
        $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return json_encode($files);
    }


    function delete_file($file_id, $a){
        global $conn;
        mysqli_query($conn, "UPDATE clients SET file_isset = '0' WHERE id = '$a'");
        $sql = "DELETE FROM client_files WHERE id = '$file_id' ";
        $result = mysqli_query($conn, $sql);
    }

    function rename_file($file_id, $file_name){
        global $conn;
        $sql = "UPDATE client_files SET file_name ='$file_name' WHERE id=$file_id";
        $result = mysqli_query($conn, $sql);
//        return $sql;
    }
