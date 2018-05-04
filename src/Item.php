<?php

namespace Vdhicts\Dicms\Breadcrumb;

class Item
{
    /**
     * Holds the name.
     * @var string
     */
    private $name = '';
    /**
     * Holds the link.
     * @var string
     */
    private $link = null;
    /**
     * Holds the icon.
     * @var bool
     */
    private $icon = null;

    /**
     * BreadcrumbItem constructor.
     * @param string $name
     * @param string|null $link
     * @param string|null $icon
     */
    public function __construct(string $name = '', string $link = null, string $icon = null)
    {
        $this->setName($name);
        $this->setLink($link);
        $this->setIcon($icon);
    }

    /**
     * Returns the name.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Stores the name.
     * @param string $name
     */
    private function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the link.
     * @return string|null
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Determines if the item has a link.
     * @return bool
     */
    public function hasLink(): bool
    {
        return ! is_null($this->link);
    }

    /**
     * Stores the link.
     * @param string $link
     * @throws Exceptions\InvalidLinkException
     */
    private function setLink(string $link = null)
    {
        if (! is_null($link) && ! filter_var($link, FILTER_VALIDATE_URL)) {
            throw new Exceptions\InvalidLinkException($link);
        }

        $this->link = $link;
    }

    /**
     * Returns the icon.
     * @return string|null
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Determines if the item has an icon.
     * @return bool
     */
    public function hasIcon(): bool
    {
        return ! empty($this->icon);
    }

    /**
     * Stores the icon.
     * @param string $icon
     */
    private function setIcon(string $icon = null)
    {
        $this->icon = $icon;
    }
}
