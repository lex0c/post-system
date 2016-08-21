<?php require_once __DIR__ . "/../include/header.php"; ?>

<div class="container">
    <div class="row">
        <header class="col-md-12">
            <h1>
                Listagem de Posts - <a class="btn btn-primary" href="posts/create">Novo Post</a>
            </h1>
        </header>
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>OPÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($posts as $post): ?>
                    <tr>
                        <td><?php echo $post->getId(); ?></td>
                        <td><?php echo $post->getTitle(); ?></td>
                        <td>
                            <?php echo "<a class='btn btn-success' href='/posts/{$post->getId()}/edit'>Editar</a>"; ?> |
                            <?php echo "<a class='btn btn-danger' href='/posts/{$post->getId()}/remove'>Excluir</a>"; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../include/footer.php"; ?>