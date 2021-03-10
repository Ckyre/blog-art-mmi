<main class="admin">
    <section class="admin-section">
        <h1>Administration des angles</h1>
        <h2>Cliquez sur modifier pour modifier un statut, supprimer pour supprimer un statut, ou créer pour créer un statut</h2>

        <a href="/admin" class="btn btn-back">Revenir au panel général</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"># Numéro</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($params['statuts'] as $statut) : ?>
                    <tr>
                        <th scope="row"><?= $statut->idStat ?></th>
                        <td><?= $statut->libStat ?></td>
                        <td>
                            <a href="/admin/statuts/edit/<?= $statut->idStat ?>" class="btn">Modifier</a>
                            <form action="/admin/statuts/delete/<?= $statut->idStat ?>" method="POST" class="d-inline">
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <a href="/admin/statuts/create" class="btn btn-success mt-2">Créer un nouveau statut</a>
    </section>
</main>