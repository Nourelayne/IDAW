<article>
    <div class="container">
        <form onsubmit="onFormSubmit()" method="POST">
            <div class="form-row">
                <div class="col-md-4">
                    <label>Nom Aliment</label>
                    <select class="form-control" id="nom" name="nom" required>
                        <option value="">--Please choose an Aliment--</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Quantité en Kilogramme</label>
                    <input type="text" class="form-control" name="quantite" id="quantite">
                </div>
                <div class="col-md-4">
                    <label>Date</label>
                    <input type="text" class="form-control" name="date" id="date">
                </div>
            </div>
            <button class="btn btn-success" type="submit" id="submitButtonJournal">Submit</button>
        </form>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Journal du Mois de Mars</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="table-content">
                <thead>
                    <tr>
                        <th>Nom Aliment</th>
                        <th>Quantité en Kilogramme</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <script>
        let alimentMaxId = 1;
        let aliments = [];
        let edited = false;
        let selectedRow = null;
        let backendURL = "http://localhost/IDAW/Projet_IMM/BackEnd/";
        $(document).ready(function() {

            $.getJSON(backendURL + "selectAlimentsForm.php", function(aliments) {
                $.each(aliments, function(i, a) {
                $("#nom").append(`
                       <option value="${a.nom}">${a.nom}</option>
                `)
                });
            });

            $.getJSON(backendURL + "selectJournal.php", function(aliments) {
                $.each(aliments, function(i, a) {
                    let aliment = {};
                    aliment.id = alimentMaxId;
                    aliment.nom = a.nom;
                    aliment.quantite = a.quantite;
                    aliment.date = a.date;
                    aliment.numero = a.id;
                    addAliment(aliment);
                });
            });
        });

        function addAliment(newAliment) {
            newAliment.id = alimentMaxId;
            $("#table-content").append(`  <tr> 
            <td> ${newAliment.nom}  </td> <td> 
                 ${newAliment.quantite}  </td> <td> 
                 ${newAliment.date}  </td> <td> 
                <button type="button" class="btn btn-warning" onclick="edit(${newAliment.id})"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                <button type="button" class="btn btn-danger" onclick="remove(${newAliment.id})"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
            </td> 
        </tr>`);
            aliments.push(newAliment);
            alimentMaxId++;
        }

        function ajaxAddAliment(aliment) {
            $.ajax({
                url: backendURL + "addJournal.php",
                method: "POST",
                dataType: "json",
                data: aliment
            })
        }

        function ajaxUpdateAliment(aliment){
                $.ajax({
                        url: backendURL+"updateJournalAliment.php",
                        method: "POST",
                        dataType : "json",
                        data : aliment
                    })
        }

        function ajaxDeleteAliment(id) {
            $.ajax({
                url: backendURL + "deleteJournalAliment.php",
                method: "POST",
                dataType: "json",
                data: {
                    'id': id
                },
            })
        }

        function clearFields() {
            $("#nom option:selected").prop("selected", false);
            $("#quantite").val("");
            $("#date").val("");
        }

        function readInputs() {
            let newAliment = {};
            newAliment.nom = $("#nom").children("option:selected").val();
            newAliment.quantite = $("#quantite").val();
            newAliment.date = $("#date").val();
            return newAliment;
        }

        function onFormSubmit() {
            event.preventDefault();
            let aliment = readInputs();
            if(!edited){
                    addAliment(aliment);
                    ajaxAddAliment(aliment);
                    clearFields();
            }else{
                    aliments.splice(selectedRow.rowIndex-1, 1, aliment);
                    saveAliment(aliment);
                    clearFields();
            }
        }

        function remove(id) {
            if (confirm("êtes-vous sure de vouloir supprimer cet enregistrement?")){
                ajaxDeleteAliment(aliments[id - 1].numero);
                alimentMaxId = alimentMaxId - 1;
                selectedRow = event.target.closest("tr");
                selectedRow.remove();
                aliments = aliments.filter(aliment => aliment.id !== id);
                //console.log(id + "," + aliments[id-1].numero);
            }
        }

        function edit(id) {
            edited = true;
            selectedRow = event.target.closest("tr");
            $("#nom").val(aliments[id -1].nom)
            $("#nom").prop('disabled', 'disabled');
            $("#quantite").val(aliments[id -1].quantite);
            $("#date").val(aliments[id -1].date);
        }

        function saveAliment(aliment) {
            selectedRow.cells[0].innerHTML = aliment.nom;
            selectedRow.cells[1].innerHTML = aliment.quantite;
            selectedRow.cells[2].innerHTML = aliment.date;
            ajaxUpdateAliment(aliment);
        }
    </script>
</article>