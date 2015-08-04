<?php
namespace App\MQ;

/**
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 */
final class RoutingKeys
{

	// changes
	const CHANGE_EXCHANGE = "change";

	const CHANGE_MANUAL = "change.manual";

	const CHANGE_MANUAL_DONE = "change.manual.done";

}
