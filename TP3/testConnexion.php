<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Test Connexion</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand" style="margin-left: 100px; font-weight: bold">TP-3</a>
    </nav>
   <div class="container"> 
        <h1>User Table</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Login</th>
                    <th scope="col">Password</th>
                    <th scope="col">Pseudo</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tp_db";
                
                //Connect to Database
                $conn = new mysqli($servername, $username, $password, $dbname);
                //Check the connexion
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                
                //Select query
                $sql = "SELECT * FROM user;";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                //Print Data in a table
                while($row = $result->fetch_assoc()) {
                    echo "
                            <tr>
                                <th scope=\"row\">".$row["id"]."</th>
                                <td>".$row["login"]."</td>
                                <td>".$row["password"]."</td>
                                <td>".$row["pseudo"]."</td>
                            </tr>
                    ";
                }
                } else {
                echo "0 results";
                }
                $conn->close();
            ?> 
            </tbody>
        </table>
   </div>
</body>
</html>


