</div>
</div>
<aside class="right-sidebar">
    <div class="widget-right">
        <div class="widget-title flex-c-c">
            <h2>TOP <span class="widget-title-small">SERVERS</span></h2>
        </div>
        <div class="widget-content">
            <?php
            $online = 0;
            foreach ($this->website->check_server_status() as $key => $value) {
                if ($value['visible'] == 1) {
                    $online = intval($value['players'] * 100 / 400);
                }

                if ($online > 100) {
                    $online = 100;
                }

                $status = isset($value['status']) ? str_replace("Online: ", "online", $value['status']) : 'offline';
                if ($status == 'Offline: ') {
                    $status = 'offline';
                }
            ?>
                <div class="status">
                    <div class="flex-c-c">
                        <span class="server-name"><?php echo $value['title']; ?></span>
                        <div class="img-online" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/<?php echo htmlspecialchars($status); ?>.png); "></div>
                    </div>
                    <div class="progress-bar">
                        <span style="width: <?php echo $online; ?>%;"></span>
                    </div>
                    <div class="status">Online: <?php echo $value['players']; ?></div>
                </div>
            <?php } ?>
        </div>
    </div><!-- top-server -->

    <?php
    $ranking_config = $this->config->values('rankings_config');
    $i = 0;
    foreach ($ranking_config as $srv => $data) {
        if ($data['active'] == 1) {
            if (isset($data['player']) && $data['player']['is_sidebar_module'] == 1) {
                echo '
											<div class="widget-right">
												<div class="widget-title flex-c-c">
													<h2>TOP <span class="widget-title-small">PLAYERS</span></h2>
												</div>
												<script>
													$(document).ready(function () {
														App.populateSidebarRanking(\'players\', \'' . $srv . '\', ' . $data['player']['count_in_sidebar'] . ');
													});
													</script>
													<div class="widget-content-content">
														<div id="top_players"></div>
													</div>
													<br/>
												<span style="margin: 0 auto; display: block; text-align: center; margin-bottom: 1rem;">';
                foreach ($this->website->server_list() as $key => $server) {
                    if ($server['visible'] == 1  && isset($ranking_config[$key]['player'])) {
                        echo '<a href="#" class="custom_button" id="switch_top_players_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '">' . $server['title'] . '</a> ';
                    }
                }
                echo '</div>';
            }

            if (isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1) {
                echo '
										<div class="widget-right">
											<div class="widget-title flex-c-c">
												<h2>TOP <span class="widget-title-small">guilds</span></h2>
											</div>
													<script>
													$(document).ready(function () {
														App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
													});
													</script>
													<div class="widget-content-content">
														<div id="top_guilds"></div>
													</div>
													<br/>
												<span style="margin: 0 auto; display: block; text-align: center; margin-bottom: 1rem;">';
                foreach ($this->website->server_list() as $key => $server) {
                    if ($server['visible'] == 1 && isset($ranking_config[$key]['guild'])) {
                        echo '<a href="#" class="custom_button" id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['guild']['count_in_sidebar'] . '">' . $server['title'] . '</a> ';
                    }
                }
                echo '</div>';
            }
            $i++;
            if ($i == 1) {
                break;
            }
        }
    }
    ?>
    <div class="widget-right" style="display: none">
        <div class="widget-title flex-c-c">
            <h2>D<span class="widget-title-small">iscussions</span></h2>
        </div>
        <div class="widget-content-content">
            <div class="discussions-content-top">
                <?php
                $i = 0;
                $limit = 5;
                $link = 'https://forum.cryztalmu.com/external.php';
                if (!empty($link)) {
                    $last_rss = simplexml_load_file($link, 'SimpleXMLElement', LIBXML_NOCDATA);
                    foreach ($last_rss->channel->item as $key => $value) {
                        $i++;
                        $and = rand(1, 3);
                        if ($i > $limit) continue;
                        echo '
													
													<ul class="discussions-content">
														<li class="discussions-content-block">
															<span class="discussions-icon" style="background-image: url(' . $this->config->base_url . 'assets/' . $this->config->config_entry("main|template") . '/images/icon_' . (int)$and . '.jpg);" ></span>
															<span class="discussions-message">' . (int)$i . '</span>
															<span class="discussions-text">' . htmlspecialchars($value->title) . '</span><br><br>
															<span class="discussions-text-bt">' . htmlspecialchars($value->pubDate) . '</span>
														</li>
													</ul>
													 ';
                    }
                    unset($last_rss);
                }
                ?>
            </div>
            <div class="button-small-small flex-c-c">
                <a href="" class="button-small flex-c-c">forum</a>
            </div>
        </div>
    </div>
    <!-- discussions -->

    <!-- Events -->

    <?php if ($this->config->values('event_config', array('events', 'active')) == 1) : ?>


        <div class="widget-right">
            <div class="widget-title flex-c-c">
                <h2><?php echo _('Events'); ?></h2>
            </div>
            <div class="widget-content-content">
                <div class="discussions-content-top">
                    <div id="events"></div>
                    <script type="text/javascript">
                        $(document).ready(function() {

                            App.getEventTimes();

                        });
                    </script>
                </div>
            </div>
        </div>


    <?php endif; ?>


</aside><!-- left-sidebar -->