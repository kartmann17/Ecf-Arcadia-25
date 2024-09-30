
<link rel="stylesheet" href="../Asset/css/dashindex.css">
<div class="vide"></div>
<div class="container mt-5 w-75 m-auto">
    <h2 class="mb-4">Gestion des Utilisateurs</h2>
    <table class="table table-striped table-bordered w-50" >
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
                        <button class="btn btn-warning btn-sm">Modifier</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
    </table>

    <div class="text-end">
        <a href="/dash" class="btn btn-secondary">Annuler</a>
    </div>
</div>