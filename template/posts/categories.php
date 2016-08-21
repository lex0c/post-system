<?php require_once __DIR__ . "/../include/header.php"; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12">
            <h1>Adicionar Categoria</h1>
            <h5><?php echo "Post - {$post->getTitle()}"; ?></h5>
        </header>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form name="form" method="post" action="<?php echo "/posts/{$post->getId()}/set-categories"; ?>">
                <div class="form-group">
                    <label for="categories">Categoria: </label>
                    <select class="form-control" name="categories[]" multiple>
                        <?php foreach($categories as $category): ?>
                            <option value="<?php echo $category->getId(); ?>" <?php echo $post->getCategories()->contains($category)?'selected':'' ?>>
                                <?php echo $category->getName(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn btn-default" type="submit">Adicionar!</button>
            </form>
        </div>
    </div>
</div>
        
<?php require_once __DIR__ . "/../include/footer.php"; ?>