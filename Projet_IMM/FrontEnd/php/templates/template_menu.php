
        <?php
        function renderMenuToHTML($currentPageId)
        {
            $mymenu = array(
                'profil' => 'Profil',
                'journal' => 'Journal',
                'aliments' => 'Aliments',
                'logout' => 'Log out'
            );
            echo "
                <nav>
                <div class=\"toggle\">
                <div class=\"menu\"><i class=\"fa fa-bars\" aria-hidden=\"true\"></i></div>
                </div>
                    <ul>
                        <div class=\"title\">IMangerMieux</div>
            ";
            foreach ($mymenu as $pageId => $pageParameters) {
                if ($currentPageId === $pageId) {
                    echo "<li id=\"currentpage\"><a href=\"index.php?page=$pageId\">";
                    echo $pageParameters;
                }else {
                    echo "<li><a href=\"index.php?page=$pageId\">";
                    echo $pageParameters;
                }
                echo "</a></li>";
            }
            echo "
                    </ul>
                </nav>
            ";
        }
        ?>