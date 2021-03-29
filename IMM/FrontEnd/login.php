<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bright.css"/>
    <link rel="stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
    <title>Se connecter</title>
        <?php
            $mode = "bright";

            if(isset($_COOKIE['mode'])){
                $mode = $_COOKIE['mode'];
            }

            if (isset($_POST['app'])) {
                $mode = $_POST['app'];
                setcookie('mode', $mode);
            }
        
            echo "<link rel=\"stylesheet\" href=\"$mode.css\"/>";
        ?>
</head>

<body class="body">
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">IMM - iMangerMieux</a>
        <form id="style_form" action="login.php" method="POST">
            <div class="radiogroup">
                <div class="wrapper">
                    <input class="state" type="radio" name="app" id="bright" value="bright">
                    <label class="label" for="bright">
                        <div class="indicator"></div>
                        <span class="text">Bright</span>
                    </label>
                </div>
                <div class="wrapper">
                    <input class="state" type="radio" name="app" id="dark" value="dark">
                    <label class="label" for="dark">
                    <div class="indicator"></div>
                    <span class="text">Dark</span>
                    </label>
                </div>
            </div>
        </form>
    </nav>
    <form id="form"  action="profil.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name= "login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <p class="alertMessage"></p>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <br>
        <input id = "submitButton" type="submit" value="Se connecter" class="btn btn-primary"/>
    </form>

    <script>
        $(document).ready(function() { 
            $('input[name=app]').change(function(){
                    $('#style_form').submit();
            });
        });
    </script>
</body>
</html>