<?php

namespace Ornicar\GravatarBundle\Twig;

use Ornicar\GravatarBundle\Templating\Helper\GravatarHelperInterface;

/**
 * @author Thibault Duplessis
 * @author Henrik Bjornskov   <hb@peytz.dk>
 */
class GravatarExtension extends \Twig_Extension implements GravatarHelperInterface
{
    /**
     * @var GravatarHelperInterface
     */
    protected $baseHelper;

    /**
     * @param GravatarHelperInterface $helper
     */
    public function __construct(GravatarHelperInterface $helper)
    {
        $this->baseHelper = $helper;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('gravatar', array($this, 'getUrl')),
            new \Twig_SimpleFunction('gravatar_hash', array($this, 'getUrlForHash')),
            new \Twig_SimpleFunction('gravatar_exists', array($this, 'exists')),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl($email, $size = null, $rating = null, $default = null, $secure = null)
    {
        return $this->baseHelper->getUrl($email, $size, $rating, $default, $secure);
    }

    /**
     * {@inheritdoc}
     */
    public function getUrlForHash($hash, $size = null, $rating = null, $default = null, $secure = null)
    {
        return $this->baseHelper->getUrlForHash($hash, $size, $rating, $default, $secure);
    }

    /**
     * {@inheritdoc}
     */
    public function exists($email)
    {
        return $this->baseHelper->exists($email);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ornicar_gravatar';
    }
}
