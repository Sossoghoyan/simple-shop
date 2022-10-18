<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curl</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h1>cURL form</h1>
    <div class="d-flex justify-content-end">
        <a href="http://task.loc/views/dashboard/clients/index.php"><b>Back to Clients list</b></a>
    </div>
</div>
<div class="container">
    <form action="http://task.loc/server/app/models/2.php" method="post">

            <div>
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email_id" name="email" placeholder="name@example.com">
            </div>
            <div>
                <label for="phone" class="form-label">Telephone</label>
                <input type="tel" class="form-control" id="phone_id" name="phone" placeholder="+374">
            </div>
            <div>
                <label for="text" class="form-label">Example textarea</label>
                <textarea class="form-control" id="text_id" rows="3" name="text"></textarea>
            </div>

        <div class="mt-3">
            <button class="btn btn-success">Send</button>
        </div>
    </form>

    <?php if(isset($_SESSION['msg'])) { ?>
        <div class="alert alert-success"><?php echo $_SESSION['msg']; ?></div>
    <?php } unset($_SESSION['msg']); ?>

</div>




</body>
</html>
