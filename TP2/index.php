<?php
    require_once("template_header.php");
    require_once("template_menu.php");
    $currentPageId = 'accueil';
    $lang = 'fr';
    if (isset($_GET['page']) && isset($_GET['lang'])) {
        $currentPageId = $_GET['page'];
        $lang = $_GET['lang'];
    }
?>

<?php
    renderMenuToHTML($currentPageId, $lang);
?>

<?php
    $pageToInclude = "{$lang}\\".$currentPageId.".php";
    if (is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once("error.php");
    ?>

<?php
    require_once("{$lang}\\template_footer.php");
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