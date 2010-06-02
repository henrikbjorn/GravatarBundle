<?php

namespace Bundle\GravatarBundle;

/**
 * Simple wrapper to the gravatar API
 * http://en.gravatar.com/site/implement/url
 *
 * Usage:
 * $imageUrl = Bundle\GravatarBundle\Api::getUrl('joe@mail.com');
 * $imageUrl = Bundle\GravatarBundle\Api::getUrl('joe@mail.com', array('size' => 40));
 *
 * @author     Thibault Duplessis <thibault.duplessis@gmail.com>
 */
class Api
{
    /**
     * Pattern used to build the gravatar API url
     */
    protected static $urlPattern = 'http://www.gravatar.com/avatar/{hash}?d={default}&s={size}&r={rating}';

    /**
     * Default options passed to the gravatar API
     */
    protected static $defaults = array(
        'default' => null,
        'size'    => 80,
        'rating'  => 'g'
    );

    /**
     * Get an image url from an email and an array of options
     * 
     * @param string $email 
     * @param array $options 
     *  - default   // default image when user has no gravatar account
     *  - size      // size of the image in pixels
     *  - rating    // can be g, pg, r or x
     *
     * @return string the url of the image
     */
    public static function getUrl($email, array $options = array())
    {
        $options = array_merge(self::$defaults, $options, array('hash' => md5($email)));

        $url = self::$urlPattern;

        foreach($options as $name => $value)
        {
            $url = str_replace('{'.$name.'}', urlencode($value), $url);
        }

        return $url;
    }

}
