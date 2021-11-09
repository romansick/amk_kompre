<!-- JAVASCRIPT -->
<script src="<?= base_url('assets\libs\jquery\jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets\libs\bootstrap\js\bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets\libs\metismenu\metisMenu.min.js'); ?>"></script>
<script src="<?= base_url('assets\libs\simplebar\simplebar.min.js'); ?>"></script>
<script src="<?= base_url('assets\libs\node-waves\waves.min.js'); ?>"></script>

<script src="<?= base_url('assets\libs\jquery.easing\jquery.easing.min.js'); ?>"></script>

<!-- Plugins js-->
<script src="<?= base_url('assets\libs\jquery-countdown\jquery.countdown.min.js'); ?>"></script>

<!-- owl.carousel js -->
<script src="<?= base_url('assets\libs\owl.carousel\owl.carousel.min.js'); ?>"></script>

<!-- ICO landing init -->
<script src="<?= base_url('assets\js\pages\ico-landing.init.js'); ?>"></script>

<script src="<?= base_url('assets\js\app.js'); ?>"></script>


<script type="text/javascript">
    window.setTimeout(function() {
        $("#alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>

</body>

</html>