
        <?php
        function renderMenuToHTML($currentPageId)
        {
            $mymenu = array(
                'index' => 'Accueil',
                'cv' => 'CV',
                'projects' => 'Projets'
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
                if ($currentPageId ===
                 $pageId) {
                    echo "<li><a href=\"${pageId}.php\" id=\"currentpage\">${pageParameters}</a></li>";
                } else {
                    echo "<li><a href=\"${pageId}.php\">${pageParameters}</a></li>";
                }
            }
            echo "
                    </ul>
                </nav>
            ";
        }
        ?>