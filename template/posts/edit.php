<?php require_once __DIR__ . "/../include/header.php"; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12">
            <h1>Editar Post</h1>
        </header>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form name="form" method="post" action="<?php echo "/posts/{$post->getId()}/update"; ?>">
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input class="form-control" type="text" id="title" name="title" value="<?php echo $post->getTitle(); ?>"/>
                </div>
                <div class="form-group">
                    <label for="content">Conteúdo</label>
                    <textarea class="form-control" id="content" name="content"><?php echo $post->getContent(); ?></textarea>
                </div>
                <button class="btn btn-default" type="submit">Salvar!</button>
            </form>
        </div>
    </div>
</div>
        
<?php require_once __DIR__ . "/../include/footer.php"; ?>