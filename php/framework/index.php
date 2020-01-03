<?php
include './vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

// the URI being requested (e.g. /about) minus any query parameters
//
$request->getPathInfo();

// retrieve GET and POST variables respectively
// 分别取出GET和POST变量
$request->query->get('foo');
$request->request->get('bar', 'default value if bar does not exist');

// retrieve SERVER variables
// 取出SERVER变量
$request->server->get('HTTP_HOST');

// retrieves an instance of UploadedFile identified by foo
// 通过foo取出一个UploadedFile实例
$request->files->get('foo');

// retrieve a COOKIE value
// 取出一个COOKIE值
$request->cookies->get('PHPSESSID');

// retrieve an HTTP request header, with normalized, lowercase keys
// 通过取出一个HTTP请求头
$request->headers->get('host');
$request->headers->get('content_type');

$request->getMethod();    // GET, POST, PUT, DELETE, HEAD
// an array of languages the client accepts
// 客户端所能接受的语言之数组
$request->getLanguages();

$input = $request->get('name');

$response = new Response(sprintf('Hello %s',htmlspecialchars($input,ENT_QUOTES,'UTF-8')));

$response->prepare($request);

$response->send();