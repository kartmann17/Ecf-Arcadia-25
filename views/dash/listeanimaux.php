<link rel="stylesheet" href="../Asset/css/dashindex.css">
<div class="vide"></div>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Gestion des Animaux</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>age</th>
                    <th>img</th>
                    <th>id_habitat</th>
                    <th>visite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php foreach ($animaux as $animal): ?>
            <tbody>
                <tr>
                    <td><?= $animal->nom?></td>
                    <td><?= $animal->age?></td>
                    <td><img src="/Asset/Images/<?= $animal->img?>" class="img-thumbnail" alt="image de <?= $animal->nom?>"width="80" height="80"/></td>
                    <td><?= $animal->id_habitat?></td>
                    <td><?= $animal->visite?></td>
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