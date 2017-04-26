<?php

namespace Michel;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class Command extends SymfonyCommand
{
    public function configure()
    {
        $this
            ->setName('user')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $givenName = $this->getHelper('question')->ask($input, $output, new Question('Given name ? '));
        $familyName = $this->getHelper('question')->ask($input, $output, new Question('Family name ? '));

        $query = new Query($giv3nName, $familyName);
        $search = new Search();
        $decoder = new Decoder();
        $users = $decoder->decode($search($query));

        if (empty($users)) {
            $output->writeln('<error>No result found</error>');

            return 1;
        }

        foreach ($users as $user) {
            $output->writeln(sprintf('<info>User %s found !</info>', $user->getLogin()));
        }
    }
}
