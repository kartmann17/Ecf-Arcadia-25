<link rel="stylesheet" href="/Asset/css/nosunivers.css">
<div class="vide"></div>
<div class="container my-5">
    <h2 class="text-center mb-4">Animaux de l'habitat : <?= $Habitat->nom ?></h2>
    <div class="row row-cols-1 row-cols-md-3 g-5 m-auto mb-5">
        <?php foreach($univer as $u): ?>
            <div class="col">
                <div class="card m-auto w-75 h-100 d-flex flex-column">
                    <img src="/Asset/Images/<?= $u->img_animal ?>" class="card-img-top image" alt="Animal Image" />
                    <div class="card-body overflow-auto text-center d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title"><?= $u->nom_Habitat; ?></h5>
                            <p class="card-text">Âge : <?= $u->age; ?> ans</p>
                            <p class="card-text">Race: <?= $u->race; ?></p>
                            <p class="card-text">Habitat: <?= $u->nom_Habitat; ?></p>
                            <p class="card-text">Avis véto: <?= $u->status; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>