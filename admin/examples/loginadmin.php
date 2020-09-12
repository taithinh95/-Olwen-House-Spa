<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <title>Login Admin</title>
</head>

<body>
    <div class="container">
        <div class="row" >
            <div class="col-md-3"></div>
            <div class="col-md-6" style="display:block;margin:auto 0 !important">
                <form action="checkLogin.php" method="POST" role="form" >
                    <legend style="text-align:center">LOGIN ADMIN</legend>

                    <div class="form-group">
                        <label for="">USERNAME</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="">PASSWORD</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <button style="display:block;margin:0 auto;width:100px;" type="submit" name="submit" class="btn btn-primary">Submit</button>
                    
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>