<?php

use PHPUnit\Framework\TestCase;
use Vdhicts\BreadcrumbBuilder;

class BuilderTest extends TestCase
{
    private function getBaseItemCollection()
    {
        $applicationItem = new BreadcrumbBuilder\Item('Application',null, 'bars');
        $pageItem = new BreadcrumbBuilder\Item('Page', 'http://www.example.com/page');
        $actionItem = new BreadcrumbBuilder\Item('Add', 'http://www.example.com/page/add', 'plus');

        $itemCollection = new BreadcrumbBuilder\ItemCollection();
        $itemCollection->addItem($applicationItem)
            ->addItem($pageItem)
            ->addItem($actionItem);

        return $itemCollection;
    }

    public function testBootstrap3RenderWithEmptyCollection()
    {
        $emptyBuilder = new BreadcrumbBuilder\Builder(new BreadcrumbBuilder\ItemCollection(), new BreadcrumbBuilder\Renderers\BootstrapThreeRenderer());
        $this->assertSame('', $emptyBuilder->generate());
    }

    public function testBootrap3Render()
    {
        $builder = new BreadcrumbBuilder\Builder($this->getBaseItemCollection(), new BreadcrumbBuilder\Renderers\BootstrapThreeRenderer());

        $this->assertInstanceOf(BreadcrumbBuilder\Builder::class, $builder);
        $this->assertInstanceOf(BreadcrumbBuilder\ItemCollection::class, $builder->getItemCollection());
        $this->assertInstanceOf(BreadcrumbBuilder\Renderers\BootstrapThreeRenderer::class, $builder->getRenderer());

        $expectedHtml = '<ol class="breadcrumb"><li><i class="fa fa-fw fa-bars"></i> Application</li><li><a href="http://www.example.com/page">Page</a></li><li class="active"><a href="http://www.example.com/page/add"><i class="fa fa-fw fa-plus"></i> Add</a></li></ol>';
        $generatedHtml = $builder->generate();

        $this->assertSame($expectedHtml, $generatedHtml);
    }

    public function testBootstrap4RenderWithEmptyCollection()
    {
        $emptyBuilder = new BreadcrumbBuilder\Builder(new BreadcrumbBuilder\ItemCollection(), new BreadcrumbBuilder\Renderers\BootstrapFourRenderer());
        $this->assertSame('', $emptyBuilder->generate());
    }

    public function testBootrap4Render()
    {
        $builder = new BreadcrumbBuilder\Builder($this->getBaseItemCollection(), new BreadcrumbBuilder\Renderers\BootstrapFourRenderer());

        $this->assertInstanceOf(BreadcrumbBuilder\Builder::class, $builder);
        $this->assertInstanceOf(BreadcrumbBuilder\ItemCollection::class, $builder->getItemCollection());
        $this->assertInstanceOf(BreadcrumbBuilder\Renderers\BootstrapFourRenderer::class, $builder->getRenderer());

        $expectedHtml = '<ol class="breadcrumb"><li class="breadcrumb-item"><i class="fa fa-fw fa-bars"></i> Application</li><li class="breadcrumb-item"><a href="http://www.example.com/page">Page</a></li><li class="breadcrumb-item active"><a href="http://www.example.com/page/add"><i class="fa fa-fw fa-plus"></i> Add</a></li></ol>';
        $generatedHtml = $builder->generate();

        $this->assertSame($expectedHtml, $generatedHtml);
    }
}
