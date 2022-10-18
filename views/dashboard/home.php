
<?php
session_start();
if(!isset($_SESSION['user'])) {
    $_SESSION['msg'] = 'Login Please';
    header("location:http://task.loc/views/login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
          crossorigin="anonymous">
    <title>Home pages</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h1>Home pages</h1>
            <a href="http://task.loc/views/dashboard/clients/index.php"><b>Go to clients list</b></a>
            <div class="d-flex justify-content-end">
                <a href="http://task.loc/server/routes/web.php?action=logout"><b>Logout</b></a>
            </div>
        </div>
    </div>

<div class="container">
    <div style="width: 400px; margin: 0 auto; color: chartreuse">
        <h1>Hello my friend</h1>
        <img src="http://task.loc/server/assets/images/smile.jpg" alt="">
    </div>
</div>

</body>
</html>

