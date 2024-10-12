<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>

<div class="vide"></div>
<section class="container ">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Mise a jour <?= $univers->nom ?></h2>
                    </div>
                    <div class="card-body">

                        <form action="/DashUnivers/updateUnivers/<?= $univers->id ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $univers->id ?>" />

                            <!-- Nom -->
                            <div class="mb-3">
                                <label for="nom" class="form-label">Univers</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= $univers->nom ?>" placeholder="Nom de l'habitat" required>
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="img" accept="image/*" required >
                            </div>
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" value="<?= $univers->description ?>" placeholder="Ajoutez une description" required><?= $univers->description ?></textarea>
                            </div>


                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <a href="/DashUnivers/liste" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>