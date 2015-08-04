<?php
namespace App\MQ\Producer;

use App\MQ\VO\ChangeVO;
use Skrz\Bundle\AutowiringBundle\Annotation\Value;
use Skrz\Bundle\BunnyBundle\AbstractProducer;
use Skrz\Bundle\BunnyBundle\Annotation\Producer;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Producer(
 *     exchange="change",
 *     beforeMethod="preProcessMessage",
 *     meta="App\MQ\VO\Meta\ChangeVOMeta"
 * )
 */
class ChangeProducer extends AbstractProducer
{
	/**
	 * @var string
	 *
	 * @Value("%application.name%")
	 */
	public $applicationName;

	public function preProcessMessage(ChangeVO $change)
	{
		$change
			->setHostname(gethostname())
			->setApplication($this->applicationName);
	}

}
