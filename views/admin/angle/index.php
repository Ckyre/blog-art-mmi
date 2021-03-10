<main class="admin">
    <section class="admin-section">
        <h1>Administration des angles</h1>
        <h2>Cliquez sur modifier pour modifier un angle, supprimer pour supprimer un angle, ou créer pour créer un angle</h2>

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
                <?php foreach ($params['angles'] as $angle) : ?>
                    <tr>
                        <th scope="row"><?= $angle->numAngl ?></th>
                        <td><?= $angle->libAngl ?></td>
                        <td><?= $angle->numLang ?></td>
                        <td>
                            <a href="/admin/angles/edit/<?= $angle->numAngl ?>" class="btn">Modifier</a>
                            <form action="/admin/angles/delete/<?= $angle->numAngl ?>" method="POST" class="d-inline">
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <a href="/admin/angles/create" class="btn btn-create">Créer un nouveau statut</a>
    </section>
</main>