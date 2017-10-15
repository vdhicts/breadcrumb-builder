<?php

namespace Vdhicts\BreadcrumbBuilder\Contracts;

use Vdhicts\BreadcrumbBuilder\ItemCollection;

interface Renderer
{
    /**
     * Renders the menu.
     * @param ItemCollection $itemCollection
     * @return string
     */
    public function generate(ItemCollection $itemCollection): string;
}
