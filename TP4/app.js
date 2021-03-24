function onFormSubmit() {

    // Disable the sending of the form
    event.preventDefault();

    // Getting elements from DOM
    let nom = document.querySelector('#nom');
    let error = document.querySelector('#error');
    let prenom = document.querySelector('#prenom');
    let date = document.querySelector('#date');
    let check = document.querySelector('#check');
    let note = document.querySelector('#note');
    let table = document.querySelector('.table');

    alert(check.value);

    // Checking if the name is valid
    if(nom.value === ""){
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
                                    <a href="#">Edit</a>
                                    <a href="#">Delete</a>
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