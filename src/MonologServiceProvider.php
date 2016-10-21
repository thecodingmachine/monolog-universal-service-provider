<?php

namespace TheCodingMachine\Monolog;

use Interop\Container\ContainerInterface;
use Interop\Container\Factories\Alias;
use Interop\Container\ServiceProvider;
use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class MonologServiceProvider implements ServiceProvider
{
    public function getServices()
    {
        return [
            Logger::class => [ self::class, 'createLogger' ],
            LoggerInterface::class => new Alias(Logger::class)
        ];
    }

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
