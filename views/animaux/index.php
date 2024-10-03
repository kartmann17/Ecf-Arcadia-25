<link rel="stylesheet" href="../Asset/css/nosanimaux.css">
<div class="vide"></div>
<h1 class="text-center mb-5">Nos animaux</h1>


<div class="row row-cols-1 row-cols-md-3 g-5 m-auto mb-5">
    <?php foreach ($animaux as $animal): ?>
        <div class="col">
            <div class="card m-auto w-75">
                <img src="/Asset/Images/<?= $animal->img ?>" class="card-img-top image" alt="Animal Image" />
                <div class="card-body overflow-auto">
                    <h5 class="card-title"><?= $animal->nom; ?></h5>
                    <p class="card-text">Âge : <?= $animal->age; ?> ans</p>

                    <?php foreach ($races as $race):  if ($race->id == $animal->id_race): ?>
                            <p class="card-text">Race: <?= $race->race; ?></p>
                    <?php break;
                        endif;
                    endforeach; ?>

                    <?php foreach ($univers as $univer): if ($univer->id == $animal->id_habitat): ?>
                            <p class="card-text">Habitat: <?= $univer->nom; ?></p>
                    <?php break;
                        endif;
                    endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>