<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bright.css"/>
    <link rel="stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>TP3</title>

    <?php
        if (isset($_GET['theme'])) {
            $mode = $_GET['theme'];
            setcookie('style', $mode);
        }

        if($_COOKIE['style'] === "Dark"){
            $mode = "Dark";
            $link = "<link rel=\"stylesheet\" href=\"dark.css\"/>";
            echo $link;
        }
        else{
            $link = "<link rel=\"stylesheet\" href=\"bright.css\"/>";
            echo $link;
        }
    ?>

</head>

<body class="body">
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">TP-3</a>
        <form id="style_form" action="login.php" method="GET">
                <select name="theme">
                    <option value="Bright">Bright</option>
                    <option value="Dark">Dark</option>
                </select>
                <input type="submit" value="Apply"/>
        </form>
    </nav>
    <form id="login_form" action="connected.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name= "login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <input type="submit" value="Se connecter" class="btn btn-primary"/>
    </form>
</body>
</html>