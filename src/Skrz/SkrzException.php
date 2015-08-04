<?php
namespace Skrz;

class SkrzException extends \Exception
{

	public static function create($message = "", $code = 0, \Exception $previous = null)
	{
		return new static($message, $code, $previous);
	}

}
