<?php

namespace Michel;

use Buzz\Browser;

class Search
{
    public function __construct(Browser $browser = null)
    {
        $this->browser = $browser ?: new Browser;
    }

    public function __invoke(string $query): string
    {
        $query = http_build_query(['q' => $query]);

        try {
            return $this
                ->browser
                ->get(sprintf('http://api.github.com/search/users?%s', $query), ['User-Agent' => 'Awesome-Octocat-App'])
                ->getContent()
            ;
        } catch (Buzz\Exception\ExceptionInterface $exception) {
            throw new \Exception('Oups !!!!!', $exception);
        }
    }
}
