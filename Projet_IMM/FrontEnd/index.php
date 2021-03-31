<?php
    require_once("template_header.php");
    require_once("template_menu.php");
    $currentPageId = 'profil';

    if (isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
?>

<?php
    renderMenuToHTML($currentPageId);
?>

<h1><?php  echo $currentPageId ?></h1>
<?php
    $pageToInclude = "$currentPageId.php";
    if (is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once("error.php");
?>

<?php
    require_once("template_footer.php");
?>
<script>
    $(document).ready(function() {
        $('.menu').click(function() {
            $('ul').toggleClass('active');
        })
    })
</script>
</body>

</html>