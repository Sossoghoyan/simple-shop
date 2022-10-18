<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
          crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action="http://task.loc/server/routes/web.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="first_name" class="form-label">First name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name">
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Your avatar</label>
                <input type="file" class="form-control" id="avatar" name="file" placeholder="Your avatar">
            </div>
            <div class="mb-3">
                <label for=email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for=password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>

            <button name="action" value="register" class="btn btn-success">Register</button>
        </form>
    </div>
</body>
</html>