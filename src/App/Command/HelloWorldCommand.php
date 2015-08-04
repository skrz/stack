<?php
namespace App\Command;

use Skrz\Bundle\AutowiringBundle\Annotation\Component;
use Skrz\Bundle\AutowiringBundle\Annotation\Value;
use Skrz\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Component("command.hello")
 */
class HelloWorldCommand extends AbstractCommand
{

	/**
	 * @var string
	 *
	 * @Value("%hello_world_command_message%")
	 */
	public $message;

	protected function configure()
	{
		$this->setDescription("Greets the whole world!");
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$output->writeln($this->message);
	}

}
