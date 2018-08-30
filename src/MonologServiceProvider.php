<?php

namespace TheCodingMachine\Monolog;

use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use TheCodingMachine\Funky\Annotations\Factory;
use TheCodingMachine\Funky\ServiceProvider;

class MonologServiceProvider extends ServiceProvider
{
    /**
     * @Factory(aliases={LoggerInterface::class})
     */
    public static function createLogger(ContainerInterface $container) : Logger
    {
        $logger = new Logger('default');

        if ($container->has('monologHandlers')) {
            $logger->setHandlers($container->get('monologHandlers'));
        } else {
            $logger->pushHandler(new ErrorLogHandler());
        }

        return $logger;
    }
}
