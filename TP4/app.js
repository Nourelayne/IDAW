function onFormSubmit() {

    // Disable the sending of the form
    event.preventDefault();

    let nom = document.querySelector('#nom');
    let error = document.querySelector('#error');
    let prenom = document.querySelector('#prenom');
    let date = document.querySelector('#date');
    let check = document.querySelector('#check');
    let note = document.querySelector('#note');
    let table = document.querySelector('.table');

    // Checking if the name is valid
    if (nom.value === "") {
        nom.style.borderColor = "red";
        error.innerHTML = "Veuillez entrer votre nom";
        error.style.color = "red";
        return;
    }

    // Adding data to the table
    let template = `
                            <tr>
                                <td>${nom.value}</td>
                                <td>${prenom.value}</td>
                                <td>${date.value}</td>
                                <td>${check.value}</td>
                                <td>${note.value}</td>
                                <td>
                                    <button type="submit" class="btn btn-secondary" id="saveButton" style="display: none;" onclick= "save()">Save</button>
                                    <button type="submit" class="btn btn-primary modifyBtn" onclick= "onModifyRow()">Modifier</button>
                                    <button type="submit" class="btn btn-primary deleteBtn" onclick= "onDeleteRow()">Supprimer</button>
                                </td>
                            </tr>
                        `
    table.innerHTML += template;

    // Clear fields
    nom.value = "";
    prenom.value = "";
    date.value = "";
    note.value = "";
    nom.style.borderColor = null;
    error.innerHTML = "";
    error.style.color = null;
}

function onDeleteRow() {
    if (!event.target.classList.contains("deleteBtn")) {
        return;
    }

    const btn = event.target;
    btn.closest("tr").remove();
}

function onModifyRow() {
    if (!event.target.classList.contains("modifyBtn")) {
        return;
    }

    const btn = event.target;
    const saveBtn = document.querySelector("#saveButton");

    saveBtn.style.display = "inline-block";
    btn.style.display = "none";

    document.querySelector('#nom').value = btn.closest("tr").cells[0].innerHTML;
    document.querySelector('#prenom').value = btn.closest("tr").cells[1].innerHTML;
    document.querySelector('#date').value =  btn.closest("tr").cells[2].innerHTML;
    document.querySelector('#check').value = btn.closest("tr").cells[3].innerHTML;
    document.querySelector('#note').value  = btn.closest("tr").cells[4].innerHTML;
}

function save(){
        event.target.closest("tr").cells[0].innerHTML = document.querySelector('#nom').value;
        event.target.closest("tr").cells[1].innerHTML = document.querySelector('#prenom').value;
        event.target.closest("tr").cells[2].innerHTML = document.querySelector('#date').value;
        event.target.closest("tr").cells[3].innerHTML = document.querySelector('#check').value;
        event.target.closest("tr").cells[4].innerHTML = document.querySelector('#note').value;
}

