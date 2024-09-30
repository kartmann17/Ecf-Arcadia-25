<link rel="stylesheet" href="../Asset/css/dashindex.css">
<div class="vide"></div>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Gestion des Univers</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>img</th>
                    <th>description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php foreach ($univers as $univer): ?>
            <tbody>
                <tr>
                    <td><?= $univer->nom?></td>
                    <td><img src="/Asset/Images/<?= $univer->img?>" class="img-thumbnail" alt="image de <?= $univer->nom?>"width="80" height="80"/></td>
                    <td><?= $univer->description?></td>
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