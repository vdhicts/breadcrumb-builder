<?php

namespace Vdhicts\BreadcrumbBuilder\Renderers;

use Vdhicts\BreadcrumbBuilder\Contracts;
use Vdhicts\BreadcrumbBuilder\Item;
use Vdhicts\BreadcrumbBuilder\ItemCollection;
use Vdhicts\HtmlElement\HtmlElement;

class BootstrapFourRenderer extends BootstrapRenderer implements Contracts\Renderer
{
    /**
     * Generates the breadcrumb item.
     * @param Item $item
     * @param bool $isLast
     * @return HtmlElement
     */
    private function generateItem(Item $item, $isLast = false)
    {
        $itemHtml = new HtmlElement('li');
        $itemHtml->setAttribute('class', 'breadcrumb-item');
        if ($isLast) {
            $itemHtml->addAttributeValue('class', 'active');
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

        $breadcrumbHtml = new HtmlElement('ol');
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
