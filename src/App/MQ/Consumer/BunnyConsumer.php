<?php
namespace App\MQ\Consumer;

use App\MQ\Producer\ChangeProducer;
use App\MQ\RoutingKeys;
use App\MQ\VO\ChangeVO;
use App\MQ\VO\Meta\ChangeVOMeta;
use Bunny\Channel;
use Bunny\Message;
use Psr\Log\LoggerInterface;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\BunnyBundle\Annotation\Consumer;

/**
 * @author Jan Klat <jenik@klatys.cz>
 *
 * @Consumer(
 *     queue="bunny_queue",
 *     meta="App\MQ\VO\Meta\ChangeVOMeta",
 *     maxMessages=5000,
 *     maxSeconds=3600.0,
 *     setUpMethod="setUp",
 *     tickMethod="tick",
 *     tickSeconds=60.0
 * )
 */
class BunnyConsumer
{

	/**
	 * @var ChangeProducer
	 *
	 * @Autowired
	 */
	public $changeDoneProducer;

	/**
	 * @var LoggerInterface
	 *
	 * @Autowired
	 */
	public $log;

	public function setUp()
	{
		$this->log->debug("Bunny consumer is up. All systems operational!");
	}

	public function handleMessage(ChangeVO $change, Message $message, Channel $channel)
	{
		if ($message->routingKey === RoutingKeys::CHANGE_MANUAL_DONE) {
			$this->log->info("BREAKING CYCLE: " . ChangeVOMeta::toJson($change) . ".");
			$channel->ack($message);
			return;
		} else {
			$this->log->debug(
				"Got message '" . $change->getMessage() . "' created at " . $change->getDatetime()->format("Y-m-d H:i:s") . " via application "
				. $change->getApplication() . " on host " . $change->getHostname() . " Acking..."
			);
			$channel->ack($message);
			$this->changeDoneProducer->publish($change, RoutingKeys::CHANGE_MANUAL_DONE);
		}
	}

	public function tick()
	{
		$this->log->debug("Heartbeat");
	}
}
