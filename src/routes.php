<?php

use Zend\Diactoros\ServerRequestFactory;
use Aura\Router\RouterContainer;
use Zend\Diactoros\Response;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ServerRequestInterface;

use \App\entity\Category;

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

$map->get("categories.list", "/categories", 
        function($request, $response) use ($view, $entityManager) {
    $repository = $entityManager->getRepository(Category::class);
    $categories = $repository->findAll();
    return $view->render($response, "categories/list.php", [
        "categories" => $categories
    ]);
});

$map->get("categories.create", "/categories/create", 
        function($request, $response) use ($view) {
    return $view->render($response, "categories/create.php");
});

$map->post("categories.save", "/categories/save", 
        function(ServerRequestInterface $request, $response) use ($view, $entityManager, $generator) {
    $data = $request->getParsedBody();
    $category = new Category();
    $category->setName($data["name"]);
    $entityManager->persist($category);
    $entityManager->flush();
    
    $uri = $generator->generate("categories.list");
    return new Response\RedirectResponse($uri);
});

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
foreach($route->attributes as $key => $value){
    $request = $request->withAttribute($key, $value);
}

$callable = $route->handler;
/** @var Response $response */
$response = $callable($request, new Response());

if($response instanceof Response\RedirectResponse)
    header("location:{$response->getHeader("location")[0]}");
elseif($response instanceof Response)
    echo $response->getBody();
