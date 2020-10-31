<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('News'); ?></h1>
        </div>
        <div id="content_center">
            <?php
            if (empty($news)) :
                echo '<div style="padding: 0 30px 0px 50px;"><div class="i_note">' . __('No News Articles') . '</div></div>';
            else :
                if ($this->config->config_entry('news|storage') != 'facebook') {
                    foreach ($news as $key => $article) :
            ?>

                        <div class="last-news-content">
                            <!-- news_1 -->
                            <div class="img-news" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/img_news-<?php echo rand(1, 2); ?>.jpg); "></div>
                            <div class="news-content">
                                <div class="news-content-title">
                                    <?php echo $article['title']; ?>
                                </div>
                                <div class="news-text">
                                    <?php echo str_replace('&quot;', '"', str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $article['content'])))); ?>
                                </div>
                                <div class="news-text-bottom">
                                    <a href="<?php echo $article['url'] ?>" class="button-small flex-c-c">more</a>
                                    <div class="time-news"><span><?php echo __('Posted'); ?><?php echo date('d / m / Y', $article['time']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

            <?php
                    endforeach;
                } else {
                    echo '<div style="margin-left:90px;">' . str_replace('(document, script, facebook-jssdk)', '(document, \'script\', \'facebook-jssdk\')', $news['contents']) . '</div>';
                }
            endif;
            ?>
            <?php
            if (isset($pagination)) {
            ?>
                <div style="padding:10px;text-align:center;">
                    <table style="width: 100%;">
                        <tr>
                            <td><?php echo $pagination; ?></td>
                        </tr>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
$this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>