<?php

/**
 * jQuery Mobile
 *
 * Provide the jQuery Mobile library with according themes.
 *
 * Based on JQuery UI Plugin
 *
 * @version 1.4.3
 * @author Thomas Payen <thomas.payen@i-carre.net>
 * @license GNU GPLv3+
 */
class jquery_mobile extends rcube_plugin
{
    public function init()
    {
        $version = '1.4.5';

        $rcmail = rcmail::get_instance();
        $this->load_config();

        // include jquery mobile scripts
        $this->include_script("js/jquery.mobile-$version.min.js");

        // include jquery mobile stylesheets
        $skin = $rcmail->config->get('skin');
        $ui_map = $rcmail->config->get('jquery_mobile_skin_map', array());
        $ui_theme = $ui_map[$skin] ? $ui_map[$skin] : $skin;

        // include structure mobile stylesheet
        $this->include_stylesheet("themes/larry/jquery.mobile-$version.min.css");
    }

}
