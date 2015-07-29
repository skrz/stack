<?php
namespace App\MQ\VO;

use DateTime;

/**
 * Example VO to play with in MQ
 *
 * @author Jan Klat <jenik@klatys.cz>
 */
class ChangeVO
{
	/**
	 * @var string
	 */
	protected $application;

	/**
	 * @var DateTime
	 */
	protected $datetime;

	/**
	 * @var string
	 */
	protected $hostname;

	/**
	 * @var string
	 */
	protected $message;

	public static function create()
	{
		return new self();
	}

	/**
	 * @return string
	 */
	public function getApplication()
	{
		return $this->application;
	}

	/**
	 * @param string $application
	 * @return self
	 */
	public function setApplication($application)
	{
		$this->application = $application;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDatetime()
	{
		return $this->datetime;
	}

	/**
	 * @param DateTime $datetime
	 * @return self
	 */
	public function setDatetime($datetime)
	{
		$this->datetime = $datetime;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getHostname()
	{
		return $this->hostname;
	}

	/**
	 * @param string $hostname
	 * @return self
	 */
	public function setHostname($hostname)
	{
		$this->hostname = $hostname;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * @param string $message
	 * @return self
	 */
	public function setMessage($message)
	{
		$this->message = $message;
		return $this;
	}

}