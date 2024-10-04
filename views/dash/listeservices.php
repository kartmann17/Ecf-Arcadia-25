<link rel="stylesheet" href="/Asset/css/dashindex.css">
<div class="vide"></div>
<div class="container mt-5 mb-5 service-container">
    <h2 class="mb-4">Gestion des Services</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>img</th>
                <th>description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php foreach ($services as $service): ?>
            <tbody>
                <tr>
                    <td><?= $service->nom ?></td>
                    <td><img src="/Asset/Images/<?= $service->img ?>" class="img-thumbnail" alt="image de <?= $service->nom ?>" width="80" height="80" /></td>
                    <td><?= $service->description ?></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-warning btn-sm me-1">Modifier</button>

                            <form action="/DashServices/deleteService" method="POST" onsubmit="return confirm('etes vous sur de vouloir supprimer ce service ?');">
                                    <input type="hidden" name="id" value="<?= $service->id?>">
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