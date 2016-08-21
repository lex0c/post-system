<?php require_once __DIR__ . "/../include/header.php"; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12">
            <h1>Novo Post</h1>
        </header>
        <div class="col-md-12">
            <form name="form" method="post" action="/posts/save">
                <div class="form-group">
                    <label for="title">Titulo: </label>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Digite o titulo..."/>
                </div>
                <div class="form-group">
                    <label for="content">Conteúdo</label>
                    <textarea class="form-control" id="content" name="content"></textarea>
                </div>
                <button class="btn btn-default" type="submit">Salvar!</button>
            </form>
        </div>
    </div>
</div>
        
<?php require_once __DIR__ . "/../include/footer.php"; ?>