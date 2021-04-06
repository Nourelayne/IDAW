let alimentsConsumes = [];
let energieTotal = 0;
let protéinesTotal = 0;
let glucidesTotal = 0;
let lipidesTotal = 0;
let sucresTotal = 0;
let alcoolTotal = 0;
let sodiumTotal = 0;
let eauTotal = 0;

$(document).ready(function() {

    $.getJSON("http://localhost/IDAW/Projet_IMM/BackEnd/api/profil/getProfil.php", function(utilisateur) {
        $("#email").html(utilisateur[0].login);
        $("#nomComplet").html(`${utilisateur[0].nom} ${utilisateur[0].prenom}`);
        $("#nom").html(utilisateur[0].nom);
        $("#prenom").html(utilisateur[0].prenom);
        $("#sexe").html(utilisateur[0].sexe);
        $("#age").html(utilisateur[0].age);
        $("#niveau_pratique_sportive").html(utilisateur[0].niveau_pratique_sportive);
        $("#besoin_energetique").html(utilisateur[0].besoin_energetique);
        utilisateur[0].nom === 'NOURELAYNE' ? $("img").attr("src", "../FrontEnd/Files/Nourelayne.jpg") : $("img").attr("src", "../FrontEnd/Files/Fabresse.jpg");
    });

    $.getJSON("http://localhost/IDAW/Projet_IMM/BackEnd/api/apports/apportCalcul.php", function(aliments) {
        $.each(aliments, function(i, a) {
            let aliment = {};
            aliment.id = parseInt(a.id);
            aliment.quantite = parseFloat(a.quantite);
            aliment.energie = parseInt(a.energie);
            aliment.protéines = parseFloat(a.protéines);
            aliment.glucides = parseFloat(a.glucides);
            aliment.lipides = parseFloat(a.lipides);
            aliment.sucres = parseFloat(a.sucres);
            aliment.alcool = parseFloat(a.alcool);
            aliment.sodium = parseInt(a.sodium);
            aliment.eau = parseFloat(a.eau);
            energieTotal += (aliment.quantite * 1000 * aliment.energie) / 100;
            protéinesTotal += (aliment.quantite * 1000 * aliment.protéines) / 100;
            glucidesTotal += (aliment.quantite * 1000 * aliment.glucides) / 100;
            lipidesTotal += (aliment.quantite * 1000 * aliment.lipides) / 100;
            sucresTotal += (aliment.quantite * 1000 * aliment.sucres) / 100;
            alcoolTotal += (aliment.quantite * 1000 * aliment.alcool) / 100;
            sodiumTotal += (aliment.quantite * 1000000 * aliment.sodium) / 100;
            eauTotal += (aliment.quantite * 1000 * aliment.eau) / 100;
            alimentsConsumes.push(aliment);
        });
        $("#energie").html(energieTotal+"  KJ");
        $("#protéines").html(protéinesTotal.toFixed(2)+"  g");
        $("#glucides").html(glucidesTotal.toFixed(2)+"  g");
        $("#lipides").html(lipidesTotal.toFixed(2)+"  g");
        $("#sucres").html(sucresTotal.toFixed(2)+"  g");
        $("#alcool").html(alcoolTotal.toFixed(2)+"  g");
        $("#sodium").html(sodiumTotal+"  mg");
        $("#eau").html(eauTotal.toFixed(2)+"  g");
    });
});