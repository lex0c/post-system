<?php require_once __DIR__ . "/../include/header.php"; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12">
            <h1>Nova Categoria</h1>
        </header>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form name="form" method="post" action="/categories/save">
                <div class="form-group">
                    <label for="name">Nome: </label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Digite seu nome..."/>
                </div>
                <button class="btn btn-default" type="submit">Salvar!</button>
            </form>
        </div>
    </div>
</div>
        
<?php require_once __DIR__ . "/../include/footer.php"; ?>