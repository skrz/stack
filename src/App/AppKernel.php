<?php
namespace App;

use Skrz\Bundle\AutowiringBundle\SkrzAutowiringBundle;
use Skrz\Bundle\BunnyBundle\SkrzBunnyBundle;
use Skrz\Kernel\SkrzKernel;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends SkrzKernel
{

	public function registerBundles()
	{
		return [
			new FrameworkBundle(),
			new SkrzAutowiringBundle(),
			new SkrzBunnyBundle(),
			new AppBundle(),
			new MonologBundle(),
		];
	}

	public function registerContainerConfiguration(LoaderInterface $loader)
	{
		$loader->load($this->getRootDir() . "/conf/services_" . $this->getEnvironment() . ".yml");

		if (file_exists($fileName = $this->getRootDir() . "/conf/services_local.yml")) {
			$loader->load($fileName);
		}
	}

	protected function getNamespace()
	{
		return "App";
	}

}
