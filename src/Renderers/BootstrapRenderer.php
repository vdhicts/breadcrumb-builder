<?php

namespace Vdhicts\BreadcrumbBuilder\Renderers;

use Vdhicts\BreadcrumbBuilder\Item;
use Vdhicts\HtmlElement\HtmlElement;

abstract class BootstrapRenderer
{
    /**
     * Generates the icon.
     * @param Item $item
     * @return string
     */
    protected function generateIcon(Item $item): string
    {
        $iconHtml = new HtmlElement('i');
        $iconHtml->setAttribute('class', 'fa fa-fw fa-' . $item->getIcon());
        return $iconHtml->generate();
    }

    /**
     * Generates the text.
     * @param Item $item
     * @return string
     */
    protected function generateText(Item $item): string
    {
        $text = $item->getName();
        if ($item->hasIcon()) {
            $text = $this->generateIcon($item) . ' ' . $text;
        }

        return $text;
    }

    /**
     * Generates the link.
     * @param Item $item
     * @param string $text
     * @return HtmlElement
     */
    protected function generateLink(Item $item, $text = ''): HtmlElement
    {
        $linkHtml = new HtmlElement('a');
        $linkHtml->setAttribute('href', $item->getLink());
        $linkHtml->setText($text);
        return $linkHtml;
    }
}
