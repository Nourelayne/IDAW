
        <?php
        function renderMenuToHTML($currentPageId)
        {
            $mymenu = array(
                'index' => array('accueil', 'Accueil'),
                'cv' => array('cv', 'CV' ),
                'projects' => array('projects', 'Projets')
            );
            echo "
                <nav>
                <div class=\"toggle\">
                <div class=\"menu\"><i class=\"fa fa-bars\" aria-hidden=\"true\"></i></div>
                </div>
                    <ul>
                        <div class=\"title\">Portfolio</div>
            ";
            foreach ($mymenu as $pageId => $pageParameters) {
                if ($currentPageId === $pageId) {
                    echo "<li id=\"currentpage\"><a href=\"index.php?page={$pageParameters[0]}\">{$pageParameters[1]}</a></li>";
                } else {
                    echo "<li><a href=\"index.php?page={$pageParameters[0]}\">{$pageParameters[1]}</a></li>";
                }
            }
            echo "
                    </ul>
                </nav>
            ";
        }
        ?>