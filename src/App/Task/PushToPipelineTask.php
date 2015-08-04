<?php
namespace App\Task;

use App\MQ\Producer\ChangeProducer;
use App\MQ\VO\ChangeVO;
use DateTime;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Value;
use Skrz\Console\AbstractTask;
use Skrz\DependencyInjection\Annotation\Task;

/**
 * @author Jan Klat <jenik@klatys.cz>
 *
 * @Task("task.pipeline.push")
 */
class PushToPipelineTask extends AbstractTask
{
	/**
	 * @var ChangeProducer
	 *
	 * @Autowired
	 */
	public $changeProducer;

	/**
	 * @var string
	 *
	 * @Value("%application.name%")
	 */
	public $applicationName;

	public function configure()
	{
		$this->setDescription("Pushes example change to MQ");
	}

	public function work()
	{
		try {
			$message = ChangeVO::create();
			$message->setDatetime(new DateTime())
				->setMessage("Hi there!");

			$this->changeProducer->publish($message);
		} catch (\Exception $e) {
			$this->log->critical("Couldn't push to pipeline. Possible missing rabbit on your machine?");
			throw $e;
		}
	}

}