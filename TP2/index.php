<?php
require_once('template_header.php');
?>

<?php
    require_once('template_menu.php');
    renderMenuToHTML('index');
?>
<article>
    <div class="main">
        <p>Portfolio</p>
    </div>
    <div class="sub">
        <p>Know Everything About Me</p>
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