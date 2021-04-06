let alimentMaxId = 1;
let aliments = [];
let edited = false;
let selectedRow = null;
let backendURL = "http://localhost/IDAW/Projet_IMM/BackEnd/api/journal/";
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
        event.target.closest("tr").remove();
        aliments = aliments.filter(aliment => aliment.id !== id);
        aliments.map(aliment => aliment.id --);
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