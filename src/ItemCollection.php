<?php

namespace Vdhicts\Dicms\Breadcrumb;

class ItemCollection
{
    /**
     * Holds the items indexed by their id.
     * @var array
     */
    private $items = [];

    /**
     * Adds the item to the collection.
     * @param Item $item
     * @return ItemCollection
     */
    public function addItem(Item $item): ItemCollection
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Returns the amount of items in the collection.
     * @return int
     */
    public function count()
    {
        return count($this->getItems());
    }

    /**
     * Returns the items in the collection.
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Determines if the collection has any items.
     * @return bool
     */
    public function hasItems(): bool
    {
        return $this->count() !== 0;
    }

    /**
     * Stores the collection items.
     * @param array $items
     * @return $this
     */
    public function setItems(array $items): ItemCollection
    {
        $this->items = $items;

        return $this;
    }
}
