<?php
namespace Skrz\DependencyInjection\Logging;

use Monolog\Handler\HandlerInterface;

class Logger extends \Monolog\Logger
{

	/**
	 * @param string $name
	 * @param HandlerInterface[] $handlers
	 * @param ProcessorInterface[] $processors
	 */
	public function __construct($name, array $handlers, array $processors)
	{
		parent::__construct($name, $handlers, $processors);
	}

}
