<?php

use PHPUnit\Framework\TestCase;
use Vdhicts\Dicms\Breadcrumb;

class ItemCollectionTest extends TestCase
{
    private function getBaseItemCollection()
    {
        $applicationItem = new Breadcrumb\Item('Application');
        $pageItem = new Breadcrumb\Item('Page', 'http://www.example.com/page', '');
        $actionItem = new Breadcrumb\Item('Add', 'http://www.example.com/page/add', 'plus');

        $itemCollection = new Breadcrumb\ItemCollection();
        $itemCollection->addItem($applicationItem)
            ->addItem($pageItem)
            ->addItem($actionItem);

        return $itemCollection;
    }

    public function testItemCollectionBuild()
    {
        $itemCollection = $this->getBaseItemCollection();

        $this->assertInstanceOf(Breadcrumb\ItemCollection::class, $itemCollection);
    }

    public function testItemCollectionCheck()
    {
        $itemCollection = $this->getBaseItemCollection();
        $this->assertTrue($itemCollection->hasItems());

        $emptyItemCollection = new Breadcrumb\ItemCollection();
        $this->assertFalse($emptyItemCollection->hasItems());
    }

    public function testItemCollectionRetrieval()
    {
        $itemCollection = $this->getBaseItemCollection();

        $this->assertSame(3, $itemCollection->count());
        $this->assertSame(3, count($itemCollection->getItems()));
    }

    public function testItemCollectionStoring()
    {
        $applicationItem = new Breadcrumb\Item('Application');
        $pageItem = new Breadcrumb\Item('Page', 'http://www.example.com/page', '');
        $actionItem = new Breadcrumb\Item('Add', 'http://www.example.com/page/add', 'plus');

        $itemCollection = new Breadcrumb\ItemCollection();
        $itemCollection->setItems([$applicationItem, $pageItem, $actionItem]);

        $this->assertSame(3, $itemCollection->count());
    }
}
