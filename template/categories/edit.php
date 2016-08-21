<?php require_once __DIR__ . "/../include/header.php"; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12">
            <h1>Editar Categoria</h1>
        </header>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form name="form" method="post" action="<?php echo "/categories/{$category->getId()}/update"; ?>">
                <div class="form-group">
                    <label for="name">Nome: </label>
                    <input class="form-control" type="text" id="name" name="name" value="<?php echo $category->getName(); ?>"/>
                </div>
                <button class="btn btn-default" type="submit">Salvar!</button>
            </form>
        </div>
    </div>
</div>
        
<?php require_once __DIR__ . "/../include/footer.php"; ?>