<?php

namespace Michel;

class User
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        if (false === array_key_exists('login', $this->data)) {
            return;
        }

        return $this->data['login'];
    }
}
