<?php
namespace Skrz\Tool;

/**
 * Utility functions
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 */
class Utils
{
	/**
	 * Return simple class name of qualified class name
	 *
	 * E.g. Skrz\Tool\Utils -> Utils
	 *
	 * @param $className
	 * @return string
	 */
	public static function getSimpleClassName($className)
	{
		if (($p = strrpos($className, "\\")) !== false) {
			return substr($className, $p + 1);
		} else {
			return $className;
		}
	}
}