<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 1/8/2017
 * Time: 12:24 PM
 */

use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../app/autoload.php';
include_once __DIR__.'/../app/bootstrap.php.cache';

$listenPort = 9090;

$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();

$callback = function ($request, $response) use ($kernel) {

    $sfRequest = Request::createFromGlobals();
    $sfResponse = $kernel->handle($sfRequest);

    $sfStatusCode = $sfResponse->getStatusCode();
    $sfHeaders = $sfResponse->headers->all();
    $sfContent = $sfResponse->getContent();

    $response->writeHead($sfStatusCode, $sfHeaders);
    $response->end($sfContent);

    $kernel->terminate($sfRequest, $sfResponse);
};

$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);
$http = new React\Http\Server($socket);

$http->on('request', $callback);
$socket->listen($listenPort);
$loop->run();
