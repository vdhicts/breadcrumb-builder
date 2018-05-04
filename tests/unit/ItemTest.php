<?php

use PHPUnit\Framework\TestCase;
use Vdhicts\Dicms\Breadcrumb;

class ItemTest extends TestCase
{
    public function testItemWithAllProperties()
    {
        $name = 'Google';
        $link = 'http://www.google.com';
        $icon = 'google';

        $item = new Breadcrumb\Item($name, $link, $icon);

        $this->assertInstanceOf(Breadcrumb\Item::class, $item);
        $this->assertSame($name, $item->getName());
        $this->assertSame($link, $item->getLink());
        $this->assertTrue($item->hasLink());
        $this->assertSame($icon, $item->getIcon());
        $this->assertTrue($item->hasIcon());
    }

    public function testItemWithDefaults()
    {
        $name = 'Google';

        $item = new Breadcrumb\Item($name);

        $this->assertInstanceOf(Breadcrumb\Item::class, $item);
        $this->assertSame($name, $item->getName());
        $this->assertNull($item->getLink());
        $this->assertFalse($item->hasLink());
        $this->assertNull($item->getIcon());
        $this->assertFalse($item->hasIcon());
    }

    public function testItemWithInvalidTarget()
    {
        $this->expectException(Breadcrumb\Exceptions\InvalidLinkException::class);

        new Breadcrumb\Item('test', 'test');
    }
}
