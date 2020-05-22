<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RoleUserCommand extends Command
{
    protected static $defaultName = 'app:role-user';
    
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Give access authorization to a user by adding a new role')
            ->addArgument('email', InputArgument::REQUIRED, 'Email address of a user who receives access')
            ->addArgument('roles', InputArgument::REQUIRED, 'Role add to the user')
            ->setHelp('This command allows to give "admin access permission" to a user')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $roles[] = $input->getArgument('roles');

        $userRepository = $this->entityManager->getRepository(User::class);
        $user = $userRepository->findOneEmail($email);

        if ($user) {
            $user->setRoles($roles);
            $this->entityManager->flush();

            $io->success('The role has been successfully add to the user');
        } else {
            $io->error('There is no user with that email address');
        }

        //if ($input->getOption('option1')) {
            // ...
        //}

        //$io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
