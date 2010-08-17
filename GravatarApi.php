<?php

namespace Bundle\GravatarBundle;

/**
 * Simple wrapper to the gravatar API
 * http://en.gravatar.com/site/implement/url
 *
 * Usage:
 *      \Bundle\GravatarBundle\GravatarApi::getUrl('henrik@bearwoods.dk', 80, 'g', 'mm');
 *
 * @author     Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author     Henrik Bjørnskov <henrik@bearwoods.dk>
 */
class GravatarApi
{
    /**
     * Returns a url for a gravatar.
     *
     * @param  string  $email
     * @param  integer $size    defaults to 80
     * @param  string  $rating  defaults to g
     * @param  string  $default defaults to null
     * @return string
     */
    public static function getUrl($email, $size = 80, $rating = 'g', $default = null)
    {
        $hash = md5(strtolower($email));

        $map = array(
            's' => $size,
            'r' => $rating,
            'd' => $default,
        );

        return 'http://www.gravatar.com/avatar/' . $hash . '?' . http_build_query(array_filter($map));
    }
}
