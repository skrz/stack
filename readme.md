# Skrz\Stack

[![Downloads this Month](https://img.shields.io/packagist/dm/skrz/stack.svg)](https://packagist.org/packages/skrz/meta)

> Minimal @symfony installation with @SkrzCzDev's goodies

## Requirements

`Skrz\Stack` requires PHP `>= 5.4.0`, [RabbitMQ](https://www.rabbitmq.com/download.html) is optional, but required for full functionality.

## Installation

Via composer's create-project

```sh
$ composer create-project skrz/stack . dev-master
```

## Why?

At [Skrz.cz](http://skrz.cz/), we love symfony and are trying to get maximum out of it.
We also created a set of tools that make it even more usable + faster and wanted to share it with world.

## What's inside
Beside symfony we also included these goodies for your quick start
##### [Skrz/AutowiringBundle](https://github.com/skrz/autowiring-bundle#skrzbundleautowiringbundle)
No more writing all your classes into services.yml file. Just add annotation and let AutowiringBundle do the rest. For more information visit it's [repo](https://github.com/skrz/autowiring-bundle#skrzbundleautowiringbundle).
##### [Skrz/BunnyBundle](https://github.com/skrz/bunny-bundle)
Using Message queue in symfony has never been easier! We took ours  [@jakubkulhan](https://github.com/jakubkulhan)'s [Bunny](https://github.com/jakubkulhan/bunny) and using the AutowiringBundle made it possible to write and configure all your MQ resources with a single annotation.
##### [Skrz/Meta](https://github.com/skrz/meta)
If you have to pair your entities across multiple databases with different formats, Skrz/Meta takes care of making all the data available in the exact form you need.
##### [Nette/Tracy](https://github.com/nette/tracy)
Debugging tool you will love ♥. Nette framework's own debugging tool that allows you to handle all your troubles effectively.

###### And more...

## Usage

We added example's so that your start is even quicker

##### [HomepageController](https://github.com/skrz/stack/blob/master/src/App/Controller/HomepageController.php)
Shows how easy it is to autowire a value from your configuration. Also Uses `@Controller` annotation so that you don't need to specify this class in your services.yml file.
##### [HelloWorldCommand](https://github.com/skrz/stack/tree/master/src/App/Command/HelloWorldCommand.php)
Example of basic command usage. We use commands as occasional console tools. For task example see below
##### [PushToPipelineTask](https://github.com/skrz/stack/tree/master/src/App/Task/PushToPipelineTask.php)
Every task extends [AbstractTask Class](https://github.com/skrz/stack/tree/master/src/Skrz/Console/AbstractTask.php) which enhances it with
- [Monolog logger](https://github.com/Seldaek/monolog) including preset log rotating.
- [Alert service](https://github.com/skrz/stack/tree/master/src/Skrz/Service/AlertService.php) that notifies you every time task ends unexpectedly

This task calls pushes message via ChangeProducer to your RabbitMQ. Uses `@Task` annotation.
##### [ChangeProducer](https://github.com/skrz/stack/tree/master/src/App/MQ/Producer/ChangeProducer.php)
Shows how to push a message to MQ's exchange. Uses `@ProducerAnnotation`.
##### [BunnyConsumer](https://github.com/skrz/stack/tree/master/src/App/MQ/Consumer/BunnyConsumer.php)
Every message needs its consumer. This one only writes out its contents so far. Uses `@ConsumerAnnotation`.

### Basic MQ example
1. First of all you need to install RabbitMQ. See official instructions [here](https://www.rabbitmq.com/download.html)
2. After installation setup the exchange and queue with command

	```sh
	$ php console bunny:setup
	```
3. Run BunnyConsumer (for production manage of consumers you can use [Supervisor](http://supervisord.org/))

	```sh
	$ php console bunny:consumer bunny
	```
4. To push message to `change` exchange run task PushToPipeline

	```sh
	$ php console task:pipeline:push
	```
5. In bunny consumer log you can see that message was received and processed

	```sh
	[2015-07-29 22:54:11] App.DEBUG: Got message 'Hi there!' created at 2015-07-29 22:54:11 via application App on host Skrz.local Acking...
	```


## TODO

- [ ] Include Skrz/ORM
- [ ] Include Skrz/TemplatingBundle
- [ ] Tests
- [ ] PHP_CodeSniffer

## License

The MIT license. See `LICENSE` file.
