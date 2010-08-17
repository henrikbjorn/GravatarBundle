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
     * @var array $default array of default options that can be overriden with getters and in the construct.
     */
    protected $defaults = array(
        'size' => 80,
        'rating' => 'g',
        'default' => null,
    );

    /**
     * Constructor
     *
     * @param array $options the array is merged with the defaults.
     * @return void
     */
    public function __construct(array $options = array()) {
        $this->defaults = array_merge($this->defaults, $options);
    }

    /**
     * Returns a url for a gravatar.
     *
     * @param  string  $email
     * @param  integer $size
     * @param  string  $ratin
     * @param  string  $default
     * @return string
     */
    public function getUrl($email, $size = null, $rating = null, $default = null)
    {
        $hash = md5(strtolower($email));

        $options = array_merge($this->defaults, array_filter(compact('size', 'rating', 'default')));
        $map = array(
            's' => $options['size'],
            'r' => $options['rating'],
            'd' => $options['default'],
        );

        return 'http://www.gravatar.com/avatar/' . $hash . '?' . http_build_query(array_filter($map));
    }
}
