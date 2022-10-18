<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
          crossorigin="anonymous">
    <title>deleteClient</title>
</head>
<body>
<div class="container mt-5">
    <form action="http://task.loc/server/routes/web.php" method="post">
        <div class="mb-3">
            <h2>Are you sure?</h2>
            <button name="action" value="deleteClient" class="btn btn-success">Delete</button>
            <input type="hidden" name="id" value="<?php echo $_GET['client_id'];?>">
    </form>
</div>
</body>
</html>
