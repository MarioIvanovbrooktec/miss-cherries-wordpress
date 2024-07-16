<?php

namespace Brooktec\Helpers;

use WP_Query;

/**
 * Class Url
 *
 * Helper functions for URLs.
 *
 * @package Brooktec\Helpers
 * @since 1.0.0
 * @version 1.0.0
 */
class Url
{
    /**
     * Get the current URL
     *
     * @return string
     */
    public static function current()
    {
        global $wp_query;
        $current_url = '';
        if (is_front_page()) {
            $current_url = site_url();
        } elseif (is_home()) {
            $current_url = get_permalink(get_option('page_for_posts'));
        } elseif (is_category()) {
            $current_url = get_category_link($wp_query->get_queried_object());
        } elseif (is_archive()) {
            $current_url = get_post_type_archive_link(get_post_type());
        } elseif (is_page()) {
            $current_url = get_permalink();
        } elseif (is_single()) {
            $current_url = get_permalink();
        }
        return self::removeHttp($current_url);
    }

    /**
     * Remove http:// and https:// from URL
     *
     * @param string $url
     * @return string
     */
    public static function removeHttp($url)
    {
        $url = \str_replace('http://', '//', $url);
        $url = \str_replace('https://', '//', $url);
        return $url;
    }

    /**
     * Add http:// or https:// to URL
     *
     * @param string $url
     * @return string
     */
    public static function addHttp($url)
    {
        return ( is_ssl() ? 'https:' : 'http:' ) . $url;
    }

    /**
     * Get the CSS inline style for a background image
     *
     * @param string $image_url URL of the image
     * @param string $property CSS property name (default: background-image)
     * @return string
     */
    public static function background($image_url, $property = 'background-image')
    {
        return !empty($image_url) ? sprintf('%s: url(%s)', $property, $image_url) : '';
    }

    /**
     * Get the URL of a page with a specific template
     *
     * @param string $template
     * @return string|null
     */
    public static function pageTemplate($template)
    {
        $url = null;
        $query = new WP_Query(
            array(
                'post_type' => 'page',
                'meta_query' => array(
                    array(
                        'key'   => '_wp_page_template',
                        'value' => $template
                    )
                )
            )
        );
        if ($query->have_posts()) {
            $query->the_post();
            $url = get_permalink(get_the_ID());
        }
        wp_reset_postdata();
        return $url;
    }
}
