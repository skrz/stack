<?php
namespace App\Controller;

use Skrz\Bundle\AutowiringBundle\Annotation\Controller;
use Skrz\Bundle\AutowiringBundle\Annotation\Value;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 *
 * @Controller
 */
class HomepageController
{

	/**
	 * @var string
	 *
	 * @Value("%homepage_message%")
	 */
	public $message;

	public function homepageAction()
	{
		return Response::create($this->message, 200, ["Content-Type" => "text/html"]);
	}

}
