<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Aliments</title>
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">IMM - iMangerMieux</a>
    </nav>
    <div class="wrapper">
        <div class="form-wrapper">
                <form id = "id_form">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Nom">
                        <span id ="error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Prenom">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="check">
                        <label class="form-check-label" for="check">Adore le cours</label>
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Remarque</label>
                        <textarea class="form-control" id="note" rows="3" placeholder="Remarque"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <p id="result"></p>
                </form>
        </div>
        <div class="table-wrapper">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nom * </th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Date de naissance</th>
                        <th scope="col">Adore le cours</th>
                        <th scope="col">Remarque</th>
                        <th scope="col">CRUD</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            let table = document.querySelector('.table');
            $.get("selectUser.php", function(data){
                       results = JSON.parse(data);
                       results.forEach(result => table.innerHTML += `<tr>
                                                            <td>${result.nom}</td>
                                                            <td>${result.prenom}</td>
                                                            <td>${result.date_de_naissance}</td>
                                                            <td>${result.adore_cours}</td>
                                                            <td>${result.remarque}</td>
                                                            <td>
                                                                <button type="submit" class="btn btn-secondary" id="saveButton" style="display: none;" onclick= "save()">Save</button>
                                                                <button type="submit" class="btn btn-primary modifyBtn" onclick= "onModifyRow()">Modifier</button>
                                                                <button type="submit" class="btn btn-primary deleteBtn" onclick= "onDeleteRow()">Supprimer</button>
                                                            </td>
                                                        </tr>`
                       );   
            });

            $("#id_form").submit(function(){
                var nom = $('#nom').val();
                var error = $('#error').val();
                var prenom = $('#prenom').val();
                var date = $('#date').val();
                var check = $('#check').prop('checked') ? "oui" : "non";
                var note = $('#note').val();
                
                if(nom == ""){
                    event.preventDefault();
                    $("#nom").css("border-color","red");
                    $("#error").html("Please Enter a valid name");
                    $("#error").css("color","red");
                }
                $.post("addUser.php", 
                    {
                        nom: nom,
                        prenom: prenom,
                        date: date,
                        check: check,
                        note: note
                    }, 
                );
            });
        });
    </script>
</body>
</html>