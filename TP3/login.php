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
    <title>TP3</title>
    <?php
        $mode = "bright";

        if(isset($_COOKIE['mode'])){
            $mode = $_COOKIE['mode'];
        }

        if (isset($_GET['theme'])) {
            $mode = $_GET['theme'];
            setcookie('mode', $mode);
        }
    
        echo "<link rel=\"stylesheet\" href=\"$mode.css\"/>";
    ?>
</head>

<body class="body">
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">TP-3</a>
        <form id="style_form" action="login.php" method="GET">
                <select name="theme">
                    <option value="bright">Bright</option>
                    <option value="dark">Dark</option>
                </select>
                <input type="submit" value="Apply"/>
        </form>
    </nav>
    <form id="form"  action="connected.php" method="POST">
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
            $("#form").submit(function(e){
                 var login = $("#exampleInputEmail1").val();
                 var password = $("#exampleInputPassword1").val();
                 if(login == "" || password == ""){
                       event.preventDefault();
                       $("#exampleInputEmail1").css("border-color","red");
                       $("#exampleInputPassword1").css("border-color","red");
                       $(".alertMessage").html("Please Enter a valid login and password");
                       $(".alertMessage").css("color","red");
                 }
            });
        });
    </script>
</body>
</html>