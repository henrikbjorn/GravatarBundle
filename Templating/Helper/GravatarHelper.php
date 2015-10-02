<?php

namespace Ornicar\GravatarBundle\Templating\Helper;

use Ornicar\GravatarBundle\GravatarApi;
use Symfony\Component\DependencyInjection\ContainerInterface;
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
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Constructor.
     *
     * @param Ornicar\GravatarBundle\GravatarApi $api
     */
    public function __construct(GravatarApi $api, ContainerInterface $container = null)
    {
        $this->api = $api;
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl($email, $size = null, $rating = null, $default = null, $secure = null)
    {
        return $this->api->getUrl($email, $size, $rating, $default, $this->isSecure($secure));
    }

    /**
     * {@inheritdoc}
     */
    public function getUrlForHash($hash, $size = null, $rating = null, $default = null, $secure = null)
    {
        return $this->api->getUrlForHash($hash, $size, $rating, $default, $this->isSecure($secure));
    }

    /**
     * {@inheritdoc}
     */
    public function getProfileUrl($email, $secure = null)
    {
        return $this->api->getProfileUrl($email, $this->isSecure($secure));
    }

    /**
     * {@inheritdoc}
     */
    public function getProfileUrlForHash($hash, $secure = null)
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
     * Returns true if avatar should be fetched over secure connection.
     *
     * @param mixed $preset
     *
     * @return Boolean
     */
    protected function isSecure($preset = null)
    {
        if (null !== $preset) {
            return !!$preset;
        }

        if (!$this->container || !$this->container->has('router')) {
            return false;
        }

        return 'https' == strtolower($this->container->get('router')->getContext()->getScheme());
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
}
