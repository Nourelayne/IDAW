<article>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="profile-nav col-md-3">
                <div class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <img  alt="photo de profil">
                        </a>
                        <h1 id="nomComplet"></h1>
                        <br>
                        <p id="email">deydey@theEmail.com</p>
                    </div>
                </div>
            </div>
            <div class="profile-info col-md-9">
                <div class="panel">
                    <div class="panel-body bio-graph-info">
                        <h1>Informations</h1>
                        <div class="row">
                            <div class="bio-row">
                                <p>Nom :<span id="nom"></span></p>
                            </div>
                            <div class="bio-row">
                                <p>Prénom :<span id="prenom"></span></p>
                            </div>
                            <div class="bio-row">
                                <p>Sexe :<span id="sexe"></span></p>
                            </div>
                            <div class="bio-row">
                                <p>Age :<span id="age"></span></p>
                            </div>
                            <div class="bio-row">
                                <p>Niveau de pratique sportive :<span id="niveau_pratique_sportive"></span></p>
                            </div>
                            <div class="bio-row">
                                <p>Besoin Energetique :<span id="besoin_energetique"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<script>
        let backendURL = "http://localhost/IDAW/Projet_IMM/BackEnd/";

        $(document).ready(function() {

            $.getJSON(backendURL + "getProfil.php", function(utilisateur) {
                $("#email").html(utilisateur[0].login);
                $("#nomComplet").html(`${utilisateur[0].nom} ${utilisateur[0].prenom}`);
                $("#nom").html(utilisateur[0].nom);
                $("#prenom").html(utilisateur[0].prenom);
                $("#sexe").html(utilisateur[0].sexe);
                $("#age").html(utilisateur[0].age);
                $("#niveau_pratique_sportive").html(utilisateur[0].niveau_pratique_sportive);
                $("#besoin_energetique").html(utilisateur[0].besoin_energetique);
                utilisateur[0].nom === 'NOURELAYNE' ? $("img").attr("src", "http://localhost/IDAW/Projet_IMM/FrontEnd/Files/Nourelayne.jpg") : $("img").attr("src", "http://localhost/IDAW/Projet_IMM/FrontEnd/Files/Fabresse.jpg");
            });
        });
</script>