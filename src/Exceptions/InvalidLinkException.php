<?php

namespace Vdhicts\BreadcrumbBuilder\Exceptions;

use Throwable;

class InvalidLinkException extends BreadcrumbBuilderException
{
    /**
     * InvalidLinkException constructor.
     * @param string $link
     * @param Throwable|null $previous
     */
    public function __construct($link, Throwable $previous = null)
    {
        parent::__construct(
            sprintf('Provided link "%s" should be a valid URL or null', $link),
            0,
            $previous
        );
    }
}
