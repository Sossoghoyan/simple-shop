<?php
session_start();
if(!isset($_SESSION['user'])) {
    $_SESSION['msg'] = 'Login please';
    header("location:http://task.loc/views/login.php");
}
require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/models/client.php");
$client_id = $_GET['client_id'];
$conn = db_connect("simply_task");
$sql = "SELECT * FROM clients WHERE id = $client_id";
$result = mysqli_query($conn, $sql);
$client  = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <link rel="stylesheet" href="http://task.loc/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://task.loc/index.js"></script>
</head>
<body>
<span style="display:none" id="client_id"><?php echo $_GET["client_id"] ?></span>
    <form class="container">
        <a class="btn btn-primary mt-2" href="http://task.loc/views/dashboard/clients/index.php">Back To All Clients</a>
        <div class="client">
            <h2><?php echo $client['first_name']; ?>  <?php echo $client['last_name'];  ?></h2>
            <a href="http://task.loc/server/assets/uploads/images/<?php echo  $client['avatar']; ?>" id="example1">
                <img  src="http://task.loc/server/assets/uploads/images/<?php echo  $client['avatar']; ?>" alt="">
            </a>
            <a class="btn btn-success" href="http://task.loc/views/dashboard/clients/editClient.php?client_id=<?php echo $client['id'];?>">Edit</a>
            <a class="btn btn-danger" href="http://task.loc/views/dashboard/clients/deleteClient.php?client_id=<?php echo $client['id'];?>">Delete</a>
        </div>

        <div class="container">
            <table class="table">
                <h5>Clients files</h5>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">File name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody id="files"></tbody>
            </table>
        </div>







<script  src="http://task.loc/jquery-1.4.3.min.js"></script>
<script src="http://task.loc/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script  src="http://task.loc/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        /*
        * Examples - images
         */
        $("#example1").fancybox();

    })
</script>

</body>
</html>