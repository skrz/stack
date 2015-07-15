<?php
namespace App;

use Symfony\Component\HttpFoundation\Request;
use Tracy\Debugger;

require_once __DIR__ . "/../vendor/autoload.php";

$env = isset($_SERVER["APP_ENV"]) ? $_SERVER["APP_ENV"] : "prod";

Debugger::enable($env === "dev", __DIR__ . "/../log");

$request = Request::createFromGlobals();
$kernel = new AppKernel($env, $env === "dev");
$response = $kernel->handle($request);

if ($env === "dev") {
	// ->send() calls fastcgi_finish_request(), so no other content would get rendered (e.g. Tracy debug bar)
	$response->sendHeaders();
	$response->sendContent();
} else {
	$response->send();
}

$kernel->terminate($request, $response);
