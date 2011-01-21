<?php

namespace Bundle\GravatarBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle as BaseBundle;

class GravatarBundle extends BaseBundle
{
    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    public function getPath()
    {
        return __DIR__;
    }
}
