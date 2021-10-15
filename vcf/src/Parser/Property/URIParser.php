<?php

declare(strict_types=1);

namespace JeroenDesloovere\VCard\Parser\Property;

use JeroenDesloovere\VCard\Property\Email;
use JeroenDesloovere\VCard\Property\NodeInterface;
use JeroenDesloovere\VCard\Property\Parameter\Type;

final class URIParser extends PropertyParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        $url = new URL($value);

        if (array_key_exists(Type::getNode(), $parameters)) {
            $url->setType($parameters[Type::getNode()]);
        }

        return $url;
    }
}
