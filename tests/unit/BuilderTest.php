<?php

use PHPUnit\Framework\TestCase;
use Vdhicts\Dicms\Breadcrumb;

class BuilderTest extends TestCase
{
    private function getBaseItemCollection()
    {
        $applicationItem = new Breadcrumb\Item('Application',null, 'bars');
        $pageItem = new Breadcrumb\Item('Page', 'http://www.example.com/page');
        $actionItem = new Breadcrumb\Item('Add', 'http://www.example.com/page/add', 'plus');

        $itemCollection = new Breadcrumb\ItemCollection();
        $itemCollection->addItem($applicationItem)
            ->addItem($pageItem)
            ->addItem($actionItem);

        return $itemCollection;
    }

    public function testBootstrap3RenderWithEmptyCollection()
    {
        $emptyBuilder = new Breadcrumb\Builder(new Breadcrumb\ItemCollection(), new Breadcrumb\Renderers\BootstrapThreeRenderer());
        $this->assertSame('', $emptyBuilder->generate());
    }

    public function testBootrap3Render()
    {
        $builder = new Breadcrumb\Builder($this->getBaseItemCollection(), new Breadcrumb\Renderers\BootstrapThreeRenderer());

        $this->assertInstanceOf(Breadcrumb\Builder::class, $builder);
        $this->assertInstanceOf(Breadcrumb\ItemCollection::class, $builder->getItemCollection());
        $this->assertInstanceOf(Breadcrumb\Renderers\BootstrapThreeRenderer::class, $builder->getRenderer());

        $expectedHtml = '<ol class="breadcrumb"><li><i class="fa fa-fw fa-bars"></i> Application</li><li><a href="http://www.example.com/page">Page</a></li><li class="active"><a href="http://www.example.com/page/add"><i class="fa fa-fw fa-plus"></i> Add</a></li></ol>';
        $generatedHtml = $builder->generate();

        $this->assertSame($expectedHtml, $generatedHtml);
    }

    public function testBootstrap4RenderWithEmptyCollection()
    {
        $emptyBuilder = new Breadcrumb\Builder(new Breadcrumb\ItemCollection(), new Breadcrumb\Renderers\BootstrapFourRenderer());
        $this->assertSame('', $emptyBuilder->generate());
    }

    public function testBootrap4Render()
    {
        $builder = new Breadcrumb\Builder($this->getBaseItemCollection(), new Breadcrumb\Renderers\BootstrapFourRenderer());

        $this->assertInstanceOf(Breadcrumb\Builder::class, $builder);
        $this->assertInstanceOf(Breadcrumb\ItemCollection::class, $builder->getItemCollection());
        $this->assertInstanceOf(Breadcrumb\Renderers\BootstrapFourRenderer::class, $builder->getRenderer());

        $expectedHtml = '<ol class="breadcrumb"><li class="breadcrumb-item"><i class="fa fa-fw fa-bars"></i> Application</li><li class="breadcrumb-item"><a href="http://www.example.com/page">Page</a></li><li class="breadcrumb-item active"><a href="http://www.example.com/page/add"><i class="fa fa-fw fa-plus"></i> Add</a></li></ol>';
        $generatedHtml = $builder->generate();

        $this->assertSame($expectedHtml, $generatedHtml);
    }
}
