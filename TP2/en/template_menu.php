<?php
        function renderMenuToHTML($currentPageId, $lang)
        {
            $mymenu = array(
                'index' => array('Home', 'accueil'),
                'cv' => array('CV', 'cv'),
                'projects' => array('Projects', 'projects')
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
                    echo "<li><a href=\"index.php?page={$pageParameters[1]}&lang={$lang}\" id=\"currentpage\">{$pageParameters[0]}</a></li>";
                } else {
                    echo "<li><a href=\"index.php?page={$pageParameters[1]}&lang={$lang}\">{$pageParameters[0]}</a></li>";
                }
            }
            echo "
                    </ul>
                </nav>
            ";
        }
?>