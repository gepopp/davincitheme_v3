<?php

declare(strict_types=1);

namespace JeroenDesloovere\VCard\Property;

use JeroenDesloovere\VCard\Parser\Property\URIParser;
use JeroenDesloovere\VCard\Exception\PropertyException;
use JeroenDesloovere\VCard\Formatter\Property\URIFormatter;
use JeroenDesloovere\VCard\Formatter\Property\EmailFormatter;
use JeroenDesloovere\VCard\Formatter\Property\NodeFormatterInterface;
use JeroenDesloovere\VCard\Parser\Property\EmailParser;
use JeroenDesloovere\VCard\Parser\Property\NodeParserInterface;
use JeroenDesloovere\VCard\Property\Parameter\Type;

final class URL implements PropertyInterface, NodeInterface
{
    /** @var null|string */
    private $url;

    /** @var Type */
    private $type;

    /**
     * @param null|string $url
     * @param Type|null $type
     * @throws PropertyException
     */
    public function __construct(?string $url = null, Type $type = null)
    {
        if ($url === null && $type === null) {
            throw PropertyException::forEmptyProperty();
        }

        $this->url = $url;
        $this->type = $type ?? Type::home();
    }

    public function getFormatter(): NodeFormatterInterface
    {
        return new URIFormatter($this);
    }

    public static function getNode(): string
    {
        return 'URL';
    }

    public static function getParser(): NodeParserInterface
    {
        return new URIParser();
    }

    public function isAllowedMultipleTimes(): bool
    {
        return true;
    }

    public function getEmail(): ?string
    {
        return $this->url;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function setType(Type $type)
    {
        $this->type = $type;
    }
}
