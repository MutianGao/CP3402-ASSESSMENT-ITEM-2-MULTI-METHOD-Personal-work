<?php
function enqueue_styles_and_scripts() {
    wp_enqueue_style('mutiangao-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_styles_and_scripts');

function theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

function register_my_menu() {
    register_nav_menu('menu-1', __('Primary Menu', 'mutiangao'));
}
add_action('after_setup_theme', 'register_my_menu');

function mutiangao_posted_on() {
    $time_string = '<time class="entry-date" datetime="%1$s">%2$s</time>';
    
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string .= ' <time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf($time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    $posted_on = sprintf(
        esc_html_x('Posted on %s', 'post date', 'mutiangao'),
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>'; 
}

function mutiangao_posted_by() {
    $byline = sprintf(
        esc_html_x('by %s', 'post author', 'mutiangao'),
        '<span class="author vcard"><a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>'; 
}

