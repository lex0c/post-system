<?php

use Zend\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

use \App\entity\Post;
use \App\entity\Category;

$map->get("posts.list", "/posts", function($request, $response) use ($view, $entityManager) {
    $repository = $entityManager->getRepository(Post::class);
    $posts = $repository->findAll();
    return $view->render($response, "posts/list.php", [
        "posts" => $posts
    ]);
});

$map->get("posts.create", "/posts/create", function($request, $response) use ($view) {
    return $view->render($response, "posts/create.php");
});

$map->post("posts.save", "/posts/save", 
        function(ServerRequestInterface $request, $response) use ($view, $entityManager, $generator) {
    $data = $request->getParsedBody();
    
    $post = new Post();
    $post->setTitle($data["title"]);
    $post->setContent($data["content"]);
    
    $entityManager->persist($post);
    $entityManager->flush();
    
    $uri = $generator->generate("posts.list");
    return new Response\RedirectResponse($uri);
});

$map->get("posts.categories", "/posts/{id}/categories", 
        function(ServerRequestInterface $request, $response) use ($view, $entityManager) {
    $id = $request->getAttribute("id");
    $repository = $entityManager->getRepository(Post::class);
    $categoryRepository = $entityManager->getRepository(Category::class);
    $categories = $categoryRepository->findAll();
    $post = $repository->find($id);
    return $view->render($response, "posts/categories.php", [
        "post" => $post,
        "categories" => $categories
    ]);
});

$map->post("posts.set-categories", "/posts/{id}/set-categories", 
        function(ServerRequestInterface $request, $response) use ($view, $entityManager, $generator) {
    $id = $request->getAttribute("id");
    $data = $request->getParsedBody();
    
    $repository = $entityManager->getRepository(Post::class);
    $categoryRepository = $entityManager->getRepository(Category::class);
    
    $post = $repository->find($id);
    $post->getCategories()->clear();
    $entityManager->flush();
    
    foreach($data["categories"] as $idCategory){
        $category = $categoryRepository->find($idCategory);
        $post->addCategory($category);
    }
    $entityManager->flush();
    
    $uri = $generator->generate("posts.list");
    return new Response\RedirectResponse($uri);
});

$map->get("posts.edit", "/posts/{id}/edit", 
        function(ServerRequestInterface $request, $response) use ($view, $entityManager) {
    $id = $request->getAttribute("id");
    $repository = $entityManager->getRepository(Post::class);
    $post = $repository->find($id);
    return $view->render($response, "posts/edit.php", [
        "post" => $post
    ]);
});

$map->post("posts.update", "/posts/{id}/update", 
        function(ServerRequestInterface $request, $response) use ($view, $entityManager, $generator) {
    $id = $request->getAttribute("id");
    $data = $request->getParsedBody();
    $repository = $entityManager->getRepository(Post::class);
    $post = $repository->find($id);
    $post->setTitle($data["title"]);
    $post->setContent($data["content"]);
    $entityManager->flush();
    
    $uri = $generator->generate("posts.list");
    return new Response\RedirectResponse($uri);
});

$map->get("posts.remove", "/posts/{id}/remove", 
        function(ServerRequestInterface $request, $response) use ($view, $entityManager, $generator) {
    $id = $request->getAttribute("id");
    $repository = $entityManager->getRepository(Post::class);
    $post = $repository->find($id);
    $entityManager->remove($post);
    $entityManager->flush();
    
    $uri = $generator->generate("posts.list");
    return new Response\RedirectResponse($uri);
});
