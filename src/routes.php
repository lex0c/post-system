<?php

use Zend\Diactoros\ServerRequestFactory;
use Aura\Router\RouterContainer;
use Zend\Diactoros\Response;
use Slim\Views\PhpRenderer;

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$routerContainer = new RouterContainer();
$generator = $routerContainer->getGenerator();
$map = $routerContainer->getMap();
$view = new PhpRenderer(__DIR__ . "/../template/");

$entityManager = getEntityManager();

$map->get("home", "/", function($request, $response) use ($view) {
    return $view->render($response, "home.php", ["test" => "Ok!"]);
});


require_once __DIR__ . "/categories.php";
require_once __DIR__ . "/post.php";


$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
foreach($route->attributes as $key => $value){
    $request = $request->withAttribute($key, $value);
}

$callable = $route->handler;
/** @var Response $response */
$response = $callable($request, new Response());

if($response instanceof Response\RedirectResponse) {
    header("location:{$response->getHeader("location")[0]}");
} elseif($response instanceof Response) {
    echo $response->getBody();
}
