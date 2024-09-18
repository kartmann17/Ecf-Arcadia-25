<link rel="stylesheet" href="../Asset/css/nosanimaux.css">
<h1 class="text-center">Nos animaux</h1>

<div class="d-flex flex-row flex-wrap justify-content-center gap-3">
    <?php foreach ($Animaux as $animal): ?>
        <div class="card ">
            <img src="/asset/Images/<?= $animal->url?>" class="card-img-top" alt="Animal Image"/>
            <div class="card-body">
                <h5 class="card-title"><?=$animal->nom; ?></h5>
                <p class="card-text">Âge : <?=$animal->age; ?>ans</p>
                <p class="card-text">Ceci est une description supplémentaire pour l'animal.</p>
                
            </div>
        </div>
    <?php endforeach; ?>
</div>
