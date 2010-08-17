<?php

namespace Bundle\GravatarBundle\Tests\Templating\Helper;

use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Bundle\GravatarBundle\GravatarApi;
use Bundle\GravatarBundle\Templating\Helper\GravatarHelper;

class GravatarHelperTest extends TestCase
{
    protected $helper;

    public function setUp()
    {
        $this->helper = new GravatarHelper(new GravatarApi());
    }

    public function testRenderReturnsTheCorrectUrl()
    {
        $this->assertEquals('http://www.gravatar.com/avatar/0aa61df8e35327ac3b3bc666525e0bee?s=80&r=g', $this->helper->render('henrik@bearwoods.dk'));
    }
}
