<?php
/**
 * @package MMM Bootstrap Collapse
 * @version 1.0
 * @since   September 29, 2013
 */
/*
Plugin Name: MMM Bootstrap Collapse
Plugin URI: https://github.com/DerekMarcinyshyn/bootstrap-collapse
Description: WordPress shortcode helper plugin for wrapping the Bootstrap Collapse native javascript function.
Author: Derek Marcinyshyn
Version: 1.0
Author URI: http://derek.marcinyshyn.com
License: MIT

The MIT License (MIT)

Copyright (c) 2013 Derek Marcinyshyn

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

/**
 * Class MMM_Bootstrap_Collapse
 */
class MMM_Bootstrap_Collapse {

    /**
     * @var MMM_Bootstrap_Collapse
     */
    public static $instance;

    /**
     * Version of the plugin
     */
    const VERSION = 1;

    public function __construct() {
        self::$instance = $this;
        add_action('init', array($this, 'init'));
    }

    public function init() {
        add_shortcode('mmm-collapse', array($this, 'returnCollapse'));
    }

    public function returnCollapse($atts, $content = null) {
        $title = $atts['title'];
        //$open = $atts['open'];
        $id = $atts['id'];

        $html = '<div class="panel panel-default">';
        $html .= '<div class="panel-heading">';
        $html .= '<h4 class="panel-title">';
        $html .= '<a class="accordion-toggle" data-toggle="collapse" href="#collapse-'.$id.'">';
        $html .= '<span class="glyphicon glyphicon-resize-vertical"></span>&nbsp;&nbsp;' . $title;
        $html .= '</a></h4>';
        $html .= '</div>';
        $html .= '<div id="collapse-'.$id.'" class="panel-collapse collapse">';
        $html .= '<div class="panel-body">';
        $html .= $content;
        $html .= '</div></div></div>';

        return $html;
    }
}

if (class_exists('MMM_Bootstrap_Collapse')) {
    $mmm_bootstrap_collapse = new MMM_Bootstrap_Collapse();
}