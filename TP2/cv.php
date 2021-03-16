<?php
   require_once('template_header.php');
?>

<?php
   require_once('template_menu.php');
   renderMenuToHTML('cv');
?>
<article>
    <div class="resume">
        <div class="resume_up">
            <div class="resume_img">
                <img src="Images & Logos\pdp.jpg">
            </div>
            <div class="resume_info">
                <div class="profil_name">
                    <span class="last_name">
                        NOURELAYNE
                    </span>
                    <span class="first_name">
                        Salah Eddine
                    </span>
                </div>
                <div class="school_name">
                    Elève Ingénieur à l'IMT Lille Douai
                </div>
                <div class="contacts">
                    <div><img src="Images & Logos\mailLogo.JPG" />: Nourelaynesalaheddine@gmail.com</div>
                    <div><img src="Images & Logos\linkedInLogo.JPG" />: linkedin.com/in/salah-nourelayne</div>
                    <div style="margin-left: 80px;"><img src="Images & Logos/githubLogo.JPG" />: github.com/Nourelayne</div>
                    <div><img src="Images & Logos\phoneLogo.JPG" />: +33. 6. 20. 24. 49. 31</div>
                    <div><img src="Images & Logos\adressLogo.JPG" />: Villeneuve d’Ascq-France</div>
                </div>
            </div>
        </div>
        <hr>
        <div class="resume_down">
            <div class="left_part">
                <div class="Formation">
                    <fieldset>
                        <legend class="legend">Formation</legend>
                        <div class="block">
                            <span class="date">2020 - 2022</span>
                            <p>En programme double diplôme à
                                l’Institut Mines Télécom Lille Douai,
                                Programme Numérique.</p>
                        </div>
                        <div class="block">
                            <span class="date">2018 - 2020</span>
                            <p>Formation ingénieur en génie
                                informatique à l’académie
                                Internationale Mohammed VI
                                d’aviation Civile (A.I.A.C).
                            </p>
                        </div>
                        <div class="block">
                            <span class="date">2016 - 2018</span>
                            <p>Classes préparatoires aux
                                grandes écoles (CPGE) de Fès,
                                Branches : MPSI-MP.
                            </p>
                        </div>
                        <div class="block">
                            <span class="date">2015 - 2016</span>
                            <p>Baccalauréat option
                                sciences mathématiques B
                            </p>
                        </div>

                    </fieldset>
                </div>
                <div class="Experience">
                    <fieldset>
                        <legend class="legend">Expérience en entreprise</legend>
                        <div class="title">
                            Stage d’observation - Trésorerie Régionale de
                            FES [Juillet 2019 – Août 2019] :
                        </div>
                        <div class="text">
                            Réalisation d’une application de gestion des
                            stagiaires en utilisant le langage de
                            programmation JAVA et MySQL comme
                            système de gestion de bases de données
                            relationnelles.
                        </div>
                    </fieldset>
                </div>
                <div class="Projets">
                    <fieldset>
                        <legend class="legend">Projets Personnels</legend>
                        <div class="title">
                            Application Stories
                        </div>
                        <div class="text">
                            Application web MERN de partage de stories.
                            <strong>Technologies utilisées :</strong> MongoDB, Express.js,
                            React, Node.js, Redux.
                        </div>
                        <div class="title">
                            Weather App
                        </div>
                        <div class="text">
                            Application web de météo.
                            <strong>Technologies utilisées :</strong> HTML & CSS, JavaScript.
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="right_part">
                <div class="Competences">
                    <fieldset>
                        <legend class="legend">Compétences</legend>
                        <div class="title">
                            Technologies Front-End :
                        </div>
                        <div class="text">
                            <pre>
                                        HTML & CSS&emsp;JavaScript&emsp;&emsp;Bootstrap
                                        React&emsp;&emsp;&emsp;&emsp;&emsp;Redux&emsp;&emsp;&emsp;JQuery
                                    </pre>
                        </div>
                        <div class="title">
                            Technologies Back-End :
                        </div>
                        <div class="text">
                            <pre>
                                        Servlet/JSP/JSTL/JSF&emsp;Spring/Spring Boot
                                        &emsp;NodeJs&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ExpressJs
                                    </pre>
                        </div>
                        <div class="title">
                            Systèmes de gestion de base de données :
                        </div>
                        <div class="text">
                            <pre>
                                        <strong>SQL : </strong>&emsp;&emsp;MySQL&emsp;&emsp;&emsp;Oracle Database
                                        <strong>NoSQL :  </strong>&emsp;&emsp;&emsp;MongoDB
                                     </pre>
                        </div>
                        <div class="title">
                            GIT : Outil de gestion de versions (VCS)
                        </div>
                        <div class="title">
                            Méthode Agile SCRUM
                        </div>
                        <div class="text">
                            SCRUM Foundation Professional Certificate
                        </div>
                        <div class="title">
                            Communication
                        </div>
                        <div class="text">
                            <pre>
                                        <strong>Anglais : </strong> TOEIC Certification B2 - 905
                                 
                                        <strong>Francais : </strong> Niveau intermédiaire B2
                                    
                                        <strong>Arabe : </strong> Langue maternelle
                                    </pre>
                        </div>
                    </fieldset>
                </div>
                <div class="Parascolaires">
                    <fieldset>
                        <legend class="legend">Parascolaires</legend>
                        <div class="text">
                            <pre>
                                        Responsable communication au Club Informatique A.I.A.C.
                                        Comité d’organisation du Carrefour National des Informaticiens.
                                        Actualités scientifique et high-tech, et e-learning.
                                        Sports : Football, natation, Jogging, Voyages
                                    </pre>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="download">
        <p>Télécharger mon CV</p>
        <button><a href="Files\NOURELAYNE.Salah-eddine.CV.pdf" download>Cliquez-ici</a></button>
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