<?php

namespace Bundle\GravatarBunde\Tests;

use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Bundle\GravatarBundle\GravatarApi;

class GravatarApiTest extends TestCase
{

    public function testGravatarUrlWithDefaultOptions()
    {
        $this->assertEquals('http://www.gravatar.com/avatar/0aa61df8e35327ac3b3bc666525e0bee?s=80&r=g', GravatarApi::getUrl('henrik@bearwoods.dk'));
    }

    public function testGravatarUrlWithDefaultImage()
    {
        $this->assertEquals('http://www.gravatar.com/avatar/0aa61df8e35327ac3b3bc666525e0bee?s=80&r=g&d=mm', GravatarApi::getUrl('henrik@bearwoods.dk', 80, 'g', 'mm'));
    }

}
