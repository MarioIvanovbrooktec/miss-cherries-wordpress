<?php

namespace Brooktec\Helpers;

/**
 * Class Attachment
 *
 * Helper functions for attachments.
 *
 * @package Brooktec\Helpers
 * @since   1.0.0
 * @version 1.0.0
 */
class Attachment
{
    /**
     * @param  string $size
     * @return string Thumbnail Uri of current post
     */
    public static function getThumbnailUri($size = 'original')
    {
        return self::getThumbnailUriById(null, $size);
    }

    /**
     * @param  int|null|\WP_Post $post_id
     * @param  string            $size
     * @return string Thumbnail Uri of post
     */
    public static function getThumbnailUriById($post_id, $size = 'original')
    {
        return self::getThumbnailUriByAttachmentId(get_post_thumbnail_id($post_id), $size);
    }

    /**
     * @param  int|null|\WP_Post $attachment_id
     * @param  string            $size
     * @return string Thumbnail Uri of post
     */
    public static function getThumbnailUriByAttachmentId($attachment_id, $size = 'original')
    {
        $imageArray = wp_get_attachment_image_src($attachment_id, $size);
        $image_url = ((is_countable($imageArray)) ? current($imageArray) : '');
        return ($_SERVER['HTTPS'] == 'on') ? preg_replace('/^http:/', 'https:', $image_url) : $image_url ;
    }
}
