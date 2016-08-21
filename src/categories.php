<?php

use Zend\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

use \App\entity\Category;

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

$map->get("categories.edit", "/categories/{id}/edit", 
        function(ServerRequestInterface $request, $response) use ($view, $entityManager) {
    $id = $request->getAttribute("id");
    $repository = $entityManager->getRepository(Category::class);
    $category = $repository->find($id);
    return $view->render($response, "categories/edit.php", [
        "category" => $category
    ]);
});

$map->post("categories.update", "/categories/{id}/update", 
        function(ServerRequestInterface $request, $response) use ($view, $entityManager, $generator) {
    $id = $request->getAttribute("id");
    $repository = $entityManager->getRepository(Category::class);
    $category = $repository->find($id);
    $data = $request->getParsedBody();
    $category->setName($data["name"]);
    $entityManager->flush();
    
    $uri = $generator->generate("categories.list");
    return new Response\RedirectResponse($uri);
});

$map->get("categories.remove", "/categories/{id}/remove", 
        function(ServerRequestInterface $request, $response) use ($view, $entityManager, $generator) {
    $id = $request->getAttribute("id");
    $repository = $entityManager->getRepository(Category::class);
    $category = $repository->find($id);
    $entityManager->remove($category);
    $entityManager->flush();
    
    $uri = $generator->generate("categories.list");
    return new Response\RedirectResponse($uri);
});

