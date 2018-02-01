<?php

namespace Ornicar\GravatarBundle\Templating\Helper;

use Ornicar\GravatarBundle\GravatarApi;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Templating\Helper\Helper;

/**
 * Symfony 2 Helper for Gravatar. Uses Bundle\GravatarBundle\GravatarApi.
 *
 * @author Thibault Duplessis
 * @author Henrik Bjornskov <henrik@bearwoods.dk>
 */
class GravatarHelper extends Helper implements GravatarHelperInterface
{
    /**
     * @var Ornicar\GravatarBundle\GravatarApi
     */
    protected $api;

    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * Constructor.
     *
     * @param GravatarApi $api
     * @param RouterInterface|null $router
     */
    public function __construct(GravatarApi $api, RouterInterface $router = null)
    {
        $this->api = $api;
        $this->router = $router;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl($email, $size = null, $rating = null, $default = null, $secure = true)
    {
        return $this->api->getUrl($email, $size, $rating, $default, $this->isSecure($secure));
    }

    /**
     * {@inheritdoc}
     */
    public function getUrlForHash($hash, $size = null, $rating = null, $default = null, $secure = true)
    {
        return $this->api->getUrlForHash($hash, $size, $rating, $default, $this->isSecure($secure));
    }

    /**
     * {@inheritdoc}
     */
    public function getProfileUrl($email, $secure = true)
    {
        return $this->api->getProfileUrl($email, $this->isSecure($secure));
    }

    /**
     * {@inheritdoc}
     */
    public function getProfileUrlForHash($hash, $secure = true)
    {
        return $this->api->getProfileUrlForHash($hash, $this->isSecure($secure));
    }

    public function render($email, array $options = array())
    {
        $size = isset($options['size']) ? $options['size'] : null;
        $rating = isset($options['rating']) ? $options['rating'] : null;
        $default = isset($options['default']) ? $options['default'] : null;
        $secure = $this->isSecure();

        return $this->api->getUrl($email, $size, $rating, $default, $secure);
    }

    /**
     * {@inheritdoc}
     */
    public function exists($email)
    {
        return $this->api->exists($email);
    }

    /**
     * Name of this Helper.
     *
     * @return string
     */
    public function getName()
    {
        return 'gravatar';
    }

    /**
     * Returns true if avatar should be fetched over secure connection.
     *
     * @param mixed $preset
     *
     * @return bool
     */
    protected function isSecure($preset = true)
    {
        if (null !== $preset) {
            return (bool) $preset;
        }

        if (null === $this->router) {
            return false;
        }

        return 'https' == strtolower($this->router->getContext()->getScheme());
    }
}
