<?php

/**
 * jQuery Mobile
 *
 * Provide the jQuery Mobile library with according themes.
 *
 * Based on JQuery UI Plugin
 *
 * Copyright (C) 2015  PNE Annuaire et Messagerie/MEDDE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @version 1.4.5
 * @author PNE Annuaire et Messagerie/MEDDE
 * @license GNU GPLv3+
 */
class jquery_mobile extends rcube_plugin
{
    private static $instance;

    public function init()
    {
        self::$instance = $this;
        $this->version = '1.4.5';
    }

    public static function get_instance()
    {
        return self::$instance;
    }
 
    public function include_files()
    {
        $version = $this->version;

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
