<?php
namespace Skrz\Kernel;

use Symfony\Component\Config\ConfigCache;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\HttpKernel\Kernel;

abstract class SkrzKernel extends Kernel
{

	abstract protected function getNamespace();

	public function getContainerClass()
	{
		return $this->getNamespace() . "\\DependencyInjection\\" . ucfirst($this->getEnvironment()) . "Container";
	}

	public function getRootDir()
	{
		return realpath(__DIR__ . "/../../..");
	}

	public function getGenSrcDir()
	{
		return $this->getRootDir() . "/gen-src";
	}

	public function getLogDir()
	{
		return $this->getRootDir() . "/log";
	}

	public function initializeContainer()
	{
		$class = $this->getContainerClass();
		$cache = new ConfigCache($this->getGenSrcDir() . "/" . str_replace("\\", "/", $class) . ".php", $this->debug);
		if (!$cache->isFresh()) {
			$container = $this->buildContainer();
			$container->compile();
			$this->dumpContainer($cache, $container, $class, $this->getContainerBaseClass());
		}

		require_once $cache->getPath();

		$this->container = new $class();
		$this->container->set("kernel", $this);
	}

	protected function dumpContainer(ConfigCache $cache, ContainerBuilder $container, $class, $baseClass)
	{
		$dumper = new PhpDumper($container);

		$namespace = null;
		if (($p = strrpos($class, "\\")) !== false) {
			$namespace = substr($class, 0, $p);
			$class = substr($class, $p + 1);
		}

		$content = $dumper->dump([
			"namespace" => $namespace,
			"class" => $class,
			"base_class" => $baseClass,
		]);

		$cache->write($content, $container->getResources());
	}

	public function setClassCache(array $classes)
	{
	}

}
