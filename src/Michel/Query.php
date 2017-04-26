<?php

namespace Michel;

class Query
{
    public function __construct($givenName, $familyName)
    {
        $this->givenName = $givenName;
        $this->familyName = $familyName;
    }

    public function __toString(): string
    {
        return trim(sprintf(
            '%s %s',
            $this->givenName,
            $this->familyName
        ));
    }
}
