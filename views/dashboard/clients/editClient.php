<?php
session_start();
    if(!isset($_SESSION['user'])) {
        $_SESSION['msg'] = 'Login please';
        header("location:http://task.loc/views/login.php");
    }
    require $_SERVER['DOCUMENT_ROOT'] . "/server/app/models/client.php";
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
    <title>Edit client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h4>Edit Client</h4>
                <form action="http://task.loc/server/routes/web.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input value="<?php echo $client['first_name']; ?>" type="text" class="form-control" name="first_name" id="first_name" placeholder="First name">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last_name</label>
                        <input value="<?php echo $client['last_name']; ?>"type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name">
                    </div>
                    <div class="mb-3">
                        <label for="user_avatar" class="form-label">Client Avatar</label>
                        <input value="<?php echo $client['avatar']; ?>"type="file" class="form-control" name="file" id="user_avatar" placeholder="John">
                    </div>
                    <button name="action" value="editClient" class="btn btn-success">Save</button>
                    <input type="hidden" name="id" value="<?php echo $client['id'];?>">
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>
