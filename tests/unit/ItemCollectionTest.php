<?php

use PHPUnit\Framework\TestCase;
use Vdhicts\BreadcrumbBuilder;

class ItemCollectionTest extends TestCase
{
    private function getBaseItemCollection()
    {
        $applicationItem = new BreadcrumbBuilder\Item('Application');
        $pageItem = new BreadcrumbBuilder\Item('Page', 'http://www.example.com/page', '');
        $actionItem = new BreadcrumbBuilder\Item('Add', 'http://www.example.com/page/add', 'plus');

        $itemCollection = new BreadcrumbBuilder\ItemCollection();
        $itemCollection->addItem($applicationItem)
            ->addItem($pageItem)
            ->addItem($actionItem);

        return $itemCollection;
    }

    public function testItemCollectionBuild()
    {
        $itemCollection = $this->getBaseItemCollection();

        $this->assertInstanceOf(BreadcrumbBuilder\ItemCollection::class, $itemCollection);
    }

    public function testItemCollectionCheck()
    {
        $itemCollection = $this->getBaseItemCollection();
        $this->assertTrue($itemCollection->hasItems());

        $emptyItemCollection = new BreadcrumbBuilder\ItemCollection();
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
        $applicationItem = new BreadcrumbBuilder\Item('Application');
        $pageItem = new BreadcrumbBuilder\Item('Page', 'http://www.example.com/page', '');
        $actionItem = new BreadcrumbBuilder\Item('Add', 'http://www.example.com/page/add', 'plus');

        $itemCollection = new BreadcrumbBuilder\ItemCollection();
        $itemCollection->setItems([$applicationItem, $pageItem, $actionItem]);

        $this->assertSame(3, $itemCollection->count());
    }
}
