<link rel="stylesheet" href="/Asset/css/nosunivers.css">
<div class="vide"></div>
<div class="container my-5">
    <h2 class="text-center mb-4">Animaux de l'habitat : <?= $univers->nom ?></h2>

    <div class="row row-cols-1 row-cols-md-3 g-5 m-auto mb-5">
        <?php foreach ($animaux as $animal): ?>
            <div class="col">
                <div class="card m-auto w-75">
                    <img src="/Asset/Images/<?= $animal->img ?>" class="card-img-top image" alt="Animal Image" />
                    <div class="card-body overflow-auto">
                        <h5 class="card-title"><?= $animal->nom; ?></h5>
                        <p class="card-text">Âge : <?= $animal->age; ?> ans</p>
                        <p class="card-text">Race: <?= $animal->id_race; ?></p>
                        <p class="card-text">Habitat: <?= $univers->nom; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>