<?php

namespace Vdhicts\BreadcrumbBuilder;

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
     * @return $this
     */
    public function setName(string $name): Item
    {
        $this->name = $name;

        return $this;
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
     * @return Item
     * @throws Exceptions\InvalidLinkException
     */
    public function setLink(string $link = null): Item
    {
        if (! is_null($link) && ! filter_var($link, FILTER_VALIDATE_URL)) {
            throw new Exceptions\InvalidLinkException(sprintf(
                'Provided link "%s" should be a valid URL or null',
                $link
            ));
        }

        $this->link = $link;

        return $this;
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
     * @return $this
     */
    public function setIcon(string $icon = null): Item
    {
        $this->icon = $icon;

        return $this;
    }
}
