<link rel="stylesheet" href="../Asset/css/dashindex.css">
<div class="vide"></div>

<div class="container mt-5">
    <h2>Modifier l'animal</h2>
    <form action="/updateAnimal" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $animal->id ?>">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'animal</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= $animal->nom ?>" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Âge</label>
            <input type="number" class="form-control" id="age" name="age" value="<?= $animal->age ?>" required>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input type="file" class="form-control" id="img" name="img">
        </div>
        <div class="mb-3">
            <label for="id_habitat" class="form-label">ID Habitat</label>
            <input type="text" class="form-control" id="id_habitat" name="id_habitat" value="<?= $animal->id_habitat ?>" required>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="/dash" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>