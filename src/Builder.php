<?php

namespace Vdhicts\Dicms\Breadcrumb;

class Builder
{
    /**
     * Holds the item collection.
     * @var ItemCollection
     */
    private $itemCollection;

    /**
     * Holds the renderer.
     * @var Contracts\Renderer
     */
    private $renderer;

    /**
     * Builder constructor.
     * @param ItemCollection $itemCollection
     * @param Contracts\Renderer $renderer
     */
    public function __construct(ItemCollection $itemCollection, Contracts\Renderer $renderer)
    {
        $this->setItemCollection($itemCollection);
        $this->setRenderer($renderer);
    }

    /**
     * Returns the item collection.
     * @return ItemCollection
     */
    public function getItemCollection(): ItemCollection
    {
        return $this->itemCollection;
    }

    /**
     * Stores the item collection.
     * @param ItemCollection $itemCollection
     * @return Builder
     */
    private function setItemCollection(ItemCollection $itemCollection): Builder
    {
        $this->itemCollection = $itemCollection;

        return $this;
    }

    /**
     * Returns the renderer.
     * @return Contracts\Renderer
     */
    public function getRenderer(): Contracts\Renderer
    {
        return $this->renderer;
    }

    /**
     * Stores the renderer.
     * @param Contracts\Renderer $renderer
     * @return Builder
     */
    private function setRenderer(Contracts\Renderer $renderer): Builder
    {
        $this->renderer = $renderer;

        return $this;
    }

    /**
     * Builds the breadcrumb.
     * @return string
     */
    public function generate(): string
    {
        return $this->getRenderer()
            ->generate($this->getItemCollection());
    }
}
