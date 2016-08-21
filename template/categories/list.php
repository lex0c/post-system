<?php require_once __DIR__ . "/../include/header.php"; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12">
            <h1>Listagem de Categorias</h1>
            <a class="btn btn-info" href="categories/create">Nova Categoria</a>
        </header>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo $category->getId(); ?></td>
                        <td><?php echo $category->getName(); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../include/footer.php"; ?>