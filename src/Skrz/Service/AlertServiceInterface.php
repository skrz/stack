<?php
namespace Skrz\Service;

interface AlertServiceInterface
{

	/**
	 * @param string $email
	 * @param string $subject
	 * @param string $content
	 * @return boolean
	 */
	public function sendEmailToAdmin($email, $subject, $content);

	/**
	 * @param string $email
	 * @param string $subject
	 * @param string $content
	 * @return boolean
	 */
	public function sendHtmlEmailToAdmin($email, $subject, $content);

}
