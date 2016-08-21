<?php require_once __DIR__ . "/../include/header.php"; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12">
            <h1>
                Listagem de Categorias - <a class="btn btn-primary" href="categories/create">Nova Categoria</a>
            </h1>
        </header>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>OPÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo $category->getId(); ?></td>
                        <td><?php echo $category->getName(); ?></td>
                        <td>
                            <?php echo "<a class='btn btn-success' href='/categories/{$category->getId()}/edit'>Editar</a>"; ?> |
                            <?php echo "<a class='btn btn-danger' href='/categories/{$category->getId()}/remove'>Excluir</a>"; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../include/footer.php"; ?>