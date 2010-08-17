<?php

namespace Bundle\GravatarBunde\Tests;

use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class GravatarApiTest extends TestCase
{

    public function testGravatarUrlWithDefaultOptions()
    {
        $this->assertEquals('http://www.gravatar.com/avatar/0aa61df8e35327ac3b3bc666525e0bee?s=80&r=g');
    }

    public function testGravatarUrlWithDefaultImage()
    {
        $this->assertEequals('http://www.gravatar.com/avatar/0aa61df8e35327ac3b3bc666525e0bee?s=80&r=g&d=mm');
    }

}
