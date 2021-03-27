let studentMaxId = 0;
let students = [];


function onFormSubmit() {

    // Disable the sending of the form
    event.preventDefault();

    let newStudent = {};

    newStudent.nom = $('#nom').val();
    newStudent.prenom = $('#prenom').val();
    newStudent.date = $('#date').val();
    newStudent.check = $('#check').prop("checked") ? "oui" : "non";
    newStudent.note = $('#note').val();
    newStudent.id = studentMaxId;
    studentMaxId ++;

    // Checking if the name is valid
    if (newStudent.nom === "") {
        nom.style.borderColor = "red";
        error.innerHTML = "Veuillez entrer votre nom";
        error.style.color = "red";
        return;
    }

    // Adding data to the table
    let template = `
                            <tr>
                                <td>${newStudent.nom}</td>
                                <td>${newStudent.prenom}</td>
                                <td>${newStudent.date}</td>
                                <td>${newStudent.check}</td>
                                <td>${newStudent.note}</td>
                                <td>
                                    <button type="submit" class="btn btn-secondary" id="saveButton" style="display: none;" onclick= "save(${newStudent.id})">Save</button>
                                    <button type="submit" class="btn btn-primary" id="editButton" onclick= "editRow(${newStudent.id})">Modifier</button>
                                    <button type="submit" class="btn btn-primary" id="removeButton" onclick= "removeRow(${newStudent.id})">Supprimer</button>
                                </td>
                            </tr>
                        `
    document.querySelector("table").innerHTML += template;
    students.push(newStudent);
    console.log(students);

    // Clear fields
    $('#nom').val("");
    $('#prenom').val("");
    $('#date').val("");
    $('#check').prop("checked",false);
    $('#note').val("");
    $('#nom').css("border-color", null);
    $('#error').html("");
    $('#error').css("color", null);
}

function removeRow(id) {
    students = students.filter(student => student.id !== id);
    event.target.closest("tr").remove();
}

function editRow(id) {
    $("#saveButton").css("display" , "inline-block");
    $("#editButton").css("display" , "none");

    $('#nom').val(students[id].nom);
    $('#prenom').val(students[id].prenom);
    $('#date').val(students[id].date);
    $('#check').prop("checked", students[id].check === "oui" ? true : false);
    $('#note').val(students[id].note);
}

function save(id){
    event.target.closest("tr").cells[0].innerHTML = students[id].nom = $('#nom').val();
    event.target.closest("tr").cells[1].innerHTML = students[id].prenom = $('#prenom').val();
    event.target.closest("tr").cells[2].innerHTML = students[id].date = $('#date').val();
    event.target.closest("tr").cells[3].innerHTML = students[id].check =  $('#check').prop("checked") ? "oui" : "non";
    event.target.closest("tr").cells[4].innerHTML = students[id].note = $('#note').val();

    $("#editButton").css("display" , "inline-block");
    $("#saveButton").css("display" , "none");

    $('#nom').val("");
    $('#prenom').val("");
    $('#date').val("");
    $('#check').prop("checked",false);
    $('#note').val("");
    $('#nom').css("border-color", null);
    $('#error').html("");
    $('#error').css("color", null);
    console.log(students);
}
