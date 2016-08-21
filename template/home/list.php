<?php require_once __DIR__ . "/../include/header.php"; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12">
            <h1>Bem-vindo - Novos Posts</h1>
        </header>
    </div>
    <section class="row">
        <div class="col-md-10">
            <ul class="list-unstyled">
                <li>
                    <?php foreach($posts as $post): ?>
                        <article class="jumbotron">
                            <h1><?php echo $post->getTitle(); ?></h1>
                            <p><?php echo substr($post->getContent(), 0, 200); ?></p>
                            <p><a class="btn btn-primary btn-lg" href="#" role="button">Leia Mais</a></p>
                        </article>
                    <?php endforeach; ?>
                </li>
            </ul>
        </div>
        <div class="col-md-2">
            <ul class="list-group">
                <?php foreach($categories as $category): ?>
                    <li class="list-group-item">
                        <a href="<?php echo "/?search={$category->getId()}"; ?>"><?php echo $category->getName(); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</div>
        
<?php require_once __DIR__ . "/../include/footer.php"; ?>