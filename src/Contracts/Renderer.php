<?php

namespace Vdhicts\Dicms\Breadcrumb\Contracts;

use Vdhicts\Dicms\Breadcrumb\ItemCollection;

interface Renderer
{
    /**
     * Renders the menu.
     * @param ItemCollection $itemCollection
     * @return string
     */
    public function generate(ItemCollection $itemCollection): string;
}
