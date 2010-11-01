<?php

namespace Bundle\GravatarBundle\Twig\Extension;

use Symfony\Bundle\TwigBundle\TokenParser\HelperTokenParser;


class GravatarTwigExtension extends \Twig_Extension
{
    /**
     * Returns the token parser instance to add to the existing list.
     *
     * @return array An array of Twig_TokenParser instances
     */
    public function getTokenParsers()
    {
        return array(
            // {% gravatar email with [size: 80 ]  %}
            new HelperTokenParser('gravatar', '<email> [with <options:array>]', 'templating.helper.gravatar', 'render'),
        );
    }

    public function getName()
    {
        return 'gravatar';
    }    
}