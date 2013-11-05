<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>        <script>
            $(function() {
                $("a[rel]").overlay({
                    mask: '#000',
                    effect: 'apple'
                });
            });
        </script>
        </div>
        <div id="footer">
            <div class="nav">
                <a href=""><?php echo translate('About');?></a>
                <a href=""><?php echo translate('Help');?></a>
                <a href="" style="border: none;"><?php echo translate('Advertise');?></a>
            </div>
            <b>&copy; 2013 BSGwiki</b>
        </div>
    </body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>