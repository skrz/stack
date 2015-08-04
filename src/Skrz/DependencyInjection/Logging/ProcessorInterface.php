<?php
namespace Skrz\DependencyInjection\Logging;

interface ProcessorInterface
{

	public function __invoke(array $record);

}
