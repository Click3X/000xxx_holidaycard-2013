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

        <script>
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', '<?= GA_ACCOUNT; ?>'] );
          _gaq.push(['_setDomainName', 'holidays.click3x.com'] );
          _gaq.push(['_trackPageview']);
          _gaq.push(['_setAllowLinker', true]);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
    </body>
</html>