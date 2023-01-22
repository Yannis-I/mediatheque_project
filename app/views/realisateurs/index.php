<h1>RÉALISATEURS VEDETTES</h1>

<?php foreach($datas as $human): ?>

    <a href="/realisateurs/details/<?= $human->getId() ?>">
        <div class="human-card">
            <div class="human-card__photo">
                <img src="/assets/images/directors/<?= $human->getUrl_photo() ?>.jpg">
            </div>
            <div class="human-card__datas">
                <h3 class="nom">
                    <?= $human->getPrenom() . " " . $human->getNom(); ?>
                </h3>
                <div class="bio">
                    <?= $human->getBio(); ?>
                </div>
            </div>
        </div>
    </a>

<?php endforeach; ?>