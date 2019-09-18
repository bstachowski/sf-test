<?php


namespace App\Command;

use App\Entity\Messages;
use Psr\Container\ContainerInterface;
use Swift_Mailer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command {

    /**
     * @var Swift_Mailer
     */
    private $mailer;

    public function __construct(Swift_Mailer $mailer) {
        parent::__construct();

        $this->mailer = $mailer;
    }

    private $connection;

    public function __construct2(Connection $connection)
    {
        $this->connection = $connection;
        parent::__construct();
    }


    protected static $defaultName = 'app:testcommand';

    protected function configure() {
        $this
            ->setDescription("Test command")->setHelp("Test command helper")
            ->addArgument('from', InputArgument::REQUIRED, "set from address" )
            ->AddArgument('to', InputArgument::REQUIRED, "set to address");

    }

    protected function execute(InputInterface $input, OutputInterface $output) {


        $output->writeln("test");
        $output->writeln($input->getArgument('from'));
        $output->writeln($input->getArgument('to'));
        $message = (new \Swift_Message("Test message"))
            ->setFrom($input->getArgument('from'))
            ->setTo($input->getArgument('to'))
            ->setBody("Test message 2");


        $this->mailer->send($message);


        $sql = ('
            INSERT INTO messages(message_from, message_to, message_title, message_content, created_at, delivered_at, status)
            VALUES (:from, :to, :title, :content, :created, :delivered, :status)
        ');

        $this->connection->prepare


    }

}