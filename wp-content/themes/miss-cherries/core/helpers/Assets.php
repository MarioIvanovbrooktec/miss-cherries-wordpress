<?php

namespace Brooktec\Helpers;

/**
 * Class Assets
 *
 * Helper functions for assets.
 *
 * @package Brooktec\Helpers
 * @since 1.0.0
 * @version 1.0.0
 */
class Assets
{
    /**
     * Get URI of asset
     *
     * It gets the URI of an asset file. For use on the src attribute of an image tag, for example.
     *
     * @param string $name Name of the file. For example: image.png
     * @return string
     */
    public static function getUri($name)
    {
        $base = get_stylesheet_directory_uri();
        return trailingslashit($base) . "dist/img/{$name}";
    }

    /**
     * Get URI of asset from the parent theme
     *
     * It gets the URI of an asset file. For use on the src attribute of an image tag, for example.
     *
     * @param string $name Name of the file. For example: image.png
     * @return string
     */
    public static function getParentThemeUri($name)
    {
        $base = get_template_directory_uri();
        return trailingslashit($base) . "dist/img/{$name}";
    }

    /**
     * Get Asset Path
     *
     * Gets the full path to the asset on the server
     *
     * @param string $name Name of the file. For example: image.png
     * @return string
     */
    public static function getAssetPath($name)
    {
        $base = \get_stylesheet_directory();
        return trailingslashit($base) . "dist/img/{$name}";
    }

    /**
     * Get Asset Path from the parent theme
     *
     * Gets the full path to the asset on the server
     *
     * @param string $name Name of the file. For example: image.png
     * @return string
     */
    public static function getParentThemeAssetPath($name)
    {
        $base = get_template_directory();
        return trailingslashit($base) . "dist/img/{$name}";
    }

    /**
     * Get Src
     *
     * Alias for getAssetPath
     *
     * @param string $name Name of the file. For example: image.png
     * @return string
     */
    public static function getSrc($name)
    {
        return self::getAssetPath($name);
    }

    /**
     * Get the contents of an SVG file
     *
     * @param string $name Name of the file. For example: image.png
     * @return string
     * @SuppressWarnings(PHPMD.ErrorControlOperator)
     */
    public static function getSvgContents($name)
    {
        return @file_get_contents(self::getAssetPath($name));
    }

    /**
     * Get the contents of an SVG file from the parent theme
     *
     * @param string $name Name of the file. For example: image.png
     * @return string
     * @SuppressWarnings(PHPMD.ErrorControlOperator)
     */
    public static function getParentThemeSvgContents($name)
    {
        return @file_get_contents(self::getParentThemeAssetPath($name));
    }
}
