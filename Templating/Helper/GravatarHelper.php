<?php

namespace Bundle\GravatarBundle\Templating\Helper;

use Symfony\Components\Templating\Helper\HelperInterface;
use Bundle\GravatarBundle\GravatarApi;

class GravatarHelper implements HelperInterface
{
    protected $charset = 'UTF-8';

    public function __construct()
    {
    }

    public function render($email, $size = 80, $rating = 'g', $default = null)
    {
        return GravatarApi::getUrl($email, $size, $rating, $default);
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
