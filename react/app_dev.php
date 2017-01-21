<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 1/8/2017
 * Time: 12:29 PM
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

require __DIR__.'/../app/autoload.php';
Debug::enable();

$listenPort = 9091;

$kernel = new AppKernel('dev', true);
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