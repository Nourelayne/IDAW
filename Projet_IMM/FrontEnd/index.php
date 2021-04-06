    <?php
        require_once("php/templates/template_header.php");
        require_once("php/templates/template_menu.php");
        $currentPageId = 'login';

        if (isset($_GET['page'])) {
            $currentPageId = $_GET['page'];
        }
    ?>

    <?php
        renderMenuToHTML($currentPageId);
    ?>

    <?php
        $pageToInclude = "php/pages/$currentPageId.php";
        if (is_readable($pageToInclude))
            require_once($pageToInclude);
        else
            require_once("error.php");
    ?>

    <?php
        require_once("php/templates/template_footer.php");
    ?>
    <script src="js/index.js"></script>
</body>

</html>