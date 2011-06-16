<?php

use Nette\Diagnostics\Debugger,
    Nette\Application\Routers\Route,
    Nette\Application\Routers\SimpleRouter,
    Nette\Application\Routers\RouteList;

// Load Nette Framework
// this allows load Nette Framework classes automatically so that
// you don't have to litter your code with 'require' statements
require LIBS_DIR . '/Nette/loader.php';


// Enable Nette\Debug for error visualisation & logging
Debugger::enable();


// Load configuration from config.neon file
$configurator = new Nette\Configurator;
$configurator->loadConfig(__DIR__ . '/config.neon');
$context = $configurator->getContainer();


// Configure application
$application = $context->application;


// Setup router
$application->onStartup[] = function() use ($application, $context) {
            $router = $application->getRouter();

            // mod_rewrite

            $router[] = new Route('index.php', 'Front:Default:default', Route::ONE_WAY);

            $router[] = $adminRouter = new RouteList('Admin');
            $adminRouter[] = new Route('admin/<presenter>/<action>[/<id>]', 'Dashboard:default');

            $first_page = $context->model->findFirstPage(); // vybere první záznam z tabulky pages

            $router[] = $frontRouter = new RouteList('Front');
            $frontRouter[] = new Route('<slug [a-z0-9_-]+>', array(
                        'presenter' => 'Default',
                        'action' => 'page',
                        'slug' => $first_page->slug // slug prvního záznamu
                    ));


            //	$router[] = new SimpleRouter('Front:Default:default');
        };


// Run the application!
$application->run();
