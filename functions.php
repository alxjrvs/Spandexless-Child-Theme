<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name'=>'abovesidebar_single',
        'before_widget' => '<div class="above_sidebar">',
        'after_widget' => "</div>\n",
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => "</h2>\n",
    ));
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name'=>'abovesidebar_main',
        'before_widget' => '<div class="above_sidebar">',
        'after_widget' => "</div>\n",
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => "</h2>\n",
    ));
?>
