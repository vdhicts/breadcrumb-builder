<?php

namespace Vdhicts\Dicms\Breadcrumb\Renderers;

use Vdhicts\Dicms\Breadcrumb\Item;
use Vdhicts\Dicms\Html;

abstract class BootstrapRenderer
{
    /**
     * Generates the icon.
     * @param Item $item
     * @return string
     */
    protected function generateIcon(Item $item): string
    {
        $iconHtml = new Html\Element('i');
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
     * @return Html\Element
     */
    protected function generateLink(Item $item, $text = ''): Html\Element
    {
        $linkHtml = new Html\Element('a');
        $linkHtml->setAttribute('href', $item->getLink());
        $linkHtml->setText($text);
        return $linkHtml;
    }
}
