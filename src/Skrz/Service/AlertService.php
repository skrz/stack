<?php
namespace Skrz\Service;

use Skrz\Bundle\AutowiringBundle\Annotation\Service;

/**
 * @Service(name="service.alert", env="prod")
 * @Service(name="service.alert", env="console")
 */
class AlertService implements AlertServiceInterface
{

	/**
	 * @param string $email
	 * @param string $subject
	 * @param string $content
	 * @return bool
	 */
	public function sendEmailToAdmin($email, $subject, $content)
	{
		return mail(
			$email,
			$subject,
			"<pre>" . htmlspecialchars($content) . "</pre>",
			"Content-Type: text/html; charset=UTF-8\r\n"
		);
	}


	/**
	 * @param string $email
	 * @param string $subject
	 * @param string $content
	 * @return boolean
	 */
	public function sendHtmlEmailToAdmin($email, $subject, $content)
	{
		return mail(
			$email,
			$subject,
			$content,
			"Content-Type: text/html; charset=UTF-8\r\n"
		);
	}

}
