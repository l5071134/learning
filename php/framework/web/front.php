<?php

include (dirname(__DIR__).'/vendor/autoload.php');

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

use Symfony\Component\Routing\Matcher\CompiledUrlMatcher;
use Symfony\Component\Routing\Matcher\Dumper\CompiledUrlMatcherDumper;

$request = Request::createFromGlobals();

$response = new Response();

$path = $request->getPathInfo();

include (dirname(__DIR__).'/src/app.php');

$requestContext = new RequestContext();
$requestContext->fromRequest($request);

//$matcher = new UrlMatcher($route,$requestContext);

$compiledRoutes  = (new CompiledUrlMatcherDumper($route))->getCompiledRoutes();

$matcher = new CompiledUrlMatcher($compiledRoutes,$requestContext);

//
//$map = [
//  '/hello'=> dirname(__DIR__).'/src/pages/hello.php',
//  '/bye'=> dirname(__DIR__).'/src/pages/bye.php',
//];

try{
    ob_start();
    extract($matcher->match($request->getPathInfo()),EXTR_SKIP);
    include sprintf(dirname(__DIR__).'/src/pages/%s.php',$_route);
    $response->setContent(ob_get_clean());
}catch (\Symfony\Component\Routing\Exception\ResourceNotFoundException $e){
    $response->setStatusCode(404);
    $response->setContent($e->getMessage());
}catch (\Exception $e){
    $response->setStatusCode(500);
    $response->setContent($e->getMessage());
}

$response->send();
