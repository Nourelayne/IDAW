<?php
require_once('template_header.php');
?>

<?php
    require_once('template_menu.php');
    renderMenuToHTML('projects');
?>
<article class="article">
    <div class="app1">
        <div class="app1_img">
            <img src="Images & Logos\app1.JPG">
        </div>
        <div class="app1_description">
            <h2 style="color: #2F2FA2">Weather App</h2>
            <p>
                L'une de mes premières applications avec le stack HTML & CSS et Javascript.
                C'est une application qui te permet d'avoir des informations sur la météo
                de votre région comme la température et le temps qu'il fait.
                <strong>Technologies utilisées:</strong> HTML & CSS, JavaScript, OpenWeather API.
            </p>
        </div>
    </div>
    <hr>
    <div class="app2">
        <div class="app2_img">
            <img src="Images & Logos\app2.gif">
        </div>
        <div class="app2_description">
            <h2 style="color: #2F2FA2">Music App</h2>
            Ceci est ma première application utilisant Flutter pour un projet scolaire,
            c'est une application de musique simple avec des fonctionnalités comme
            rechercher ou aimer une musique, mais il y a encore beaucoup de choses
            à ajouter pour rendre cette application bien meilleure et plus complexe.
            <strong>Technologies utilisées:</strong> Flutter.
        </div>
    </div>
    <hr>
    <div class="app3">
        <div class="app3_img">
            <img src="Images & Logos\app3.JPG">
        </div>
        <div class="app3_description">
            <h2 style="color: #2F2FA2">Todo List App</h2>
            Une application Todo List Simple qui te permet d'ajouter des tâches qui doivent être accompli prochainement,
            et les supprimer une fois fini.
            <strong>Technologies utilisées:</strong> HTML & CSS, Vanilla JavaScript.
        </div>
    </div>
</article>
<?php
   require_once('template_footer.php');
?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('.menu').click(function() {
            $('ul').toggleClass('active');
        })
    })
</script>
</body>

</html>