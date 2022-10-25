<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
      a{
        margin:2%;
        float:right;
      }
    </style>
  </head>
  <body>

  <a class="btn btn-primary" href="../src/index.php" role="button">Back</a>  <!--bottone di back -->
  
        <form class="px-4 py-3" action="../src/ControllerLogin.php" method="post">
          <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input type="email" name="us"class="form-control" id="Email" placeholder="email@example.com" required>
          </div>
          <div class="mb-3">
            <label for="FormPassword1" class="form-label">Password</label>
            <input type="password" name="psw" class="form-control" id="FormPassword1" placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
          <h3><?=$messaggio ?> </h3>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
          </body>
        </html>