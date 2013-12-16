        </div>
        <script src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>    
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>js/<?=$page_id;?>.js"></script>

        <script>
            var _gaq=[['_setAccount','<?php echo GA_ACCOUNT; ?>'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>