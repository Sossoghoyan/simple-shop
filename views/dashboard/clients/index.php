<?php
    session_start();
    if(!isset($_SESSION['user'])) {
        $_SESSION['msg'] = 'Login Please';
        header("location:http://task.loc/views/login.php");
        exit;
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/models/client.php");

    $clients = json_decode(indexClient(), true);
    if (isset($_GET['search_value'])){
//        header('refresh: 1;');
        $clients = json_decode(search_by_name($_GET['search_value']), true);
    }
//    echo "<pre>";
//        print_r($clients);
//    echo "</pre>";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <a href="http://task.loc/views/dashboard/clients/addClient.php"><b>Create new Client</b></a>
    <div class="mt-2">
        <a href="http://task.loc/views/dashboard/clients/curlForm.php"><b>Curl</b></a>
    </div>
    <div class="d-flex justify-content-end">
        <a href="http://task.loc/server/routes/web.php?action=logout"><b>Logout</b></a>
    </div>
    <div class="d-flex justify-content-end">
        <a href="http://task.loc/views/dashboard/home.php"><b>Back to home</b></a>
    </div>
    <h2>CLIENT LIST</h2>
    <a href="http://task.loc/views/dashboard/clients/index.php"><b>All Client</b></a>
    <div class="d-flex justify-content-end">
        <form action="" method="get">
            <input type="search" class="" name="search_value" placeholder="search clients">
            <button class="btn btn-success"><b>Search</b></button>
        </form>
    </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Avatar</th>
                <th scope="col">File</th>
                <th scope="col">Date</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                    foreach($clients as $client) {
                        ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><a href="http://task.loc/views/dashboard/clients/detailsClient.php?client_id=<?php echo $client['id']; ?>"><?php echo $client['first_name']; ?></a></td>
                            <td><?php echo $client['last_name']; ?></td>
                            <td>
                                <img  style=" width:50px; height:50px; border-radius: 50%;"
                                      src="http://task.loc/server/assets/uploads/images/<?php echo ($client['avatar'] != NULL) ? $client['avatar'] : 'user-icon.png' ?>" alt="">
                            </td>
                            <td><?php
                                if ( $client['file_isset']){
                                    echo "<span class='text-success'>Yes</span>";
                                }else {
                                    echo "<span class='text-danger'>No</span>";
                                }
                                ?></td>
                            <td><?php echo date("m/d/Y H:i a", strtotime($client['created_at'])); ?></td>
                            <td><a class="btn btn-primary" href="http://task.loc/views/dashboard/clients/checkFile.php?client_id=<?php echo $client['id']; ?>">Check File</a></td>
                        </tr><?php
                        $i++;
                    }
                ?>
            </tbody>
        </table>
</div>

</body>
</html>
