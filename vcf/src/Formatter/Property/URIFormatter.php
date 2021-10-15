<?php

declare(strict_types=1);

namespace JeroenDesloovere\VCard\Formatter\Property;

use JeroenDesloovere\VCard\Property\URL;
use JeroenDesloovere\VCard\Property\Email;

final class URIFormatter extends NodeFormatter implements NodeFormatterInterface
{
    /** @var Email */
    protected $url;

    public function __construct(URL $url)
    {
        $this->url = $url;
    }

    public function getVcfString(): string
    {
        return $this->url::getNode() . ';TYPE=' . $this->url->getType()->__toString() . ':' . $this->url->getEmail();
    }
}
