<main class="admin">
    <section class="admin-section">
        <h1>Administration des articles</h1>
        <h2>Cliquez sur modifier pour modifier un article, supprimer pour supprimer un article, ou créer pour créer un article</h2>
        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success">Vous êtes connecté !</div>
        <?php endif ?>

        <a href="/admin" class="btn btn-back">Revenir au panel général</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Publié le</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($params['articles'] as $article) : ?>
                    <tr>
                        <th scope="row"><?= $article->numArt ?></th>
                        <td><?= $article->libTitrArt ?></td>
                        <td><?= getFormattedDate($article->dtCreArt) ?></td>
                        <td>
                            <a href="/admin/articles/edit/<?= $article->numArt ?>" class="btn">Modifier</a>
                            <form action="/admin/articles/delete/<?= $article->numArt ?>" method="POST" class="d-inline">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <a href="/admin/articles/create" class="btn btn-create">Créer un nouvel article</a>
    </section>
</main>