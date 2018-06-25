<?php
/**
 * Uxie - A PHP Framework.
 *
 * @author M.Amine Cheribet <MohamedAmine1c@gmail.com>
 */

// import composer autoloader
require_once '../vendor/autoload.php';

// create IOC container
IOC\IOC::createContainer();
// Load .env file
container()->build('Dotenv\Dotenv', [rootDir()]);
container()->Dotenv->load();
// Load configuration
require rootDir().'defaults.php';

// preapring for starting application
container()->build('Kernel\Kernel');

container()->Kernel->prepare();

// start the application
container()->Kernel->start();

// stop the application
container()->Kernel->stop();
