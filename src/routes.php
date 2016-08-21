<?php

use Zend\Diactoros\ServerRequestFactory;
use Aura\Router\RouterContainer;
use Zend\Diactoros\Response;
use Slim\Views\PhpRenderer;

use App\entity\Post;
use App\entity\Category;

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$routerContainer = new RouterContainer();
$generator = $routerContainer->getGenerator();
$map = $routerContainer->getMap();
$view = new PhpRenderer(__DIR__ . "/../template/");

$entityManager = getEntityManager();

$map->get("home", "/", function($request, $response) use ($view, $entityManager) {
    $postRepository = $entityManager->getRepository(Post::class);
    $categoryRepository = $entityManager->getRepository(Category::class);
    $categories = $categoryRepository->findAll();
    
    $data = $request->getQueryParams();
    if(isset($data["search"]) and $data["search"] != ""){
        $queryBuilder = $postRepository->createQueryBuilder("p");
        $queryBuilder->join("p.categories", "c")
                ->where($queryBuilder->expr()->eq("c.id", $data["search"]));
        $posts = $queryBuilder->getQuery()->getResult();
    }else{
        $posts = $postRepository->findAll();
    }
    
    return $view->render($response, "home/list.php", [
        "posts" => $posts,
        "categories" => $categories
    ]);
});


require_once __DIR__ . "/categories.php";
require_once __DIR__ . "/post.php";


$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
foreach($route->attributes as $key => $value){
    $request = $request->withAttribute($key, $value);
}

$callable = $route->handler;
$response = $callable($request, new Response());

if($response instanceof Response\RedirectResponse) {
    header("location:{$response->getHeader("location")[0]}");
} elseif($response instanceof Response) {
    echo $response->getBody();
}
