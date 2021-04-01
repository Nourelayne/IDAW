<article>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Gestion d'Aliments</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addAlimentModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter Aliment</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="table-content">
                <thead>
                    <tr>
                        <th>Nom Aliment</th>
                        <th>Energie (kJ/100 g)</th>
                        <th>Protéines (g/100 g)</th>
                        <th>Glucides (g/100 g)</th>
                        <th>Lipides (g/100 g)</th>
                        <th>Sucres (g/100 g)</th>
                        <th>Alcool (g/100 g)</th>
                        <th>Sodium (mg/100 g)</th>
                        <th>Eau (g/100 g)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <div id="addAlimentModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form onsubmit="onFormSubmit()" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter Aliment</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                            <p id="error">
                            <p>
                        </div>
                        <div class="form-group">
                            <label>Energie (kJ/100 g)</label>
                            <input type="number" step="0.01" class="form-control" name="energie" id="energie">
                        </div>
                        <div class="form-group">
                            <label>Protéines (g/100 g)</label>
                            <input type="number" step="0.01" class="form-control" name="protéines" id="protéines">
                        </div>
                        <div class="form-group">
                            <label>Glucides (g/100 g)</label>
                            <input type="number" step="0.01" class="form-control" name="glucides" id="glucides">
                        </div>
                        <div class="form-group">
                            <label>Lipides (g/100 g)</label>
                            <input type="number" step="0.01" class="form-control" name="lipides" id="lipides">
                        </div>
                        <div class="form-group">
                            <label>Sucres (g/100 g)</label>
                            <input type="number" step="0.01" class="form-control" name="sucres" id="sucres">
                        </div>
                        <div class="form-group">
                            <label>Alcool (g/100 g)</label>
                            <input type="number" step="0.01" class="form-control" name="alcool" id="alcool">
                        </div>
                        <div class="form-group">
                            <label>Sodium (mg/100 g)</label>
                            <input type="number" step="0.01" class="form-control" name="sodium" id="sodium">
                        </div>
                        <div class="form-group">
                            <label>Eau (g/100 g)</label>
                            <input type="number" step="0.01" class="form-control" name="eau" id="eau">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                        <input type="submit" class="btn btn-success" value="Ajouter">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteAlimentModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Supprimer Aliment</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let alimentMaxId = 1;
        let aliments = [];
        let backendURL = "http://localhost/IDAW/Projet_IMM/BackEnd/";

        $(document).ready(function() {

            $('[data-toggle="tooltip"]').tooltip();

            $.getJSON(backendURL + "selectAliment.php", function(data) {
                aliments = data;
                $.each(aliments, function(i, a) {
                    let aliment = {};
                    aliment.id = a.id_aliment;
                    aliment.nom = a.libelle_aliment;
                    aliment.energie = a.Energie;
                    aliment.protéines = a.Protéines;
                    aliment.glucides = a.Glucides;
                    aliment.lipides = a.Lipides;
                    aliment.sucres = a.Sucres;
                    aliment.alcool = a.Alcool;
                    aliment.sodium = a.Sodium;
                    aliment.eau = a.Eau;
                    addAliment(aliment);
                });
            });
        });

        function addAliment(newAliment) {
            newAliment.id = alimentMaxId;
            $("#table-content").append(`  <tr id=aliment${newAliment.id}> 
                        <td> ${newAliment.nom}  </td> <td> 
                        ${newAliment.energie}  </td> <td> 
                        ${newAliment.protéines}  </td> <td> 
                        ${newAliment.glucides} </td> <td>
                        ${newAliment.lipides}  </td> <td> 
                        ${newAliment.sucres}  </td> <td> 
                        ${newAliment.alcool}  </td> <td> 
                        ${newAliment.sodium}  </td> <td>  
                        ${newAliment.eau}  </td> <td>
                            <a href="#editAlimentModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <button type="button" class="btn btn-danger" onclick="remove(${newAliment.id})" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                        </td> 
                    </tr>`);
            alimentMaxId++;
        }

        function ajaxAddAliment(aliment) {
            $.ajax({
                    url: backendURL + "addAliment.php",
                    method: "POST",
                    dataType: "json",
                    data: aliment
                })
        }

        function ajaxDeleteAliment(id){
                $.ajax({
                        url: backendURL + "deleteAliment.php",
                        method: "POST",
                        dataType : "json",
                        data : {'id': id},
                    })
        }

        function clearFields() {
            $("#nom").val();
            $("#energie").val();
            $("#protéines").val();
            $("#glucides").val();
            $("#lipides").val();
            $("#sucres").val();
            $("#alcool").val();
            $("#sodium").val();
            $("#eau").val();
        }

        function readInputs(){
            let newAliment = {};
            newAliment.nom = $("#nom").val();
            newAliment.energie = $("#energie").val();
            newAliment.protéines = $("#protéines").val();
            newAliment.glucides = $("#glucides").val();
            newAliment.lipides = $("#lipides").val();
            newAliment.sucres = $("#sucres").val();
            newAliment.alcool = $("#alcool").val();
            newAliment.sodium = $("#sodium").val();
            newAliment.eau = $("#eau").val();
            return newAliment;
        }

        function onFormSubmit() {
            event.preventDefault();
            let aliment = readInputs();
            if (aliment.nom != '') {
                aliments.push(aliment);
                addAliment(aliment);
                ajaxAddAliment(aliment);
                clearFields();
            }
        }

        function remove(id){
            if(confirm("êtes-vous sure de vouloir supprimer cet enregistrement?"))
                alimentMaxId = alimentMaxId - 1;
                aliments = aliments.filter(aliment =>  aliment.id !== id);
                $("#aliment"+id).fadeOut(800,function(){ $(this).remove();});
                ajaxDeleteAliment(id);
        }
    </script>
</article>