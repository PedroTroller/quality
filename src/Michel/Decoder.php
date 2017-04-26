<?php

namespace Michel;

use Zend\Json\Json;
use Michel\User;

class Decoder
{
    public function decode(string $result)
    {
        $data = Json::decode($result, true);

        return array_map(function (array $item) {
            return new User($item);
        }, $data['items']);
    }
}
