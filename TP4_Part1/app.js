let studentMaxId = 0;
let students = [];
let selectedRow = null;
let currentId = 0;

function onFormSubmit() {

    event.preventDefault();

    if (valideForm()) {
        let newStudent = readInputs();

        if (selectedRow == null){
            insertStudent(newStudent);
            students.push(newStudent);
        }
        else{
            newStudent.id = currentId;
            students[currentId] = newStudent;
            saveStudent(newStudent);
        }
        clearFields();
    }
    console.log(students);
}

function valideForm(){
    let valid = true;
    if (document.getElementById("nom").value == "") {
        document.getElementById("nom").style.borderColor = "red";
        document.getElementById("error").innerHTML = "Veuillez entrer votre nom";
        document.getElementById("error").style.color = "red";
        valid = false;
    }
    return valid;
}

function readInputs(){

    let newStudent = {};

    newStudent.nom = document.getElementById("nom").value;
    newStudent.prenom = document.getElementById("prenom").value;
    newStudent.date = document.getElementById("date").value;
    newStudent.check = document.getElementById("check").checked ? "oui" : "non";
    newStudent.note = document.getElementById("note").value;
    newStudent.id = studentMaxId;
    studentMaxId ++;

    return newStudent;
}

function insertStudent(newStudent){
    let table = document.getElementById("studentList");
    table.innerHTML += 
                        `
                            <tr class="tr">
                                <td>${newStudent.nom}</td>
                                <td>${newStudent.prenom}</td>
                                <td>${newStudent.date}</td>
                                <td>${newStudent.check}</td>
                                <td>${newStudent.note}</td>
                                <td>
                                    <button type="submit" class="btn btn-primary" id="editButton" onclick= "editStudent(${newStudent.id})">Modifier</button>
                                    <button type="submit" class="btn btn-primary" id="removeButton" onclick= "removeStudent(${newStudent.id})">Supprimer</button>
                                </td>
                            </tr>
                        `;
}

function removeStudent(id) {
    students = students.filter(student => student.id !== id);
    students.map(student =>{
        if(student.id > id){
            student.id-- ;
        }
    });
    event.target.closest("tr").remove();
}

function editStudent(id) {
    selectedRow = event.target.closest("tr");

    document.getElementById("editButton").disabled = true;
    document.getElementById("removeButton").disabled = true;

    document.getElementById("nom").value = selectedRow.cells[0].innerHTML;
    document.getElementById("prenom").value = selectedRow.cells[1].innerHTML;
    document.getElementById("date").value = selectedRow.cells[2].innerHTML;
    selectedRow.cells[3].innerHTML === "oui" ? document.getElementById("check").checked = true : document.getElementById("check").checked = false;
    document.getElementById("note").value = selectedRow.cells[4].innerHTML;

    currentId = id;
}

function saveStudent(student) {
    document.getElementById("editButton").disabled = false;
    document.getElementById("removeButton").disabled = false;

    selectedRow.cells[0].innerHTML = student.nom;
    selectedRow.cells[1].innerHTML = student.prenom;
    selectedRow.cells[2].innerHTML = student.date;
    selectedRow.cells[3].innerHTML = student.check;
    selectedRow.cells[4].innerHTML = student.note;
}

function clearFields(){
    document.getElementById("nom").value = "";
    document.getElementById("prenom").value = "";
    document.getElementById("date").value = "";
    document.getElementById("check").checked = false;
    document.getElementById("note").value = "";
}

function clearError(){
    document.getElementById("nom").style.borderColor = null;
    document.getElementById("error").innerHTML = "";
    document.getElementById("error").style.color = null;
}


