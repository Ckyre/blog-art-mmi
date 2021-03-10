<main class="admin">
    <section class="admin-section">
        <h1>Administration des membres</h1>
        <h2>Cliquez sur modifier pour modifier le statut d'un membre</h2>

        <a href="/admin" class="btn btn-back">Revenir au panel général</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"># Numéro</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Pseudo</th> 
                    <th scope="col">Email</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($params['users'] as $user) : ?>
                    <tr>
                        <th scope="row"><?= $user->numMemb ?></th>
                        <td><?= $user->pseudoMemb ?></td>
                        <td><?= $user->nomMemb ?></td>
                        <td><?= $user->prenomMemb ?></td>
                        <td><?= $user->eMailMemb ?></td>
                        <td><?= $user->getStatut()->libStat ?></td>
                        <td>
                            <a href="/admin/users/edit/<?= $user->numMemb ?>" class="btn">Modifier</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>
</main>