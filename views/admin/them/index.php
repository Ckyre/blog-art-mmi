<main class="admin">
    <section class="admin-section">
        <h1>Administration des thématiques</h1>
        <h2>Cliquez sur modifier pour modifier une thématique, supprimer pour supprimer une thématique, ou créer pour créer une thématique</h2>

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
                <?php foreach ($params['thems'] as $them) : ?>
                    <tr>
                        <th scope="row"><?= $them->numThem ?></th>
                        <td><?= $them->libThem ?></td>
                        <td><?= $them->numLang ?></td>
                        <td>
                            <a href="/admin/thems/edit/<?= $them->numThem ?>" class="btn">Modifier</a>
                            <form action="/admin/thems/delete/<?= $them->numThem ?>" method="POST" class="d-inline">
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <a href="/admin/thems/create" class="btn btn-create">Créer une nouvelle thématique</a>
    </section>
</main>