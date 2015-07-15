<?php
namespace App;

use Skrz\Console\AbstractCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{

	public function registerCommands(Application $application)
	{
		/** @var Container $container */
		$container = $this->container;

		foreach ($container->getServiceIds() as $serviceId) {
			$name = null;

			if (strncmp($serviceId, "command.", 8 /* strlen("command.") */) === 0) {
				$name = str_replace(".", ":", substr($serviceId, 8 /* strlen("command.") */));
			} elseif (strncmp($serviceId, "task.", 5 /* strlen("task.") */) === 0) {
				$name = str_replace(".", ":", $serviceId);
			}

			if ($name !== null && !$application->has($name)) {
				/** @var Command $command */
				$command = $this->container->get($serviceId);
				if ($command instanceof AbstractCommand) {
					/** @var AbstractCommand $command */
					$command->initializeCommand($name);
				}
				$application->add($command);
			}
		}
	}

}
