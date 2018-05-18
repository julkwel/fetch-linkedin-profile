<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get user profile Linkedin</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script src="dist/js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
</head>
<body  style="background:black;color:white">
    <div class="container">
        <div class="col-md-3" style="left:35%">
            <form action="http://localhost/kisender/teste/linkedin/authentification.php">
                <h1 class="text-center">LOGIN</h1>
                <div class="form-group">
                    <label for="email">Email adress</label>
                    <input type="email" class="form-control" placeholder="Entrer vos email" id="email" required >
                </div>
                <div class="form-group">
                    <label for="password">Mots de passe</label>
                    <input type="password" class="form-control" placeholder="entrer vos mots de passe" id="password" required>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
                <hr>
                <button class="btn btn-block btn-social btn-linkedin"><a href="authentification.php"> Linkedin </a></button>
            </form>
        </div>   
    </div>
</body>
</html> 