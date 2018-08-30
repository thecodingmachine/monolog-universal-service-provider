[![Latest Stable Version](https://poser.pugx.org/thecodingmachine/monolog-universal-service-provider/v/stable)](https://packagist.org/packages/thecodingmachine/monolog-universal-service-provider)
[![Latest Unstable Version](https://poser.pugx.org/thecodingmachine/monolog-universal-service-provider/v/unstable)](https://packagist.org/packages/thecodingmachine/monolog-universal-service-provider)
[![License](https://poser.pugx.org/thecodingmachine/monolog-universal-service-provider/license)](https://packagist.org/packages/thecodingmachine/monolog-universal-service-provider)

# Monolog universal module

This package integrates Monolog in any [container-interop](https://github.com/container-interop/service-provider) compatible framework/container.

## Installation

```
composer require thecodingmachine/monolog-universal-service-provider
```

Once installed, you need to register the [`TheCodingMachine\Monolog\MonologServiceProvider`](src/MonologServiceProvider.php) into your container.

If your container supports thecodingmachine/discovery integration, you have nothing to do. Otherwise, refer to your framework or container's documentation to learn how to register *service providers*.

## Introduction

This service provider is meant to integrate [Monolog](https://github.com/Seldaek/monolog) into any container compatible with container-interop/service-provider.

By default, this package creates a logger that logs in the PHP error log but you can easily add/change handlers.

## Expected values / services

This *service provider* expects the following configuration / services to be available:

| Name                        | Compulsory | Description                            |
|-----------------------------|------------|----------------------------------------|
| `monologHandlers`       | *no*       | An array of Monoog handlers. If not set, a default `ErrorLogHandler` will be used to log in the error log.  |


## Provided services

This *service provider* provides the following services:

| Service name                | Description                          |
|-----------------------------|--------------------------------------|
| `Monolog\Logger`              | the Monolog logger  |
| `Psr\Log\LoggerInterface`              | This is a simple alias to the Monolog logger |

## Extended services

*None*

<small>Project template courtesy of <a href="https://github.com/thecodingmachine/service-provider-template">thecodingmachine/service-provider-template</a></small>
