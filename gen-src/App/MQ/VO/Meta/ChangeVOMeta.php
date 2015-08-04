<?php
namespace App\MQ\VO\Meta;

use App\MQ\VO\ChangeVO;
use Skrz\Meta\JSON\JsonMetaInterface;
use Skrz\Meta\MetaInterface;
use Skrz\Meta\PHP\PhpMetaInterface;

/**
 * Meta class for \App\MQ\VO\ChangeVO
 *
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!!                                                     !!!
 * !!!   THIS CLASS HAS BEEN AUTO-GENERATED, DO NOT EDIT   !!!
 * !!!                                                     !!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
class ChangeVOMeta extends ChangeVO implements MetaInterface, PhpMetaInterface, JsonMetaInterface
{

	const CLASS_NAME = 'App\MQ\VO\ChangeVO';
	const ENTITY_NAME = 'changeVO';
	const APPLICATION = 'application';
	const DATETIME = 'datetime';
	const HOSTNAME = 'hostname';
	const MESSAGE = 'message';


	/** @var ChangeVOMeta */
	private static $instance;

	/**
	 * Mapping from group name to group ID for fromArray() and toArray()
	 *
	 * @var string[]
	 */
	private static $groups = array('' => 1, 'json:' => 2);


	/**
	 * Constructor
	 */
	private function __construct()
	{
		self::$instance = $this; // avoids cyclic dependency stack overflow
	}


	/**
	 * Returns instance of this meta class
	 *
	 * @return ChangeVOMeta
	 */
	public static function getInstance()
	{
		if (self::$instance === null) {
			new self(); // self::$instance assigned in __construct
		}
		return self::$instance;
	}


	/**
	 * Creates new instance of \App\MQ\VO\ChangeVO
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return ChangeVO
	 */
	public static function create()
	{
		switch (func_num_args()) {
			case 0:
				return new ChangeVO();
			case 1:
				return new ChangeVO(func_get_arg(0));
			case 2:
				return new ChangeVO(func_get_arg(0), func_get_arg(1));
			case 3:
				return new ChangeVO(func_get_arg(0), func_get_arg(1), func_get_arg(2));
			case 4:
				return new ChangeVO(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3));
			case 5:
				return new ChangeVO(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4));
			case 6:
				return new ChangeVO(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5));
			case 7:
				return new ChangeVO(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6));
			case 8:
				return new ChangeVO(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3), func_get_arg(4), func_get_arg(5), func_get_arg(6), func_get_arg(7));
			default:
				throw new \InvalidArgumentException('More than 8 arguments supplied, please be reasonable.');
		}
	}


	/**
	 * Resets properties of \App\MQ\VO\ChangeVO to default values
	 *
	 *
	 * @param ChangeVO $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return void
	 */
	public static function reset($object)
	{
		if (!($object instanceof ChangeVO)) {
			throw new \InvalidArgumentException('You have to pass object of class App\MQ\VO\ChangeVO.');
		}
		$object->application = NULL;
		$object->datetime = NULL;
		$object->hostname = NULL;
		$object->message = NULL;
	}


	/**
	 * Creates \App\MQ\VO\ChangeVO object from array
	 *
	 * @param array $input
	 * @param string $group
	 * @param ChangeVO $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return ChangeVO
	 */
	public static function fromArray($input, $group = NULL, $object = NULL)
	{
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'App\\MQ\\VO\\ChangeVO' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new ChangeVO();
		} elseif (!($object instanceof ChangeVO)) {
			throw new \InvalidArgumentException('You have to pass object of class App\MQ\VO\ChangeVO.');
		}

		if (($id & 1) > 0 && isset($input['application'])) {
			$object->application = $input['application'];
		} elseif (($id & 1) > 0 && array_key_exists('application', $input) && $input['application'] === NULL) {
			$object->application = NULL;
		}
		if (($id & 2) > 0 && isset($input['application'])) {
			$object->application = $input['application'];
		} elseif (($id & 2) > 0 && array_key_exists('application', $input) && $input['application'] === NULL) {
			$object->application = NULL;
		}

		if (($id & 1) > 0 && isset($input['datetime'])) {
			if ($input['datetime'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['datetime'];
			} elseif (is_numeric($input['datetime'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['datetime']));
			} elseif (is_string($input['datetime'])) {
				if ($input['datetime'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d H:i:s', $input['datetime']);
				}
			} elseif (is_array($input['datetime']) && isset($input['datetime']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['datetime']['date']);
			} elseif ($input['datetime'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d H:i:s' . '.');
			}
			$object->datetime = $datetimeInstanceReturn;
		} elseif (($id & 1) > 0 && array_key_exists('datetime', $input) && $input['datetime'] === NULL) {
			$object->datetime = NULL;
		}
		if (($id & 2) > 0 && isset($input['datetime'])) {
			if ($input['datetime'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['datetime'];
			} elseif (is_numeric($input['datetime'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['datetime']));
			} elseif (is_string($input['datetime'])) {
				if ($input['datetime'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d H:i:s', $input['datetime']);
				}
			} elseif (is_array($input['datetime']) && isset($input['datetime']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['datetime']['date']);
			} elseif ($input['datetime'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d H:i:s' . '.');
			}
			$object->datetime = $datetimeInstanceReturn;
		} elseif (($id & 2) > 0 && array_key_exists('datetime', $input) && $input['datetime'] === NULL) {
			$object->datetime = NULL;
		}

		if (($id & 1) > 0 && isset($input['hostname'])) {
			$object->hostname = $input['hostname'];
		} elseif (($id & 1) > 0 && array_key_exists('hostname', $input) && $input['hostname'] === NULL) {
			$object->hostname = NULL;
		}
		if (($id & 2) > 0 && isset($input['hostname'])) {
			$object->hostname = $input['hostname'];
		} elseif (($id & 2) > 0 && array_key_exists('hostname', $input) && $input['hostname'] === NULL) {
			$object->hostname = NULL;
		}

		if (($id & 1) > 0 && isset($input['message'])) {
			$object->message = $input['message'];
		} elseif (($id & 1) > 0 && array_key_exists('message', $input) && $input['message'] === NULL) {
			$object->message = NULL;
		}
		if (($id & 2) > 0 && isset($input['message'])) {
			$object->message = $input['message'];
		} elseif (($id & 2) > 0 && array_key_exists('message', $input) && $input['message'] === NULL) {
			$object->message = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \App\MQ\VO\ChangeVO to array
	 *
	 * @param ChangeVO $object
	 * @param string $group
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return array
	 */
	public static function toArray($object, $group = NULL)
	{
		if ($object === null) {
			return null;
		}
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'App\\MQ\\VO\\ChangeVO' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof ChangeVO)) {
			throw new \InvalidArgumentException('You have to pass object of class App\MQ\VO\ChangeVO.');
		}

		$output = array();

		if (($id & 1) > 0) {
			$output['application'] = $object->application;
		}
		if (($id & 2) > 0 && isset($object->application)) {
			$output['application'] = $object->application;
		}

		if (($id & 1) > 0) {
			if ($object->datetime === null) {
				$datetimeStringReturn = null;
			} elseif ($object->datetime instanceof \DateTime) {
				$datetimeStringReturn = $object->datetime->format('Y-m-d H:i:s');
			} elseif (is_numeric($object->datetime)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->datetime)))->format('Y-m-d H:i:s');
			} elseif (is_string($object->datetime)) {
				$datetimeStringReturn = (new \DateTime($object->datetime))->format('Y-m-d H:i:s');
			} elseif (is_array($object->datetime) && isset($object->datetime['date'])) {
				$datetimeStringReturn = (new \DateTime($object->datetime['date']))->format('Y-m-d H:i:s');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d H:i:s' . '.');
			}
			$output['datetime'] = $datetimeStringReturn;
		}
		if (($id & 2) > 0 && isset($object->datetime)) {
			if ($object->datetime === null) {
				$datetimeStringReturn = null;
			} elseif ($object->datetime instanceof \DateTime) {
				$datetimeStringReturn = $object->datetime->format('Y-m-d H:i:s');
			} elseif (is_numeric($object->datetime)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->datetime)))->format('Y-m-d H:i:s');
			} elseif (is_string($object->datetime)) {
				$datetimeStringReturn = (new \DateTime($object->datetime))->format('Y-m-d H:i:s');
			} elseif (is_array($object->datetime) && isset($object->datetime['date'])) {
				$datetimeStringReturn = (new \DateTime($object->datetime['date']))->format('Y-m-d H:i:s');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d H:i:s' . '.');
			}
			$output['datetime'] = $datetimeStringReturn;
		}

		if (($id & 1) > 0) {
			$output['hostname'] = $object->hostname;
		}
		if (($id & 2) > 0 && isset($object->hostname)) {
			$output['hostname'] = $object->hostname;
		}

		if (($id & 1) > 0) {
			$output['message'] = $object->message;
		}
		if (($id & 2) > 0 && isset($object->message)) {
			$output['message'] = $object->message;
		}

		return $output;
	}


	/**
	 * Creates \App\MQ\VO\ChangeVO object from object
	 *
	 * @param object $input
	 * @param string $group
	 * @param ChangeVO $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return ChangeVO
	 */
	public static function fromObject($input, $group = NULL, $object = NULL)
	{
		$input = (array)$input;

		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'App\\MQ\\VO\\ChangeVO' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if ($object === null) {
			$object = new ChangeVO();
		} elseif (!($object instanceof ChangeVO)) {
			throw new \InvalidArgumentException('You have to pass object of class App\MQ\VO\ChangeVO.');
		}

		if (($id & 1) > 0 && isset($input['application'])) {
			$object->application = $input['application'];
		} elseif (($id & 1) > 0 && array_key_exists('application', $input) && $input['application'] === NULL) {
			$object->application = NULL;
		}
		if (($id & 2) > 0 && isset($input['application'])) {
			$object->application = $input['application'];
		} elseif (($id & 2) > 0 && array_key_exists('application', $input) && $input['application'] === NULL) {
			$object->application = NULL;
		}

		if (($id & 1) > 0 && isset($input['datetime'])) {
			if ($input['datetime'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['datetime'];
			} elseif (is_numeric($input['datetime'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['datetime']));
			} elseif (is_string($input['datetime'])) {
				if ($input['datetime'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d H:i:s', $input['datetime']);
				}
			} elseif (is_array($input['datetime']) && isset($input['datetime']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['datetime']['date']);
			} elseif ($input['datetime'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d H:i:s' . '.');
			}
			$object->datetime = $datetimeInstanceReturn;
		} elseif (($id & 1) > 0 && array_key_exists('datetime', $input) && $input['datetime'] === NULL) {
			$object->datetime = NULL;
		}
		if (($id & 2) > 0 && isset($input['datetime'])) {
			if ($input['datetime'] instanceof \DateTime) {
				$datetimeInstanceReturn = $input['datetime'];
			} elseif (is_numeric($input['datetime'])) {
				$datetimeInstanceReturn = new \DateTime('@' . intval($input['datetime']));
			} elseif (is_string($input['datetime'])) {
				if ($input['datetime'] === '0000-00-00 00:00:00') {
					$datetimeInstanceReturn = null;
				} else {
					$datetimeInstanceReturn = \DateTime::createFromFormat('Y-m-d H:i:s', $input['datetime']);
				}
			} elseif (is_array($input['datetime']) && isset($input['datetime']['date'])) {
				$datetimeInstanceReturn = new \DateTime($input['datetime']['date']);
			} elseif ($input['datetime'] === null) {
				$datetimeInstanceReturn = null;
			} else {
				throw new \InvalidArgumentException('Could not deserialize date of format ' . 'Y-m-d H:i:s' . '.');
			}
			$object->datetime = $datetimeInstanceReturn;
		} elseif (($id & 2) > 0 && array_key_exists('datetime', $input) && $input['datetime'] === NULL) {
			$object->datetime = NULL;
		}

		if (($id & 1) > 0 && isset($input['hostname'])) {
			$object->hostname = $input['hostname'];
		} elseif (($id & 1) > 0 && array_key_exists('hostname', $input) && $input['hostname'] === NULL) {
			$object->hostname = NULL;
		}
		if (($id & 2) > 0 && isset($input['hostname'])) {
			$object->hostname = $input['hostname'];
		} elseif (($id & 2) > 0 && array_key_exists('hostname', $input) && $input['hostname'] === NULL) {
			$object->hostname = NULL;
		}

		if (($id & 1) > 0 && isset($input['message'])) {
			$object->message = $input['message'];
		} elseif (($id & 1) > 0 && array_key_exists('message', $input) && $input['message'] === NULL) {
			$object->message = NULL;
		}
		if (($id & 2) > 0 && isset($input['message'])) {
			$object->message = $input['message'];
		} elseif (($id & 2) > 0 && array_key_exists('message', $input) && $input['message'] === NULL) {
			$object->message = NULL;
		}

		return $object;
	}


	/**
	 * Serializes \App\MQ\VO\ChangeVO to object
	 *
	 * @param ChangeVO $object
	 * @param string $group
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return object
	 */
	public static function toObject($object, $group = NULL)
	{
		if ($object === null) {
			return null;
		}
		if (!isset(self::$groups[$group])) {
			throw new \InvalidArgumentException('Group \'' . $group . '\' not supported for ' . 'App\\MQ\\VO\\ChangeVO' . '.');
		} else {
			$id = self::$groups[$group];
		}

		if (!($object instanceof ChangeVO)) {
			throw new \InvalidArgumentException('You have to pass object of class App\MQ\VO\ChangeVO.');
		}

		$output = array();

		if (($id & 1) > 0) {
			$output['application'] = $object->application;
		}
		if (($id & 2) > 0 && isset($object->application)) {
			$output['application'] = $object->application;
		}

		if (($id & 1) > 0) {
			if ($object->datetime === null) {
				$datetimeStringReturn = null;
			} elseif ($object->datetime instanceof \DateTime) {
				$datetimeStringReturn = $object->datetime->format('Y-m-d H:i:s');
			} elseif (is_numeric($object->datetime)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->datetime)))->format('Y-m-d H:i:s');
			} elseif (is_string($object->datetime)) {
				$datetimeStringReturn = (new \DateTime($object->datetime))->format('Y-m-d H:i:s');
			} elseif (is_array($object->datetime) && isset($object->datetime['date'])) {
				$datetimeStringReturn = (new \DateTime($object->datetime['date']))->format('Y-m-d H:i:s');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d H:i:s' . '.');
			}
			$output['datetime'] = $datetimeStringReturn;
		}
		if (($id & 2) > 0 && isset($object->datetime)) {
			if ($object->datetime === null) {
				$datetimeStringReturn = null;
			} elseif ($object->datetime instanceof \DateTime) {
				$datetimeStringReturn = $object->datetime->format('Y-m-d H:i:s');
			} elseif (is_numeric($object->datetime)) {
				$datetimeStringReturn = (new \DateTime('@' . intval($object->datetime)))->format('Y-m-d H:i:s');
			} elseif (is_string($object->datetime)) {
				$datetimeStringReturn = (new \DateTime($object->datetime))->format('Y-m-d H:i:s');
			} elseif (is_array($object->datetime) && isset($object->datetime['date'])) {
				$datetimeStringReturn = (new \DateTime($object->datetime['date']))->format('Y-m-d H:i:s');
			} else {
				throw new \InvalidArgumentException('Could not serialize date of format ' . 'Y-m-d H:i:s' . '.');
			}
			$output['datetime'] = $datetimeStringReturn;
		}

		if (($id & 1) > 0) {
			$output['hostname'] = $object->hostname;
		}
		if (($id & 2) > 0 && isset($object->hostname)) {
			$output['hostname'] = $object->hostname;
		}

		if (($id & 1) > 0) {
			$output['message'] = $object->message;
		}
		if (($id & 2) > 0 && isset($object->message)) {
			$output['message'] = $object->message;
		}

		return (object)$output;
	}


	/**
	 * Creates \App\MQ\VO\ChangeVO from JSON array / JSON serialized string
	 *
	 * @param array|string $json
	 * @param string $group
	 * @param ChangeVO $object
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return ChangeVO
	 */
	public static function fromJson($json, $group = NULL, $object = NULL)
	{
		if (is_array($json)) {
			// ok, nothing to do here
		} elseif (is_string($json)) {
			$decoded = json_decode($json, true);
			if ($decoded === null && $json !== '' && strcasecmp($json, 'null')) {
				throw new \InvalidArgumentException('Could not decode given JSON: ' . $json . '.');
			}
			$json = $decoded;
		} else {
			throw new \InvalidArgumentException('Expected array, or string, ' . gettype($json) . ' given.');
		}

		return self::fromObject($json, 'json:' . $group, $object);
	}


	/**
	 * Serializes \App\MQ\VO\ChangeVO to JSON string
	 *
	 * @param ChangeVO $object
	 * @param string $group
	 * @param int $options
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @return string
	 */
	public static function toJson($object, $group = NULL, $options = 0)
	{
		return json_encode(self::toObject($object, 'json:' . $group), $options);
	}


	/**
	 * Serializes \App\MQ\VO\ChangeVO to JSON string (only for BC, TO BE REMOVED)
	 *
	 * @param ChangeVO $object
	 * @param string $group
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @deprecated
	 *
	 * @return string
	 */
	public static function toJsonString($object, $group = NULL)
	{
		return self::toJson($object, $group);
	}


	/**
	 * Serializes \App\MQ\VO\ChangeVO to JSON pretty string (only for BC, TO BE REMOVED)
	 *
	 * @param ChangeVO $object
	 * @param string $group
	 *
	 * @throws \InvalidArgumentException
	 *
	 * @deprecated
	 *
	 * @return string
	 */
	public static function toJsonStringPretty($object, $group = NULL)
	{
		return self::toJson($object, $group, JSON_PRETTY_PRINT);
	}

}
