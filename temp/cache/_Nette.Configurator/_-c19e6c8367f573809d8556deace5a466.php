<?php //netteCache[01]000202a:2:{s:4:"time";s:21:"0.11157900 1308002361";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:32:"/var/www/MojoCMS/app/config.neon";i:2;i:1307803080;}}}?><?php
// source file /var/www/MojoCMS/app/config.neon

$container->addService('authenticator', function($container) {
	return call_user_func(
		array ( 0 => $container->getService('model'), 1 => 'getAuthenticatorService', ),
		$container
	);
}, NULL);

$container->addService('robotLoader', function($container) {
	return call_user_func(
		array ( 0 => 'Nette\\Configurator', 1 => 'createServicerobotLoader', ),
		$container
	);
}, array ( 0 => 'run', ));

$container->addService('database', function($container) {
	$class = 'Nette\\Database\\Connection'; $service = new $class($container->expand('sqlite2:%appDir%/models/demo.db'));
	return $service;
}, NULL);

$container->addService('model', function($container) {
	$class = 'Model'; $service = new $class($container->getService('database'));
	return $service;
}, NULL);

date_default_timezone_set('Europe/Prague');

Nette\Caching\Storages\FileStorage::$useDirectories = true;

foreach ($container->getServiceNamesByTag("run") as $name => $foo) { $container->getService($name); }
