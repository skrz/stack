<?php
namespace Skrz\Console;

use Symfony\Component\Console\Command\Command;

class AbstractCommand extends Command
{

	public function __construct()
	{
		// do not call parent constructor!
		// it throws LogicException if command has no name
		// initialization is postponed to initializeCommand()
	}

	public function initializeCommand($name)
	{
		$this->setName($name);
		parent::__construct();
	}

}
