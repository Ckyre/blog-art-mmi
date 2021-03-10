<main class="admin">
    <section class="admin-section">
        <h1>Administration des angles</h1>
        <h2>Cliquez sur modifier pour modifier un mot-clé, supprimer pour supprimer un mot-clé, ou créer pour créer un mot-clé</h2>

        <a href="/admin" class="btn btn-back">Revenir au panel général</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"># Numéro</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Langue</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($params['motcles'] as $motcle) : ?>
                    <tr>
                        <th scope="row"><?= $motcle->numMotCle ?></th>
                        <td><?= $motcle->libMotCle ?></td>
                        <td><?= $motcle->numLang ?></td>
                        <td>
                            <a href="/admin/motcles/edit/<?= $motcle->numMotCle ?>" class="btn">Modifier</a>
                            <form action="/admin/motcles/delete/<?= $motcle->numMotCle ?>" method="POST" class="d-inline">
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <a href="/admin/motcles/create" class="btn btn-create">Créer un nouveau mot clé</a>
    </section>
</main>