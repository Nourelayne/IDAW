<?php
        function renderMenuToHTML($currentPageId, $lang)
        {
            $mymenu = array(
                'accueil' => array('Accueil', 'Home'),
                'cv' => array('CV', 'CV'),
                'projects' => array('Projets', "Projects")
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
                    echo "<li id=\"currentpage\"><a href=\"index.php?page=$pageId&lang=$lang\">";
                    echo ($lang === "fr" ? $pageParameters[0] : $pageParameters[1]);
                } else {
                    echo "<li><a href=\"index.php?page=$pageId&lang=$lang\">";
                    echo ($lang === "fr" ? $pageParameters[0] : $pageParameters[1]);
                }
                echo "</a></li>";
            }
            echo "
                      <form id=\"style_form\" action=\"index.php\" method=\"GET\">
                          <select name=\"theme\">
                              <option value=\"Bright\">Bright</option>
                              <option value=\"Dark\">Dark</option>
                          </select>
                          <input type=\"submit\" value=\"Appliquer\" />
                      </form>
                    </ul>
                </nav>
            ";
        }
?>