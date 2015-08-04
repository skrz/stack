<?php
namespace Skrz\Console;

use Monolog\Handler\RotatingFileHandler;
use Skrz\Bundle\AutowiringBundle\Annotation\Autowired;
use Skrz\Bundle\AutowiringBundle\Annotation\Value;
use Skrz\SkrzException;
use Skrz\Tool\Utils;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 */
abstract class AbstractTask extends AbstractCommand
{

	/**
	 * @var ContainerInterface
	 *
	 * @Autowired
	 */
	public $container;

	/**
	 * @var InputInterface
	 */
	protected $input;

	/**
	 * @var OutputInterface
	 */
	protected $output;

	/**
	 * @var int
	 *
	 * @Value("%rotating_log_max_files%")
	 */
	public $rotatingLogMaxFiles;

	/**
	 * @var string
	 *
	 * @Value("%email.developer%")
	 */
	public $devEmail;

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$this->input = $input;
		$this->output = $output;

		$className = Utils::getSimpleClassName(get_class($this));
		if (substr($className, -4) !== "Task") {
			throw new SkrzException(sprintf("Task class name has to end with 'Task', class: '%s'.", $className));
		}

		$taskLogDirectory = $this->container->getParameter("kernel.logs_dir");
		$this->log->pushHandler(new RotatingFileHandler(
			$taskLogDirectory . "/" . $className . ".log",
			$this->rotatingLogMaxFiles
		));

		try {
			$this->log->info("Task {$className} started.");
			$startTime = microtime(true);
			$this->work();
			$endTime = microtime(true);
			$this->log->info(sprintf("Task {$className} terminated with success in %.3fs.", $endTime - $startTime));

		} catch (\Exception $e) {
			if ($this->container->has("service.alert")) { // FIXME: do not rely on hostname
				/** @var AlertServiceInterface $alertService */
				$alertService = $this->container->get("service.alert");
				$alertService->sendEmailToAdmin(
					$this->devEmail,
					"[" . gethostname() . "]: Task " . get_class($this) . " failed with exception: " . $e->getMessage(),
					$e->getMessage() . "\n\n" . $e->getTraceAsString()
				);
			}

			$this->log->emergency(
				"Task terminated with exception. " . get_class($e) . ": " . $e->getMessage() . "\n\n" . $e->getTraceAsString()
			);
		}

		$this->log->popHandler();
	}

	/**
	 * Do actual work of task
	 *
	 * run() and execute() are taken... So name it work()...
	 *
	 * @return void
	 */
	abstract protected function work();

}
