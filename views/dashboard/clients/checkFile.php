<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="http://task.loc/server/routes/web.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="file" class="form-label">Add file to client</label>
                    <input type="file" class="form-control" id="avatar" name="file_name" >
                </div>
                <button name="action" value="checkFile" class="btn btn-success">Save</button>
                <input type="hidden" name="client_id" value="<?php echo $_GET['client_id'];?>">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

</body>
</html>
