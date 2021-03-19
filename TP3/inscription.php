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
    <title>Inscription</title>

    <?php
        $mode = "Bright";
        setcookie('mode', $mode);

        if (isset($_GET['theme'])) {
            $mode = $_GET['theme'];
            setcookie('mode', $mode);
        }
    
        if($_COOKIE['mode'] === "Dark"){
            echo "<link rel=\"stylesheet\" href=\"dark.css\"/>";
        }
        else{
            echo "<link rel=\"stylesheet\" href=\"bright.css\"/>";
        }
    ?>

</head>

<body class="body">
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">TP-3</a>
        <form id="style_form" action="inscription.php" method="GET">
                <select name="theme">
                    <option value="Bright">Bright</option>
                    <option value="Dark">Dark</option>
                </select>
                <input type="submit" value="Apply"/>
        </form>
    </nav>
    <form id="form" action= "inscription.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" name ="login" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" name ="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPseudo">Pseudo</label>
            <input type="text" name ="pseudo" class="form-control" id="inputPseudo" placeholder="Pseudo">
        </div>
        <p class="alertMessage"></p>

    <?php
        $successfullyLogged = false;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tp_db";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['pseudo'])){
            $login = $_POST['login'];
            $pwd = $_POST['password'];
            $pseudo = $_POST['pseudo'];
            $sql = "INSERT INTO user(login, password, pseudo) VALUES ('$login', '$pwd', '$pseudo')";
            if ($conn->query($sql) === TRUE) {
                echo "<p style=\"color: green\">New record created successfully<p>";
            } else {
                echo "<p style=\"color: red\">Error: " . $sql . "<br>". $conn->error."<p>";
            }
        }
          
        $conn->close();
    ?>
        <div class ="submit_buttons">
            <button type="submit" class="btn btn-primary">Sign in</button>
            <a href="login.php">Se connecter</a>
        </div>
    </form>"

    <script>
        $(document).ready(function() {
            $("#form").submit(function(e){
                 var login = $("#inputEmail4").val();
                 var password = $("#inputPassword4").val();
                 var pseudo = $("#inputPseudo").val();
                 if(login == "" || password == "" || pseudo == ""){
                       event.preventDefault();
                       $("#inputEmail4").css("border-color","red");
                       $("#inputPassword4").css("border-color","red");
                       $("#inputPseudo").css("border-color","red");
                       $(".alertMessage").html("Please Enter a valid login and password and pseudo");
                       $(".alertMessage").css("color","red");
                 }
            });
        });
    </script>

</body>

</html>