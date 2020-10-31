</main><!-- .content -->
</div><!-- .container-->
<footer class="footer">
    <div class="toTop-fon">
        <div class="toTop" id="toTop"></div>
    </div>
    <div class="flex-s-c">
        <div class="footer-block-coperite">
            <p>Copyright 2019 © <a href="/">skystone.com</a></p><br>
            <p>This site is in no way associated with<br> or endorsed by Webzen Inc.</p>
        </div>
        <div class="footer-block-coperite" style="display: flex;">
            <p style="padding: 20px"><a href="">Terms & Conditions</a></p>
            <p style="padding: 20px"> <a href="">Contact</a></p>
        </div>
        <div class="footer-block-r">
            <div class="soc-block">
                <a href="" class="facebook"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/soc-icons_f.png" alt=""></a>
                <a href="" class="twitter"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/soc-icons_t.png" alt=""></a>
                <a href="" class="youtube"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/soc-icons_y.png" alt=""></a>
            </div>
        </div>
    </div>
</footer><!-- .footer -->
</div><!-- .wrapper -->

<a data-modal-div="select_server" href="#" id="server_click" style="display: hidden;"></a>
<div id="loading"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/ajax-loader.gif" alt="" /> <?php echo __('Loading...'); ?></div>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>


<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/app.js"></script>
<script type="text/javascript">
    var DmNConfig = {
        base_url: '<?php echo $this->config->base_url; ?>',
        tmp_dir: '<?php echo $this->config->config_entry('main|template'); ?>',
        currenttime: '<?php echo date('M d, Y h:i:s', time()); ?>',
        ajax_page_load: <?php echo $this->config->config_entry('main|use_ajax_page_load'); ?>,
        timers: <?php echo json_encode($this->website->load_event_timers()); ?>
    };

    $(document).ready(
        App.initialize,
        <?php if ($this->session->userdata(['user' => 'logged_in'])) : ?> App.checkSupportTickets(),
        <?php endif; ?> App.locale = <?php echo $this->translations; ?> <?php if (strtotime($this->config->config_entry("main|grand_open_timer")) >= time()) : ?>, App.count_down('<?php echo $this->config->config_entry("main|grand_open_timer"); ?>') <?php endif; ?>, App.initLocalization()
    );
</script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/global.js"></script>
<script>
    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });

        $('#toTop').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
        });
    });
</script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/circle-js.js"></script>

<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine.js" type="text/javascript"></script>
<?php
if ($this->request->get_method() == 'fortumo') {
?>
    <script src="https://assets.fortumo.com/fmp/fortumopay.js" type="text/javascript"></script>
<?php
}
?>
</body>

</html>