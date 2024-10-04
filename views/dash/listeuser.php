<link rel="stylesheet" href="/Asset/css/dashindex.css">
<div class="vide"></div>
<div class="container mt-5 mb-5 users-container">
    <h2 class="mb-4">Gestion des Utilisateurs</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php foreach ($user as $user): ?>
            <tbody>
                <tr>
                    <td><?= $user->nom ?></td>
                    <td><?= $user->prenom ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->role ?></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <form action="/DashUser/deleteUser" method="POST" onsubmit="return confirm('etes vous sur de vouloir supprimer cette utilisateur ?');">
                                <input type="hidden" name="id" value="<?= $user->id ?>">
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
    </table>

    <div class="text-end">
        <a href="/dash" class="btn btn-secondary">Annuler</a>
    </div>
</div>