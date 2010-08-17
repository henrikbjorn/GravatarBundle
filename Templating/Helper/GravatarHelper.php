<?php

namespace Bundle\GravatarBundle\Templating\Helper;

use Symfony\Components\Templating\Helper\HelperInterface;
use Bundle\GravatarBundle\GravatarApi;

class GravatarHelper implements HelperInterface
{
    /**
     * @var string $charset
     */
    protected $charset = 'UTF-8';

    /**
     * @var Bundle\GravatarBundle\GravatarApi $api
     */
    protected $api;

    /**
     * Constructor
     *
     * @param Bundle\GravatarBundle\GravatarApi $api
     * @return void
     */
    public function __construct(GravatarApi $api)
    {
        $this->api = $api;
    }

    /**
     * Returns a url for a gravatar
     *
     * @param  string  $email
     * @param  integer $size
     * @param  string  $rating
     * @param  string  $default
     * @return string
     */
    public function render($email, $size = null, $rating = null, $default = null)
    {
        return $this->api->getUrl($email, $size, $rating, $default);
    }

    /**
     * Sets the default charset.
     *
     * @param string $charset The charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    /**
     * Gets the default charset.
     *
     * @return string The default charset
     */
    public function getCharset()
    {
        return $this->charset;
    }

    public function getName()
    {
        return 'gravatar';
    }
}
