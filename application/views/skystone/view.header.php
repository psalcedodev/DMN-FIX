<!DOCTYPE html>
<!--[if lt IE 8]>
<html class="ie7" lang="en"><![endif]-->
<!--[if IE 8]>
<html lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="author" content="neo6 - Salvis87@inbox.lv" />
    <meta name="keywords" content="<?php echo $this->meta->request_meta_keywords(); ?>" />
    <meta name="description" content="<?php echo $this->meta->request_meta_description(); ?>" />
    <meta property="og:title" content="<?php echo $this->meta->request_meta_title(); ?>" />
    <meta property="og:image" content="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/cms_logo.png" />
    <meta property="og:url" content="<?php echo $this->config->base_url; ?>" />
    <meta property="og:description" content="<?php echo $this->meta->request_meta_description(); ?>" />
    <meta property="og:type" content="website">
    <title><?php echo $this->meta->request_meta_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico" />
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/dmn.css" type="text/css" />
    <?php
    if (isset($css)) :
        foreach ($css as $style) :
            echo $style;
        endforeach;
    endif;
    ?>
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-ui.min.js"></script>
    <?php
    if (isset($scripts)) :
        foreach ($scripts as $script) :
            echo $script;
        endforeach;
    endif;
    ?>
    <style>
        .title1,
        .title2,
        .title {
            display: none;
        }

        .img-online {
            position: unset;
        }

        .time-news {
            padding-top: 0;
            margin-top: -1rem;
        }

        table tr {
            background-color: transparent !important;
        }

        table tr td {
            border: none !important;
        }

        table tr td {
            text-align: center;
            margin: 0 auto;
        }

        button[type="sumbit"],
        .button-style {
            display: block;
        }

        table tr td,
        table tr th {
            padding: 5px;
        }

        .ranking-table td {
            background: transparent !important;
            border-bottom: 1px solid #9dbdc8 !important;
        }

        .ranking-table th {
            background: transparent !important;
            border-bottom: 1px solid #45a9da;
        }

        .ranking-table {
            background: transparent !important;
        }

        .custom_button {
            float: unset;
            display: inline-block;
            padding-top: 1.5rem;
            margin-right: 20px !important;
        }

        .inside ul.style4 li {
            background: none !important;
            padding: 5px;
        }

        .account-panel-title {
            padding-top: 5px;
        }

        table.sidebar_rank th,
        table.sidebar_rank td {
            border: none !important;
            padding: 10px;
        }
    </style>
</head>

<body class="two-column1">
    <div id="exception"></div>
    <div id="wrapper">
        <?php if (strtotime($this->config->config_entry("main|grand_open_timer")) >= time()) : ?>
            <div id="timer_div_title"><?php echo $this->config->config_entry("main|grand_open_timer_text"); ?></div>
            <div id="timer_div_time">
                <div class="timmer_inner_block">
                    <div class="title"><?php echo __('Days'); ?></div>
                    <div id="days" class="count"></div>
                </div>
                <div class="timmer_inner_block">
                    <div class="title"><?php echo __('Hours'); ?></div>
                    <div id="hours" class="count"></div>
                </div>
                <div class="timmer_inner_block">
                    <div class="title"><?php echo __('Minutes'); ?></div>
                    <div id="minutes" class="count"></div>
                </div>
                <div class="timmer_inner_block">
                    <div class="title"><?php echo __('Seconds'); ?></div>
                    <div id="seconds" class="count"></div>
                </div>
            </div>
        <?php endif; ?>
        <div class="top-panel flex-c-c">

            <ul class="menu flex-c-c">
                <li><a href="<?php echo $this->config->base_url; ?>home" title="<?php echo __('News'); ?>"><?php echo __('News'); ?></a>
                </li>
                <li><a href="<?php echo $this->config->base_url; ?>registration" title="<?php echo __('Registration'); ?>"><?php echo __('Registration'); ?></a>
                </li>
                <li><a href="<?php echo $this->config->base_url; ?>downloads" title="<?php echo __('Files'); ?>"><?php echo __('Files'); ?></a>
                </li>
                <li><a href="<?php echo $this->config->base_url; ?>rankings" title="<?php echo __('Rankings'); ?>"><?php echo __('Rankings'); ?></a>
                </li>
                <li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" title="<?php echo __('Facebook'); ?>" target=""><?php echo __('Facebook'); ?></a>
                </li>
                <li><a href="<?php echo $this->config->base_url; ?>vote-reward" title="<?php echo __('Vote'); ?>"><?php echo __('Vote'); ?></a>
                </li>
            </ul>
            <div class="languages">
                <?php
                $languages = $this->website->lang_list();
                krsort($languages);
                $i = 0;
                foreach ($languages as $language => $flag) :
                    $i++;
                    $padding = ($i == 1) ? '' : 'style="padding-left:5px"';
                    if ($_COOKIE['dmn_language'] == $language) {
                        echo '<a href="#" title="' . $flag . '" ' . $padding . ' class="f16"><span class="active flag ' . strtolower($flag) . '"></span></a>' . "\n";
                    } else {
                        echo '<a href="#" id="lang_' . $language . '" title="' . $flag . '" ' . $padding . ' class="f16"><span class="nonactive flag ' . strtolower($flag) . '"></span></a>' . "\n";
                    }
                endforeach;
                ?>
            </div>
        </div><!-- top-panel -->


        <div class="wrapper">
            <header class="header">
                <div class="logo">
                    <a href="/"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-1.png" alt=""></a>
                </div>
                <div class="leaves">
                    <div class="leaves-1"></div>
                    <div class="leaves-2"></div>
                    <div class="leaves-3"></div>
                </div>
                <div class="sparks">
                    <div class="spark-1"></div>
                    <div class="spark-2"></div>
                    <div class="spark-3"></div>
                </div>
            </header><!-- .header-->
            <div class="button-top flex-c-c">
                <div class="download-block">
                    <a href="<?php echo $this->config->base_url; ?>downloads"><span><?php echo __('Files'); ?></span><br>
                        <p>FULL GAME CLIENT</p>
                    </a>
                </div><!-- download-block -->
                <div class="registration-block">
                    <a href="<?php echo $this->config->base_url; ?>registration"><span><?php echo __('Registration'); ?></span><br>
                        <p>now for free</p>
                    </a>
                </div><!-- registration-block -->
            </div>
            <div class="container">
                <main class="content">
                    <div class="top">
                        <div class="slider">
                            <div class="next arrows"> </div>
                            <div class="prev arrows"> </div>
                            <div class="slides">
                                <div class="slide active" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-img-1.jpg);">
                                    <div class="slide-info">
                                        <span>NEW</span>
                                        <div class="slide-text-big">UPDATE</div>
                                        <div class="slide-text">
                                            <p>FREE DOWNLOAD<br>new client 1.6 GB</p>
                                        </div>
                                        <div class="slide-text1">
                                            <p>SEASON 15 EPISODE 3<br>at MYTHICAL MU</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-img-2.jpg); ">
                                    <div class="slide-info">
                                        <span>NEW</span>
                                        <div class="slide-text-big">BALANCE SYSTEM</div>
                                        <div class="slide-text">
                                            <p>PvP &<br>PvM</p>
                                        </div>
                                        <div class="slide-text1">
                                            <p>FAIR DUEL FOR ALL<br>CLASS</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-img-3.jpg); ">
                                    <div class="slide-info">
                                        <span>NEW</span>
                                        <div class="slide-text-big">NEW CLASS</div>
                                        <div class="slide-text">
                                            <p>SLAYER<br></p>
                                        </div>
                                        <div class="slide-text1">
                                            <p>HUGE AGILITY DAMAGING<br>TYPE</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="navigation">
                            </div>
                        </div><!-- slider end-->
                        <div class="widget-account-panel">
                            <div class="account-panel-title flex-c-c">
                                ACCOUN PANEL
                            </div>
                            <?php
                            if ($this->session->userdata(['user' => 'logged_in'])) :
                                $credits = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 1, $this->session->userdata(['user' => 'id']));
                                $credits2 = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 2, $this->session->userdata(['user' => 'id']));
                            ?>
                                <div class="inside">
                                    <ul class="style4">
                                        <li class="first" style="text-align: center;"><?php echo __('Welcome'); ?>
                                            , <?php echo $this->session->userdata(['user' => 'username']); ?></li>
                                        <li class="first" style="text-align: center;">
                                            <a href="<?php echo $this->config->base_url; ?>account-panel"></a>
                                        </li>
                                        <li><?php echo __('Current Server'); ?>:
                                            <span><?php echo $this->session->userdata(['user' => 'server_t']); ?> <img data-modal-div="select_server" src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/switch.png" style="width: 13px;cursor: pointer;" /></span></li>
                                        <li class="w-coins"><?php echo __('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_1'); ?>
                                            : <span id="my_credits"><?php echo number_format($credits['credits']); ?></span></li>
                                        <li class="zz-coins"><?php echo __('My'); ?> <?php echo $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_2'); ?>
                                            : <span id="my_gold_credits"><?php echo number_format($credits2['credits']); ?></span></li>
                                        <?php
                                        if ($this->config->values('wcoin_exchange_config', [$this->session->userdata(['user' => 'server']), 'display_wcoins']) == 1) :
                                            $wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(['user' => 'server']));
                                        ?>
                                            <li class="w-coins"><?php echo __('My'); ?> <?php echo __('WCoins'); ?>: <span id="my_credits"><?php echo number_format($wcoin); ?></span></li>
                                        <?php endif; ?>
                                        <li><a href="<?php echo $this->config->base_url; ?>donate"><?php echo __('Buy Gold Credits'); ?></a></li>
                                        <li><a href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market'); ?></a></li>
                                        <li><a href="<?php echo $this->config->base_url; ?>warehouse"><?php echo __('Warehouse'); ?></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->config->base_url; ?>account-panel"><?php echo __('Account Panel'); ?></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $this->config->base_url; ?>account-logs"><?php echo __('Account Logs'); ?></a>
                                        </li>
                                        <li><a href="<?php echo $this->config->base_url; ?>settings"><?php echo __('Change Password'); ?></a></li>
                                        <?php
                                        $plugins = $this->config->plugins();
                                        if (!empty($plugins)) :
                                            if (array_key_exists('merchant', $plugins)) {
                                                if ($this->session->userdata(['user' => 'is_merchant']) != 1) {
                                                    unset($plugins['merchant']);
                                                }
                                            }
                                            foreach ($plugins as $key => $plugin) :
                                                if ($plugin['installed'] == 1 && $plugin['sidebar_user_item'] == 1) :
                                        ?>
                                                    <li>
                                                        <a href="<?php echo $plugin['module_url']; ?>"><?php echo $plugin['about']['name']; ?></a>
                                                    </li>
                                        <?php
                                                endif;
                                            endforeach;
                                        endif;
                                        ?>
                                    </ul>
                                    <span style="display: block;text-align:center;display:block;">
                                        <a class='logout' style="text-decoration:underline" href="<?php echo $this->config->base_url; ?>logout"><?php echo __('Logout'); ?></a>
                                    </span>
                                </div>
                            <?php
                            else :
                            ?>
                                <form id="login_form" method="post" action="<?php echo $this->config->base_url; ?>">
                                    <p class="input-user"><input type="text" name="username" id="login_input" maxlength="10" placeholder="Username"></p>
                                    <p class="input-user"><input type="password" name="login" name="password" id="password_input" maxlength="20" placeholder="Password"></p>
                                    <div class="buttons">
                                        <button class="button-border" type="submit" id="submit" value="<?php echo __('Login'); ?>"><?php echo __('Login'); ?></button>
                                        <div class="lost"> <a href="<?php echo $this->config->base_url; ?>lost-password"><?php echo __('Lost Password'); ?></a> | <a href="<?php echo $this->config->base_url; ?>registration"><?php echo __('Registration'); ?></a>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="fast-links">
                        <a href="<?php echo $this->config->base_url; ?>donate" class="fast-links-left">
                            <span>DONATION</span><br>
                            <p>Help in he<br> developmentof the server</p>
                        </a>
                        <span></span>
                        <a href="<?php echo $this->config->base_url; ?>downloads" class="fast-links-center">
                            <span>START GAME</span><br>
                            <p>Start the gema in<br>a few clicks</p>
                        </a>
                        <span></span>
                        <a href="<?php echo $this->config->base_url; ?>about" class="fast-links-right">
                            <span>STATISTICS</span><br>
                            <p>Detailed statistics of<br>game server</p>
                        </a>
                    </div>
                    <div class="last-news">
                        <div class="last-news-title flex-s-c">
                            <h2><?php echo $this->meta->request_meta_title(); ?></h2>
                            <a href="" class="news-title-more">+</a>
                        </div>
                        <div class="content_sky">
                            <!-- <div id="wrapper-bgtop">
                                <div id="wrapper-bgbtm">
                                    <div style="background: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/wrapper-bgimg.jpg) no-repeat center top;">
                                        <div id="logo-wrapper">
                                            <div id="logo" class="container">
                                            </div>
                                        </div>
                                        <div id="menu-wrapper">
                                            <div id="menu" class="container">
                                                <nav>
                                                    <ul class="nav">
                                                        <li><a href="<?php echo $this->config->base_url; ?>home" title="<?php echo __('News'); ?>"><?php echo __('News'); ?></a>
                                                        </li>
                                                        <li><a href="<?php echo $this->config->base_url; ?>registration" title="<?php echo __('Registration'); ?>"><?php echo __('Registration'); ?></a>
                                                        </li>
                                                        <li><a href="<?php echo $this->config->base_url; ?>downloads" title="<?php echo __('Files'); ?>"><?php echo __('Files'); ?></a>
                                                        </li>
                                                        <li><a href="<?php echo $this->config->base_url; ?>rankings" title="<?php echo __('Rankings'); ?>"><?php echo __('Rankings'); ?></a>
                                                        </li>
                                                        <li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" title="<?php echo __('Forum'); ?>" target="_blank"><?php echo __('Forum'); ?></a>
                                                        </li>
                                                        <li><a href="<?php echo $this->config->base_url; ?>shop" title="<?php echo __('Shop'); ?>"><?php echo __('Shop'); ?></a>
                                                        </li>
                                                        <li><a href="<?php echo $this->config->base_url; ?>vote-reward" title="<?php echo __('Vote'); ?>"><?php echo __('Vote'); ?></a>
                                                        </li>
                                                        <li><a href="#"><?php echo __('Media'); ?></a>
                                                            <ul class="effect">
                                                                <li>
                                                                    <a href="<?php echo $this->config->base_url; ?>media/wallpapers"><?php echo __('Wallpapers'); ?></a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo $this->config->base_url; ?>media/screenshots"><?php echo __('Screen Shots'); ?></a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <?php
                                                        $plugins = $this->config->plugins();
                                                        if (!empty($plugins)) :
                                                            foreach ($plugins as $plugin) :
                                                                if ($plugin['installed'] == 1 && $plugin['main_menu_item'] == 1) :
                                                        ?>
                                                                    <li>
                                                                        <a href="<?php echo $plugin['module_url']; ?>"><?php echo $plugin['about']['name']; ?></a>
                                                                    </li>
                                                        <?php
                                                                endif;
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                        <div id="page-wrapper">
                                            <div id="page-bgtop">
                                                <div id="page-bgbtm">
                                                    <div id="page" class="container">
                                                        <div id="banner">
                                                            <div id="col1">
                                                                <div class="promRoundBox"></div>
                                                                <ol class="items">
                                                                    <li class="item">
                                                                        <span onclick="App.tooltipImageShow('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-1.jpg')"></span>
                                                                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-1.jpg" alt="" />
                                                                    </li>
                                                                    <li class="item">
                                                                        <span onclick="App.tooltipImageShow('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-2.jpg')"></span>
                                                                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-2.jpg" alt="" />
                                                                    </li>
                                                                    <li class="item">
                                                                        <span onclick="App.tooltipImageShow('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-3.jpg')"></span>
                                                                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/misc/rotate/banner-3.jpg" alt="" />
                                                                    </li>
                                                                </ol>
                                                                <div class="rollingIconWrap">
                                                                    <div class="bgFirst"></div>
                                                                    <div class="rollingIcon">
                                                                        <button type="button" data-pic="0" name="#" class="active"></button>
                                                                        <button type="button" data-pic="1" name="#"></button>
                                                                        <button type="button" data-pic="2" name="#"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="col2">
                                                                <table class="info-button">
                                                                    <tr>
                                                                        <?php
                                                                        $i = -1;
                                                                        $select_server = 0;
                                                                        foreach ($this->website->check_server_status() as $key => $value) :
                                                                            if ($value['visible'] == 1) {
                                                                                $i++;
                                                                                if ($this->session->userdata(['user' => 'logged_in'])) :
                                                                                    if ($this->session->userdata(['user' => 'server']) == $value['server']) :
                                                                                        $select_server = $i;
                                                                                    endif;
                                                                                endif;
                                                                        ?>
                                                                                <td onclick="App.changeServerInfo(<?php echo $i; ?>);" id="sButton-<?php echo $i; ?>">
                                                                                    <?php echo $value['title']; ?>
                                                                                    <div id="online-<?php echo $i; ?>" style="display: none;" data-server="<?php echo $value['server']; ?>"><?php echo $value['players']; ?></div>
                                                                                    <div id="status-<?php echo $i; ?>" style="display: none;" data-server="<?php echo $value['server']; ?>"><?php echo $value['status_with_style']; ?></div>
                                                                                    <div id="version-<?php echo $i; ?>" style="display: none;" data-server="<?php echo $value['server']; ?>"><?php echo $value['version']; ?></div>
                                                                                </td>
                                                                        <?php
                                                                            }
                                                                        endforeach;
                                                                        ?>
                                                                        <script>
                                                                            $(document).ready(function() {
                                                                                App.changeServerInfo(<?php echo $select_server; ?>);
                                                                            });
                                                                        </script>
                                                                    </tr>
                                                                </table>
                                                                <p><?php echo __('Status'); ?>:<span id="sStatus">&nbsp;</span></p>

                                                                <p><?php echo __('In Game'); ?>:<span id="sOnline">&nbsp;</span></p>
                                                                <p><?php echo __('Top Player'); ?>:<a id="sPlayerLink" href="#"><span id="sPlayer">&nbsp;</span></a></p>

                                                                <p><?php echo __('Top Guild'); ?>:<a id="sGuildLink" href="#"><span id="sGuild">&nbsp;</span></a></p>

                                                                <p><?php echo __('Server Time'); ?>
                                                                    :<span id="ServerTime">&nbsp;</span></p>

                                                                <p><?php echo __('Language'); ?>:
                                                                    <span>
                                                                        <?php
                                                                        $languages = $this->website->lang_list();
                                                                        krsort($languages);
                                                                        $i = 0;
                                                                        foreach ($languages as $language => $flag) :
                                                                            $i++;
                                                                            $padding = ($i == 1) ? '' : 'style="padding-left:5px"';
                                                                            if ($_COOKIE['dmn_language'] == $language) {
                                                                                echo '<a href="#" title="' . $flag . '" ' . $padding . ' class="f16"><span class="active flag ' . strtolower($flag) . '"></span></a>' . "\n";
                                                                            } else {
                                                                                echo '<a href="#" id="lang_' . $language . '" title="' . $flag . '" ' . $padding . ' class="f16"><span class="nonactive flag ' . strtolower($flag) . '"></span></a>' . "\n";
                                                                            }
                                                                        endforeach;
                                                                        ?>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div> -->