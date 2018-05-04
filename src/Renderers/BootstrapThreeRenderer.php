<?php

namespace Vdhicts\Dicms\Breadcrumb\Renderers;

use Vdhicts\Dicms\Breadcrumb\Contracts;
use Vdhicts\Dicms\Breadcrumb\Item;
use Vdhicts\Dicms\Breadcrumb\ItemCollection;
use Vdhicts\Dicms\Html;

class BootstrapThreeRenderer extends BootstrapRenderer implements Contracts\Renderer
{
    /**
     * Generates the breadcrumb item.
     * @param Item $item
     * @param bool $isLast
     * @return Html\Element
     */
    private function generateItem(Item $item, $isLast = false)
    {
        $itemHtml = new Html\Element('li');
        if ($isLast) {
            $itemHtml->setAttribute('class', 'active');
        }

        $text = $this->generateText($item);

        if ($item->hasLink()) {
            $linkHtml = $this->generateLink($item);
            $linkHtml->setText($text);
            $itemHtml->inject($linkHtml);
        } else {
            $itemHtml->setText($text);
        }

        return $itemHtml;
    }

    /**
     * Generates the breadcrumb.
     * @param ItemCollection $itemCollection
     * @return string
     */
    public function generate(ItemCollection $itemCollection): string
    {
        if (! $itemCollection->hasItems()) {
            return '';
        }

        $breadcrumbHtml = new Html\Element('ol');
        $breadcrumbHtml->setAttribute('class', 'breadcrumb');

        $breadcrumbItemCounter = 1;
        foreach($itemCollection->getItems() as $breadcrumbItem) {
            $breadcrumbItemHtml = $this->generateItem($breadcrumbItem, $breadcrumbItemCounter === $itemCollection->count());
            $breadcrumbHtml->inject($breadcrumbItemHtml);

            $breadcrumbItemCounter++;
        }

        return $breadcrumbHtml->generate();
    }
}
